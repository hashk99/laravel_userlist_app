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

// after login functions
Route::group([ 'middleware' => [ 'auth'] ] , function () {
  
    Route::get('users', 'TestUserController@index')->name('view-all-testusers'); 
    Route::get('users/new', 'TestUserController@create')->name('create-new-user'); 
    Route::post('users/new', 'TestUserController@store')->name('store-new-user'); 
    Route::get('users/{id}/edit', 'TestUserController@edit')->name('edit-user'); 
    Route::put('users/{id}/update', 'TestUserController@update')->name('update-user'); 
    Route::get('users/{id}', 'TestUserController@destroy')->name('destroy-user');
	 
});