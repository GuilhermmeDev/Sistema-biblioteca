@extends('layouts.navbar')
@section('title', 'Lybris')

    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
<link rel="stylesheet" href="{{asset('css/home/style.css')}}">

@section('content')

<div class="container_sections">
    @if(session('success'))
        <p class="message alert-success">{{session('success')}}</p>
    @endif
    <div class="container-slide">
        @if($search)
            <h1 class="titulo_section">Buscando por: "{{$search}}"</h1>
        @else 
            <h1 class="titulo_section">A biblioteca tá ON</h1>
        @endif

        @if(count($book) == 0)
            <p>Não há livros disponíveis :(</p>
        @else
        <div #swiperRef="" class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($book as $item)
                    <div class="swiper-slide slide">
                        <a href="/book/{{$item->id}}" class="ancor_book">
                            <div class="container_book">
                                <div class="container_img_book">
                                    <img src="{{$item->url_img}}" class="img_book">
                                </div>
                                <div class="info_book">
                                    <p class="author_book">{{$item->autor}}</p>
                                    <div class="title_star">
                                        <h6 class="title_book">{{$item->titulo}}</h6>
                                        @if($item->avaliacao)
                                            <div class="container_star">
                                                <p class="avaliacao">{{$item->avaliacao}}</p>
                                                <img src="{{asset('imgs/star-fill.svg')}}" alt="" class="star-icon">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                
            </div>
            <div class="swiper-pagination"></div>
        </div>
        @endif
    </div>
</div>


    <footer>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{asset('js/script_home.js')}}"></script>
@endsection
