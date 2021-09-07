<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Refresource;
use Illuminate\Http\Request;

class RefresourceController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refresources = Refresource::all();
        return view('admin.refresource.index', compact('refresources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.refresource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $refresource = Refresource::create($request->all());
        return back()->with('status', 'Frecuencia creada con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reffrequency  $reffrequency
     * @return \Illuminate\Http\Response
     */
    public function edit(Refresource $refresource)
    {
        return view('admin.refresource.edit', compact('refresource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reffrequency  $reffrequency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refresource $refresource)
    {
        $refresource->update($request->all());

        return back()->with('status', 'Actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reffrequency  $reffrequency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refresource $refresource)
    {
        $refresource->delete();
        return back()->with('status', 'Actualizado con exito.');
    }
}
