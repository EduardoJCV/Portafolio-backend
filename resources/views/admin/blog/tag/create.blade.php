
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <h1>Nuevo Tag</h1>

    <form method="POST" action=" {{ route('tag.store') }} " class="form">
        @csrf

        <label for="name" >
            <p> name  <span> Campo no valido </span></p>
            <input  id="name" name="name" type="text" placeholder="name">
        </label>

        <button>
            Crear
        </button>

    </form>


</section>
@endsection