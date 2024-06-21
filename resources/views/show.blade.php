@extends('layouts.navbar')

<link rel="stylesheet" href="{{asset('css/show/globals.css')}}" />
<link rel="stylesheet" href="{{asset('css/show/style.css')}}" />
<link rel="stylesheet" href="{{asset('css/show/styleguide.css')}}" />
@section('title', $book->titulo)
@section('content')
<div class="tela-de-livro">
        @if(session('success'))
            <p class="message alert-success">{{session('success')}}</p>
        @endif
        <div class="container-5">
            <div class="container-4">
            <div class="container-princ">
              <div class="titulo">{{$book->titulo}}</div>
              <img class="OBJECTS" src="{{$book->url_img}}"/>
              @if($book->disponibilidade == 1)
                  <div class="disponibilidade">Disponível</div>
              @elseif($book->disponibilidade == 0)
                  <div class="disponibilidade">Não Disponível</div>
              @endif
            </div>
          </div>
          <div class="container-1">
            <div class="container-2">
              <div class="container-3">
                @if ($book->avaliacao)
                    <div class="item-book avaliacao">
                        <img src="{{asset('imgs/star-fill.svg')}}" alt="star icon" class="star_icon"> 
                        <p class="avaliacao_value">{{$book->avaliacao}}</p>
                    </div>
                @endif
                <div class="item-book">Autor: <span class="resp">{{$book->autor}}</span></div>
                <div class="item-book">Ano de Lançamento: <span class="resp">{{$book->ano_lancamento}}</span></div>
                <div class="item-book">Quantidade disponivel: <span class="resp">{{$book->num_exemplares}}</span></div>
                <div class="item-book">Número de Páginas: <span class="resp">{{$book->num_paginas}}</span></div>
                <div class="item-book">Genero: <span class="resp">{{$book->genero}}</span></div>
                <div class="item-book">Sinopse:</div>
              </div>
            </div>
            <p class="sinopse">
              {{$book->sinopse}}
            </p>
            <div class="buttons-container">
                @if($userReservation == null and $userLoan == null and $book->disponibilidade == 1 and $book->num_exemplares >= 1)

                    <form action="{{route('reservation', ['id' => $book->id])}}" method="POST" class="botao-reserva">
                        @csrf
                        <button type="submit" class="text-wrapper-9">Reservar</button>
                    </form>
    
                @elseif($userReservation and $userReservation->book->id == $book->id)
                    <form action="{{route('cancel.reservation', ['id' => $book->id])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn_book">Cancelar Reserva</button>
                    </form>
                @elseif($userReservation)
                    <button class=" btn btn-secondary btn_book">Cancelar Reserva</button>
                    <p class="lembrete">Você reservou o livro <a href="{{$userReservation->book->id}}">{{$userReservation->book->titulo}}</a></p>
                @elseif($userLoan and $userLoan->book->id == $book->id)
                    <p class="lembrete">Você está com este livro, entregue-o para fazer outra reserva</p>
                    <p class="disponivel">Vá a biblioteca até {{\Carbon\Carbon::parse($userLoan->devolution_date)->format('d/m \à\s\ H:i')}}</p>
                @elseif($userLoan)
                    <p class="lembrete">Você está com o livro <a href="{{$userLoan->book->id}}" class="item-book">{{$userLoan->book->titulo}}</a>, 
                        entregue-o para fazer outra reserva</p>
                @endif
    
                @if(auth()->user()->level == 1)
                    <form action="{{route('destroy', ['id' => $book->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn_book">Excluir Livro</button>
                    </form>
                    <form action="{{route('edit.book', ['id' => $book->id])}}">
                        <button type="submit" class="btn btn-dark btn_book">Editar Livro</button>
                    </form>
                @endif
            </div>
          </div>
        </div>
      </div>
@endsection
