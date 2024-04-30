<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Reservation;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\DB;


Schedule::command('DeleteReserveExpired')->daily();
