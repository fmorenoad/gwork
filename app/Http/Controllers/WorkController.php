<?php

namespace App\Http\Controllers;

use App\Attachment;
use Illuminate\Http\Request;
use App\Work;
use App\Http\Requests\WorkRequest;
use App\Refdirection;
use App\Reffrequency;
use App\Refhighway;
use App\Reforigin;
use App\Refresource;
use App\Refroute;
use App\Refwork;
use App\ServiceUser;
use App\User;
use Illuminate\Support\Facades\DB;
/* use Barryvdh\DomPDF\PDF; */

use Barryvdh\DomPDF\Facade as PDF;


class WorkController extends Controller
{

    static public function get_user_services($usuario_id)
    {
        $query = "
                SELECT
                services.id,
                services.name,
                services.description,
                services.code

                FROM services
                INNER JOIN service_users ON service_users.service_id = services.id
                INNER JOIN users ON users.id = service_users.user_id

                WHERE users.id = :user_id AND service_users.status = 'Activo'
                ORDER BY services.id ASC";

        $services = DB::select($query, [
                    'user_id' => intval($usuario_id),]);

        return $services;
    }

    public function index()
    {
        $works = Work::latest()->take(200)->get();
        return view('works.index', compact('works'));
    }

    public function create()
    {
        $refworks = Refwork::all();
        $reffrequencies = Reffrequency::all();
        $refhighways = Refhighway::all();
        $refroutes = Refroute::all();
        $refdirections = Refdirection::all();
        $reforigins = Reforigin::all();

        #Modificar y llamar a servicios asociados a los usuarios.
        $services_user = ServiceUser::where([['user_id', '=', intval(auth()->user()->id)]])->get();

        $services = WorkController::get_user_services(auth()->user()->id);

        return view('works.create', compact('refworks', 'reffrequencies', 'refhighways', 'refroutes', 'refdirections', 'reforigins', 'services'));
    }

    public function form_upload(Work $work)
    {
        $type_image = ['Antes de iniciar el trabajo','Durante el trabajo','Luego de finalizar el trabajo'];

        return view('works.form_upload', compact('work','type_image'));
    }

    public function upload(Work $work, Request $request)
    {
        $attachment = Attachment::create(['work_id' => $request->work,
                                        'type' => $request->type,
                                        'route' => $request->file('image')->store('images'),
                                        ]);

        return back()->with('status', 'Fotografía cargada con éxito');
    }

    public function store(WorkRequest $request)
    {
        $work = Work::create(['user_id' => auth()->user()->id] + $request->all());

        return view('works.show', compact('work'));
    }

    public function show(Work $work)
    {
        $refresources = Refresource::all();
        return view('works.show', compact('work', 'refresources'));
    }

    public function exportPDF(Work $work)
    {
        $refresources = Refresource::all();

        $normal_hour = 0;
        $extra_hour = 0;

        foreach($work->resources as $resource)
        {
            if ($resource->unit == 'hora normal')
            {
                $normal_hour = $normal_hour + $resource->quantity;
            }elseif($resource->unit == 'hora extra')
            {
                $extra_hour = $extra_hour + $resource->quantity;
            }
        }

        $pdf = PDF::loadView('works.show-export', compact('refresources', 'work', 'normal_hour', 'extra_hour'));
        return $pdf->stream('acta_de_trabajo.pdf');
        #return view('works.show', compact('work', 'refresources'));
    }

    public function edit(Work $work)
    {
        $refworks = Refwork::all();
        $reffrequencies = Reffrequency::all();
        $refhighways = Refhighway::all();
        $refroutes = Refroute::all();
        $refdirections = Refdirection::all();
        $reforigins = Reforigin::all();
        $services = WorkController::get_user_services(auth()->user()->id);

        return view('works.edit', compact('work', 'refworks', 'reffrequencies', 'refhighways', 'refroutes', 'refdirections', 'reforigins', 'services'));
    }

    public function update(WorkRequest $request, Work $work)
    {
        $work->update(['created_at' => $request->date . " " . $request->time] + $request->all());
        return back()->with('status', 'Actualizado con éxito');
    }

    public function destroy(Work $work)
    {
        $work->delete();
        return back()->with('status', 'Eliminado con éxito');
    }

    public function unit(Request $request)
    {
        return ('Hola');
    }

    public function symlinkAa()
    {
        $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
        $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
        symlink($targetFolder,$linkFolder);
        echo 'Symlink process successfully completed';
    }
}
