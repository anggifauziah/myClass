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

// Route::get('/', function(){return redirect()->route('dashboard');});

//use App\Http\Controllers\ClassesController;
Route::group(array('prefix' => 'classes'), function(){
  //Route::get('/', [ClassesController::class, 'index'])->name('classes');
  Route::get('/', 'ClassesController@index')->name('classes');
});

//use App\Http\Controllers\ClassController;
Route::group(array('prefix' => 'class'), function(){
  //Route::get('/', [ClassController::class, 'index'])->name('class');
  Route::get('/', 'ClassController@index')->name('class');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
