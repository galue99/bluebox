<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout', 'LoginController@logout');
    Route::Resource('/', 'HomeController');
    Route::get('/home', ['as' =>'/home', 'uses' => 'HomeController@index']);
    Route::post('/home', ['as' =>'/home', 'uses' => 'HomeController@store']);
    Route::put('/home', ['as' =>'/home', 'uses' => 'HomeController@update']);
    Route::delete('/home', ['as' =>'/home', 'uses' => 'HomeController@update']);
    Route::Resource('/usuario_cms', 'UsuarioCMSController');
    Route::get('/variables', 'HomeController@variables');
    Route::Resource('/variables1', 'VariablesController');
    Route::get('/slider', ['as' =>'/slider', 'uses' => 'HomeController@slider']);
    Route::post('/slider', ['as' =>'/slider', 'uses' => 'SliderController@store']);
    Route::get('/sliders', ['as' =>'/sliders', 'uses' => 'SliderController@index']);




});

Route::get('/recovery_password', 'LoginController@recovery_password');
Route::post('/recovery', 'LoginController@password_recovery');
//Route::Resource('/login', 'LoginController');
//Route::Resource('/login', ['as' =>'/login', 'uses' => 'LoginController']);


Route::get('/login', ['as' =>'/login', 'uses' => 'LoginController@index']);
Route::post('/login', ['as' =>'/login', 'uses' => 'LoginController@store']);