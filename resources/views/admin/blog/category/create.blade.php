
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <h1>Nueva Categoria</h1>

    <form method="POST" action=" {{ route('category.store') }} " class="form">
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