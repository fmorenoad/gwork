<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index($contract)
    {
        $services = Service::where([['contract_id', '=', $contract]])->get();
        return view('admin.service.index',  compact('services', 'contract'));
    }

    public function create(Contract $contract)
    {
        return view('admin.service.create', compact('contract'));
    }

    public function store($contract, Request $request)
    {
        $service = Service::create([
            'contract_id' => $request->contract_id,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'unit' => $request->unit,
            'cost' => $request->cost,
            'money' => $request->money,
            'variable_cost' => $request->variable_cost,
            ]);
        return redirect(route('services.index', ['contract' => $contract]))->with('status', 'Servicio creado con éxito');
    }

    public function edit($contract, Service $service)
    {
        return view('admin.service.edit', compact('contract', 'service'));
    }

    public function update($contract, $service, Request $request)
    {
        $service = Service::find($service);
        $service->update($request->all());

        return redirect(route('services.index', ['contract' => $contract]))->with('status', 'Servicio actualizado con éxito');
    }

    public function destroy($contract,Service $service, Request $request)
    {
        $service->delete();
        return redirect(route('services.index', ['contract' => $contract]))->with('status', 'Eliminado con éxito');
    }
}
