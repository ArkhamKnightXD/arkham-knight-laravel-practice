@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <a href="/posts/create" class="btn btn-primary">Create a post</a>
                    <h3>Your blog post</h3>

                    <!--Este if funciona para que cuando entre un nuevo usuario con 0 posts no muestre esta tabla sino solo muestre el mensaje de que no hay posts -->
                    @if (count($posts) >0)
                    <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->body}}</td>
                                <td><a href="posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>

                                <td>{!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])  !!}

                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                </td>
                                </tr>
                            @endforeach
    
    
                        </table>  
                        
                            
                        @else
                            <p>You have no posts</p>    
                        
                    @endif
                    <!-- Aqui trabajaremos con una tabla que mostrara los posts -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
