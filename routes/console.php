<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Reservation;
use Illuminate\Support\Facades\Schedule;


Schedule::command('DeleteReserveExpired')->everyMinute();
Schedule::command('ApplyFine')->daily();