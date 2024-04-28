<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $timestamps= FALSE;

    public function reservations() {
        return $this->hasMany('App\Models\Reservation');
    }
}
