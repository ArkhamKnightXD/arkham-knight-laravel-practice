<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Console;

class ConsolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'This is the consoles index page';

        return view('consoles.index')->with("title",$title);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consoles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $console = new Console; 

       $console->name = $request->input('name');
       $console->generation = $request->input('generation');
       $console->developer = $request->input('developer');
       $console->units_sold = $request->input('units_sold');
       $console->best_selling_game = $request->input('best_selling_game');
       $console->release_date = $request->input('release_date');
       $console->lifespan = $request->input('lifespan');
       $console->discontinued_year = $request->input('discontinued_year');
       $console->type = $request->input('type');
       $console->successor_console = $request->input('successor_console');
       $console->predecessor_console = $request->input('predecessor_console');
       $console->save();

       return redirect('/consoles')->with('success','The console has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
