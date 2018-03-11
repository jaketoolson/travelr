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
