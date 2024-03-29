<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/files/{id}', 'FileApiController@show')->name('api.files.show');

Route::get('/planets', 'PlanetApiController@index')->name('api.planets.index');
Route::get('/planets/{id}', 'PlanetApiController@show')->name('api.planets.show');
Route::get('/planets/{id}/likes', 'PlanetLikesApiController@store')->name('api.planets.likes.store');
Route::get('/planets/{id}/reviews', 'PlanetReviewsApiController@show')->name('api.planets.reviews.show');
Route::get('/planets/{id}/relationships', 'PlanetApiController@show')->name('api.planets.relationships');

Route::get('/planets/filter', 'PlanetSearchApiController@filter')->name('api.planets.filter');

Route::get('/galaxies', 'GalaxyApiController@index')->name('api.galaxies.index');
Route::get('/galaxies/{id}', 'GalaxyApiController@show')->name('api.galaxies.show');

Route::get('/terrains', 'TerrainApiController@index')->name('api.terrains.index');
Route::get('/terrains/{id}', 'TerrainApiController@show')->name('api.terrains.show');

Route::get('/amenities', 'AmenityApiController@index')->name('api.amenities.index');
Route::get('/amenities/{id}', 'AmenityApiController@show')->name('api.amenities.show');
