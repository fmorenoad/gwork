<?php

namespace App\Http\Controllers;

use App\Cost;
use App\Refresource;
use Illuminate\Http\Request;
use App\Http\Requests\CostRequest;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #Mostrar todos los recursos en una tabla, con sus precios historicos.
        $costs = Cost::all();
        $refresources = Refresource::all();

        return view('costs.index', compact('costs', 'refresources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $refresources = Refresource::all();

        return view('costs.create', compact('refresources'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostRequest $request)
    {       
        $cost = Cost::create($request->all());

        $costs = Cost::all();
        $refresources = Refresource::all();
        
        return view('costs.index', compact('costs','refresources'))->with('status', 'Costo creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
