
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <h1>Nuevo Proyecto</h1>

    <form method="POST" action=" {{ route('projects.store') }} " class="form">
        @csrf

        <label for="title" >
            <p> title  <span> Campo no valido </span></p>
            <input  id="title" name="title" type="text" placeholder="title">
        </label>

        <label for="img" >
            <p> img  <span> Campo no valido </span></p>
            <input  id="img" name="img" type="text" placeholder="img">
        </label>

        <label for="github" >
            <p> github  <span> Campo no valido </span></p>
            <input  id="github" name="github" type="text" placeholder="github">
        </label>

        <label for="url" >
            <p> url  <span> Campo no valido </span></p>
            <input  id="url" name="url" type="text" placeholder="url">
        </label>

        <label for="description" >
            <p> description  <span> Campo no valido </span></p>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </label>

        <label for="content" >
            <p> content  <span> Campo no valido </span></p>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        </label>

        <button>
            Crear
        </button>

    </form>


</section>
@endsection