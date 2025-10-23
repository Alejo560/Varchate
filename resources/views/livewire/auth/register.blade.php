<div>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - Varchate</title>
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
      height: calc(100vh - 180px);
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
      color: #2d70f7;
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
      margin-bottom: 60px;
    }
    .logo {
      margin-bottom: 15px;
      max-width: 200px;
      width: 100%;
    }
    .register-box {
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 30px;
      width: 100%;
      max-width: 350px;
      text-align: center;
      align-items: center;
      background: #fff;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .register-box h2 {
      margin-bottom: 20px;
      color: #000;
      font-weight: bold;
    }
    .register-box input {
      width: 100%;
      padding: 10px;
      margin: 8px -8px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }
    .register-box button {
      width: 100%;
      padding: 12px;
      background: #2d70f7;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 15px;
      font-size: 16px;
      font-weight: bold;
    }
    .register-box button:hover {
      background: #1d52c7;
    }
    .terms {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      gap: 5px;
      margin: 15px 0;
      text-align: left;
      font-size: 14px;
      width: 100%;
    }
    .terms a {
      color: #2d70f7;
      text-decoration: underline;
    }
    .divider {
      margin: 20px 0;
      position: relative;
      text-align: center;
    }
    .divider::before {
      content: "";
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      height: 1px;
      background: #ccc;
    }
    .divider span {
      background: white;
      padding: 0 15px;
      position: relative;
      color: #777;
    }
    .social-register {
      display: flex;
      justify-content: space-between;
      margin-top: 15px;
      gap: 10px;
    }
    .social-register button {
      flex: 1;
      padding: 10px;
      border-radius: 6px;
      cursor: pointer;
      background: #fff;
      font-weight: bold;
      font-size: 14px;
    }
    .social-register .facebook {
      border: 2px solid #2d70f7;
      color: #2d70f7;
    }
    .social-register .gmail {
      border: 2px solid #db4437;
      color: #db4437;
    }
    .social-register .facebook:hover {
      background: #2d70f7; color: #fff;
    }
    .social-register .gmail:hover {
      background: #db4437; color: #fff;
    }
    .register {
      margin-top: 10px;
      font-size: 14px;
      color: #333;
      text-align: center;
    }
    .register a {
      color: #2d70f7;
      font-weight: bold;
      text-decoration: none;
      margin-left: 4px;
    }
    .register a:hover { text-decoration: underline; }

    @media (max-width: 780px) {
      .container {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: auto;
        padding: 30px 20px;
      }
      .left h1 { font-size: 22px; }
      .left img { max-width: 200px; }
      .right { width: 100%; }
      .register-box { width: 68%; }
      .olas { margin: 0 0 120px 0; }
    }
  </style>
</head>

<body>
  <header class="header">
      <img src="{{ asset('./imagenes/olas.svg') }}" alt="Ola superior" class="olas">
  </header>

  <div class="container">
    <div class="left">
      <h1>¡Nos encanta verte aquí!</h1>
      <h3>¡Únete a nuestra comunidad!</h3>
      <img src="{{ asset('./imagenes/alegre.png') }}" alt="Mascota Varchate">
    </div>

    <div class="right">
      <img src="{{ asset('./imagenes/logo.png') }}" alt="Logo Varchate" class="logo">

      <div class="register-box">
        <h2>Crear cuenta</h2>

        <!-- FORMULARIO LIVEWIRE -->
        <form wire:submit.prevent="register">
          <input type="text" wire:model="nombre" placeholder="Nombre completo" required>
          <input type="email" wire:model="email" placeholder="Correo electrónico" required>
          <input type="password" wire:model="password" placeholder="Contraseña" required>
          <input type="password" wire:model="password_confirmation" placeholder="Confirmar contraseña" required>

          <div class="terms">
            <label>
              <input type="checkbox" wire:model="acepto_terminos" required>
              Acepto los <a href="#">términos y condiciones</a>
            </label>
          </div>

          <button type="submit">Registrarse</button>
        </form>

        @error('email') <p style="color:red; font-size:14px;">{{ $message }}</p> @enderror
        @error('password') <p style="color:red; font-size:14px;">{{ $message }}</p> @enderror
        @error('acepto_terminos') <p style="color:red; font-size:14px;">{{ $message }}</p> @enderror

        <div class="divider">
          <span>O</span>
        </div>

        <div class="social-register">
          <button class="facebook">Facebook</button>
          <button class="gmail">Gmail</button>
        </div>

        <p class="register">¿Ya tienes cuenta?
          <a href="{{ route('login') }}">Inicia sesión</a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>
</div>
