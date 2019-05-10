@extends('layouts.app')


@section('content')


<h1 class="text-light text-center">This is the current information of this console</h1>

<table class="table table-striped table-dark">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Developer</th>
            <th scope="col">Generation</th>
            <th scope="col">Type</th>
            <th scope="col">Best selling game</th>
            <th scope="col">Units sold</th>
            <th scope="col">Lifespan</th>
            <th scope="col">Successor console</th>
            <th scope="col">Predecessor console</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td class="text-light">{{$console->name}}</td>
            <td class="text-light">{{$console->developer}}</td>
            <td class="text-light">{{$console->generation}}</td>
            <td class="text-light">{{$console->type}}</td>
            <td class="text-light">{{$console->best_selling_game}}</td>
            <td class="text-light">{{$console->units_sold}}</td>
            <td class="text-light">{{$console->lifespan}}</td>
            <td class="text-light">{{$console->successor_console}}</td>
            <td class="text-light">{{$console->predecessor_console}}</td>
          </tr>
        </tbody>
      </table>
    
    
@endsection