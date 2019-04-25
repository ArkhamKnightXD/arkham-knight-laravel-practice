@extends('layouts.app')


@section('content')

<!-- jumbotron es una excelente clase para centrar texto y poner un fondo mas grisaceo esto es recomendado para escribir el mensaje de welcome de una pagina de inicio -->
<div class="jumbotron text-center">

        <h1>Welcome to gamestop</h1>
        <p>This is an application made in laravel from scratch</p>
        <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a><a class="btn btn-success btn-lg" href="/register" role="button">Register</a></p>
        

</div>

@endsection
       