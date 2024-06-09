<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Cadastro</title>
  <link rel="stylesheet" href="css/register-style.css">
  <link rel="stylesheet" href="css/style.css">

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <div class="cadastro-container">
    <img class="logo-LY" src="imgs/LYBRIS.svg" alt="Logo LY">
    <form method="POST" action="{{ route('register') }}" class="form-container">
        @csrf
      
        <p class="title">Cadastro</p>
      
        <div class="cadastro-form">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" required placeholder="Insira seu nome" value="{{old('name')}}">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required placeholder="Insira seu e-mail" value="{{old('email')}}">
                @error('email')
                  <div class="alert_div">
                    <span><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</span>
                  </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required placeholder="Insira sua senha" value="{{old('password')}}">
                @error('password')
                    <div class="alert_div">
                        <span><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</span>
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirmar Senha</label>
                <input type="password" id="password-confirm" name="password_confirmation" required placeholder="Confirme sua senha">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
            </div>

            
            <button type="submit" class="button">Cadastrar-se</button>
            <p class="signup-link">Já possui conta? <a href="/login">Entrar</a></p>
          </div>

        </form>


  </div>
</body>
</html>