<?php

namespace App\Http\Controllers;

use App\Exports\WorksExport;
use App\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $reports = Report::all();
        return view('reports.index', compact('reports'));
    }

    public function create()
    {
        return view('reports.create');
    }

    public function store(Request $request)
    {
        $report = Report::create($request->all());
        $reports = Report::all();

        return view('reports.index', compact('reports'))->with('status', 'Reporte solicitado con éxito');;
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return back()->with('status', 'Eliminado con éxito');
    }


    public function download(Request $request)
    {
        return (new WorksExport($request["id"], $request["year"], $request["month"]))->download('works-list.xlsx');
    }
}
