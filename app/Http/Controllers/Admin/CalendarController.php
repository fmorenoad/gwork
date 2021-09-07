<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    private $years = ["2020","2021","2022"];
    private $months = ["01","02","03","04","05","06","07","08","09","10","11","12",];

    public function index()
    {
        $calendars = Calendar::all();
        return view('calendars.index', ['calendars' => $calendars]);
    }

    public function create()
    {
        return view('calendars.create', ['years' => $this->years,
                                        'months' => $this->months
                                        ]);
    }

    public function store(Request $request)
    {
        $calendar = Calendar::create(['user_id' => auth()->user()->id] + $request->all());

        $calendars = Calendar::all();
        return view('calendars.index', ['calendars' => $calendars]);
    }

    public function edit(Calendar $calendar)
    {
        return view('calendars.edit', ['calendar' => $calendar,
                                        'years' => $this->years,
                                        'months' => $this->months
                                        ]);
    }

    public function update(Request $request, Calendar $calendar)
    {
        $calendar->update($request->all());
        return back()->with('status', 'Actualizado con éxito');
    }

    public function destroy(Calendar $calendar)
    {
        $calendar->delete();
        return back()->with('status', 'Eliminado con éxito');
    }
}
