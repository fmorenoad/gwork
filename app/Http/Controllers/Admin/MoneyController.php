<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Money;
use Illuminate\Http\Request;

class MoneyController extends Controller
{
    public function index()
    {
        $moneys = Money::all();

        return view('moneys.index',[
            'moneys' => $moneys
        ]);
    }

    public function create()
    {
        return view('moneys.create');
    }

    public function store(Request $request)
    {
        Money::create($request->all());
        return back()->with('status','Creado con exito.');
    }

    public function destroy(Money $money)
    {
        $money->delete();
        return back()->with('status','Eliminado con exito.');
    }
}
