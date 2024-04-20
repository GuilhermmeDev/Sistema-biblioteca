<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Ramsey\Uuid\Uuid;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();

        return view('welcome', ['book' => $books]);
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $datetime = date('d-m-Y h:i:s', time());
        $book = new Book;
        $book->id = Uuid::uuid4($datetime);
        $book->titulo = $request->title;
        $book->genero = $request->genrer;
        $book->autor = $request->author;
        $book->sinopse = $request->sinopse;
        $book->avaliacao = $request->aval;
        $book->ano_lancamento = $request->ano_lancamento;
        $book->num_exemplares = $request->num_exemplares;
        $book->num_paginas = $request->num_paginas;
        $book->url_img = $request->url_img;
        $book->disponibilidade = $request->disponibilidade;

        $book->save();

        return redirect('/');
    }
}
