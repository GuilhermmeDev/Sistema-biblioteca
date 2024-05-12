@extends('layouts.navbar')
@section('title', 'Cadastro de Livro')
@section('content')

          <div class="frame-4">
            {{-- Form area --}}
            <div class="frame-5">
              <form action="/store" method="POST">
                @csrf
                
                <div class="input-wrapper">
                  <label for="titulo" class="text-wrapper-4">Título do Livro <span class="obrigatorio">*</span></label>
                  <input type="text" id="titulo" name="titulo" class="rectangle" value="{{old('titulo')}}">
                  @error('titulo')
                    <div class="error">
                      <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                    </div>
                  @enderror
                </div>
                
                <div class="input-wrapper">
                  <label for="autor" class="text-wrapper-4">Autor<span class="obrigatorio">*</span></label>
                  <input type="text" id="autor" name="autor" class="rectangle" value="{{old('autor')}}">
                  @error('autor')
                    <div class="error">
                      <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                    </div>
                  @enderror
                </div>

                <div class="input-wrapper">
                  <label for="genero" class="text-wrapper-3">Gênero<span class="obrigatorio">*</span></label>
                  <input type="text" id="genero" name="genero" class="rectangle" value="{{old('genero')}}">
                  @error('genero')
                    <div class="error">
                      <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                    </div>
                  @enderror
                </div>


                <div class="input-wrapper">
                  <label for="sinopse" class="text-wrapper-5">Sinopse<span class="obrigatorio">*</span></label>
                  <textarea id="sinopse" name="sinopse" class="rectangle-2">{{old('sinopse')}}</textarea>
                  @error('sinopse')
                    <div class="error">
                      <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                    </div>
                  @enderror
                </div>

                <div class="input-wrapper">
                  <label for="avaliacao" class="text-wrapper-4">Avaliação (0 a 5)</label>
                  <input type="number" id="avaliacao" name="avaliacao" min="0" max="5" step="0.1" class="rectangle" value="{{old('avaliacao')}}">
                  @error('avaliacao')
                    <div class="error">
                      <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                    </div>
                  @enderror
                </div>

                <div class="input-wrapper">
                  <label for="ano_lancamento" class="text-wrapper-4">Ano Lançamento<span class="obrigatorio">*</span></label>
                  <input type="number" id="ano_lancamento" name="ano_lancamento" class="rectangle" value="{{old('ano_lancamento')}}">
                  @error('ano_lancamento')
                    <div class="error">
                      <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                    </div>
                  @enderror
                </div>

                <div class="input-wrapper">
                  <label for="num_exemplares" class="text-wrapper-4">Número de Exemplares<span class="obrigatorio">*</span></label>
                  <input type="number" min="0" id="num_exemplares" name="num_exemplares" class="rectangle" value="{{old('num_exemplares')}}">
                  @error('num_exemplares')
                    <div class="error">
                      <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                    </div>
                  @enderror
                </div>

                <div class="input-wrapper">
                  <label for="num_paginas" class="text-wrapper-4">Número de Páginas<span class="obrigatorio">*</span></label>
                  <input type="number" min="1" id="num_paginas" name="num_paginas" class="rectangle" value="{{old('num_paginas')}}">
                  @error('num_paginas')
                    <div class="error">
                      <h1><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</h1>
                    </div>
                  @enderror
                </div>

                <div class="input-wrapper" id="input_url_img">
                  <label for="url_img" class="text-wrapper-4">URL da capa do livro<span class="obrigatorio">*</span></label>
                  <input type="text" max="255" id="url_img" name="url_img" class="rectangle" value="{{old('url_img')}}">
                  <div id="container_list">
                    
                  </div>
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
                      <option value="0">Não</option>
                    </select>
                    <br>
                    
                    <div class="div-button">
                      <input type="submit" value="Cadastrar Livro" class="submit-button">
                    </div>
              </form>
            </div>
          </div>
    <script src="js/get-api.js"></script>
    @endsection
