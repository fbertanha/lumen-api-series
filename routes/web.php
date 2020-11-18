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

$router->get('/', function () use ($router) {
    return $router->app->version();
});


$router->group(['prefix' => 'api', 'middleware' => 'auth'], function ($router) {
    $router->group(['prefix' => 'series'], function ($router) {

        $router->post('', 'SeriesController@store');
        $router->get('', 'SeriesController@index');
        $router->get('{id}', 'SeriesController@find');
        $router->put('{id}', 'SeriesController@update');
        $router->delete('{id}', 'SeriesController@destroy');

        $router->get('{serieId}/episodios', 'EpisodiosController@buscaPorSerie');
    });

    $router->group(['prefix' => 'episodios'], function ($router) {
        $router->post('', 'EpisodiosController@store');
        $router->get('', 'EpisodiosController@index');
        $router->get('{id}', 'EpisodiosController@find');
        $router->put('{id}', 'EpisodiosController@update');
        $router->delete('{id}', 'EpisodiosController@destroy');
    });

});
