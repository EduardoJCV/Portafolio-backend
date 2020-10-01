
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <h1>Nuevo tag para un articulo</h1>

    <form method="POST" action=" {{ route('article-tags.store') }} " class="form">
        @csrf

        <label for="article_id" >
            <p> article  <span> Campo no valido </span></p>
            <select name="article_id" id="article_id">
                @foreach ($articles as $article)
                    <option value="{{ $article->id }}"> {{ $article->title }} </option>
                @endforeach
            </select>
        </label>

        <label for="tag_id" >
            <p> tag  <span> Campo no valido </span></p>
            <select name="tag_id" id="tag_id">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}"> {{ $tag->name }} </option>
                @endforeach
            </select>
        </label>

        <button>
            Crear
        </button>

    </form>


</section>
@endsection