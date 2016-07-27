<?php

Route::get('/', 'WelcomeController@home');

Route::get('/registro', ['as' => 'registro', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('/registro', ['as' => 'registro', 'uses' => 'Auth\AuthController@postRegister']);
Route::get('/inicio_sesion', ['as' => 'inicio_sesion', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('/inicio_sesion', ['as' => 'inicio_sesion', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('/cierre_sesion', ['as' => 'cierre_sesion', 'uses' => 'Auth\AuthController@logout']);

Route::get('/producto/{id}', 'ProductController@show');
Route::get('/busqueda', 'ProductController@find');
Route::resource('/lista', 'UserListController', ['only' => [
    'index', 'store', 'destroy', 'update'
]
]);
