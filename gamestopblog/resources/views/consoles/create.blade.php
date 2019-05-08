@extends('layouts.app')


@section('content')

<h1 class="text-light text-center">Register a new console</h1>
    
{!! Form::open(['action'=>'ConsolesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

<div class="row">

    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">

        <div class="form-group">
            {{Form::label('name','Name', ['class' =>'text-light'])}}
            {{Form::text('name','', ['class' =>'form-control', 'placeholder'=>'Name of the console'])}}
        </div>
    </div>
    

    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">

        <div class="form-group">
            {{Form::label('generation','Generation', ['class' =>'text-light'])}}
            {{Form::text('generation','', ['class' =>'form-control', 'placeholder'=>'Generation'])}}

        </div>

    </div>


    
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">

            <div class="form-group">
                    {{Form::label('developer','Developer', ['class' =>'text-light'])}}
                    {{Form::text('developer', '', ['class' => 'form-control', 'placeholder'=>'Developer'])}}
                            
            </div>
    
    </div>


        
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">

            <div class="form-group">
                    {{Form::label('type','Type of console', ['class' =>'text-light'])}}
                    {{Form::text('type', '', ['class' => 'form-control', 'placeholder'=>'Type of console'])}}
                            
            </div>
    
    </div>



        
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">

            <div class="form-group">
                    {{Form::label('units_sold','Units sold', ['class' =>'text-light'])}}
                    {{Form::number('units_sold', '', ['class' => 'form-control', 'placeholder'=>'Units sold'])}}
                                
            </div>
    
    </div>



        
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">

            <div class="form-group">
                
                {{Form::label('best_selling_game','Best selling game', ['class' =>'text-light'])}}
                {{Form::text('best_selling_game', '', ['class' => 'form-control', 'placeholder'=>'Best sell game units'])}}
                
            </div>
    
    </div>


        
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">

            <div class="form-group">
                
                {{Form::label('release_date','Release date', ['class' =>'text-light'])}}
                {{Form::text('release_date', '', ['class' => 'form-control', 'placeholder'=>'Release date of the console'])}}
                            
            </div>
    
    </div>


        
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">

            <div class="form-group">
                    {{Form::label('discontinued_year','Discontinued year', ['class' =>'text-light'])}}
                    {{Form::text('discontinued_year', '', ['class' => 'form-control', 'placeholder'=>'Discontinued year of the console'])}}
                                
            </div>
    
    </div>
    

    
                
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">

            <div class="form-group">
                    {{Form::label('lifespan','Lifespan', ['class' =>'text-light'])}}
                    {{Form::text('lifespan', '', ['class' => 'form-control ', 'placeholder'=>'Lifespan of the console'])}}
                                
            </div>
    
    </div>
    


                
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">

            <div class="form-group">
                    {{Form::label('successor_console','Successor console', ['class' =>'text-light'])}}
                    {{Form::text('successor_console', '', ['class' => 'form-control ', 'placeholder'=>'Successor of this console'])}}
                                
            </div>
    
     </div>
    


                
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">

            <div class="form-group">
                            
                {{Form::label('predecessor_console','Predecessor console', ['class' =>'text-light'])}}
                {{Form::text('predecessor_console', '', ['class' => 'form-control ', 'placeholder'=>'Predecessor of this console'])}}
                            
            </div>
    
    </div>
    

        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                <div class="form-group">
                     {{Form::submit('Submit',['class' => 'btn btn-primary'])}}                    
                </div>
        
        </div>
        
    
    






    





</div>






{!! Form::close() !!}



@endsection