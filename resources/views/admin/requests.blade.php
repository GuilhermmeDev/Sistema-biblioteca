@extends('layouts.navbar')
@section('title', 'Pedidos de Reservas')
@section('content')

<link rel="stylesheet" href="{{asset('css/requests/style.css')}}">

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

@if ($requests->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id da reserva</th>
                <th scope="col">Nome do Usuário</th>
                <th scope="col">Nome do Livro</th>
                <th scope="col">Vencimento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->book->titulo}}</td>
                    <td>{{$item->reservation_expiration}}</td>
                    <td>
                        <form action="/reserve/requests/validate/{{$item->id}}" method="post">
                            @csrf
                            <button class="btn btn-dark">Validar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
@elseif($requests->count() == 0) 
    <h3>Nenhum pedido de reserva no momento.</h3>
@endif
@endsection