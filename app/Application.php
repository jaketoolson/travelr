<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr;

use Illuminate\Foundation\Application as BaseApplication;

class Application extends BaseApplication
{
    public const TRAVELR_VERSION = '0.0.1';

    public static function getAppVersion(): string
    {
        return self::TRAVELR_VERSION;
    }
}
