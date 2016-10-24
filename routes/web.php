<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [], function ($api) {

    $api->group(['prefix' => 'videos'], function($api) {

        $api->get('{handle}', [
            'uses' => 'App\Http\Controllers\Videos\VideosController@show',
            'as' => 'api.v1.videos.show'
        ]);

    });

});