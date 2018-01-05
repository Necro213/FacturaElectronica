<?php
use \App\Http\Middleware\login;

Route::group(['prefix'=>'/'],function () {

    Route::post('/doLogin', 'UsersController@doLogin');

    Route::get('/admin', 'HomeController@index');

    Route::get('/usuarios', [
        'uses' => 'UsersController@userForm',
        'as' => 'usuarios.view'
    ])->middleware(login::class);

    Route::get('/getUsers', [
        'uses' => 'UsersController@getUsrs',
        'as' => 'index.usr'
    ]);

    Route::post('/addUser', [
        'uses' => 'UsersController@addUser'
    ]);

});
