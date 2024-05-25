<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $urls = ['https://books.google.com/books/content?id=TTUFEQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',
                'http://books.google.com/books/content?id=pYcmEAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',
                'http://books.google.com/books/content?id=XVvkCQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',
                'http://books.google.com/books/content?id=s0ueEAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',
                'http://books.google.com/books/content?id=RxG6DAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api',
                'http://books.google.com/books/content?id=V9NjEAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api'];
        $indice = array_rand($urls, 1);
        return [
            'titulo' => fake()->unique()->name(),
            'genero' => Str::random(10),
            'autor' => fake()->name(),
            'sinopse' => fake()->text(),
            'avaliacao' => '4.3',
            'ano_lancamento' => 2021,
            'num_exemplares' => 123,
            'num_paginas' => 127,
            'url_img' => $urls[$indice],
            'disponibilidade' => rand(0,1),
        ];
    }
}
