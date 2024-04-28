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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'genrer' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'sinopse' => 'required|string|max:1000',
            'aval' => 'numeric|regex:/^[1-9]\d*(\.\d+)?$/',
            'ano_lancamento' => 'required|integer',
            'num_exemplares' => 'required|integer',
            'num_paginas' => 'required|integer',
            'url_img' => 'required|string|max:255',
            'disponibilidade' => 'required|boolean',
        ]);

        $book = new Book;
        
        try {
            $verifyBookOccurrance = Book::where('titulo', $request->title)->firstOrFail();
            return redirect('/create')->with('msg_fail', 'Livro já foi cadastrado anteriormente')->withInput();

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
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect('/home')->with('Error', 'Livro não encontrado :(');
        }
        $userReservation = Reservation::where('user_id', auth()->id())->first();

        return view('show', ['book'=>$book, 'titulo'=>$book->titulo, 'userReservation' => $userReservation]);
    }

    public function destroy($id) {

        $book = Book::findOrFail($id)->delete();

        return redirect('/home')->with('success', 'Livro excluído com sucesso!');
    }
}
