<?php

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


Auth::routes();


// Route::get('login', function () {
//     return view('auth.login');
// });

Route::get('/', 'PodcastController@index')->name('homepage');
Route::get('podcast/{id}', 'PodcastController@show')->name('showPodcast');
Route::get('podcast/delete/{id}', 'PodcastController@destroy')->name('deletePodcast');
Route::get('add-podcast', 'PodcastController@create')->name('addPodcast');
Route::post('store-podcast', 'PodcastController@store')->name('storePodcast');
Route::get('Edit-podcast/{id}', 'PodcastController@edit')->name('editPodcast');
Route::put('update-podcast/{id}', 'PodcastController@update')->name('updatePodcast');

Route::get('podcast/{id}/episodes', 'PodcastController@showEpisodes')->name('showEpisodes');
Route::get('add-episode/{id}', 'PodcastController@createEpisode')->name('addEpisode');
Route::post('store-episode', 'PodcastController@storeEpisode')->name('storeEpisode');
Route::get('episode/delete/{id}', 'PodcastController@destroyEpisode')->name('deleteEpisode');
Route::get('edit/episode/{id}', 'PodcastController@editEpisode')->name('editEpisode');
Route::put('update-episode/{id}', 'PodcastController@updateEpisode')->name('updateEpisode');
