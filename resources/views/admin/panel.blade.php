@extends('layouts.navbar')
@section('title', 'Painel de Empréstimos')
@section('content')

<link rel="stylesheet" href="{{asset('css/loans/style.css')}}">

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

<div class="container_views">
    <h3>Filtragem</h3>
    <select name="views" id="views">
        <option value="actual" class="opt">Atual</option>
        <option value="history" class="opt" {{request('view') == 'history' ? 'selected' : ''}} >Tudo</option>
    </select>
    <form action="/loans" method="get" class="form_views" id="form">
        <input type="submit" name="view" value="actual">
        <input type="submit" name="view" value="history">
    </form>
</div>

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
                    @if ($item->status != 'devolvido')
                    <form action="/loans/check/{{$item->id}}" method="post">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-dark" type="submit">Marcar como Devolvido</button>
                    </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@elseif($loans == null)
    <h3>Nenhum empréstimo no momento.</h3>
@endif


<script src="{{asset('js/loans.js')}}"></script>
@endsection