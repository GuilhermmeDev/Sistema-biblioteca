@extends('layouts.navbar')
@section('title', 'Lybris')

    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
<link rel="stylesheet" href="{{asset('css/home/style.css')}}">

@section('content')
    <div class="anuncio_livro">
        <div class="container_anuncio_img">
            <img src="{{$last_book->url_img}}" alt="livro preto" class="anuncio_img">
        </div>
        <a href="/book/{{$last_book->id}}" class="anuncio_botao">Leia Agora</a>
    </div>

    <div class="container_sections">
        <div class="container-slide">
            <h1 class="titulo_section">A biblioteca tá ON</h1>
            
            <div #swiperRef="" class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($book as $item)
                    <div class="swiper-slide slide">
                        <a href="book/{{$item->id}}">
                            <img src="{{$item->url_img}}" alt="foto do livro {{$item->titulo}}" class="book-img">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        
        <div class="container-slide">
            <h1 class="titulo_section">Recomendações</h1>
            
            <div #swiperRef="" class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($book as $item)
                    <div class="swiper-slide slide">
                        <a href="book/{{$item->id}}">
                            <img src="{{$item->url_img}}" alt="foto do livro {{$item->titulo}}" class="book-img">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <footer>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{asset('js/script_home.js')}}"></script>
@endsection
