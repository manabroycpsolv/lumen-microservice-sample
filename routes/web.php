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

$router->group(['middleware' => 'auth:api'], function () use ($router) {
    /**
     * Routes for samples
     */
    $router->get('/samples', 'SampleController@index');
    $router->post('/samples', 'SampleController@store');
    $router->get('/samples/{sample}', 'SampleController@show');
    $router->put('/samples/{sample}', 'SampleController@update');
    $router->patch('/samples/{sample}', 'SampleController@update');
    $router->delete('/samples/{sample}', 'SampleController@destroy');

  
});

