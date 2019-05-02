@extends('layouts.app')

@section('content')

    
        <!-- Como esto no es un arreglo no es necesario el foreach -->
        
            
                        <a href="/posts" class="btn btn-primary">Go back</a>
                        <h1>{{$post->title}}</h1>
                            <!--Aqui me encargo de obtener la imagen de la ruta especificada -->
            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
            <br>
            <br>
                        <div>
                                <li>{!!$post->body!!}</li>
                        </div>
                        <hr>
                        
                        <!-- Esto nos da la fecha en que la entrada fue creada -->
                <small>Written on {{$post->created_at}} By {{$post->user->name}}</small>
                
                <hr>
                <!-- Este if sirve para evitar que se muestren los botones de editar y borrar sino esta logeado -->
                @if (!Auth::guest())

                <!-- Este if solo sirve para que solo el usuario que creo sus posts solo el mismo pueda editarlos y borrarlos y no otro usuario -->
                @if (Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a>
                
                
                <!--Aqui me encargo del delete  -->

                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])  !!}

                <!-- Al igual que con el edit que necesitaba un metodo put y para eso usamos el hiddent es lo mismo para el delete -->
                {{Form::hidden('_method', 'DELETE')}}


                 <!-- Este es el boton que manda la informacion e inicia el proceso   -->    
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!! Form::close() !!}
        
                    
                @endif
                
                
                @endif
                


@endsection