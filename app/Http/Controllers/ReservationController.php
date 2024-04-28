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
        // lógica para diminuir a quantidade de livros (1) no banco de dados

        $lowBook = Book::where('id', $book_id)->first();
        $lowBook->num_exemplares - 1;
        return redirect()->back()->with('success', 'Reserva feita com sucesso! Vá a biblioteca nas próximas 24 horas');

    }


    public function cancel($book_id, Request $request) {

        $user_id = auth()->user()->id;

        $reservation_cancel = Reservation::where('user_id', $user_id)->delete();
        if ($reservation_cancel > 0) {
            return redirect()->back()->with('success', 'Reserva Cancelada com sucesso!');
        }
        return redirect()->back()->with('Error', 'Erro no cancelamento da reserva');

    }
}
