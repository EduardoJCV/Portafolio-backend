
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <h1>Actualizar Skill</h1>

    <form method="POST" action=" {{ route('skill.update', $skill) }} " class="form">
        @csrf
        @method('PATCH')
        <label for="name" >
            <p> name  <span> Campo no valido </span></p>
            <input value="{{ $skill->name }}"  id="name" name="name" type="text" placeholder="name">
        </label>

        <label for="icon" >
            <p> icon  <span> Campo no valido </span></p>
            <input value="{{ $skill->icon }}" id="icon" name="icon" type="text" placeholder="icon">
        </label>

        <label for="color" >
            <p> color  <span> Campo no valido </span></p>
            {{-- <input  id="color" color="color" type="text" placeholder="color"> --}}
            <input value="{{ $skill->color }}" type="color" name="color" id="color">
        </label>

        <label for="level" >
            <p> level  <span> Campo no valido </span></p>
            <input value="{{ $skill->level }}" id="level" name="level" type="text" placeholder="level">
        </label>


        <button>
            Actualizar
        </button>

    </form>


</section>
@endsection