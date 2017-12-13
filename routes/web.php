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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('users/home', 'UserController@home')->name('users.home');
Route::get('users/edit', 'UserController@edit')->name('users.edit');
Route::post('users/edit', 'UserController@update')->name('users.update');
Route::get('users/create_post', 'UserController@createPost')->name('users.create_post');
Route::post('users/create_post', 'UserController@storePost')->name('users.store_post');
Route::get('users/{post}/edit_post', 'UserController@editPost')->name('users.edit_post');
Route::patch('users/{post}/update_post', 'UserController@updatePost')->name('users.update_post');
Route::delete('users/{post}/delete', 'UserController@destroyPost')->name('users.destroy_post');

Route::get('posts/home', 'PostController@home')->name('posts.home');
Route::post('posts/{post}/comment', 'CommentController@store')->name('posts.comment.store');
