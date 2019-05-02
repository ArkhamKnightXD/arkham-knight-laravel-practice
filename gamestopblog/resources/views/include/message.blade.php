<!-- Creando la pagina que se encargara de manejar los errores y de devolver mensajes de errores-->


<!-- Aqui hago un contador para contar los errores y que al final me muestre todos los errores que hay mediante el foreach
@if (count($errors) >0)
    
    @foreach ($errors->all() as $error)

        <div class="alert alert-danger">
            {{$error}}
        </div>


        
    @endforeach

@endif

<!-- Manejando errores de sesion -->

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