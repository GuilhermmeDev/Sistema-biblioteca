@extends('layouts.main')
@section('title', 'Criar')
@section('content')
@if(session('msg_fail'))
    <p class="msg fail">{{session('msg_fail')}}</p>
@endif

<style>
    .obrigatorio {
        color: red;
    }
</style>

    <div id="container_create">
        <h1>Página de inserção de livros</h1>
        <form action="/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Título do Livro <span class="obrigatorio">*</span></label>
                <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required>
                <label for="genero" >Gênero <span class="obrigatorio">*</span></label>
                <input type="text" class="form-control" name="genero" value="{{ old('genero') }}" required>
                <label for="autor">Autor <span class="obrigatorio">*</span></label>
                <input type="text" class="form-control" name="autor" value="{{ old('autor') }}" required>
                <label for="sinopse">Sinopse <span class="obrigatorio">*</span></label>
                <br>
                <textarea name="sinopse" id="sinopse" rows="3" wrap="hard" class="form-control">{{old('sinopse')}}</textarea>
                <br>
                <label for="avaliacao">Avaliação (0 a 10)</label>
                <input type="number" class="form-control" name="avaliacao" step="0.1" min="0" max="10" value="{{ old('avaliacao') }}">
                <label for="ano_lancamento">Ano lançamento <span class="obrigatorio">*</span></label>
                <input type="number" class="form-control" name="ano_lancamento" value="{{ old('ano_lancamento') }}" required >
                <label for="num_exemplares">Numero de exemplares <span class="obrigatorio">*</span></label>
                <input type="number" class="form-control" name="num_exemplares" value="{{ old('num_exemplares') }}" required>
                <label for="num_paginas">Número de páginas <span class="obrigatorio">*</span></label>
                <input type="number" name="num_paginas" class="form-control" value="{{ old('num_paginas') }}" required>
                <label for="url_img">URL da capa do livro <span class="obrigatorio">*</span></label>
                <input type="text" name="url_img" class="form-control" value="{{ old('url_img') }}" required>
                <label for="disponibilidade">Disponibilidade <span class="obrigatorio">*</span></label>
                <select name="disponibilidade" id="disponibilidade" value="{{ old('disponibilidade') }}" required>
                    <option value="0">Não</option>
                    <option value="1" {{old('disponibilidade') == "1" ? "selected='selected'": ""}}>Sim</option>
                </select>
                <br>

                <input type="submit" value="Enviar" class="btn btn-primary">
            </div>

        </form>
    </div>
@endsection