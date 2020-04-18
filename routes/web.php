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

Route::get('/', 'IndexController@show');

Route::get('/games/getFromMongo', 'GameController@getFromMongo');
Route::get('/tags/getFromMongo', 'TagController@getFromMongo');

// DASHBOARD
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard/englishGames', 'DashboardController@showEnglishGames')->name('dashboard/englishGames');
Route::get('/dashboard/spanishGames', 'DashboardController@showSpanishGames')->name('dashboard/spanishGames');
Route::get('/dashboard/noLanguageGames', 'DashboardController@showNoLanguageGames')->name('dashboard/noLanguageGames');
Route::get('/dashboard/game/create', 'GameController@create')->name('dashboard/game/create');
Route::post('/dashboard/game/create', 'GameController@create')->name('dashboard/game/create');
Route::get('/dashboard/game/edit/{id?}', 'GameController@edit')->name('dashboard/game/edit');
Route::put('/dashboard/game/edit/{id}', 'GameController@update');
Route::delete('/dashboard/game/delete/{id}', 'GameController@delete')->name('dashboard/game/delete');

Route::get('/dashboard/tags', 'TagController@dashboardIndex')->name('dashboard/tags');
Route::get('/dashboard/tag/edit/{id?}', 'TagController@edit')->name('dashboard/tag/edit');
Route::put('/dashboard/tag/edit/{id}', 'TagController@update');
