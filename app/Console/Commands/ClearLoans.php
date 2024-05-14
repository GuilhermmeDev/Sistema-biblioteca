<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Loan;

class ClearLoans extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ClearLoans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Limpa a tabela "loans" dos registros que possuem atributos "status" == "devolvido"';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Loan::where('status', 'devolvido')->delete();
        $this->info('deu certo!');
    }
}
