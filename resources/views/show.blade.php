@extends('layouts.main')

@section('title', 'Mostrando Livro')

@section('content')

    <div class="container-fluid">
        <img src="{{$book->url_img}}" alt="Capa do livro {{$book->titulo}}" width="200" height="300">
        <h1 class="titulo">{{$book->titulo}}</h1>
        <h5 class="autor">Autor: {{$book->autor}}</h5>
        <p class="ano_lancamento">Ano lancamento: {{$book->ano_lancamento}}</p>
        <p><small class="num_paginas">Numero de paginas: {{$book->num_paginas}}</small></p>
        <p class="lead">Sinopse: {{$book->sinopse}}</p>
    </div>

@endsection