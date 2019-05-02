<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// aqui especifico que estare usando el modelo de usuario

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     // Esta funcion de aqui que es un constructor es importantisima esta es la que se encarga de que alguien que 
     //no este logueado pueda acceder a las demas paginas asi que esta funcion hay que incluirla en los controladores 
     //que vayas a usar para poder implementar sus funcionalidades.
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // De esta forma conseguimos el id del user que esta loggeado
        $user_id = auth()->user()->id;

        // aqui buscamos el usuario al que le pertenece el id
        $user = User::find($user_id);

        // y retornamos la vista con los posts hechos por el usuario ya que se especifico esta relacion en ambos modelos
        return view('home')->with('posts', $user->posts);
    }
}
