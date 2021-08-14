<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\ProcedenciaController;
use App\Http\Controllers\EdadController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\VisitanteController;
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
//En rojo: 
//1)la ruta del navegador, 
//2)el método del controlador, 
//3)el nombre de la ruta, para llamarla desde un controlador en los return view por ejemplo
Route::post('procedencias/listar', [App\Http\Controllers\ProcedenciaController::class, 'listar'])->name('listar_procedencias');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('main'); 
Route::resource('grupos', GrupoController::class)->names('grupos');
Route::resource('procedencias', ProcedenciaController::class)->names('procedencias');
Route::resource('edads', EdadController::class)->names('edads');
Route::resource('sexos', SexoController::class)->names('sexos');
Route::resource('visitantes', VisitanteController::class)->names('visitantes');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('panel_administrador', 'admin.index')->name('panel_administrador'); //contenido estático. No consultamos la bbdd, sólo qeremos mostrar una vista. Espera 2 parámetros, url y nombre de la vista desde view
Auth::routes();

