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



Route::get('/posts/edit', 'PostsController@edit');

Route::put('/posts/{id}/edit/', 'PostsController@update');

Route::get('/profile/follow/{user_id}', 'ProfileController@followUser');

Route::get('/profile/unfollow/{user_id}', 'ProfileController@unfollowUser');

Route::get('/profile/{username}', 'ProfileController@profile');

Route::get('/posts/like/{post_id}', 'PostsController@likePost');


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/posts', 'PostsController');

//Route::resource('/syllabus', 'SyllabusController');

Route::resource('/ratings', 'RatingsController');

Route::resource('/ratings/{id}', 'RatingsController');

