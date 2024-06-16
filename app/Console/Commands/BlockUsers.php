<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class BlockUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'BlockUsers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Muda o atributo de "block" da tabela de usuários para 1, caso o mesmo tenha a credibilidade zerada';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::where('credibility', '<=', 0)->get();

        foreach($users as $user) {
            $user->block = 1;
            $user->save();
        }
    }
}
