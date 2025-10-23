<div>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background: #fff;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: center;
      position: relative;
    }

    .main {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 300px;
      padding: 20px;
      z-index: 2;
    }

    .left {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 60px;
    }

    .logo {
      width: 220px;
      max-width: 100%;
    }

    .card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 40px 35px;
      text-align: center;
      width: 420px;
      z-index: 2;
      max-width: 450px;
    }

    .icon-check {
      font-size: 48px;
      color: #4caf50;
      margin-bottom: 12px;
    }

    .card h2 {
      font-size: 22px;
      margin-bottom: 8px;
      color: #333;
    }

    .card p {
      font-size: 16px;
      color: #666;
      margin-bottom: 20px;
    }

    .btn {
      background: #2a7bff;
      color: white;
      padding: 12px 24px;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      font-size: 16px;
      transition: background 0.3s;
    }

    .btn:hover {
      background: #1a5fcc;
    }

    .cat {
      width: 300px;
      height: auto;
      max-width: 100%;
    }

    .footer {
      position: relative;
      width: 100%;
      height: 280px;
      overflow: hidden;
      display: flex;
      align-items: flex-end;
      justify-content: center;
    }

    .footer img {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      height: auto;
    }

    .ola2 {
      z-index: 0;
    }

    .wave-section {
      position: relative;
      width: 100%;
      height: 270px;
      overflow: hidden;
    }

    .wave-section img {
      position: relative;
      bottom: 0;
      width: 100%;
      left: 0;
      height: auto;
      z-index: 0;
    }

    @media (max-width: 780px) {
      .main {
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 40px;
        padding: 75px;
      }

      .logo {
        width: 160px;
      }

      .card {
        width: 130%;
      }

      .cat {
        max-width: 200px;
        order: -1;
      }

      .left {
        gap: 30px;
      }
    }
 </style>
  <div class="main">
    <div class="left">
      <img src="{{ asset('./imagenes/logo.png') }}" alt="Logo Varchate" class="logo">
      <div class="card">
        <div class="icon-check">✔</div>
        <h2>¡Contraseña actualizada!</h2>
        <p>Tu contraseña se cambió con éxito. Ya puedes iniciar sesión.</p>
        <!-- <a href="{{ route('login') }}">
          <button class="btn">Iniciar sesión</button>
        </a> -->
      </div>
    </div>

    <img src="{{ asset('./imagenes/alegre 1.png') }}" alt="Gato feliz" class="cat">
  </div>

  <div class="wave-section">
    <div class="footer">
      <img src="{{ asset('./imagenes/ola2.png') }}" alt="Ola inferior" class="ola2">
    </div>
  </div>
<script>
  // Esperar 3 segundos y redirigir al dashboard
  setTimeout(() => {
    window.location.href = "{{ route('dashboard') }}";
  }, 3000);
</script>

</div>

