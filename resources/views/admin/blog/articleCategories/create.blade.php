
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <h1>Nueva Categoria en un articulo</h1>

    <form method="POST" action=" {{ route('article-categories.store') }} " class="form">
        @csrf

        <label for="article_id" >
            <p> article  <span> Campo no valido </span></p>
            <select name="article_id" id="article_id">
                @foreach ($articles as $article)
                    <option value="{{ $article->id }}"> {{ $article->title }} </option>
                @endforeach
            </select>
        </label>

        <label for="category_id" >
            <p> category  <span> Campo no valido </span></p>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                @endforeach
            </select>
        </label>

        <button>
            Crear
        </button>

    </form>


</section>
@endsection