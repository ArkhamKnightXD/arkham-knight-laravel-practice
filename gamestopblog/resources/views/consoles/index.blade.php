@extends('layouts.app')


@section('content')

<h1 class="text-light text-center">Welcome to the console list</h1>

<h2 class="text-light" >Add a console</h2>

<br>

<a href="/consoles/create" class="btn btn-primary btn-lg">Add a new console</a>

@if (count($consoles) >0)

    @foreach ($consoles as $console)


    <h3 class="text-center"><a href="/consoles/{{$console->id}}">{{$console->name}}</a></h3>
        
        
    @endforeach
    
@endif

@endsection