<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// el archivo web es el archivo general donde debemos de trabajar con las routes pues los otros archivos ubicados en esta carpeta son para ocasiones mas especificas



// de esta forma trabajamos las rutas con los controladores si un controlador tiene una funcion accedemos a ella mediante @
Route::get('/', 'PagesController@index' );

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');


// si tenemos un controlador con muchas funciones que fue creado con el --resource al final es recomendable escribir su ruta de esta forma y asi esta ruta agregara todas las funciones del controlador sin tener que agregar las rutas una por una
Route::resource('posts', 'PostsController');






/* esta demas especificar el .blade.php solo la carpeta en que se encuentra la pagina seguido de un punto mas el nombre de la pagina
Route::get('/about', function () {
    return view('pages.about');
});*/



/*ejemplo de ruta dinamica esta es una ruta a la que se le podria mandar un id y nombre y esta lo mostrara en el navegador

Route::get('/users/{id}/{name}', function ($id, $name) {
    return 'This is user '.$name.' with and id of '.$id;
});*/


/* ejemplo de ruta  mostrando texto normal con html tags<>

Route::get('/hello', function () {
    return '<h1>Hello world</h1>';
});*/