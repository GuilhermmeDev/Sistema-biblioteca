<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /*User::factory()->create([
            'name' => 'User',
            'email' => 'user@slaa.com',
            'password' => '12345678',
            'level' => 1,
        ]);*/
        User::factory()->create([
            'name' => 'Usuario',
            'email' => 'usuario@teste.com',
            'email_verified_at' => now(),
            'password' => 'usuario123',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@teste.com',
            'email_verified_at' => now(),
            'password' => 'admin123',
            'level' => 1,
        ]);

        Book::factory()->count(10)->create();

}
}
