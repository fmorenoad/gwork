<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Refdirection;
use Illuminate\Http\Request;

class RefdirectionController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refdirections = Refdirection::all();
        return view('admin.refdirection.index', compact('refdirections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.refdirection.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $refdirection = Refdirection::create($request->all());
        return back()->with('status', 'Frecuencia creada con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reffrequency  $reffrequency
     * @return \Illuminate\Http\Response
     */
    public function edit(Refdirection $refdirection)
    {
        return view('admin.refdirection.edit', compact('refdirection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reffrequency  $reffrequency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refdirection $refdirection)
    {
        $refdirection->update($request->all());

        return back()->with('status', 'Actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reffrequency  $reffrequency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refdirection $refdirection)
    {
        $refdirection->delete();
        return back()->with('status', 'Actualizado con exito.');
    }
}
