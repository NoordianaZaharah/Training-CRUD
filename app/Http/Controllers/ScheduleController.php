<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;


class ScheduleController extends Controller
{
    //public function index()
    public function index(Request $request)
    {
        //query all schedule from 'schedules' table to $schedules

        //$schedules = Schedule::all();
        $user = auth()->user();
        //$schedules = $user->schedules()->paginate(2);

        if($request->keyword){
            //search by title
            $user = auth()->user();
            //$schedules = $user->schedules()->where('title', 'LIKE', '%'.$request->keyword.'%')->paginate(2);
            $schedules = $user->schedules()
            ->where('title', 'LIKE', '%'.$request->keyword.'%')
            ->orWhere('description', 'LIKE', '%'.$request->keyword.'%')
            ->paginate(2);
        }else{
            // query all schedule from 'schedules' table to $schedules
            // select * from schedules - SQL Query
            //$schedules = Schedule::all();
            $user = auth()->user();
            $schedules = $user->schedules()->paginate(2);
        }




        //return to view with $schedules
        //resources/views/schedules/index.blade.php
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        //this is schedule create form
        //show create form
        return view('schedules.create');
    }

    public function store(Request $request)
    {
        $schedule = new Schedule();
        $schedule->title = $request->title;
        $schedule->description = $request->description;
        $schedule->user_id = auth()->user()->id;
        $schedule->save();

        return redirect()->route('schedule:index');
    }

    public function show(Schedule $schedule)
    {
        return view('schedules.show',compact('schedule'));

    }
    public function edit(Schedule $schedule)
    {
        return view('schedules.edit',compact('schedule'));

    }

    public function update(Schedule $schedule,Request $request)
    {
       // update $schedule using input from edit form

        $schedule->title = $request->title;
        $schedule->description = $request->description;
        //$schedule->user_id = auth()->user()->id;
        $schedule->save();

       //redirect to schedule index
        return redirect()->route('schedule:index');

    }

    public function destroy(Schedule $schedule)
    {
        //delete $schedule from db
        $schedule->delete();

        //return to schedule index
        return redirect()->route('schedule:index');
    }

    public function forceDestroy(Schedule $schedule)
    {
        $schedule->forceDelete();

        return redirect()->route('schedule:index')->with([
            'alert-type' => 'alert-danger',
            'alert' => 'Your schedule has been force deleted!'
        ]);
    }

}
