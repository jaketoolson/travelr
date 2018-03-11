<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/planet/featured/{limit?}', 'FeaturedPlanetApiController@index')->name('api.planet.featured.index');
Route::get('/planet', 'PlanetApiController@index')->name('api.planet.index');
Route::get('/planet/{id}', 'PlanetApiController@show')->name('api.planet.show');


Route::get('/galaxy/{id}', 'PlanetApiController@show')->name('api.galaxy.show');