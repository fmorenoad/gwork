<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Refwork;
use Illuminate\Http\Request;

class RefworkController extends Controller
{
    public function index()
    {
        $refworks = Refwork::all();
        return view('admin.refwork.index', compact('refworks'));
    }

    public function create()
    {
        return view('admin.refwork.create');
    }
    
    public function store(Request $request)
    {
        $refwork = Refwork::create($request->all());
        return back()->with('status', 'Creado con éxito');
    }

    public function edit(Refwork $refwork)
    {
        return view('admin.refwork.edit', compact('refwork'));
    }
    
    public function destroy(Request $request, Refwork $refwork)
    {
        $refwork->delete();
        return back()->with('status', 'Eliminado con éxito');
    }
    
    public function update(Request $request, Refwork $refwork)
    {
        $refwork->update($request->all());
        return back()->with('status', 'Actualizado con éxito');
    }
}