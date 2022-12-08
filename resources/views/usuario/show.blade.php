@include('bares')
<!DOCTYPE html>

<htm lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>DETALLE DE USUARIOS</h1>
    <hr>
    <b>NOMBRE: {{$usuario->nombre}}</b><br>
   <b>EDAD: {{$usuario->edad}}</b><br>
   <b>GENERO: {{$usuario->genero}}</b><br>

   @if($usuario -> activo ==1)
    <b style="color: #FF28B4;">Activo</b>
    @else
    <b style="color: #f00;">Inactivo</b>
    @endif   



    @include('bares')
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>DETALLE DE USUARIOS</h1>
    <hr>
    <b>NOMBRE: {{$usuario->nombre}}</b><br>
   <b>EMAIL: {{$usuario->email}}</b><br>
   <b>ROL: {{$usuario->rol}}</b><br>

   @if($usuario->activo ==1)
    <b style="color: #FF28B4;">Activo</b>
    @else
    <b style="color: #f00;">Inactivo</b>
    @endif   



</body>
</html>