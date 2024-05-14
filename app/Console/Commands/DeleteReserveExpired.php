<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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
    protected $description = 'Exclui as reservas com mais de 24 horas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('reservations')->join('books', 'reservations.book_id', '=', 'books.id')
        ->update(['books.num_exemplares' => DB::raw('books.num_exemplares + 1')]);

        Reservation::where('reservation_expiration', '<=', Carbon::now())->delete();
        $this->info('deu certo!');
    }
}
