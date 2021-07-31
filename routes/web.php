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
//En rojo: 
//1)la ruta del navegador, 
//2)el método del controlador, 
//3)el nombre de la ruta, para llamarla desde un controlador en los return view por ejemplo
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('main'); 
Route::get('/grupos', [App\Http\Controllers\GrupoController::class, 'index'])->name('grupos');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

