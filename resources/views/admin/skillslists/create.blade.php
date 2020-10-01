
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <h1>Nuevo Skills list</h1>

    <form method="POST" action=" {{ route('skills-list.store') }} " class="form">
        @csrf

        <label for="name" >
            <p> name  <span> Campo no valido </span></p>
            <input  id="name" name="name" type="text" placeholder="name">
        </label>

        <label for="icon" >
            <p> icon  <span> Campo no valido </span></p>
            <input  id="icon" name="icon" type="text" placeholder="icon">
        </label>

        <button>
            Crear
        </button>

    </form>


</section>
@endsection