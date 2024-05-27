@extends('layouts.navbar')
@section('title', 'Cadastro de Livro')
@section('content')

<link rel="stylesheet" href="{{asset('css/create|edit/style.css')}}">

<div class="container">

  @if(session('msg_fail'))
    <p class="alert alert-danger">{{session('msg_fail')}}</p>
  @endif
  <form action="/store" method="POST">
    @csrf

    <div class="container_label">
      <label for="titulo" class="text-wrapper-4">Título do Livro <span class="obrigatorio">*</span></label>
      <input type="text" id="titulo" name="titulo" class="input" max="255" value="{{old('titulo')}}">
      @error('titulo')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="genero" class="text-wrapper-3">Gênero<span class="obrigatorio">*</span></label>
      <input type="text" id="genero" name="genero" class="input" max="255" value="{{old('genero')}}">
      @error('genero')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="autor" class="text-wrapper-4">Autor<span class="obrigatorio">*</span></label>
      <input type="text" id="autor" name="autor" class="input" max="255" value="{{old('autor')}}">
      @error('autor')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="sinopse" class="text-wrapper-5">Sinopse<span class="obrigatorio">*</span></label>
      <textarea id="sinopse" name="sinopse" class="input textarea" maxlength="1000">{{old('sinopse')}}</textarea>
      @error('sinopse')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="avaliacao" class="text-wrapper-4">Avaliação (0 a 5)</label>
      <input type="number" id="avaliacao" name="avaliacao" min="0" max="5" step="0.1" class="input" value="{{old('avaliacao')}}">
      @error('avaliacao')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="ano_lancamento" class="text-wrapper-4">Ano Lançamento<span class="obrigatorio">*</span></label>
      <input type="number" id="ano_lancamento" name="ano_lancamento" class="input" min="0" value="{{old('ano_lancamento')}}">
      @error('ano_lancamento')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="num_exemplares" class="text-wrapper-4">Número de Exemplares<span class="obrigatorio">*</span></label>
      <input type="number" min="0" id="num_exemplares" name="num_exemplares" class="input" value="{{old('num_exemplares')}}">
      @error('num_exemplares')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="num_paginas" class="text-wrapper-4">Número de Páginas<span class="obrigatorio">*</span></label>
      <input type="number" min="1" id="num_paginas" name="num_paginas" class="input" value="{{old('num_paginas')}}">
      @error('num_pag')
          <p>{{$message}}</p>
      @enderror
    </div>
    
    <div class="container_label">
      <label for="url_img" class="text-wrapper-4">URL da capa do livro<span class="obrigatorio">*</span></label>
      <input type="url" id="url_img" name="url_img" class="input" value="{{old('url_img')}}">
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
        <option value="0" {{old('disponibilidade') == 0 ? "selected: selected" : ''}}>Não</option>
      </select>
      @error('disponibilidade')
          <p>{{$message}}</p>
      @enderror
      <br>
    </div>
    
    <div class="container_label container_button">
      <button type="submit" class="submit-button">Cadastrar Livro</button>
    </div>
  </form>
</div>
<script src="js/get-api.js"></script>
@endsection
