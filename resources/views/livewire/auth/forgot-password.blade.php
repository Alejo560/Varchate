<div>
    <!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar Contraseña - Varchate</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #fff;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
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
      z-index: 1
    }
    .container {
      flex: 1;
      display: flex;
      justify-content: space-between;
      align-items: center;
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
      max-width: 330px;
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
    .recovery-box {
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 40px;
      width: 100%;
      max-width: 300px;
      text-align: center;
      background: #fff;
      box-shadow: 0 8px 8px rgba(0,0,0,0.1);
    }
    .recovery-box h2 {
      margin-bottom: 10px;
      color: #000000;
      font-size: 24px;
    }
    .recovery-box p {
      color: #666;
      margin-bottom: 20px;
      font-size: 15px;
      line-height: 1.5;
    }
    .recovery-box input {
      width: 100%;
      padding: 12px;
      margin: 15px 0px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      box-sizing: border-box; /* evita que el padding se sume al ancho */
    }
    .recovery-box button {
      width: 100%;
      padding: 12px;
      background: #2d70f7;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 10px;
      font-size: 16px;
      font-weight: bold;
    }
    .recovery-box button:hover {
      background: #1d52c7;
    }
    .recovery-box a {
      display: block;
      margin-top: 20px;
      font-size: 14px;
      text-decoration: none;
      color: #2d70f7;
    }

    /* --- Sección de olas en la parte inferior --- */
    .wave-section {
      position: relative;
      width: 100%;
      height: 140px;
      margin-top: auto;
      background: transparent;
    }
    .wave-section img {
      position: absolute;
      width: 100%;
      left: 0;
      pointer-events: none;
      user-select: none;
      display: block;
    }
    .wave-section .ola2 {
      bottom: -90px;
      z-index: 2;
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
    .register a:hover {
      text-decoration: underline;
    }

  /* --- Responsive --- */
    @media (max-width: 780px) {
      .container {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: auto;
        padding: 40px;
      }
      .left h1 {
        font-size: 22px;
      }
      .left img {
        max-width: 200px;
      }
      .right {
        width: 100%;
      }
      .register-box {
        width: 68%;
      }
      .olas {
        margin: 0px 0px 120px 0px;
      }
      .header{
        margin: 0px 0px -120px 0px;
      }
    }
    @media (max-width: 780px) {
      
      .olas {margin: 0px 0px 120px 0px;}
    }
   
  </style>
</head>
<body>
  <div class="container">
    <div class="left">
      <img src="{{ asset('./imagenes/asustado.png') }}" alt="Mascota Varchate">
    </div>

    <div class="right">
      <img src="{{ asset('./imagenes/logo.png') }}" alt="Logo Varchate" class="logo">
      <div class="recovery-box">
        <h2>¿Olvidaste tu contraseña?</h2>
        <p>Ingresa tu correo electrónico y te enviaremos un enlace para restablecer tu contraseña.</p>

        <form wire:submit.prevent="sendResetLink">
          <input type="email" wire:model="email" placeholder="Correo electrónico" required>
          <button type="submit">Enviar</button>
        </form>

        @if (session('message'))
          <p style="color: green; margin-top: 10px;">{{ session('message') }}</p>
        @endif

        <p class="register">¿Recordaste tu contraseña?
          <a href="{{ route('login') }}">Iniciar sesión</a>
        </p>
      </div>
    </div>
  </div>

  <div class="wave-section">
    <img src="{{ asset('./imagenes/ola2.png') }}" alt="Ola inferior" class="ola2">
  </div>
</body>
</html>
</div>