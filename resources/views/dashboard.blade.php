<div>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Varchate</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background: #f5f6fa;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background: #2d70f7;
      color: white;
      text-align: center;
      padding: 15px 0;
    }

    .container {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .box {
      background: #fff;
      border-radius: 10px;
      padding: 40px 30px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 380px;
    }

    .box h1 {
      color: #2d70f7;
      margin-bottom: 15px;
    }

    .box p {
      color: #333;
      margin-bottom: 25px;
    }

    form button {
      background: #2d70f7;
      color: white;
      border: none;
      border-radius: 6px;
      padding: 10px 20px;
      cursor: pointer;
      font-size: 16px;
      transition: background 0.3s ease;
    }

    form button:hover {
      background: #1d52c7;
    }

    footer {
      text-align: center;
      padding: 10px;
      font-size: 14px;
      color: #666;
    }

    footer a {
      color: #2d70f7;
      text-decoration: none;
    }

    footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <header>
    <h2>Bienvenido al Panel - Varchate</h2>
  </header>

  <div class="container">
    <div class="box">
      <h1>¡Hola, {{ auth()->user()->nombre }}!</h1>
      <p>Has iniciado sesión correctamente.</p>

      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Cerrar sesión</button>
      </form>
    </div>
  </div>

  <footer>
    <p>VarChatE &copy; {{ date('Y') }} — <a href="#">Soporte</a></p>
  </footer>
</body>
</html>
</div>
