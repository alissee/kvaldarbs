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

Route::get('/', 'MainController@welcomepage')->name('home');
// Route::get('/jaunumi', 'MainController@newspage');
Route::get('/sazinies', 'MainController@contactus');
Route::get('/ierices', 'MainController@devicespage');
Route::get('/pasakumi', 'MainController@eventspage');

Route::resource('/jaunumi', 'NewsController');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

