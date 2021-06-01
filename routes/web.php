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

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('penerima',  'PenerimaController@showAllPenerima');
    $router->post('penerima/insert', 'PenerimaController@insertPenerima');
    $router->put('penerima/update/{id}', 'PenerimaController@updateStatusPenerima');
    $router->get('penerima/berhak/{status}', 'PenerimaController@showPenerimaByStatus');
    $router->get('tracking/{status}', 'TrackingController@showTrackingByNik');
    // 

    // $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);


});
