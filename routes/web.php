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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'AccController@index');
Route::get('acc/create','AccController@create')->name('acc.create');
Route::get('acc/showByMonth/{indexYear}/{indexMonth}','AccController@showByMonth')->name('acc.showByMonth');
Route::get('acc/showByYear/{indexYear}','AccController@showByYear')->name('acc.showByYear');

Route::resource('acc','AccController',['except'=>['create']]);
// Route::resource('item','ItemController',['except'=>['create']]);
