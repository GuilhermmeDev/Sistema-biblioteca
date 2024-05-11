<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/navbar/create-style.css')}}" />
    <link rel="stylesheet" href="{{asset('css/navbar/globals.css')}}" />
    </head>
    <title>@yield('title')</title>
    <body>
    @if(session('msg_fail'))
        <h1 class="msg">{{session('msg_fail')}}</h1>
    @endif

    {{-- NavBar Lybris --}}
    <div class="wireframe">
        <div class="frame">
            <div class="div">
                <div class="frame-2">
                <a href="/"><img class="vector" src="{{asset('imgs/arrow-line-left.svg')}}"/> <img class="LYBRIS" src="{{asset('imgs/LYBRIS.svg')}}"/></a>
                </div>
                @if(request()->url() == url('/create'))
                    <div class="text-wrapper">Cadastro de Livro</div>
                @elseif(request()->url() == url('book/edit/' . $book->id))
                    <div class="text-wrapper">Editando {{$book->titulo}}</div>
                @elseif(request()->url() == url('book/' . $book->id))
                    <div class="text-wrapper">Livros</div>
                @endif
                @if(request()->url() == url('/home'))
                    <div class="frame-wrapper">
                        <div class="frame-3">
                            <div class="text-wrapper-2">Olá, {{auth()->user()->name}}!</div>
                            <img class="img" src="{{asset('imgs/user-default.svg')}}" />
                        </div>
                    </div>
                @else
                    <div class="frame-wrapper">
                        <div class="frame-3">
                            <div class="text-wrapper-2">{{auth()->user()->name}}</div>
                            <img class="img" src="{{asset('imgs/user-default.svg')}}" />
                        </div>
                    </div>
                @endif
            </div>
            <main>
                @yield('content')
            </main>
        </div>
    </div>
    </body>
    </html>