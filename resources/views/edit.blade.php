@extends('layouts.main')
@section('title', 'Editando ' . $book->titulo)
@section('content')
@if(session('msg_fail'))
    <p class="msg fail">{{session('msg_fail')}}</p>
@endif

<style>
    .obrigatorio {
        color: red;
    }

    #sinopse {
        margin: 10px;
    }
    #container_create {
        margin-left: 10px;
        width: 99%;
        overflow: hidden;
    }
</style>

    <div id="container_create">
        <h1>Editado: {{$book->titulo}}</h1>
        <form action="/book/update/{{$book->id}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo">Título do Livro <span class="obrigatorio">*</span></label>
                <input type="text" class="form-control" name="titulo" value="{{ $book->titulo }}" required>

                <label for="genero" >Gênero <span class="obrigatorio">*</span></label>
                <input type="text" class="form-control" name="genero" value="{{ $book->genero }}" required>

                <label for="autor">Autor <span class="obrigatorio">*</span></label>
                <input type="text" class="form-control" name="autor" value="{{ $book->autor }}" required>

                <label for="sinopse">Sinopse <span class="obrigatorio">*</span></label>
                <br>
                <textarea name="sinopse" id="sinopse" rows="3" wrap="hard" class="form-control">{{$book->sinopse}}</textarea>
                <br>

                <label for="avaliacao">Avaliação (0 a 10)</label>
                <input type="number" class="form-control" name="avaliacao" step="0.1" min="0" max="10" value="{{ $book->avaliacao }}">

                <label for="ano_lancamento">Ano lançamento <span class="obrigatorio">*</span></label>
                <input type="number" class="form-control" name="ano_lancamento" value="{{ $book->ano_lancamento }}" required>

                <label for="num_exemplares">Numero de exemplares <span class="obrigatorio">*</span></label>
                <input type="number" class="form-control" name="num_exemplares" value="{{ $book->num_exemplares }}" required>

                <label for="num_paginas">Número de páginas <span class="obrigatorio">*</span></label>
                <input type="number" name="num_paginas" class="form-control" value="{{ $book->num_paginas }}" required>

                <label for="url_img">URL da capa do livro <span class="obrigatorio">*</span></label>
                <input type="text" name="url_img" class="form-control" value="{{ $book->url_img }}" required>

                <label for="disponibilidade">Disponibilidade <span class="obrigatorio">*</span></label>
                <select name="disponibilidade" id="disponibilidade" value="{{ $book->disponibilidade }}" required>
                    <option value="0">Não</option>
                    <option value="1" {{ $book->disponibilidade == 1 ? "selected='selected'":"" }}>Sim</option>
                </select>
                <br>

                <input type="submit" value="Enviar" class="btn btn-primary">
            </div>

        </form>
    </div>
@endsection
