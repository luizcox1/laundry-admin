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

Route::get('machines', 'MachineController@index')->name('machine.index');
Route::get('machines/{id}', 'MachineController@show')->name('machine.show');

Route::get('/', function () {
    return view('welcome');
});
