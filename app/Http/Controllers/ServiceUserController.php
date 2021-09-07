<?php

namespace App\Http\Controllers;

use App\Service;
use App\Contract;
use App\ServiceUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceUserController extends Controller
{
    public function index($contract, $service)
    {
        $service_users = ServiceUser::where([['service_id', '=', $service]])->get();
        $service = Service::find($service);
        $contract = Contract::find($contract);

        return view('admin.service.managment.index', compact('contract','service','service_users'));
    }

    public function create($contract, $service)
    {
        $users = User::all();
        $service = Service::find($service);
        return view('admin.service.managment.create', compact('contract','service','users'));
    }

    public function store($contract, $service, Request $request)
    {
        $service_user = ServiceUser::create([
            'service_id' => $request->service_id,
            'user_id' => $request->user_id,
            'status' => $request->status,
        ]);

        return redirect(route('managment.index', ['contract' => $contract, 'service' => $request->service_id]))->with('status', 'Usuario asociado al Servicio con éxito');
    }

    public function destroy($contract, $service, $managmnet, Request $request)
    {
        $service_user = ServiceUser::where([['id','=', $managmnet]])->first();
        if($service_user->status == 'Activo')
        {
            $service_user->update([
                'status' => 'Deshabilitado'
            ]);
        } else
        {
            $service_user->update([
                'status' => 'Activo'
            ]);
        }

        return redirect(route('managment.index', ['contract' => $contract, 'service' => $service]))->with('status', 'Usuario deshabilitado al Servicio con éxito');
    }
}
