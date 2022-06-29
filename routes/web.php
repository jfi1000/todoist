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
 Route::get('/todoss/{id}', [TodosController::class,'show'])->name('todos.show')->middleware('auth');
 Route::get('/todosss/{id}', [TodosController::class,'destroy'])->name('todos.destroy')->middleware('auth');
 
 Route::get('/categoria', [App\Http\Controllers\CategoriaController::class,'index'])->name('categoria.index')->middleware('auth');
 Route::post('/categoria', [App\Http\Controllers\CategoriaController::class,'store'])->name('categoria.store')->middleware('auth');
 Route::get('/categoria/{id}', [App\Http\Controllers\CategoriaController::class,'destroy'])->name('categoria.destroy')->middleware('auth');
 Route::get('/categorias/{id}', [App\Http\Controllers\CategoriaController::class,'show'])->name('categoria.show')->middleware('auth');

// Route::get('/', [App\Http\Controllers\TodosController::class, 'index'])->name('home');

//  Route::get('/todos/{$id}', [TodosController::class, 'show'])->name('todos-show');
//  Route::get('/home', 'TodosController@index')->name('todos');
// Auth::routes();

//  Route::resource('categorias', CategoriaController::class);okis

