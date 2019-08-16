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



    Route::post('/comment','CommentController@store');

    Route::get('/rating/ask','RatingController@ask');
    Route::get('/rating/forMe','RatingController@forMe');
    Route::resource('/rating','RatingController');


    Route::resource('user','UserController');


    Route::group(['middleware' => ['role_or_permission:edit ranks']], function () {
        Route::post('/role/remove','RoleController@removeRole');
        Route::post('/role/add','RoleController@addRole');
    });

    Route::post('/user/password','UserController@passwordChange');


    Route::resource('news','NewsController');

    Route::get('/document/manage','DocumentsController@create');
    Route::post('/document','DocumentsController@store');
    Route::delete('/document/{document}','DocumentsController@destroy');


    Route::group(['middleware' => ['role_or_permission:edit permissions']], function () {
        Route::get('/permissions','PermissionsController@index');
        Route::post('/permissions','PermissionsController@permissionChange');
    });
    Route::get('logout','LoginController@logout');
});


Route::group(['middleware' => ['guest']], function () {
    Route::get('login',[ 'as' => 'login', 'uses' => 'LoginController@login']);
    Route::post('login','LoginController@check');
});


