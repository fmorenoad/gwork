<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Reffrequency;
use Illuminate\Http\Request;

class ReffrequencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reffrequencys = Reffrequency::all();
        return view('admin.reffrequency.index', compact('reffrequencys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reffrequency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reffrequency = Reffrequency::create($request->all());
        return back()->with('status', 'Frecuencia creada con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reffrequency  $reffrequency
     * @return \Illuminate\Http\Response
     */
    public function edit(Reffrequency $reffrequency)
    {
        return view('admin.reffrequency.edit', compact('reffrequency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reffrequency  $reffrequency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reffrequency $reffrequency)
    {
        $reffrequency->update($request->all());

        return back()->with('status', 'Actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reffrequency  $reffrequency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reffrequency $reffrequency)
    {
        $reffrequency->delete();
        return back()->with('status', 'Actualizado con exito.');
    }
}
