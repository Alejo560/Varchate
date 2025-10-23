<div><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verificación de correo - Varchate</title>
  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: #f9f9f9;
      font-family: Arial, sans-serif;
      color: #333;
    }
    .card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      text-align: center;
      padding: 40px;
      max-width: 400px;
    }
    .card h2 {
      color: #2d70f7;
      margin-bottom: 10px;
    }
    .card p {
      margin-bottom: 20px;
    }
    .btn {
      display: inline-block;
      background: #2d70f7;
      color: white;
      padding: 10px 20px;
      border-radius: 6px;
      border: none;
      cursor: pointer;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="card">
    <h2>Verifica tu correo electrónico</h2>
    <p>Te enviamos un enlace a <strong>{{ auth()->user()->email }}</strong>.</p>
    <p>Por favor revisa tu bandeja de entrada (o carpeta de spam).</p>

    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="btn">Cerrar sesión</button>
    </form>
  </div>
</body>
</html>
</div>