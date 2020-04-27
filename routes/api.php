<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// GAMES
Route::get('/games', 'ApiController@getAllGames');
Route::get('/relatedGames/{gameId}', 'ApiController@getRelatedGames');
Route::get('/userFavorites/{userId}', 'ApiController@favoritesGames');
Route::get('/mostPlayed', 'ApiController@mostPlayed');
Route::get('/recentPlayed', 'ApiController@recentPlayed');
Route::get('/recentPlayed/{userId}', 'ApiController@recentPlayedByUser');
Route::get('/indexGames', 'ApiController@indexGames')->name('indexGame');
Route::get('/byCategory/{tagId}', 'ApiController@byCategory');
