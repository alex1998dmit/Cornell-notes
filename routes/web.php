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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/subjects', 'SubjectsController@index')->name('subjects');
Route::get('/subjects/create', 'SubjectsController@create')->name('subject.create');
Route::post('/subjects/post', 'SubjectsController@store')->name('subject.store');
Route::get('/subject/edit/{id}', 'SubjectsController@edit')->name('subject.edit');
Route::post('/subject/update/{id}', 'SubjectsController@update')->name('subject.update');
Route::get('/subject/{id}', 'SubjectsController@show')->name('subject');

Route::get('/notes/{userId}','NotesController@index')->name('notes');
// Route::get('/note/{id}', 'NotesController@single')->name('note');
Route::get('/note/create', 'NotesController@create')->name('note.create');
Route::post('/note/store', 'NotesController@store')->name('note.store');
Route::get('/note/edit/{id}', 'NotesController@edit')->name('note.edit');
Route::post('/note/update/{id}', 'NotesController@update')->name('note.update');
Route::get('/note/delete/{id}', 'NotesController@delete')->name('note.delete');
