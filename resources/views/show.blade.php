@extends('layouts.main')

@section('title', $titulo)

<style>
    .disponivel {
    color: #25ce4d;
    }
    .ndisponivel {
        color: #b3235a;
    }
</style>

@section('content')

    <div class="container-fluid">
        <img src="{{$book->url_img}}" alt="Capa do livro {{$book->titulo}}" width="200" height="300">
        <h1 class="titulo">{{$book->titulo}}</h1>
        <h5 class="autor">Autor: {{$book->autor}}</h5>
        <p class="ano_lancamento">Ano lancamento: {{$book->ano_lancamento}}</p>
        <p><small class="num_paginas">Numero de paginas: {{$book->num_paginas}}</small></p>
        <p class="lead">Sinopse: {{$book->sinopse}}</p>
        @if($book->disponibilidade == 1)
            <p class="disponivel">Disponível para empréstimo</p>
        @else 
            <p class="ndisponivel">Este livro não está disponível :(</p>
        @endif

        @if($userReservation == null)
            <form action="{{ route('reservation', ['id' => $book->id])}} " method="post"> {{--botao para realizar reserva--}}
                @csrf
                <button type="submit" class="btn btn-primary">Reservar</button>
            </form>
        @else
            <button type="button" class="btn btn-secondary" disabled>Reservar</button> {{--botao desativado caso ja tenha feito ou dado erro na reserva--}}
        @endif
        @if(session('sucess') or session('Error'))
        @endif

        @if(session('sucess'))
            <p class="disponivel">{{session('sucess')}}</p>  {{-- msg de sucesso --}}
        @endif

        @if(session('Error'))
            <div class="alert alert-danger">
                <p>{{session('Error')}}</p>  {{-- msg de erro --}}
            </div>
        @endif
    </div>

@endsection