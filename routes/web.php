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


Route::get('/posts' , 'PostController@index')->name('posts');
Route::get('posts/create' , 'PostController@create')->name('posts.create');
Route::post('posts/store' , 'PostController@store')->name('posts.store');

Route::get('posts/edit/{post}' , 'PostController@edit')->name('posts.edit');
Route::post('posts/update/{post}' , 'PostController@update')->name('posts.update');


Route::post('posts/search' , 'PostController@search')->name('posts.search');





