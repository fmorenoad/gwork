<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Reforigin;
use Illuminate\Http\Request;

class ReforiginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reforigins = Reforigin::all();
        return view('admin.reforigin.index', compact('reforigins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reforigin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reforigin = Reforigin::create($request->all());
        return back()->with('status', 'Frecuencia creada con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reffrequency  $reffrequency
     * @return \Illuminate\Http\Response
     */
    public function edit(Reforigin $reforigin)
    {
        return view('admin.reforigin.edit', compact('reforigin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reffrequency  $reffrequency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reforigin $reforigin)
    {
        $reforigin->update($request->all());

        return back()->with('status', 'Actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reffrequency  $reffrequency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reforigin $reforigin)
    {
        $reforigin->delete();
        return back()->with('status', 'Actualizado con exito.');
    }
}