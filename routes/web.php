<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', 'NotesController@index')->name('notes');
Route::get('/note/create', 'NotesController@create')->name('note.create');
Route::post('/note/store', 'NotesController@store')->name('note.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


