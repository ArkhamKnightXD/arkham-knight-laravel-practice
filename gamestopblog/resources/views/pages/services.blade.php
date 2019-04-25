@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>


    <!-- De esta forma se hace un if en laravel -->
    @if (count($services)>0)

        <ul class="list-group">
            <!-- De esta forma se hace un foreach en laravel esto es basicamente ir iterando una variable hasta mostrar todos sus datos -->
            @foreach ($services as $service)
                <li class="list-group-item">{{$service}}</li> 
            @endforeach
<!--lo que es list-group y list-group-item son estilos usados por bootstrap para darle orden y estilo a los que son las listas con sus repectivos items -->

        </ul>
        
    @endif

@endsection
        