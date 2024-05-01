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
        <p class="exemplares">Numero de exemplares: {{$book->num_exemplares}}</p>

        @if($book->disponibilidade == 1)
            <p class="disponivel">Disponível para empréstimo</p>
        @else 
            <p class="ndisponivel">Este livro não está disponível :(</p>
        @endif

        @if($userReservation == null and $book->disponibilidade == 1 and !$userLoan)
            <form action="{{ route('reservation', ['id' => $book->id])}} " method="post"> {{--botao para realizar reserva--}}
                @csrf
                <button type="submit" class="btn btn-primary">Reservar</button>
            </form>
        @else
            <button type="button" class="btn btn-secondary" disabled>Reservar</button> {{--botao desativado caso ja tenha feito ou dado erro na reserva--}}
        @endif

        @if(session('success'))
            <p class="alert alert-success">{{session('success')}}</p>  {{-- msg de sucesso --}}
        @endif

        @if(session('Error'))
            <div class="alert alert-danger">
                <p>{{session('Error')}}</p>  {{-- msg de erro --}}
            </div>
        @endif

        @if(auth()->user()->level == 1)
            <form action="{{$book->id}}/delete" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Excluir Livro</button>  {{-- Botão para excluir livro apenas para admins --}}
            </form>

            <a href="/book/edit/{{$book->id}}" class="btn btn-dark">Editar Livro</a>
        @endif
        
        @if($userReservation and $userReservation->book_id == $book->id)
            <form action="{{$book->id}}/cancel" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Cancelar Reserva</button>  {{-- Botão de Cancelar a reserva do livro --}}
            </form>
            <p class="lead">Este livro está reservado para você!</p>
            <p class="disponivel">Vá a biblioteca até {{\Carbon\Carbon::parse($userReservation->reservation_expiration)->format('d/m \à\s\ H:i')}}</p>
        @endif
        
        @if($userLoan and $userLoan->book_id == $book->id)
            <p class="lead">Você está com este livro!</p>
            <p class="lead">Entregue-o até dia {{\Carbon\Carbon::parse($userLoan->devolution_date)->format('d/m')}}</p>
        
        @elseif($userLoan and $userLoan->book_id != $book->id)
            <p class="lead">Você já pegou o livro <a href="/book/{{$userLoan->book_id}}">{{$userLoan->book->titulo}}</a>, devolva-o para reserva esse.</p>
        
        @endif

    </div>

@endsection