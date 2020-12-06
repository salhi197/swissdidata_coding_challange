<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::group(['prefix' => 'graph', 'as' => 'graph'], function () {
//     Route::get('/', ['as' => '.index', 'uses' => 'GraphController@index']);
//     Route::get('/',  ['as' => '.index', 'uses' => 'GraphController@']);
//     Route::get('/{id}',  ['as' => '.index', 'uses' => 'GraphController@getGraph']);
//     Route::post('',  ['as' => '.index', 'uses' => 'GraphController@createGraph']);
//     Route::put('/{id}',  ['as' => '.index', 'uses' => 'GraphController@updateGraph']);
//     Route::delete('/{id}', ['as' => '.index', 'uses' => 'GraphController@deleteGraph']);
// });

Route::get('graphs', 'GraphController@getAllGraphs');
Route::get('graphs/metadata', 'GraphController@getAllGraphsMetadata');
Route::get('graphs/nodes/{id}', 'GraphController@getAllGraphsNodes');
Route::get('graphs/{id}', 'GraphController@getGraph');
Route::post('graphs', 'GraphController@createGraph');
Route::put('graphs/{id}', 'GraphController@updateGraph');
Route::delete('graphs/{id}','GraphController@deleteGraph');



Route::get('nodes', 'NodeController@getAllNodes');
Route::get('nodes/{id}', 'NodeController@getNode');
Route::post('nodes', 'NodeController@createNode');
Route::put('nodes/{id}', 'NodeController@updateNode');
Route::delete('nodes/{id}','NodeController@deleteNode');