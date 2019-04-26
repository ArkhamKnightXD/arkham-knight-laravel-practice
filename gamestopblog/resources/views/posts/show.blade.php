@extends('layouts.app')

@section('content')

        <br>
        <br>
        <br>
    
        <!-- Como esto no es un arreglo no es necesario el foreach -->
        
            
                        <a href="/posts" class="btn btn-primary">Go back</a>
                        <h1>{{$post->title}}</h1>
                        <div>
                                <li>{{$post->body}}</li>
                        </div>
                        <hr>
                        
                        <!-- Esto nos da la fecha en que la entrada fue creada -->
                <small>Written on {{$post->created_at}}</small>
                
        


@endsection