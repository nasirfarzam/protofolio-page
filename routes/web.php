<?php

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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/admin', 'ProjectController@index');
//
//Route::post('/admin', 'ProjectController@store')->name('addProject');
//
//Route::delete('/deleteProject/{id}', 'ProjectController@destroy')->name('deleteProject');

Route::resource('/admin', 'ProjectController')->middleware('admin');
