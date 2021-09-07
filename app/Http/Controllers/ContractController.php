<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Enterprise;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $contracts = Contract::all();
        return view('admin.contract.index',  compact('contracts'));
    }

    public function create()
    {
        $enterprises = Enterprise::all();
        return view('admin.contract.create', compact('enterprises'));
    }

    public function store(Request $request)
    {
        $contract = Contract::create($request->all());
        return redirect(route('contracts.index'))->with('status', 'Contrato creado con éxito');
    }

    public function edit(Contract $contract)
    {
        $enterprises = Enterprise::all();
        return view('admin.contract.edit', compact('contract', 'enterprises'));
    }

    public function update(Contract $contract, Request $request)
    {
        $contract->update($request->all());

        return redirect(route('contract.index'))->with('status', 'Contrato actualizado con éxito');
    }

    public function destroy(Contract $contract, Request $request)
    {
        $contract->delete();
        return redirect(route('contracts.index'))->with('status', 'Eliminado con éxito');
    }
}
