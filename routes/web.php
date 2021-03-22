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

Auth::routes();

Route::get('/', 'MovieController@getmovies');

Route::get('/logIn', 'HomeController@getAuth');

Route::get('/signUp', 'HomeController@getRegister');

Route::get('/movie/{id}', 'MovieController@getMovieById');

Route::get('/like/{id}', 'MovieController@likeMovie')->middleware('auth');

Route::get('/likedMovies', 'MovieController@getLikedMovies')->middleware('auth');

Route::get('/topMovies', 'MovieController@getTopMovies');
