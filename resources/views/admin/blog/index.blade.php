
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <div class="form">
        <button>
            <a href="{{ route('article.create') }}"> Nuevo Articulo </a>
        </button>
        <button>
            <a href="{{ route('tag.create') }}"> Nuevo Tag </a>
        </button>
        <button>
            <a href="{{ route('category.create') }}"> Nueva Categoria </a>
        </button>
        <div>
            <button style="width: 48%;">
                <a href="{{ route('article-tags.create') }}"> Nuevo Article Tag </a>
            </button>
            <button style="width: 48%;">
                <a href="{{ route('article-categories.create') }}"> Nueva Article Categoria </a>
            </button>
        </div>
    </div>


    <table class="table table-dark table-striped">
        <h1>Articulos</h1>
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">title</th>
            <th scope="col">img</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($articles as $article)
                <tr>
                    <th scope="row"> {{ $article->id }} </th>
                    <td> {{ $article->title }} </td>
                    <td> {{ $article->img }} </td>
                    <td>
                        <a href=" {{ route('article.edit', $article->id) }} ">Editar</a>
                    </td>
                    <td>
                        <a href=" {{ route('article.destroy', $article->id) }} ">Eliminar</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>

      <table class="table table-dark table-striped">
        <h1>Categorias</h1>
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">name</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($categories as $category)
                <tr>
                    <th scope="row"> {{ $category->id }} </th>
                    <td> {{ $category->name }} </td>
                    <td>
                        <a href=" {{ route('category.edit', $category->id) }} ">Editar</a>
                    </td>
                    <td>
                        <a href=" {{ route('category.destroy', $category->id) }} ">Eliminar</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>

      <table class="table table-dark table-striped">
        <h1>Tags</h1>
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">name</th>
            <th scope="col">Editar</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($tags as $tag)
                <tr>
                    <th scope="row"> {{ $tag->id }} </th>
                    <td> {{ $tag->name }} </td>
                    <td>
                        <a href=" {{ route('tag.edit', $tag->id) }} ">Editar</a>
                    </td>
                    <td>
                        <a href=" {{ route('tag.destroy', $tag->id) }} ">Eliminar</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>


      <table class="table table-dark table-striped">
        <h1>Article Tags</h1>
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Article</th>
            <th scope="col">Tag</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($article_tags as $article_tag)
                <tr>
                    <th scope="row"> {{ $article_tag->id }} </th>
                    <td> {{ $article_tag->article_id }} </td>
                    <td> {{ $article_tag->tag_id }} </td>
                    <td>
                        <a href=" {{ route('article-tags.destroy', $article_tag->id) }} ">Eliminar</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>


      <table class="table table-dark table-striped">
        <h1>Article Categories</h1>
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Article</th>
            <th scope="col">Category</th>
            <th scope="col">Eliminar</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($article_categories as $article_category)
                <tr>
                    <th scope="row"> {{ $article_category->id }} </th>
                    <td> {{ $article_category->article_id }} </td>
                    <td> {{ $article_category->category_id }} </td>
                    <td>
                        <a href=" {{ route('article-categories.destroy', $article_category->id) }} ">Eliminar</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
      </table>


</section>
@endsection