<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'genero',
        'autor',
        'sinopse',
        'avaliacao',
        'ano_lancamento',
        'num_exemplares',
        'num_paginas',
        'url_img',
        'disponibilidade',
    ];

    public $timestamps= FALSE;

    public function reservations() {
        return $this->hasMany('App\Models\Reservation');
    }
}
