@extends('layouts.navbar')
@section('title', 'Painel de Empréstimos')
@section('content')

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

@if ($loans != null)
<table class="table">
    <thead>
        <tr>
            <th>Id do Empréstimo</th>
            <th>Nome do Usuário</th>
            <th>Nome do Livro</th>
            <th>Vencimento</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($loans as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->user->name}}</td>
                <td>{{$item->book->titulo}}</td>
                <td>{{\Carbon\Carbon::parse($item->devolution_date)->format('d/m/Y')}}</td>
                <td>{{$item->status}}</td>
                <td>
                    <form action="/loans/check/{{$item->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-dark" type="submit">Marcar como Devolvido</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@elseif($loans == null)
    <h3>Nenhum empréstimo no momento.</h3>
@endif

@endsection