<?php

use App\Console\Commands\DeleteReserveExpired;
use App\Console\Commands\ApplyFine;
use App\Console\Commands\ClearLoans;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command('DeleteReserveExpired')->everyMinute();
Schedule::command('ApplyFine')->everyMinute();
Schedule::command('ClearLoans')->weekly();