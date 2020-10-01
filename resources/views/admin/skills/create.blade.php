
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <h1>Nuevo Skill</h1>

    <form method="POST" action=" {{ route('skill.store') }} " class="form">
        @csrf

        <label for="name" >
            <p> name  <span> Campo no valido </span></p>
            <input  id="name" name="name" type="text" placeholder="name">
        </label>

        <label for="icon" >
            <p> icon  <span> Campo no valido </span></p>
            <input  id="icon" name="icon" type="text" placeholder="icon">
        </label>

        <label for="color" >
            <p> color  <span> Campo no valido </span></p>
            {{-- <input  id="color" color="color" type="text" placeholder="color"> --}}
            <input type="color" name="color" id="color">
        </label>

        <label for="level" >
            <p> level  <span> Campo no valido </span></p>
            <input  id="level" name="level" type="text" placeholder="level">
        </label>

        <label for="skill_lists_id">

            <p> Skills list  <span> Campo no valido </span></p>

            <select name="skill_lists_id" id="skill_lists_id">

                @foreach ($skillslist as $skillsl)

                <option value="{{ $skillsl->id }}"> {{ $skillsl->name }} </option>    

                @endforeach
                
            </select>

        </label>


        <button>
            Entrar
        </button>

    </form>


</section>
@endsection