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
use Illuminate\Support\Facades\Route;

Route::get('/', 'PostsController@index')->middleware('auth')->name('index');

Route::get('signup','Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup','Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('users/{id}', 'UsersController@show')->middleware('auth')->name('users.show');
Route::get('users/{id}/edit', 'UsersController@edit')->name('users.edit');
Route::post('users/{id}', 'UsersController@update')->name('users.update');

Route::get('post/new', 'PostsController@create')->name('posts.create');
Route::post('post', 'PostsController@store')->name('posts.store');
Route::get('post/{id}/edit', 'PostsController@edit')->name('posts.edit');
Route::post('post/{id}', 'PostsController@update')->name('posts.update');
Route::delete('posts/{id}', 'PostsController@destroy')->name('posts.destroy');

Route::post('comments', 'CommentsController@store')->name('comments.store');
Route::get('comments/{id}/edit', 'CommentsController@edit')->name('comments.edit');
Route::put('comments/{id}', 'CommentsController@update')->name('comments.update');
Route::delete('comments/{id}', 'CommentsController@destroy')->name('comments.destroy');
