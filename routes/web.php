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
  Route::get('create-class', 'ClassController@create')->name('create-class');
  Route::get('join-class', 'ClassController@join')->name('join-class');
  Route::post('store-class', 'ClassController@store')->name('store-class');
  Route::get('{code}', 'ClassController@viewClass')->name('{code}');
});

Route::group(array('prefix' => 'assignment'), function(){
  Route::get('/', 'AssignmentController@index')->name('assignment');
  Route::post('store-assignment', 'AssignmentController@store')->name('store-assignment');
  Route::get('{code}create-assignment', 'AssignmentController@create')->name('{code}create-assignment');
  Route::get('{id}-{group_assign_code}', 'AssignmentController@viewAssignment')->name('{id}-{group_assign_code}');
});

Route::group(array('prefix' => 'announcement'), function(){
  Route::get('/', 'AnnouncementController@index')->name('announcement');
  Route::get('create-announcement', 'AnnouncementController@create')->name('create-announcement');
  Route::post('store-announcement', 'AnnouncementController@store')->name('store-announcement');
});

Route::group(array('prefix' => 'view-assignment-teacher'), function(){
  Route::get('/', 'viewAssignmentTeacherController@index')->name('view-assignment-teacher');
});
