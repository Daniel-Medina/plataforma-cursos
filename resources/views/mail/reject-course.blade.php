<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <h1>Curos rechazado</h1>
    El curso <strong>{{$course->title}}</strong> ha sido rechazado con éxito. 

    <h2>Motivos del rechazo</h2>

    {!! $course->observation->body !!}
</body>
</html>