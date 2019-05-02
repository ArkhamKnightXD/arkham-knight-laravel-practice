<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Esta libreria es necesaria para poder implementar la clase que puede eliminar imagenes en el destroy
use Illuminate\Support\Facades\Storage;

// de esta forma hacemos llamado del modelo Post para trabajar con el
use App\Post;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Constructor obtenido del home y copiado aqui
     public function __construct()
     {
         // si queremos tener algunas excepcion es decir queremos que algunas paginas se muestren aunque no estemos
         // logeado usamos el arreglo except y dentro de este le especificamos las pagnas que queremos que se muestren 
         //sin estar logueados
         $this->middleware('auth', ['except' =>['index','show']]);
     }
 

     // si queremos que un controlador venga de una vez con las funciones basicas lo que debemos hacer es especificar 
     //la palabra --resource al final del comando de crear el controlador

     // index es la funcion que se debe encargar de llamar el inicio de pagina ademas de que aqui le mandaremos los datos 
     //iniciales con lo que la pagina trabajara para mostrar datos
    public function index()
    {
        // El Post::all(); Nos consigue todo los datos que tiene el modelo post de la tabla en la base de datos
      // $posts = Post::all();


      // si queremos que solo muestre menos resultado usamos esto es diferente de la paginacion ya que solo mostrara un 
      //dato y no habra otra pagina para mostrar el otro
      //$posts = Post::orderBy('title', 'desc')->take(1)->get();


      // si queremos buscar una entrada especifica ya sea por nombre o por numeracion usamos el where
     // $posts = Post::where('title', 'Post two')->get();


     //De esta forma hacemos la paginacion solo mostrara los primeros 10 en la pagina y cuando llegue al valor 11 nos dara 
     //la opcion de pasar hacia otra pagina con la funcion link() que especificamos en el index
     $posts = Post::orderBy('created_at', 'desc')->paginate(10);


        //el orderby lo que hace es ordernar las entradas por titulo y en orden ascendente alfabeticamente para 
        // que las ordene de forma descendiente seria desc
      //$posts = Post::orderBy('title', 'desc')->get();

     
      // Aqui retornamos la vista y le mandamos los datos de $posts
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
        //Aqui vienen los datos enviados desde el formulario de la pagina create.blade.php 


        //de esta forma se validan los datos en laravel
        $this->validate ($request,[
            'title' => 'required',
            'body' => 'required',
            // agregando como se validara la imagen en primer lugar queremos que sea una imagen que sea lo unico que 
            //el usuario pueda subir, ahora la parte que dice que nullable quiere decir que la imagen es opcional 
            //osea que el usuario no siempre tiene que subir una imagen y el max es para el tamano maximo que puede 
            //tener la imagen que para apache el maximo tamano es de 2000 que es 2 mb
            'image_cover'=> 'image|nullable|max:1995'
        ]);


        // aqui trabajaremos con la imagen que se subira
        if ($request->hasFile('cover_image')) {
            
            // si el usuario subio imagen la obtenemos asi y esto nos devolvera el nombre exacto de la imagen con su 
            //respectiva extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();



            // pero conseguirlo solamente de la forma de arriba no es tan eficiente ya si 2 usuarios suben una imagen 
            //con los mismos nombres esto causara un error para evitar eso se usara la forma de abajo que esta dividido 
            //en varias partes

            // conseguir solo el nombre de la imagen, esta funcion nos devolvera solo el nombre de la imagen sin 
            //la extension
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);



            // Ahora para conseguir solamente la extension utilizamos este codigo

            $extension = $request->file('cover_image')->getClientOriginalExtension();



            // aqui unimos el nombre con el tiempo y la extension y este sera el nombre del archivo que se almacenara 
            //el cual sera unico e irrepetible y por lo tanto dos personas no podran subir una imagen con el mismo nombre
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;



            // aqui finalmente la mandamos a guardar a nuestro folder que esta en storage/app/public y ahi se almacenara 
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else {

            // si no tiene imagen se mostrara una por defecto que dira no imagen
            $fileNameToStore = 'noimage.jpg';
        }


        // y ahora utilizamos los datos mandados para crear un nuevo post
        $post = new Post;


        // de esta forma obtenemos los datos ingresados mediante el request y se lo asignamos a los valores que iran
        // directo al nuevo post y con save() agregamos ese nuevo post a la base de datos
        $post->title = $request->input('title');
        $post->body = $request->input('body');

        
        // a diferencia de los demas campos este no usara request ya que este dato no se obtiene del formulario de la 
        //vista sino de la autenticacion
        $post->user_id = auth()->user()->id;



        // aqui almacenamos el nombre de la imagen en la base de datos
        $post->cover_image = $fileNameToStore;
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
    // El id que se consigue en este show se obtiene desde la vista cuando hacemos click sobre un url que ya de ante manos
    // habiamos hecho para mandar el id del articulo que estamos trabajando
    public function show($id)
    {
        // con esta linea de codigo obtenemos el articulo deseado por el id que se consiguio, a diferencia de index esta 
        //variable no es un arreglo ya que solo esta almacenando un solo dato
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
        // Aqui se trabajara con lo que es el edit de la aplicacion y igual que el show a esta funcion se le manda un id, 
        //por lo tanto siempre se debe de emperzar con un find();
        $post = Post::find($id);


        // con este codigo primero comprobamos que el usuario que va a editar es el mismo que creo el post sino lo 
        //devolveremos para la ventana posts
        if (auth()->user()->id !== $post->user_id) {

            return redirect('/posts')->with('error', 'Unauthorized user');
        }

        return view('posts/edit')->with('post', $post);
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
        
        $this->validate ($request,[
            'title' => 'required',
            'body' => 'required'
        ]);


        // para trabajar con la imagen en edit se hace lo mismo que con store lo unico aqui es que se borra el else
        if ($request->hasFile('cover_image')) {
            
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
         
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

         
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

         
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }




        // Los datos se obtienen de la misma forma que en store la unica diferencia es que en vez de crear un nuevo post, 
        //debemos de buscarlo con el id mandado a la funcion desde el edit, para asi trabajar con los datos obtenidos

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');

        // aqui trabajamos con la imagen comprobamos de nuevo si subio una imagen de nuevo asi sabremos si edito o no la 
        //imagen porque si no es asi solamente dejamos la imagen antigua como estaba y para esto es que funciona el if aqui
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }

        $post->save();


        return redirect('/posts')->with('success','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Esta es la funcion que se encarga del borrado y es la mas sencilla es simplemente buscar el post mediante el id
        // y luego hacer delete
        $post = Post::find($id);

        // usando la misma funcion del edit para que nadie pueda borrar los posts salvo el propio usuario
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized user');
        }

        // aqui trabajaremos sobre el metodo que se encargara de borrar la imagen

        if ($post->cover_image != 'noimage.jpg') {
            // Para borrar la imagen usaremos la clase storage que especificamos en el use arriba esta funcion se encarga
            // de borrar tanto el post de la base de dato como tambien la foto de la carpeta public
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        //Este es el metodo final que se encarga de borrar, parecido al save() solo que hace lo contrario
        $post->delete();

        return redirect('/posts')->with('Delete', 'Post deleted');
    }
}
