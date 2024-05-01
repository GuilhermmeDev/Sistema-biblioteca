<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
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
              
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>

                
                @guest
                <li class="nav-item">
                  <a class="nav-link" href="/register">Cadastrar-se</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/login">Login</a>
                </li>
                @endguest


                @auth
                <li class="nav-item">
                  <p class="nav-link">Olá, {{Auth::user()->name}}!</p>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">Logout</a>
                  </li>


                  @if(Auth::user()->level == 1)
                  <li class="nav-item active">
                    <a class="nav-link" href="/reserve/requests">Pedidos de Reservas</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="/create">Cadastrar Livro</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="/loans">Painel de Emprestimos</a>
                  </li>
                  @endif


                @endauth
              </ul>
            </div>
          </nav>

        @yield('content')
    </body>
</html>
