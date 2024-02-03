<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    h1{
        color: darkgreen;
        text-align: center;
    }
</style>
<body>
    <h1>Lista de Cursos</h1>
    <table class="table">
        <thead>
            <th>Título</th>
            <th>Descripción</th>
            <th>Duración</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Instructor</th>
        </thead>
        <tbody>
            @foreach ($lista as $list)
            <td>{{$list->titulo}}</td>
            <td>{{$list->descripcion}}</td>
            <td>{{$list->duracion}}</td>
            <td>{{$list->precio}}</td>
            <td>{{$list->categoria}}</td>
            <td>{{$list->instructor}}</td>
            @endforeach
        </tbody>
    </table>
</body>
</html>