<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Models\Loan;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Database\QueryException;


class ReservationController extends Controller
{

    public function reserve($book_id, Request $request) { // id do livro e dados do user, respectivamente

        $date = date('Y-m-d');

        $todayNum = date('w', strtotime($date)); // verifica o dia da semana

        $checkNumEx = Book::find($book_id)->first();
        
        if ($checkNumEx->num_exemplares >= 1) {
            $reservation = new Reservation;

            $reservation->user_id = auth()->user()->id;
            $reservation->book_id = $book_id;
            if ($todayNum != 6) {
                $reservation->reservation_expiration = Carbon::now()->addHours(24); // adiciona 24 horas a data atual
            }
            else {
                $reservation->reservation_expiration = Carbon::now()->addHours(48); // Se for sábado a expiração será a dois dias, se a biblioteca não abrir no domingo.
            }
    
            try {
                $reservation->save();
            } catch (\Illuminate\Database\QueryException $e) {
                if ($e->errorInfo[1] == 1062) { // tratamento de erro de violação de chave unica do user
                    return redirect()->back()->with('Error', 'Reserva já foi feita.');
                }
                
                return redirect()->back()->with('Error', 'Alguma coisa deu errado' . $e);
            }
            // lógica para diminuir a quantidade de livros (1) no banco de dados
            
            $lowBook = Book::where('id', $book_id)->first();
            $lowBook->num_exemplares = $lowBook->num_exemplares - 1;
            $lowBook->save();
            return redirect()->back()->with('success', 'Reserva feita com sucesso! Vá a biblioteca nas próximas 24 horas');
        }

        return redirect()->back()->with('Error', 'Livro não disponível');

    }


    public function cancel($book_id, Request $request) {

        $user_id = auth()->user()->id;

        $reservation_cancel = Reservation::where('user_id', $user_id)->delete();
        if ($reservation_cancel > 0) {
            $plusBook = Book::where('id', $book_id)->first();
            $plusBook->num_exemplares = $plusBook->num_exemplares + 1;
            $plusBook->save(); 
            return redirect()->back()->with('success', 'Reserva Cancelada com sucesso!');
        }
        return redirect()->back()->with('Error', 'Erro no cancelamento da reserva');

    }

    public function requests() {
        $requestsReserves = Reservation::all();

        return view('admin.requests', ['requests' => $requestsReserves]);
    }

    public function validateReserve($id) {
        $reservation = Reservation::find($id)->first();
        $loan = new Loan;
        $loan->user_id = $reservation->user_id;
        $loan->book_id = $reservation->book_id;
        $loan->devolution_date = Carbon::now()->addDays(7);
        $loan->status = 'em andamento';

        $loan->save(); // Salva o empréstimo no BD

        $reservation->delete(); // deleta a reserva no BD

        return redirect()->back()->with('success', 'Reserva validada com sucesso. Agora é um empréstimo.');

    }
}
