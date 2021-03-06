<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=>'user'], function() use ($router) {
    $router->post('/register','UserController@register');
    $router->post('/login','UserController@login');
    $router->group(['middleware'=>'auth'],function() use ($router){
        $router->get('/test','UserController@test');
    });
});

$router->group(['middleware' => 'auth'],function() use ($router) {
    $router->group(['prefix' => 'unit'],function() use ($router) {
        $router->get('/','UnitController@get');
        $router->get('/{id}','UnitController@show');
        $router->post('/create','UnitController@create');
        $router->put('/{id}','UnitController@edit');
        $router->delete('/{id}','UnitController@delete');
    });

    $router->group(['prefix' => 'company'],function() use ($router) {
        $router->get('/','CompanyController@get');
        $router->get('/{id}','CompanyController@show');
        $router->post('/create','CompanyController@create');
        $router->put('/{id}','CompanyController@edit');
        $router->delete('/{id}','CompanyController@delete');
    });
});

