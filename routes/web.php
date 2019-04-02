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

Route::get('/', function() {
    if (Auth::check()) {
        return redirect()->route('user', ['id' => Auth::user()->id]);
    } else {
        return redirect()->route('register');
    }
})->name('main');

Auth::routes();

Route::get('/home', function(){
    return redirect()->route('user', ['id' => Auth::user()->id]);
})->name('home');



Route::get('/subjects', 'SubjectsController@index')->name('subjects');
Route::get('/subjects/create/{subject_id}', 'SubjectsController@create')->name('subject.create');
Route::post('/subjects/post', 'SubjectsController@store')->name('subject.store');
Route::get('/subject/edit/{id}', 'SubjectsController@edit')->name('subject.edit');
Route::post('/subject/update/{id}', 'SubjectsController@update')->name('subject.update');
// Route::get('/subject/{id}', 'SubjectsController@show')->name('subject');
Route::get('/subject/delete/{id}', 'SubjectsController@destroy')->name('subject.delete');


Route::get('/note/create', 'NotesController@create')->name('note.create');
Route::post('/note/store', 'NotesController@store')->name('note.store');
Route::get('/note/edit/{id}', 'NotesController@edit')->name('note.edit');
Route::post('/note/update/{id}', 'NotesController@update')->name('note.update');
Route::get('/note/delete/{id}', 'NotesController@destroy')->name('note.delete');
Route::get('/notes/{id}', 'NotesController@show')->name('note.show');

Route::get('/user/{id}', 'UsersController@show')->name('user');
