@extends('layouts.main')
@section('title', 'HomePage')

@section('content')
<div class="container">
        <div class="row">
            @foreach ($book as $item)
                <div class="col-sm">
                    <p>{{$item->titulo}}</p>
                    <p>{{$item->sinopse}}</p>
                    <p>{{$item->genero}}</p>
                    <p>{{$item->avaliacao}}</p>
                    <img src="{{$item->url_img}}" alt="" width="100" height="100">
                </div>
            @endforeach
        </div>
    
</div>
    
@endsection

