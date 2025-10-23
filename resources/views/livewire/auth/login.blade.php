<div>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #fff;
    }
    header {
      position: relative;
      width: 100%;
      height: 160px;
      overflow: hidden;
    }
    .olas {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      z-index: 1;
    }
    .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      height: calc(100vh - 310px);
      padding: 0 5%;
      gap: 20px;
    }
    .left {
      flex: 1;
      text-align: center;
    }
    .left h1 {
      font-size: 28px;
      font-weight: bold;
      margin-bottom: 20px;
    }
    .left img {
      max-width: 280px;
      width: 100%;
    }
    .right {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    .logo {
      margin-bottom: 15px;
      max-width: 200px;
      width: 100%;
    }
    .login-box {
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 30px;
      width: 100%;
      max-width: 350px;
      text-align: center;
      background: #fff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .login-box h2 {
      margin-bottom: 20px;
    }
    .login-box input {
      width: 93%;
      padding: 10px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
    }
    .login-box button {
      width: 98%;
      padding: 10px;
      background: #2d70f7;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 10px;
      font-size: 16px;
    }
    .login-box button:hover {
      background: #1d52c7;
    }
    .login-box a {
      display: block;
      text-align: left; 
      margin-top: 10px;
      font-size: 14px;
      text-decoration: none;
      color: #2d70f7;
    }
    .divider { 
      display: flex;  
      align-items: center; 
      text-align: center;  
      color: #666;  
      margin: 15px 0;
      font-size: 14px;
    }
    .divider::before,
    .divider::after {
      content: "";
      flex: 1;
      border-bottom: 1px solid #ccc;
    }
    .divider::before { margin-right: 10px; }
    .divider::after { margin-left: 10px; }
    .social-login {
      display: flex;
      justify-content: space-between;
      margin-top: 15px;
      gap: 10px;
    }
    .social-login button {
      flex: 1;
      padding: 10px;
      border-radius: 6px;
      cursor: pointer;
      background: #fff;
      font-weight: bold;
      font-size: 14px;
      transition: 0.3s;
    }
    .social-login .facebook {
      border: 2px solid #2d70f7;
      color: #2d70f7;
    }
    .social-login .facebook:hover {
      background: #2d70f7;
      color: #fff;
    }
    .social-login .gmail {
      border: 2px solid #db4437;
      color: #db4437;
    }
    .social-login .gmail:hover {
      background: #db4437;
      color: #fff;
    }
    .register {  
      margin-top: 10px;
      font-size: 14px;
      color: #333;
      text-align: center; 
      white-space: nowrap; 
    }
    .register a {
      color: #2d70f7;
      font-weight: bold;
      text-decoration: none;
      display: inline; 
      margin-left: 4px; 
    }
    .register a:hover { text-decoration: underline; }

    @media (max-width: 780px) {
      .container {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: auto;
        padding: 0;
      }
      .left h1 { font-size: 22px; }
      .left img { max-width: 200px; }
      .right { width: 100%; }
      .register-box { width: 68%; }
      .olas { margin: 0px 0px 120px 0px; }
    }
  </style>

  <header>
    <img src="{{ asset('./imagenes/olas.svg') }}" alt="Ola superior" class="olas">
  </header>

  <div class="container">
    <div class="left">
      <h1>¡Hora de volver a casa!</h1>
      <img src="{{ asset('./imagenes/gato.png') }}" alt="Mascota Varchate">
    </div>
    <div class="right">
      <img src="{{ asset('./imagenes/logo.png') }}" alt="Logo Varchate" class="logo">
      <div class="login-box">
        <h2>Iniciar sesión</h2>

        <!-- FORMULARIO LIVEWIRE -->
        <form wire:submit.prevent="login">
          <input type="email" wire:model="email" placeholder="Correo" required>
          <input type="password" wire:model="password" placeholder="Contraseña" required>
          <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>

          <button type="submit">Entrar</button>
        </form>

        @if (session('error'))
          <p style="color:red; font-size:14px; margin-top:10px;">{{ session('error') }}</p>
        @endif

        <div class="divider"><span>O</span></div>
        <div class="social-login">
          <button class="facebook">Facebook</button>
          <button class="gmail">Gmail</button>
        </div>

        <p class="register">¿No tienes cuenta? 
          <a href="{{ route('register') }}">Regístrate</a>
        </p>
      </div>
    </div>
  </div>
</div>