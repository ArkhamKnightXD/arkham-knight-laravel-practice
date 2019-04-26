@extends('layouts.app')

@section('content')


<br>

<br> 

<br>

<br>

<h1>post</h1>

@if (count($posts) > 0)
    
    @foreach ($posts as $post)

    <div class="jumbotron">
        <!-- con este href mandamos el id a la ruta y de esta forma tambien lo mandamos al show para poder trabajar con este articulo-->
    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
    <small>Written on {{$post->created_at}}</small>
    </div>
        
    @endforeach

    <!--De esta forma llamamos a la paginacion especificada en el controlador y aqui se agregaran los botones que nos permitiran ir de la pagina siguiente a la anterior para ver los resultados -->

    {{$posts->links()}}

@else
    <p>No post</p>
@endif

@endsection