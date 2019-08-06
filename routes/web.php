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
        return redirect('/news');
    });


    Route::get('/rating/ask','RatingController@ask')->middleware('auth');
    Route::get('/rating/forMe','RatingController@forMe')->middleware('auth');
    Route::resource('/rating','RatingController')->middleware('auth');


    Route::resource('user','UserController');


    Route::resource('news','NewsController');

    Route::get('/document/manage','DocumentsController@create');
    Route::post('/document','DocumentsController@store');
    Route::delete('/document/{document}','DocumentsController@destroy');


});



Route::get('login',[ 'as' => 'login', 'uses' => 'LoginController@login']);
Route::post('login','LoginController@check');
Route::get('logout','LoginController@logout');
