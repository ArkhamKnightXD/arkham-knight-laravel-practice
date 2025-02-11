<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token Esto sirve para mejorar la seguridad -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body background="/storage/cover_images/fondo1.jpg">
    <div id="app">
        
        @include('include.navbar')
        @include('include.message')
        <main class="py-4">
            <!--Aqui dentro ira ubicado el contenido de las paginas que heredan esta plantilla -->
            @yield('content')
        </main>
    </div>
    <!-- Codigo para poner el ckeditor -->

</body>
</html>
