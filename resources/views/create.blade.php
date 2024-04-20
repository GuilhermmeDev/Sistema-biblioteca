@extends('layouts.main')
@section('title', 'Criar')
@section('content')
    <div id="container_create">
        <h1>Página de inserção de livros</h1>
        <form action="/store" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Título do Livro</label>
                <input type="text" class="form-control" name="title" required>
                <label for="genrer" >Gênero</label>
                <input type="text" class="form-control" name="genrer" required>
                <label for="author">Autor</label>
                <input type="text" class="form-control" name="author" required>
                <label for="sinopse">Sinopse</label>
                <br>
                <textarea name="sinopse" id="sinopse" rows="3"></textarea> <br>
                <label for="aval">Avaliação (0 a 10)</label>
                <input type="number" class="form-control" name="aval" step="0.1" min="0" max="10">
                <label for="ano_lancamento">Ano lançamento</label>
                <input type="number" class="form-control" name="ano_lancamento" required>
                <label for="num_exemplares">Numero de exemplares</label>
                <input type="number" class="form-control" name="num_exemplares" required>
                <label for="num_paginas">Número de páginas</label>
                <input type="number" name="num_paginas" class="form-control" required>
                <label for="url_img">URL da capa do livro</label>
                <input type="text" name="url_img" class="form-control" required>
                <label for="disponibilidade">Disponibilidade</label>
                <select name="disponibilidade" id="disponibilidade" required>
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
                <br>

                <input type="submit" value="Enviar" class="btn btn-primary">
            </div>

        </form>
    </div>
@endsection
