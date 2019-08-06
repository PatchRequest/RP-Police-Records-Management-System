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

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return 'test';
    });





        Route::resource('user','UserController');


    Route::group(array('namespace' => 'document'), function(){

    });


});



Route::get('login',[ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::post('login','LoginController@check');
Route::get('logout','LoginController@logout');
