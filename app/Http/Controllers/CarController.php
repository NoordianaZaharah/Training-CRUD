<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();

        return view('car.index', compact('cars'));
    }

    public function create()
    {
        //this is schedule create form
        //show create form

        return view('car.create');
    }

    public function store(Request $request)
    {
        $car = new Car();
        $car->model = $request->model;
        $car->noplate = $request->noplate;
        $car->user_id = auth()->user()->id;
        $car->save();

        return redirect()->route('car:index');
    }

    public function show(Car $car)
    {
        return view('car.show',compact('car'));
    }

    public function edit(Car $car)
    {
        return view('car.edit',compact('car'));
    }

    public function update(Car $car,Request $request)
    {
       // update $car using input from edit form

       $car->model = $request->model;
       $car->noplate = $request->noplate;
       $car->save();

       //redirect to schedule index
        return redirect()->route('car:index');

    }

    public function destroy(Car $car)
    {
        //delete $schedule from db
        $car->delete();

        //return to schedule index
        return redirect()->route('car:index');
    }
}
