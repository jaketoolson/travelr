<?php

namespace Orion\Travelr;

use Illuminate\Foundation\Application as BaseApplication;

class Application extends BaseApplication
{
    public const VERSION = '0.0.1';

    public static function getAppVersion(): string
    {
        return self::VERSION;
    }
}
