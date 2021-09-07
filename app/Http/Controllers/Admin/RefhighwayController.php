<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Refhighway;
use Illuminate\Http\Request;

class RefhighwayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $refhighways = Refhighway::all();
        return view('admin.highway.index', compact('refhighways'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.highway.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Refhighway::create($request->all());
        return back()->with('status','Creado con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Refhighway  $refhighway
     * @return \Illuminate\Http\Response
     */
    public function edit(Refhighway $refhighway)
    {
        return view('admin.highway.edit', compact('refhighway'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Refhighway  $refhighway
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refhighway $refhighway)
    {
        $refhighway->update($request->all());
        return back()->with('status','Actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Refhighway  $refhighway
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refhighway $refhighway)
    {
        $refhighway->delete();
        return back()->with('status','Eliminado con exito.');
    }
}
