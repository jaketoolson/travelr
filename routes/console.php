<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

use Illuminate\Foundation\Inspiring;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');
