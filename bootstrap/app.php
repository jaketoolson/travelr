<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

$app = new Orion\Travelr\Foundation\Application(
    realpath(__DIR__.'/../')
);

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    Orion\Travelr\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    Orion\Travelr\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Orion\Travelr\Foundation\Exceptions\Handler::class
);

return $app;
