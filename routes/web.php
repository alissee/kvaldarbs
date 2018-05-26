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
// Route::get('/sazinies', 'MainController@contactus');
Route::get('/ierices', 'MainController@devicespage');
Route::get('/pasakumi', 'MainController@eventspage');
// Route::get('/lomas', 'RoleController@showroles');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');



Auth::routes();


Route::resources([
    'jaunumi' => 'NewsController',
    'ierices' => 'DeviceController',
    'sazinies' => 'IssueController',
    'lomas' => 'RoleController',
    'pasakumi' => 'PlanController',
    'iericesrezervacija' => 'DeviceReservationController',
    'telpasrezervacija' => 'LabReservationController'
    ]);
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('i', function(){
    phpinfo();
});