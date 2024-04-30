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
            'titulo' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'sinopse' => 'required|string|max:1000',
            'avaliacao' => 'nullable|numeric|regex:/^[1-9]\d*(\.\d+)?$/',
            'ano_lancamento' => 'required|integer',
            'num_exemplares' => 'required|integer',
            'num_paginas' => 'required|integer',
            'url_img' => 'required|string|max:255',
            'disponibilidade' => 'required|boolean',
        ]);

        $book = new Book;
        
        try {
            $verifyBookOccurrance = Book::where('titulo', $request->titulo)->firstOrFail();
            return redirect('/create')->with('msg_fail', 'Livro já foi cadastrado anteriormente')->withInput();

        } catch (ModelNotFoundException $e){
            $book->titulo = $request->titulo;
        }
        
        if ($request->avaliacao < 0 or $request->avaliacao > 10) {
            return redirect('/create')->with('msg_fail', 'Avaliação inválida')->withInput();
        }
        
        $book->avaliacao = $request->avaliacao;
        
        if ($request->ano_lancamento <= date('Y')) {
            $book->ano_lancamento = $request->ano_lancamento;
        }
        else {
            return redirect('/create')->with('msg_fail', 'Ano de lançamento invalido')->withInput();
        }
        
        $book->genero = $request->genero;
        $book->autor = $request->autor;
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
    
    public function edit($id) {
        $book = Book::findOrFail($id);
        
        return view('edit', ['book' => $book]);
    }
    
    public function update(Request $request) {

        $book = Book::findOrFail($request->id)->update($request->all());

        if ($book and $request->disponibilidade == false) {
            Reservation::where('book_id', $request->id)->delete();
        }
        return redirect(url('/book/' . $request->id))->with('sucess', 'Livro editado com sucesso');
    }
}
