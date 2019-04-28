<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// de esta forma hacemos llamado del modelo para trabajar con el
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     // si queremos que un controlador venga de una vez con las funciones basicas lo que debemos hacer es especificar la palabra --resource al final del comando de crear el controlador

     // index es la funcion que se debe encargar de llamar el inicio de pagina ademas de que aqui le mandaremos los datos iniciales con lo que la pagina trabajara para mostrar datos
    public function index()
    {
        // El Post::all(); Nos consigue todo los datos que tiene el modelo post de la tabla en la base de datos
      // $posts = Post::all();

      // si queremos que solo muestre menos resultado usamos esto es diferente de la paginacion ya que solo mostrara un dato y no habra otra pagina para mostrar el otro
      //$posts = Post::orderBy('title', 'desc')->take(1)->get();

      // si queremos buscar una entrada especifica ya sea por nombre o por numeracion usamos el where
     // $posts = Post::where('title', 'Post two')->get();


     //De esta forma se hace la paginacion 


     $posts = Post::orderBy('created_at', 'desc')->paginate(10);

        //el orderby lo que hace es ordernar las entradas por titulo y en orden ascendente alfabeticamente para descendiente seria desc
      //$posts = Post::orderBy('title', 'desc')->get();

        
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Aqui vienen los datos enviados desde el formulario del create 


        //de esta forma se validan los datos en laravel
        $this->validate ($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        // y ahora utilizamos los datos mandados para crear un nuevo post
        $post = new Post;


        // de esta forma obtenemos los datos ingresados mediante el request y se lo asignamos a los valores que iran directo al nuevo post y con save() agregamos ese nuevo post a la base de datos
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        // Al final hacemos un redireccionamiento con un mensaje de que se creo el nuevo post

        return redirect('/posts')->with('success','Post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // El id que se consigue en este show se obtiene desde la vista cuando hacemos click sobre un url que ya de ante manos habiamos hecho para mandar el id del articulo que estamos trabajando
    public function show($id)
    {
        // con esta linea de codigo obtenemos el articulo deseado por el id que se consiguio, a diferencia de index esta variable no es un arreglo ya que solo esta almacenando un solo dato
       $post =  Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
