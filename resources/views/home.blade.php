@extends('layouts.main')
@section('title', 'HomePage')

@section('content')
@if(session('msg'))
    <div class="alert alert-sucess">
        <p class="msg">{{session('msg')}}</p>
    </div>
@elseif(session('Error'))
    <div class="alert alert-danger">
        <p>{{session('Error')}}</p>
    </div>
@elseif(session('success'))
    <div class="alert alert-success">
        <p>{{session('success')}}</p>
    </div>
@endif

<div class="container">
        <div class="row">
            @foreach ($book as $item)
                <div class="col-sm">
                    <p>{{$item->titulo}}</p>
                    <p>{{$item->sinopse}}</p>
                    <p>{{$item->genero}}</p>
                    <p>{{$item->avaliacao}}</p>
                    <img src="{{$item->url_img}}" alt="Foto do livro {{$item->titulo}}">
                    <br>
                    <a class="btn btn-dark" href="/book/{{ $item->id }}">Veja mais</a>
                </div>
                
            @endforeach
        </div>
    
</div>
    
@endsection

