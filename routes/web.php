<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoriaController;

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

//  Route::get('/', function () {
//      return view('welcome');
//  });

 Auth::routes();
 Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 Route::post('/todos', [TodosController::class, 'store'])->name('todos');
 
// Route::get('/', [App\Http\Controllers\TodosController::class, 'index'])->name('home');

//  Route::get('/todos/{$id}', [TodosController::class, 'show'])->name('todos-show');
//  Route::get('/home', 'TodosController@index')->name('todos');
// Auth::routes();

//  Route::resource('categorias', CategoriaController::class);okis

