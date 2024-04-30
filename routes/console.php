<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Reservation;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\DB;


Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::command('DeleteReserveExpired')->daily();
