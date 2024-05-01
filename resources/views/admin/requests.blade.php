@extends('layouts.main')
@section('title', 'Pedidos de Reservas')
@section('content')
<style>
    .table {
        margin: 15px;
    }
</style>
@if ($requests->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Id da reserva</th>
                <th>Nome do Usuário</th>
                <th>Nome do Livro</th>
                <th>Vencimento</th>
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