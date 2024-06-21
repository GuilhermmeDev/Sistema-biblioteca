<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reset-css@5.0.2/reset.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{asset('css/navbar/navbar-style.css')}}" />
    </head>
    <title>@yield('title')</title>
    <body>

        <nav class="navbar">
            <div class="container_logo">
                <a href="{{route('home')}}" class="ancor_img"><img src="{{asset('imgs/navbar/LYBRIS.svg')}}" alt="" class="img_navbar"></a>
                @if(Route::currentRouteName() == 'home' or Route::currentRouteName() == 'welcome')
                    <div class="container_input">
                        <img src="{{asset('imgs/navbar/search-line.svg')}}" class="search_icon">
                        <form action="/home" method="GET">
                            <input type="text" name="search" id="search" placeholder="O que você quer ler hoje?">
                        </form>
                    </div>
                @endif
            </div>
            <div class="container_actions">
                <div class="container_button {{ request()->routeIs('home') || request()->routeIs('welcome') ? 'clicked' : ''}}">
                    <img src="{{asset('imgs/navbar/home-line.svg')}}" alt="icon home" class="nav_icon">
                    <a class="botao_home" href="{{route('home')}}" >Home</a>
                </div>
    
                
                @if(auth()->user()->level == 1)
                    <div class="container_drop">

                        <button class="on_drop">
                            <img src="{{asset('imgs/navbar/menu-line.svg')}}" alt="options">
                        </button>
                        <div class="drop_content">
                        
                            <div class="container_button {{ request()->routeIs('create') ? 'clicked' : ''}}">
                                <img src="{{asset('imgs/navbar/add-circle-line.svg')}}" alt="icon add" class="nav_icon">
                                <a class="botao_home" href="/create" >Adicionar Livro</a>
                            </div>
                            <div class="container_button {{ request()->routeIs('loans.panel') ? 'clicked' : ''}}">
                                <img src="{{asset('imgs/navbar/search-eye-line.svg')}}" alt="icon search eye" class="nav_icon">
                                <a class="botao_home" href="/loans" >Painel de Empréstimos</a>
                            </div>
                
                            <div class="container_button {{ request()->routeIs('requests.reserves') ? 'clicked' : ''}}">
                                <img src="{{asset('imgs/navbar/check-double-line.svg')}}" alt="icon check" class="nav_icon">
                                <a class="botao_home" href="/reserve/requests" >Validar Reservas</a>
                            </div>
                        </div>
                    </div>
                @endif

    
    
                <div class="container_user">
                    <img src="{{asset('imgs/navbar/user-line.svg')}}" class="user_icon" alt="icon user">
                    <p class="username">
                        {{auth()->user()->name}}
                    </p>
                    <div class="container_cred">
                        <p class="username cred">{{auth()->user()->credibility}} .Pts</p>
                        <div class="container_logout">
                            <form action="/logout" method="post" id="logout-form">
                                @csrf
                            </form>
                            <img src="{{asset('imgs/navbar/logout-box-line.svg')}}" alt="icon logout" class="icon_logout">
                            <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">Logout</a>
                        </div>
                    </div>
                </div>
        </div>
        </nav>

    <main>
        @yield('content')
    </main>
    <script src="{{asset('js/navbar.js')}}"></script>
    </body>
    </html>