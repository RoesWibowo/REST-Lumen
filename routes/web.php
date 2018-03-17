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

$router->group(['prefix' => '/lessons'], function () use ($router) {
    $router->get('/',  ['uses' => 'LessonController@index']);
    $router->post('/', ['uses' => 'LessonController@store']);
    $router->get('/{id}', ['uses' => 'LessonController@show']);
    $router->put('/{id}', ['uses' => 'LessonController@update']);
    $router->delete('/{id}', ['uses' => 'LessonController@delete']);
});
