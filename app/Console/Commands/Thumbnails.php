<?php
/**
 * Copyright (c) Jake Toolson 2018.
 */

namespace Orion\Travelr\Console\Commands;

use Illuminate\Console\Command;

class Thumbnails extends Command
{
    protected $signature = 'thumbnails';

    protected $description = 'Generates thumbnails';

    /**
     * GROSSSSSSsSS
     */
    public function handle()
    {
        $photos = \Storage::disk('public')->allFiles('images/planets');

        foreach ($photos as $photo) {
            if (str_contains($photo, '.DS_Store') || str_contains($photo, '300x300')) {
                continue;
            }
            $filePath = substr($photo, 0, -4);

            \Croppa::render($filePath . '-300x300.jpg');
        }
    }
}
