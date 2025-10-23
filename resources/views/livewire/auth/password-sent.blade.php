<div>

  <style>
    body {
      min-height: 100vh;
      margin: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: #f5f6fa;
      font-family: Arial, sans-serif;
    }
    header .logo {
      width: 250px;
      margin-bottom: 20px;
      display: block;
      margin-left: auto;
      margin-right: auto;
    }
    .box {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 420px;
      padding: 40px 30px;
      margin-bottom: 12px;
    }
    .icon-check {
      font-size: 60px;
      color: #4caf50;
      margin-bottom: 16px;
    }
    .box h2 {
      margin: 0 0 12px;
    }
    .box p {
      font-size: 15px;
      color: #444;
      line-height: 1.5;
    }
    footer {
      text-align: center;
      margin-top: 8px;
    }
    footer p {
      font-size: 14px;
      color: #333;
    }
    footer a {
      color: #0066ff;
      text-decoration: none;
    }
    footer a:hover {
      text-decoration: underline;
    }
    .wave-section {
      width: 100vw;
      position: fixed;
      bottom: 0;
      left: 0;
      z-index: -1;
      text-align: center;
    }
    .wave-section img {
      width: 100vw;
      max-width: 100%;
      display: block;
    }
    @media (max-width: 780px) {
      .box { width: 90%; padding: 25px; }
    }
  </style>

  <div class="container">
    <header>
      <img src="{{ asset('imagenes/logo2.png') }}" alt="varchate" class="logo">
    </header>
    <main class="box">
      <div class="icon-check">✔</div>
      <h2>Enlace de confirmación</h2>
      <p>
        Te enviamos un enlace a tu correo electrónico para restablecer tu contraseña.
        Revisa tu bandeja de entrada o la carpeta de spam.
      </p>
    </main>
    <footer>
      <p>¿No lo recibiste? <a href="#">Reenviar enlace</a></p>
    </footer>
  </div>
  <div class="wave-section">
    <img src="{{ asset('imagenes/ola2.png') }}" alt="Ola inferior" class="ola2">
  </div>

</div>