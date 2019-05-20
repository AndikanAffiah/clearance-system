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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::post('/check', 'CheckController@update')->name('check');


Route::get('clearance', function () {
    return view('clearance');
});
Route::post('studentprofile', 'StudentProfileController@show')->name('studentprofile.show');

Route::post('clearance', 'ClearanceController@store')->name('clearance.add');


