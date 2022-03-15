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
    return view('usuaris/login');
});
Route::resource('usuaris', ControladorUsuari::class);
Route::resource('clients', ControladorClient::class);
Route::resource('vols', ControladorVol::class);
Route::resource('reservas', ControladorReserva::class);
Route::post('/login', 'ControladorUsuari@login')->name('login');
