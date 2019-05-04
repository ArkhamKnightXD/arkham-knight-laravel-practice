@extends('layouts.app')

@section('content')


    <h1>Create a post</h1>

    <!--Esta es la forma en que se inicia un formulario en con laravel collective, aqui le especificamos a que funcion
         mandaremos los datos obtenidos aqui que en este caso es para la funcion store y esto sera almacenado en el 
         array action, tambien especificamos que mandaremos la info mediante el metodo post -->
    {!! Form::open(['action'=>'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <!-- Asi se especifican los elementos del formulario basado en laravelcollective -->
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title','', ['class' =>'form-control', 'placeholder'=>'Title'])}}
            
            {{Form::label('body','Body')}}
            <!--Aqui hacemos un text area al que le implementamos el ckeditor como vemos en la parte de id -->
            {{Form::textarea('body','', ['id'=>'summary-ckeditor','class' =>'form-control', 'placeholder'=>'Body text'])}}

        </div>

        <!--Trabajando con imagenes , para usar esto en el form::open debemos agregar un enctype -->
        <div class="form-group">
            {{Form::file('cover_image')}}

        </div>

        <!-- Agrego el boton que mandara los datos al store -->
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}


    {!! Form::close() !!}
    
@endsection