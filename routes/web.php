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
Route::resource('criminals', 'CriminalController')->except(['delete']);
Route::resource('crimes', 'CrimeController')->except(['create','edit','destroy']);
Route::resource('places', 'PlaceController')->except(['delete']);
Route::resource('scenes', 'SceneController');
Route::resource('users', 'UserController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
