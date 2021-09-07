<?php

namespace App\Http\Controllers;

use App\Enterprise;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    public function index()
    {
        $enterprises = Enterprise::all();
        return view('admin.enterprise.index',  compact('enterprises'));
    }

    public function create()
    {
        return view('admin.enterprise.create');
    }

    public function store(Request $request)
    {
        $enterprise = Enterprise::create($request->all());
        return redirect(route('enterprises.index'))->with('status', 'Empresa creada con éxito');
    }

    public function edit(Enterprise $enterprise)
    {
        return view('admin.enterprise.edit', compact('enterprise'));
    }

    public function update(Enterprise $enterprise, Request $request)
    {
        $enterprise->update($request->all());

        return redirect(route('enterprises.index'))->with('status', 'Empresa actualizada con éxito');
    }

    public function destroy(Enterprise $enterprise, Request $request)
    {
        $enterprise->delete();
        return redirect(route('enterprises.index'))->with('status', 'Eliminado con éxito');
    }
}
