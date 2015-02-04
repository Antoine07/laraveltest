<?php
/**
 * @author Antoine
 *
 * @project Aperos technics 2015
 */

Route::pattern('id', '[1-9][0-9]*');
Route::pattern('slug', '[\w\-]+');
Route::when('*', 'csrf', ['post', 'put', 'patch']);

Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('login', ['as' => 'login', 'uses' => 'AuthController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);

// checkuser before post apero
Route::post('authentification', ['as' => 'authentification', 'uses' => 'AuthController@auth']);

// API RESTFul
Route::group(['before' => 'auth'], function () {
    Route::resource('aperos', 'PostController');
});

// 404
//App::abort(404);
