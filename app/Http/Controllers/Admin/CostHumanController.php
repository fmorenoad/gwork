<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\CostHuman;
use Illuminate\Http\Request;

class CostHumanController extends Controller
{
    private $years = ["2020","2021","2022"];
    private $months = ["01","02","03","04","05","06","07","08","09","10","11","12",];

    public function index()
    {
        $costHumans = CostHuman::all();
        return view('costHumans.index',['costHumans' => $costHumans
        ]);
    }

    public function create()
    {
        return view('costHumans.create',['years' => $this->years,
                                        'months' => $this->months
                                        ]);
    }

    public function store(Request $request)
    {
        $CostHuman = CostHuman::create(['user_id' => auth()->user()->id] + $request->all());
        $costHumans = CostHuman::all();
        return view('costHumans.index', ['costHumans' => $costHumans])->with('status', 'Eliminado con éxito');
    }

    public function edit(CostHuman $costHuman)
    {
        return view('costHumans.edit', ['costHuman' => $costHuman,
                                        'years' => $this->years,
                                        'months' => $this->months
                                        ]);
    }

    public function update(CostHuman $costHuman, Request $request)
    {
        $costHuman->update($request->all());
        return back()->with('status', 'Actualizado con éxito');
    }

    public function destroy(CostHuman $costHuman)
    {
        $costHuman->delete();
        return back()->with('status', 'Eliminado con éxito');
    }
}
