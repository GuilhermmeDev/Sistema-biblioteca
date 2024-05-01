<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
    ];

    public function book() {
        return $this->belongsTo('App\Models\Book');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
