<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="
    https://cdn.jsdelivr.net/npm/reset-css@5.0.2/reset.min.css
    " rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('css/navbar/navbar-style.css')}}" />
    </head>
    <title>@yield('title')</title>
    <body>

    <nav class="container_navbar">
        <div class="container_buttons">
            <a href="/home">
                <img src="{{asset('imgs/LYBRIS.svg')}}" alt="Logo LYBRIS" width="200px" height="200px">
                @if (Route::currentRouteName() != 'home' and Route::currentRouteName() != 'welcome')
                    <img src="{{asset('imgs/arrow-line-left.svg')}}"> <!-- Se não for a home -->
                @endif
            </a>
        </div>

        <div class="center">
            @if(Route::currentRouteName() == 'home')
                <h1 class="current">Home</h1>
            @elseif(Route::currentRouteName() == 'create')
                <h1>Cadastro de Livro</h1>
            @elseif(Route::currentRouteName() == 'edit.book')
                <h1>Editando {{$book->titulo}}</h1>
            @elseif(Route::currentRouteName() == 'edit.book')
                <h1>Livros</h1>
            @endif
        </div>
        @if(auth()->check())
            @if(auth()->user()->level == 1)
                <div class="admin_buttons">
                    <div>
                        <a href="/create" class="admin_button">
                            Cadastrar Livro
                        </a>
                    </div>
                    <div>
                        <a href="/reserve/requests" class="admin_button">Painel de Reservas</a>
                    </div>
                    <div>
                        <a href="/loans" class="admin_button">Painel de Empréstimos</a>
                    </div>
                </div>
            @endif
        
            <div class="container_user">
                <h1>Olá, {{auth()->user()->name}}</h1>
                <img src="{{asset('imgs/user-default.svg')}}" alt="user-default">
                    <form action="{{route('logout')}}" id="logout-form" method="POST">@csrf</form>
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="logout-button">Logout</a>
            </div>
        @endif
    </nav>
    @if(session('msg_fail'))
    <div>
        <h1 class="msg">{{session('msg_fail')}}</h1>
    </div>
    @endif

    <main>
        @yield('content')
    </main>
    </body>
    </html>