<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Reservation;

class BookController extends Controller
{
    public function welcome() {
        if (auth()->check() == true) {
            return BookController::index();
        }
        return view('welcome');
    }

    public function index(){
        $books = Book::all();

        return view('home', ['book' => $books]);
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $book = new Book;
        
        try {
            $verifyBookOccurrance = Book::where('titulo', $request->title)->firstOrFail();
            return redirect('/create')->with('msg_fail', 'Livro já foi cadastrado anteriormente');

        } catch (ModelNotFoundException $e){
            $book->titulo = $request->title;
        }
        
        if ($request->aval < 0 or $request->aval > 10) {
            return redirect('/create')->with('msg_fail', 'Avaliação inválida');
        }
        
        $book->avaliacao = $request->aval;
        
        if ($request->ano_lancamento <= date('Y')) {
            $book->ano_lancamento = $request->ano_lancamento;
        }
        else {
            return redirect('/create')->with('msg_fail', 'Ano de lançamento invalido');
        }
        
        $book->genero = $request->genrer;
        $book->autor = $request->author;
        $book->sinopse = $request->sinopse;
        $book->num_exemplares = $request->num_exemplares;
        $book->num_paginas = $request->num_paginas;
        $book->url_img = $request->url_img;
        $book->disponibilidade = $request->disponibilidade;
        
        $book->save();
        return redirect('/')->with('msg', 'Livro cadastrado com sucesso');
    }

    public function show($id) {

        $book = Book::findOrFail($id);
        $userReservation = Reservation::where('user_id', auth()->id())->first();

        return view('show', ['book'=>$book, 'titulo'=>$book->titulo, 'userReservation' => $userReservation]);
    }
}
