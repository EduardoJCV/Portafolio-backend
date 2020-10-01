
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">

    <form method="POST" action=" {{ route('about.update', $about) }} " class="form">
        @csrf
        @method('PATCH')
        <label for="img" >
            <p> img  <span> Campo no valido </span></p>
            <input value="{{ $about->img }}"  id="img" name="img" type="text" placeholder="img">
        </label>

        <label for="description" >
            <p> description  <span> Campo no valido </span></p>
            <textarea name="description" id="content" cols="30" rows="10">{{ $about->description }}</textarea>
        </label>

        <label for="content" >
            <p> content  <span> Campo no valido </span></p>
            <textarea name="content" id="content" cols="30" rows="10">{{ $about->content }}</textarea>
        </label>

        <button>
            Actualizar
        </button>
    </form>


</section>
@endsection