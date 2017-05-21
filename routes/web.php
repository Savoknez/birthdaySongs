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

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/
Route::get('/', [
    'as' => '/home',
    'uses' => 'HomeController@getDate',
]);

/*
|--------------------------------------------------------------------------
| CRUD
|--------------------------------------------------------------------------
*/
Route::resource('songs', 'YoutubeController');

/*
|--------------------------------------------------------------------------
| GET VIDEOS
|--------------------------------------------------------------------------
*/
Route::get('songs', 'YoutubeController@getVideos')->name('songs');
