<?php

namespace Orion\Travelr\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Orion\Travelr\Console\Commands\Thumbnails;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Thumbnails::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        //
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
