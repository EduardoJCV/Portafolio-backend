
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <div class="form">
        <button>
            <a href="{{ route('projects.create') }}"> Nuevo Projecto </a>
        </button>
    </div>


    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">title</th>
            <th scope="col">img</th>
            <th scope="col">github</th>
            <th scope="col">url</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($projects as $project)
                <tr>
                    <th scope="row"> {{ $project->id }} </th>
                    <td> {{ $project->title }} </td>
                    <td> {{ $project->img }} </td>
                    <td> {{ $project->github }} </td>
                    <td> {{ $project->url }} </td>
                    <td>
                        <a href=" {{ route('projects.edit', $project->id) }} ">Editar</a>
                    </td>
                    <td>
                        <a href=" {{ route('projects.destroy', $project->id) }} ">Eliminar</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>



</section>
@endsection