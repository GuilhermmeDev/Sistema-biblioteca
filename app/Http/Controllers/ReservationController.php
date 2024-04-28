<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Database\QueryException;

class ReservationController extends Controller
{
    public function reserve($book_id, Request $request) { // id do livro e dados do user, respectivamente

        $reservation = new Reservation;
        $reservation->user_id = auth()->user()->id;
        $reservation->book_id = $book_id;
        $reservation->reservation_expiration = Carbon::now()->addHours(24); // adiciona 24 horas a data atual
        try {
            $reservation->save();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // tratamento de erro de violação de chave unica do user
                return redirect()->back()->with('Error', 'Reserva já foi feita.');
            }
        }

        return redirect()->back()->with('success', 'Reserva feita com sucesso! Vá a biblioteca nas próximas 24 horas');

    }
}
