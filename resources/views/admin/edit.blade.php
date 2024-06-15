@extends('layouts.navbar')
@section('title', 'Editando ' . $book->titulo)
@section('content')


<link rel="stylesheet" href="{{asset('css/create_edit/style.css')}}">

<div class="container">
  <form action="/book/update/{{$book->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="container_label">
      <label for="titulo" class="text-wrapper-4">Título do Livro <span class="obrigatorio">*</span></label>
      <input type="text" id="titulo" name="titulo" class="input" max="255" value="{{$book->titulo}}">
      @error('titulo')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="genero" class="text-wrapper-3">Gênero<span class="obrigatorio">*</span></label>
      <input type="text" id="genero" name="genero" class="input" max="255" value="{{$book->genero}}">
      @error('genero')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="autor" class="text-wrapper-4">Autor<span class="obrigatorio">*</span></label>
      <input type="text" id="autor" name="autor" class="input" max="255" value="{{$book->autor}}">
      @error('autor')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="sinopse" class="text-wrapper-5">Sinopse<span class="obrigatorio">*</span></label>
      <textarea id="sinopse" name="sinopse" class="input textarea" maxlength="1500">{{$book->sinopse}}</textarea>
      @error('sinopse')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="avaliacao" class="text-wrapper-4">Avaliação (0 a 5)</label>
      <input type="number" id="avaliacao" name="avaliacao" min="0" max="5" step="0.1" class="input" value="{{$book->avaliacao}}">
      @error('avaliacao')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="ano_lancamento" class="text-wrapper-4">Ano Lançamento<span class="obrigatorio">*</span></label>
      <input type="text" id="ano_lancamento" name="ano_lancamento" class="input" max="255" value="{{$book->ano_lancamento}}">
      @error('ano_lancamento')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="num_exemplares" class="text-wrapper-4">Número de Exemplares<span class="obrigatorio">*</span></label>
      <input type="number" min="0" id="num_exemplares" name="num_exemplares" class="input" value="{{$book->num_exemplares}}">
      @error('num_exemplares')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="num_paginas" class="text-wrapper-4">Número de Páginas<span class="obrigatorio">*</span></label>
      <input type="number" min="1" id="num_paginas" name="num_paginas" class="input" value="{{$book->num_paginas}}">
      @error('num_pag')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="url_img" class="text-wrapper-4">URL da capa do livro<span class="obrigatorio">*</span></label>
      <input type="url" id="url_img" name="url_img" class="input" value="{{$book->url_img}}">
      @error('urm_img')
          <p>{{$message}}</p>
      @enderror
      <div id="container_list">

      </div>
    </div>
    
    <div class="container_label">
      <label for="disponibilidade" class="disponibilidade-label">Disponibilidade:<span class="obrigatorio">*</span></label>
      <br>
      <select name="disponibilidade" id="disponibilidade">
        <option value="1" selected>Sim</option>
        <option value="0" {{$book->disponibilidade == 0 ? "selected='selected'" : ""}}>Não</option>
      </select>
      @error('disponibilidade')
          <p>{{$message}}</p>
      @enderror
      <br>
    </div>
    
    <div class="container_label container_button">
      <button type="submit" class="submit-button">Atualizar Livro</button>
    </div>
  </form>
</div>
<script src="{{asset('js/get_book_img.js')}}"></script>

@endsection
