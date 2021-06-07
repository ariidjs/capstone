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
    $router->get('penerima/{nik}',  'PenerimaController@showPenerimaById');
    $router->post('penerima/insert', 'PenerimaController@insertPenerima');
    $router->put('penerima/update/{id}', 'PenerimaController@updateStatusPenerima');
    $router->get('penerima/berhak/{status}', 'PenerimaController@showPenerimaByStatus');
    $router->post('tracking/{nik}/createTrack', ['uses' => 'PenerimaController@createTracking']);
    $router->post('tracking/{id}/updateTrack', ['uses' => 'TrackingController@updateTrack']);
    $router->put('tracking/{nik}/{id}/finishTrack', 'TrackingController@finishTrack');
    $router->get('tracking/{nik}/getTrack', 'TrackingController@showTrackingByNik');
    $router->get('tracking/{id}/getDetailTrack', 'TrackingController@showDetailTracking');
    $router->delete('tracking/{id}/deleteTrack', 'TrackingController@deleteTrackById');
    $router->delete('tracking/{id}/deleteDetailTrack', 'TrackingController@deleteDetailTracking');

    // 
    // $router->delete('authors/{id}', ['uses' => 'AuthorController@delete']);
});
