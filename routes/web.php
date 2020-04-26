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

Route::get('/', 'PageController@index')->name('home');
Route::get('/game/{slug}', 'PageController@showGame')->name('game');
Route::get('/category/{slug}', 'PageController@showCategory')->name('category');

Route::get('/games/getFromMongo', 'GameController@getFromMongo');
Route::get('/games/saveInGames', 'GameController@saveInGames');
Route::get('/games/saveInGames', 'GameController@saveInGames');
Route::get('/games/addHttpsToIframes', 'GameController@addHttpsToIframes');
Route::get('/tags/getFromMongo', 'TagController@getFromMongo');

// DASHBOARD
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/dashboard/games', 'GameController@dashboardIndex')->name('dashboard/games');
Route::get('/dashboard/game/create', 'GameController@create')->name('dashboard/game/create');
Route::post('/dashboard/game/create', 'GameController@create')->name('dashboard/game/create');
Route::get('/dashboard/game/edit/{id?}', 'GameController@edit')->name('dashboard/game/edit');
Route::put('/dashboard/game/edit/{id}', 'GameController@update');
Route::put('/dashboard/game/iframeError/{id}', 'GameController@iframeError')->name('iframeError');
Route::delete('/dashboard/game/delete/{id}', 'GameController@delete')->name('dashboard/game/delete');

Route::get('/dashboard/tags', 'TagController@dashboardIndex')->name('dashboard/tags');
Route::get('/dashboard/tag/create', 'GameController@create')->name('dashboard/tag/create');
Route::post('/dashboard/tag/create', 'GameController@create')->name('dashboard/tag/create');
Route::get('/dashboard/tag/edit/{id?}', 'TagController@edit')->name('dashboard/tag/edit');
Route::put('/dashboard/tag/edit/{id}', 'TagController@update');
Route::delete('/dashboard/tag/delete/{id}', 'TagController@delete')->name('dashboard/tag/delete');

Route::get('/dashboard/searchGame', 'DashboardController@searchGames')->name('dashboard/searchGames');
Route::get('/dashboard/searchTags', 'DashboardController@searchTags')->name('dashboard/searchTags');

Auth::routes();

