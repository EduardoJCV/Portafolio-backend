
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <div class="form">
        <button>
            <a href="{{ route('skills-list.create') }}"> Nuevo Skill lists </a>
        </button>
        <button>
            <a href="{{ route('skill.create') }}"> Nuevo Skill </a>
        </button>
    </div>


    <table class="table table-dark table-striped">
        <h1>SKILLS LISTS</h1>
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">name</th>
            <th scope="col">icon</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($skillslist as $skillL)
                <tr>
                    <th scope="row"> {{ $skillL->id }} </th>
                    <td> {{ $skillL->name }} </td>
                    <td> {{ $skillL->icon }} </td>
                    <td>
                        <a href=" {{ route('skills-list.edit', $skillL->id) }} ">Editar</a>
                    </td>
                    <td>
                        <a href=" {{ route('skills-list.destroy', $skillL->id) }} ">Eliminar</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>

      <table class="table table-dark table-striped">
        <h1>SKILLS</h1>
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">name</th>
            <th scope="col">icon</th>
            <th scope="col">color</th>
            <th scope="col">level</th>
            <th scope="col">Skill List ID</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($skills as $skill)
                <tr>
                    <th scope="row"> {{ $skill->id }} </th>
                    <td> {{ $skill->name }} </td>
                    <td> {{ $skill->icon }} </td>
                    <td> {{ $skill->color }} </td>
                    <td> {{ $skill->level }} </td>
                    <td> {{ $skill->skill_lists_id }} </td>
                    <td>
                        <a href=" {{ route('skill.edit', $skill->id ) }} ">Editar</a>
                    </td>
                    <td>
                        <a href=" {{ route('skill.destroy', $skill->id ) }} ">Eliminar</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>



</section>
@endsection