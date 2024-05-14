<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Loan;
use Illuminate\Support\Carbon;

class ApplyFine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ApplyFine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Aplicar multa aos usuários que possuem a data de devolução na tabela loans 
    maior que a data atual e marcá-los como pendentes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $PendentsLoans = DB::table('loans')
        ->join('users', 'loans.user_id', '=', 'users.id')
        ->where('loans.status', '!=', 'devolvido')
        ->where('loans.devolution_date', '<=', Carbon::now())
        ->update(['users.credibility' => DB::raw('users.credibility - 10'), 'loans.status' => 'pendente']);

        $this->info('Aplicando multa aos pendentes...');
    }
}
