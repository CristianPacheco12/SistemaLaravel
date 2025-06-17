<!-- resources/views/emails/reservacion.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservación</title>
</head>
<body>
    <h1>{{ $asunto }}</h1>
    <p>{{ $cuerpo }}</p>
    <p>Nombre de Usuario: {{ $nombreUsuario }}</p>
</body>
</html>
