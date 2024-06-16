<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="{{asset('css/login-style.css')}}">
  <link rel="stylesheet" href="css/style.css">
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
  <div class="login-container" >
    <div class="img-container">
      <img src="{{asset('imgs/LYBRIS.svg')}}" alt="Logo LY">
    </div>
    <form action="{{route('login')}}" method="POST">
      @csrf
      <p class="title">Login</p>
      <div class="login-form" >
        <div class="form-group">

          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" required placeholder="Insira seu e-mail" value="{{old('email')}}">
          @error('email')
                  <div class="alert_div">
                      <span class="alert_div"><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</span>
                  </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Senha</label>
          <input type="password" id="senha" name="password" required placeholder="Insira sua senha" value="{{old('password')}}">
          @error('password')
              <div class="alert_div">
                  <span><img src="imgs/error-warning-line.svg" alt="error">{{ $message }}</span>
              </div>
            @enderror
          @if(session('block'))
              <p style="color: red; font-weight: bold;">{{session('block')}}</p>
          @endif
        </div>
        
        <button type="submit" class="button">Entrar</button>
    </form>
      <p class="signup-link">
        Não possui uma conta? <a href="/register">Cadastrar-se</a>
      </p>
    </div>
</body>
</html>