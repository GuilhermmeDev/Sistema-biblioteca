<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

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
        $book = new Book;
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

        return redirect('/')->with('msg', 'Livro cadastrado com sucesso');
    }

    public function show($id) {

        $book = Book::findOrFail($id);

        return view('show', ['book'=>$book]);
    }
}
