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
Route::get('/', function(){return redirect()->route('classes');});

Route::group(array('prefix' => 'classes'), function(){
  Route::get('/', 'ClassesController@index')->name('classes');
});

Route::group(array('prefix' => 'class'), function(){
  Route::get('/', 'ClassController@index')->name('class');
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

Route::group(array('prefix' => 'create-class'), function(){
  Route::get('/', 'createClassController@index')->name('create-class');
});

Route::group(array('prefix' => 'view-assignment-teacher'), function(){
  Route::get('/', 'viewAssignmentTeacherController@index')->name('view-assignment-teacher');
});
