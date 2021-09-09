<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::method('uri','action/callback')
//https://mizi/portfolio --- uri => /portfolio

Route::get('/schedules', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule:index')->middleware('auth');
Route::get('/schedules/create', [App\Http\Controllers\ScheduleController::class, 'create'])->name('schedule:create'); //create new data
Route::post('/schedules/create', [App\Http\Controllers\ScheduleController::class, 'store'])->name('schedule:store'); //store new data

Route::get('/schedules/{schedule}',[App\Http\Controllers\ScheduleController::class, 'show'])->name('schedule:show'); //show only data)
Route::get('/schedules/{schedule}/edit',[App\Http\Controllers\ScheduleController::class, 'edit'])->name('schedule:edit'); //show for update data)
Route::post('/schedules/{schedule}/update',[App\Http\Controllers\ScheduleController::class, 'update'])->name('schedule:update'); //update data)
Route::get('/schedules/{schedule}/delete',[App\Http\Controllers\ScheduleController::class, 'destroy'])->name('schedule:destroy'); //delete data)
Route::get('/schedules/{schedule}/force-destroy', [App\Http\Controllers\ScheduleController::class, 'forceDestroy'])->name('schedule:force-destroy');


Route::get('/cars', [App\Http\Controllers\CarController::class, 'index'])->name('car:index')->middleware('auth');
Route::get('/cars/create', [App\Http\Controllers\CarController::class, 'create'])->name('car:create');
Route::post('/cars/create', [App\Http\Controllers\CarController::class, 'store'])->name('car:store');

Route::get('/cars/{car}',[App\Http\Controllers\CarController::class, 'show'])->name('car:show'); //show only data)
Route::get('/cars/{car}/edit',[App\Http\Controllers\CarController::class, 'edit'])->name('car:edit'); //show for update data)
Route::post('/cars/{car}/update',[App\Http\Controllers\CarController::class, 'update'])->name('car:update'); //update data)
Route::get('/cars/{car}/delete',[App\Http\Controllers\CarController::class, 'destroy'])->name('car:destroy'); //delete data)



