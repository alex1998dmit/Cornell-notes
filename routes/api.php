<?php

use Illuminate\Http\Request;

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

Route::get('/note/{id}');

Route::get('/note/{id}', [
    'uses' => 'NotesController@single',
    'as' => 'note.single'
]);

Route::get('/notes', [
    'uses' => 'NotesController@index', 
    'as' =>'notes'
]);

Route::get('/folder/{id}', [
    'uses' => 'FoldersController@single', 
    'as' => 'folders'
]);