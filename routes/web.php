<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RolusuarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\HistoriaController;
use App\Http\Controllers\RecetarioController;
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
    return view('home');
});


//Rutas Del sistema Consultas Medicas
Route::resource('usuarios', UsuarioController::class);
Route::resource('rolusuarios', RolusuarioController::class);
Route::resource('pacientes', PacienteController::class);
Route::resource('citas', CitasController::class);
Route::resource('historia', HistoriaController::class);
Route::resource('recetario', RecetarioController::class);
Route::get('/recetario/search', [RecetarioController::class, 'search'])->name('recetario.search');

