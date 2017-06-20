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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/owen', function(){
    return "Owenboi";
});

$app->group(['prefix' => 'companies/'], function ($app) {
    $app->get('/','CompaniesController@index'); //get all the routes	
    $app->post('/','CompaniesController@store'); //store single route
    $app->get('/{id}/', 'CompaniesController@show'); //get single route
    $app->put('/{id}/','CompaniesController@update'); //update single route
    $app->delete('/{id}/','CompaniesController@destroy'); //delete single route
});