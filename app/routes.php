<?php

Route::get('/', ['as'=>'home', 'uses'=> 'BlogController@index']);

Route::get('users', ['as'=>'users', 'uses'=> 'BlogController@getUsers']);


Route::post('buy', function () {

    return Redirect::home()->with('flash_message', 'Foo');

});


Route::get('file', function(){

    File::put(__DIR__.'/test.txt', 'Lorem ipsum');

});

Route::resource('posts', 'PostController');


Route::get('test', function(){

    //Post::truncate();

    //return Post::all();

    return App::environment();
});

//API RESTFul with AngularJS

Route::resource('api/posts', 'AngularController');
//
//Route::get('apero', function(){
//    return View::make('apero.index');
//});