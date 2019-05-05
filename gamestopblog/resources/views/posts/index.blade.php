@extends('layouts.app')

@section('content')


<h1 class="text-light">post</h1>

@if (count($posts) > 0)
    
    @foreach ($posts as $post)

    <div class="jumbotron">

        <!--Aqui me encargo de mostrar las imagenes al lado de su post para eso creo un class row y dentro dos 
            class col a la cual le doy a cada una un tamaño diferente -->
        <div class="row">

            
            <div class="col-md-4 col-sm-4">
                <!--Aqui me encargo de obtener la imagen de la ruta especificada -->
            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
            </div>

            <div class="col-md-8 col-sm-8">
                   <!-- con este href mandamos el id a la ruta y de esta forma tambien lo mandamos al show para poder 
                    trabajar con este articulo-->
    <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
    <!--Con $post->user->name obtengo el nombre del usuario gracias a la relacion que especifique anteriormente asi 
        que basicamente este es un ejemplo de como mostrar datos en la vista mediante relaciones -->
    <small>Written on {{$post->created_at}} By {{$post->user->name}}</small>
                </div>

        </div>
     
    </div>
        
    @endforeach

    <!--De esta forma llamamos a la paginacion especificada en el controlador y aqui se agregaran los botones que 
        nos permitiran ir de la pagina siguiente a la anterior para ver los resultados -->

    {{$posts->links()}}

@else
    <p>No post</p>
@endif

@endsection