<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Refroute;
use Illuminate\Http\Request;

class RefrouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refroutes = Refroute::all();
        return view('admin.refroute.index', compact('refroutes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.refroute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $refroute = Refroute::create($request->all());
        return back()->with('status','Creado con exito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Refroute  $refroute
     * @return \Illuminate\Http\Response
     */
    public function edit(Refroute $refroute)
    {
        return view('admin.refroute.edit', compact('refroute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Refroute  $refroute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refroute $refroute)
    {
        $refroute->update($request->all());
        return back()->with('status','Actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Refroute  $refroute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refroute $refroute)
    {
        $refroute->delete();
        return back()->with('status','Eliminado con exito.');
    }
}
