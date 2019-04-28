<!-- Creando la pagina que se encargara de los errores y de devolver mensajes de errores-->

@if (count($errors) >0)
    
    @foreach ($errors->all() as $error)

        <div class="alert alert-danger">
            {{$error}}
        </div>


        
    @endforeach

@endif

<!--Manejando errores de sesion -->

@if (session('success'))

    <div class="alert alert-success">
        {{session('success')}}
    </div>
    
@endif

@if (session('error'))

    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    
@endif