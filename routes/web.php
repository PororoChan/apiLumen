<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
$router->post('/posts/add','CobaController@store');
$router->post('/posts/update/{id}', 'CobaController@update');
$router->delete('/posts/{id}', 'CobaController@destroy');
$router->get('/posts','CobaController@index');
$router->get('/posts/{id}','CobaController@show');
$router->get('/', function () use ($router) {
    return $router->app->version();
});
