<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Varchate - Autenticación' }}</title>
  @livewireStyles
</head>
<body>
  {{ $slot }}
  @livewireScripts
</body>
</html>
