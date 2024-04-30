<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;
use Illuminate\Support\Carbon;

class DeleteReserveExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteReserveExpired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exclude Expired Reserves';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Reservation::where('reservation_expiration', '<=', Carbon::now())->delete();

        dd('Verificação 24 horas automática');
    }
}
