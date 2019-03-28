<?php

use Illuminate\Http\Request;
use App\Subject;
use App\Notes;
use App\Http\Controllers\Api as Api;

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


// Route::get('subjects', 'SubjectsController@indexApi');

Route::get('subjects', function(Request $request) {
    $user_id = $request->id;
    $subjects = Subject::find($user_id);
    return json_encode($subjects);
});
