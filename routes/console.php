<?php

use App\Console\Commands\DeleteReserveExpired;
use App\Console\Commands\ApplyFine;
use App\Console\Commands\ClearLoans;
use App\Console\Commands\BlockUsers;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command('DeleteReserveExpired')->everyMinute();
Schedule::command('ApplyFine')->dailyAt('00:00');
Schedule::command('ClearLoans')->everyMinute();
Schedule::command('BlockUsers')->dailyAt('00:00');