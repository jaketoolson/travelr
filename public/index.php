<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';

/** @var Orion\Travelr\Http\Kernel $kernel */
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Orion\Travelr\Http\Controllers\Requests\HttpRequest::capture()
);
$response->send();
$kernel->terminate($request, $response);
