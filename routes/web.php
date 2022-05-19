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

// ketika akses url public/ maka langsung diarahkan ke route dashboard
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(array('prefix' => 'class'), function(){
  Route::get('/', 'ClassController@index')->name('class');
  Route::get('{code}', 'ClassController@viewClass')->name('{code}');
  Route::get('/create-class', 'ClassController@create')->name('create-class');
  Route::post('store-class', 'ClassController@store')->name('store-class');
});

Route::group(array('prefix' => 'assignment'), function(){
  Route::get('/', 'AssignmentController@index')->name('assignment');
});

Route::group(array('prefix' => 'view-assignment'), function(){
  Route::get('/', 'viewAssignmentController@index')->name('view-assignment');
});

Route::group(array('prefix' => 'join-class'), function(){
  Route::get('/', 'joinClassController@index')->name('join-class');
});

Route::group(array('prefix' => 'view-assignment-teacher'), function(){
  Route::get('/', 'viewAssignmentTeacherController@index')->name('view-assignment-teacher');
});
