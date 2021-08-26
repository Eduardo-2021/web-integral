<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\RentaController;
use App\Http\Controllers\HotelController;


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
    return view('auth.login');
});


Route::resource('/admin/home', AdministradorController::class);
Route::resource('/admin/clientes', ClienteController::class);
Route::resource('/admin/renta', RentaController::class);
Route::resource('/admin/hoteles', HotelController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdministradorController::class, 'index'])->name('home');