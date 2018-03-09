<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/planet', 'PlanetApiController@index')->name('api.planet.index');
Route::get('/planet/{id}', 'PlanetApiController@show')->name('api.planet.show');