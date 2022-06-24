<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('schedule.form');
    }

    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->date = $request->post('date');
        $schedule->service_id = $request->post('service_id');
        $schedule->start_time = $request->post('start_Time');
        $schedule->end_time = $request->post('end_time');
        $schedule->save();
    }

    public function show(Schedule $schedule)
    {
        $id = Auth::id();
        $data['schedules'] = Schedule::query()->where('artist_id', $id)->get();
        return view('schedule.edit', $data);
    }

    public function edit(Schedule $schedule)
    {
        $data['schedule'] = $schedule;
        return view('schedule.edit', $data);
    }

    public function update(Request $request, Schedule $schedule)
    {
        $schedule->date = $request->post('date');
        $schedule->service_id = $request->post('service_id');
        $schedule->start_time = $request->post('start_Time');
        $schedule->end_time = $request->post('end_time');
        $schedule->save();
    }
}
