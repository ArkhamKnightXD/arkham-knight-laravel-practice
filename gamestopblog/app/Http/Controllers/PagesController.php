<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    // de esta forma podemos retornar una vista desde el controlador
    public function index()
    {

        $title = 'Welcome to laravel!';

        // dos formas de mandar parametros a una pagina el segundo metodo es el mas eficiente pues se puede mandar varias variables en el primero solo se puede mandar 1
       // return view('pages.index', compact('title'));
        return view('pages.index')->with('title',$title);
    }

    public function about()
    {
        $title = 'About us';
        return view('pages.about')->with('title',$title);
    }

    public function services()
    {
        // de esta forma le mandamos datos con un arreglo de key value
        $data = array('title' =>'services',
        'services' =>['Web desing','Programming','Seo']
    
    );

        return view('pages.services')->with($data);
    }
}
