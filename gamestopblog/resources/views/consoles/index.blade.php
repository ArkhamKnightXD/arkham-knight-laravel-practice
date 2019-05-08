@extends('layouts.app')


@section('content')

<h1 class="text-light text-center">{{$title}}</h1>

<h2 class="text-light">Add a console</h2>

<br>

<a href="/consoles/create" class="btn btn-primary">Add a new console</a>

@endsection