@extends('layouts.app')

@section('content')
<!-- En el edit se usa basicamente lo mismo que el create con algunas variaciones -->

    <h1 class="text-light">Edit a post</h1>

    <!--Aqui se inicia el formulario igual que en el create, pero con la diferencia de que la informacion se redigira 
        al metodo update y que tambien se le manda lo que es el id -->
    {!! Form::open(['action'=>['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <!-- Aqui trabajamos igual que en el create con la diferencia de que agregamos los valores ya asignados 
            en el create con el $post->title o el body  -->
        <div class="form-group">
            {{Form::label('title','Title', ['class'=>'text-light'])}}
            {{Form::text('title',$post->title, ['class' =>'form-control', 'placeholder'=>'Title'])}}
            
            {{Form::label('body','Body', ['class'=>'text-light'])}}
            <!--Aqui hacemos un text area al que le implementamos el ckeditor como vemos en la parte de id -->
            {{Form::textarea('body',$post->body, ['id'=>'summary-ckeditor','class' =>'form-control', 'placeholder'=>'Body text'])}}

        </div>

        <!--La necesidad de hacer de agregar el form::hidden es debido a que la ruta update necesita recibir
             un metodo put y arriba solo le mandamo uno post y con esto solucionamos ese problema -->
        {{ Form::hidden('_method', 'PUT') }}

        
        <!--Trabajando con imagenes , para usar esto en el form::open debemos agregar un enctype -->
        <div class="form-group text-light">
                {{Form::file('cover_image')}}
    
            </div>
        {{Form::submit('Submit',['class' => 'btn btn-primary'])}}


    {!! Form::close() !!}
    
@endsection