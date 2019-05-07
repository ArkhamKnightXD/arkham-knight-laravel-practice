@extends('layouts.app')


@section('content')

<h1 class="text-light text-center">Create a new console</h1>
    
{!! Form::open(['action'=>'ConsolesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

<div class="form-group">
    {{Form::label('nombre','Name', ['class' =>'text-light'])}}
    {{Form::text('nombre','', ['class' =>'form-control', 'placeholder'=>'Name of the console'])}}
    
    <br>
    

    {{Form::label('generation','Generation', ['class' =>'text-light'])}}
    {{Form::text('generation','', ['class' =>'form-control', 'placeholder'=>'Generation'])}}

    <br>
    

    {{Form::label('developer','Developer', ['class' =>'text-light'])}}
    {{Form::text('developer', '', ['class' => 'form-control', 'placeholder'=>'Developer'])}}

    <br>

    {{Form::label('type','Type of console', ['class' =>'text-light'])}}
    {{Form::text('type', '', ['class' => 'form-control', 'placeholder'=>'Type of console'])}}

    <br>

    {{Form::label('units_sold','Units sold', ['class' =>'text-light'])}}
    {{Form::number('units_sold', '', ['class' => 'form-control', 'placeholder'=>'Units sold'])}}

    <br>

    {{Form::label('best_selling_game','Best selling game', ['class' =>'text-light'])}}
    {{Form::number('best_selling_game', '', ['class' => 'form-control', 'placeholder'=>'Best sell game units'])}}

    <br>
    
    {{Form::label('release_date','Release date', ['class' =>'text-light'])}}
    {{Form::text('release_date', '', ['class' => 'form-control', 'placeholder'=>'Release date of the console'])}}

    <br>
    {{Form::label('discontinued_year','Discontinued year', ['class' =>'text-light'])}}
    {{Form::text('discontinued_year', '', ['class' => 'form-control', 'placeholder'=>'Discontinued year of the console'])}}

    <br>
    {{Form::label('lifespan','Lifespan', ['class' =>'text-light'])}}
    {{Form::text('lifespan', '', ['class' => 'form-control ', 'placeholder'=>'Lifespan of the console'])}}

    
    <br>
    {{Form::label('successor_console','Successor console', ['class' =>'text-light'])}}
    {{Form::text('successor_console', '', ['class' => 'form-control ', 'placeholder'=>'Successor of this console'])}}

    
    <br>
    {{Form::label('predecessor_console','Predecessor console', ['class' =>'text-light'])}}
    {{Form::text('predecessor_console', '', ['class' => 'form-control ', 'placeholder'=>'Predecessor of this console'])}}


</div>


{{Form::submit('Submit',['class' => 'btn btn-primary'])}}


{!! Form::close() !!}



@endsection