
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <h1>Editar Tag</h1>

    <form method="POST" action=" {{ route('tag.update', $tag) }} " class="form">
        @csrf
        @method('PATCH')

        <label for="name" >
            <p> name  <span> Campo no valido </span></p>
            <input value="{{ $tag->name }}" id="name" name="name" type="text" placeholder="name">
        </label>

        <button>
            Actualizar
        </button>

    </form>


</section>
@endsection