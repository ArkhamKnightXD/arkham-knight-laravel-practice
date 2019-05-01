@extends('layouts.app')

@section('content')

    
        <!-- Como esto no es un arreglo no es necesario el foreach -->
        
            
                        <a href="/posts" class="btn btn-primary">Go back</a>
                        <h1>{{$post->title}}</h1>
                        <div>
                                <li>{!!$post->body!!}</li>
                        </div>
                        <hr>
                        
                        <!-- Esto nos da la fecha en que la entrada fue creada -->
                <small>Written on {{$post->created_at}}</small>
                
                <hr>
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                
                
                <!--Aqui me encargo del delete  -->

                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])  !!}

                <!-- Al igual que con el edit que necesitaba un metodo put y para eso usamos el hiddent es lo mismo para el delete -->
                {{Form::hidden('_method', 'DELETE')}}


                 <!-- Este es el boton que manda la informacion e inicia el proceso   -->    
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!! Form::close() !!}
        


@endsection