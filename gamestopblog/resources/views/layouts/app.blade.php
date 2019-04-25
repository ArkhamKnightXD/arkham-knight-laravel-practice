<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--De esta forma agrego un archivo css que se encuentra en la carpeta public -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Gamestopblog</title>

    </head>
    <body>

        <!--De esta forna incluyo una pagina extra que en este caso es navbar -->
        @include('include.navbar')

        <div class="container">

                @yield('content')

        </div>
        
    </body>
</html>
