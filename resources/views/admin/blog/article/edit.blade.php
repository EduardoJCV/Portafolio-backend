
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <h1>Editar Articulo</h1>

    <form method="POST" action=" {{ route('article.update', $article) }} " class="form">
        @csrf
        @method('PATCH')

        <label for="title" >
            <p> title  <span> Campo no valido </span></p>
            <input value="{{ $article->title }}" id="title" name="title" type="text" placeholder="title">
        </label>

        <label for="img" >
            <p> img  <span> Campo no valido </span></p>
            <input value="{{ $article->img }}" id="img" name="img" type="text" placeholder="img">
        </label>

        <label for="description" >
            <p> description  <span> Campo no valido </span></p>
            <textarea name="description" id="description" cols="30" rows="10">{{ $article->description }}</textarea>
        </label>

        <label for="content" >
            <p> content  <span> Campo no valido </span></p>
            <textarea name="content" id="content" cols="30" rows="10">{{ $article->content }}</textarea>
        </label>

        <button>
            Actualizar
        </button>

    </form>


</section>
@endsection