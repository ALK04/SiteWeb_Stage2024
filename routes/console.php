<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\EmailAutomatique;
use Illuminate\Console\Scheduling\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Encapsuler la logique de planification dans une fonction anonyme
return function (Schedule $schedule) {
    $schedule->command(EmailAutomatique::class)->weekly();
};
