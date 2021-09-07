<?php

namespace App\Exports;

use App\Cost;
use App\Refresource;
use App\Work;
use App\Report;
use App\Calendar;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class WorksExport implements FromView
{
    use Exportable;

    public $id, $year, $month;

    public function __construct($id, $year, $month)
    {
        if($month < 10)
        {
            $month = '0'.strval($month);
        }
        $this->id = $id;
        $this->year = $year;
        $this->month = strval($month);
    }

    public function view(): View
    {
         $report_request = Report::select()->where('id', '=', $this->id)->first();

         if($report_request->name == 'Reporte Cierre Mes')
         {
            $calendar = Calendar::select()->where([['year', '=', $this->year], ['month', '=', $this->month]])->first();

            $query = "
            SELECT
            contracts.code,
            contracts.description,
            works.id,
            works.created_at,
            works.num_minuta,
            works.ficha_accidente,
            refworks.item,
            refworks.`work`,
            refworks.unit as unit_work,
            works.amount_of_work,
            works.origin,
            users.name,
            users.lastname,
            works.frequency, resource,
            refresources.unit,
            SUM(resources.quantity) AS quantity,
            CASE
            WHEN refresources.resource = 'Equipo de Trabajo Hora Normal' THEN ((SELECT cost FROM cost_humans ch WHERE ch.resource_id = 21 AND ch.month = :month_a AND ch.year = :year_a)/(:dias_habiles * 9))
            WHEN refresources.resource = 'Equipo de Trabajo Hora Extra' THEN (SELECT cost FROM cost_humans ch WHERE ch.resource_id = 22 AND ch.month = :month_b AND ch.year = :year_b)

            ELSE costs.cost
            END AS costo,
            CASE
                WHEN refresources.resource = 'Equipo de Trabajo Hora Normal' THEN 'UF'
                WHEN refresources.resource = 'Equipo de Trabajo Hora Extra' THEN 'UF'
            ELSE costs.unit_of_money
            END AS unit_of_money

            FROM works
            INNER JOIN refworks ON refworks.id = works.refwork_id
            INNER JOIN users ON users.id = works.user_id
            INNER JOIN resources ON resources.work_id = works.id
            INNER JOIN refresources ON refresources.id = resources.refresource_id
            LEFT JOIN costs ON costs.refresource_id = refresources.id
            LEFT JOIN contracts ON contracts.id = works.contract_id

            WHERE works.created_at >= :fecha_inicio_mes_b
            AND works.created_at < :fecha_fin_mes_b
            GROUP BY refworks.item,
            contracts.code,
            contracts.description,
            works.frequency,
            costs.cost,
            costs.unit_of_money,
            works.id,
            works.created_at,
            refworks.item,
            refworks.`work`,
            refworks.unit,
            works.amount_of_work,
            works.origin,
            users.name,
            users.lastname,
            refresources.resource,
            refresources.unit,
            works.num_minuta,
            works.ficha_accidente
            ORDER BY  works.id ASC";
            $query_report = DB::select($query, [
                    'month_a' => intval($this->month),
                    'year_a'=> intval($this->year),
                    'month_b' => intval($this->month),
                    'year_b'=> intval($this->year),
                    'dias_habiles' => intval($calendar["laboral_days"]),
                    'fecha_inicio_mes_b' => $calendar["date_init"],
                    'fecha_fin_mes_b' => $calendar["date_end"]]);

            return view('exports.works_examples', compact('query_report'));
         }
         elseif($report_request->name == 'Resumen de Mes')
         {
            $calendar = Calendar::select()->where([['year', '=', $this->year], ['month', '=', $this->month]])->first();
            #Arreglar Consuklta oara que sume los costos como un total
            $query = "
            SELECT
            contracts.code,
            contracts.description,
            refworks.item,
            refworks.`work`,
            refworks.unit as unit_work,
            works.amount_of_work,
            refresources.resource,
            SUM(resources.quantity) AS quantity,
            CASE
            WHEN refresources.resource = 'Equipo de Trabajo Hora Normal' THEN ((SELECT cost FROM cost_humans ch WHERE ch.resource_id = 21 AND ch.month = :month_a AND ch.year = :year_a)/(:dias_habiles * 9)) * SUM(resources.quantity)
            WHEN refresources.resource = 'Equipo de Trabajo Hora Extra' THEN (SELECT cost FROM cost_humans ch WHERE ch.resource_id = 22 AND ch.month = :month_b AND ch.year = :year_b) * SUM(resources.quantity)
            ELSE costs.cost * SUM(resources.quantity)
            END AS costo

            FROM refworks
            INNER JOIN works ON works.refwork_id = refworks.id
            LEFT JOIN contracts ON contracts.id = works.contract_id
            INNER JOIN users ON users.id = works.user_id
            INNER JOIN resources ON resources.work_id = works.id
            INNER JOIN refresources ON refresources.id = resources.refresource_id
            LEFT JOIN costs ON costs.refresource_id = refresources.id


            WHERE   works.created_at >= :fecha_inicio_mes_b
                    AND works.created_at < :fecha_fin_mes_b

            GROUP BY
            contracts.code,
            contracts.description,
            refworks.item,
            refworks.`work`,
            refworks.unit,
            works.amount_of_work,
            refresources.resource,
            costs.cost
            ORDER BY refworks.item ASC";

            $query_reference = "
            SELECT
            contracts.code,
            contracts.description,
            refworks.item,
            refworks.`work`,
            refworks.unit

            FROM refworks
            INNER JOIN works ON works.refwork_id = refworks.id
            LEFT JOIN contracts ON contracts.id = works.contract_id
            INNER JOIN resources ON resources.work_id = works.id
            INNER JOIN refresources ON refresources.id = resources.refresource_id

            WHERE   works.created_at >= :fecha_inicio_mes_b
                    AND works.created_at < :fecha_fin_mes_b

            GROUP BY
            contracts.code,
            contracts.description,
            refworks.item,
            refworks.`work`,
            refworks.unit

            ORDER BY refworks.item ASC";

            $query_money = "
            SELECT * FROM money WHERE year = :year_a AND month = :month_a ";

            $query_report = DB::select($query, [
                    'month_a' => intval($this->month),
                    'year_a'=> intval($this->year),
                    'month_b' => intval($this->month),
                    'year_b'=> intval($this->year),
                    'dias_habiles' => intval($calendar["laboral_days"]),
                    'fecha_inicio_mes_b' => $calendar["date_init"],
                    'fecha_fin_mes_b' => $calendar["date_end"]
                    ]);

            $query_reference_report = DB::select($query_reference, [
                'fecha_inicio_mes_b' => $calendar["date_init"],
                'fecha_fin_mes_b' => $calendar["date_end"]
                ]);

            $query_money_reference = DB::select($query_money, [
                'month_a' => intval($this->month),
                'year_a'=> intval($this->year),
                ]);

            return view('exports.works_resume', compact('query_reference_report','query_money_reference','query_report'));
         }
         else{
             return back()->whit("status", "Hay un problema!");
         }
    }
}
