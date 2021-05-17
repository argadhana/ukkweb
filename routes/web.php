<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::middleware('auth')->group(function(){
    Route::get('all-posts', 'PostController@index')->name('posts')->withoutMiddleware('auth');

    Route::get('posts/create', 'PostController@create')->name('posts.create');
    Route::post('posts/store', 'PostController@store');

    Route::get('posts/{post:id}/edit', 'PostController@edit');
    Route::patch('posts/{post:id}/edit', 'PostController@update');
    Route::delete('posts/{post:id}/delete', 'PostController@destroy');

    Route::get('category/{category:id}', 'CategoryController@show')->withoutMiddleware('auth');
    Route::get('posts/{post:id}', 'PostController@show')->withoutMiddleware('auth');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('posts/create', 'PostController@create');
