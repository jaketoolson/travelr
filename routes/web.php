<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

Route::get('{any}', function () {
    return view('home');
})->where('any', '.*');

Route::group(['prefix' => 'auth'], function(){
    Auth::routes();
});

Route::post('/webhooks/stripe', 'Hooks\StripeWebhookController@handleWebhook')->name('webhooks.stripe');