<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'auth'], function(){
    Auth::routes();
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/planet/{id}', 'PlanetWebController@show')->name('planet.show');

Route::get('/galaxy/{id}', 'GalaxyWebController@show')->name('galaxy.show');

Route::get('/terrain/{id}', 'TerrainWebController@show')->name('terrain.show');
