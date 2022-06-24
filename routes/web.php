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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/services', [App\Http\Controllers\ClientController::class, 'index'])->name('services');
Route::get('/services', [App\Http\Controllers\ServiceController::class, 'show'])->name('services');

Route::get('/artist/edit', [App\Http\Controllers\ArtistController::class, 'edit'])->name('artist.edit');
Route::post('/artist/update', [App\Http\Controllers\ArtistController::class, 'update'])->name('artist.update');

Route::get('/schedule/form', [App\Http\Controllers\ScheduleController::class, 'create'])->name('schedule.form');
//Route::get('/schedule', [App\Http\Controllers\ScheduleController::class, 'show'])->name('schedule');
Route::get('/schedule/edit', [App\Http\Controllers\ScheduleController::class, 'edit'])->name('schedule.edit');
Route::post('/schedule/update', [App\Http\Controllers\ScheduleController::class, 'update'])->name('schedule.update');

Route::get('/booking', [App\Http\Controllers\BookingController::class, 'create'])->name('booking.form');
Route::post('/booking', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');

Route::post('choosingArtist','ArtistController@filterArtist');
