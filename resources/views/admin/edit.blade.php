@extends('layouts.create-edit')
@section('title', 'Editando ' . $book->titulo)
@section('content')


<div class="frame-4">
    {{-- Form area --}}
    <div class="frame-5">
        <form action="/book/update/{{$book->id}}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="input-wrapper">
                <label for="titulo" class="text-wrapper-4">Título do Livro <span class="obrigatorio">*</span></label>
                <input type="text" id="titulo" name="titulo" class="rectangle" value="{{$book->titulo}}">
                @error('titulo')
                <div class="error">
                    <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                </div>
                @enderror
            </div>
            
            <div class="input-wrapper">
                <label for="autor" class="text-wrapper-4">Autor<span class="obrigatorio">*</span></label>
                <input type="text" id="autor" name="autor" class="rectangle" value="{{$book->autor}}">
                @error('autor')
                <div class="error">
                    <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                </div>
                @enderror
            </div>

            <div class="input-wrapper">
                <label for="genero" class="text-wrapper-3">Gênero<span class="obrigatorio">*</span></label>
                <input type="text" id="genero" name="genero" class="rectangle" value="{{$book->genero}}">
                @error('genero')
                <div class="error">
                    <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                </div>
                @enderror
            </div>


            <div class="input-wrapper">
                <label for="sinopse" class="text-wrapper-5">Sinopse<span class="obrigatorio">*</span></label>
                <textarea id="sinopse" name="sinopse" class="rectangle-2">{{$book->sinopse}}</textarea>
                @error('sinopse')
                <div class="error">
                    <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                </div>
                @enderror
            </div>

            <div class="input-wrapper">
                <label for="avaliacao" class="text-wrapper-4">Avaliação (0 a 5)</label>
                <input type="number" id="avaliacao" name="avaliacao" min="0" max="5" step="0.1" class="rectangle" value="{{$book->avaliacao}}">
                @error('avaliacao')
                <div class="error">
                    <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                </div>
                @enderror
            </div>

            <div class="input-wrapper">
                <label for="ano_lancamento" class="text-wrapper-4">Ano Lançamento<span class="obrigatorio">*</span></label>
                <input type="number" id="ano_lancamento" name="ano_lancamento" class="rectangle" value="{{$book->ano_lancamento}}">
                @error('ano_lancamento')
                <div class="error">
                    <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                </div>
                @enderror
            </div>

            <div class="input-wrapper">
                <label for="num_exemplares" class="text-wrapper-4">Número de Exemplares<span class="obrigatorio">*</span></label>
                <input type="number" min="0" id="num_exemplares" name="num_exemplares" class="rectangle" value="{{$book->num_exemplares}}">
                @error('num_exemplares')
                <div class="error">
                    <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                </div>
                @enderror
            </div>

            <div class="input-wrapper">
                <label for="num_paginas" class="text-wrapper-4">Número de Páginas<span class="obrigatorio">*</span></label>
                <input type="number" min="1" id="num_paginas" name="num_paginas" class="rectangle" value="{{$book->num_paginas}}">
                @error('num_paginas')
                <div class="error">
                    <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                </div>
                @enderror
            </div>

            <div class="input-wrapper">
                <label for="url_img" class="text-wrapper-4">URL da capa do livro<span class="obrigatorio">*</span></label>
                <input type="url" max="255" id="url_img" name="url_img" class="rectangle" value="{{$book->url_img}}">
                @error('url_img')
                <div class="error">
                    <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                </div>
            @enderror
            </div>
            
                <label for="disponibilidade" class="disponibilidade-label">Disponibilidade:<span class="obrigatorio">*</span></label>
                <br>
                <select name="disponibilidade" id="disponibilidade">
                    <option value="1" selected>Sim</option>
                    <option value="0" {{$book->disponibilidade == 0 ? "selected='selected'" : ""}}>Não</option>
                </select>
                <br>
                
                <div class="div-button">
                    <input type="submit" value="Editar Livro" class="submit-button">
                </div>
        </form>
    </div>
</div>
@endsection
