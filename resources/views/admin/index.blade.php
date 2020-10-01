
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">


    <form method="POST" action="" class="form">
        @csrf

        <label for="email" >
            <p> Email  <span> Campo no valido </span></p>
            <input  id="email" name="email" type="text" placeholder="Email">
            
        </label>
        <label for="password">
            <p > Password  <span > Campo no valido </span></p>
            <input  id="password" name="password" type="password" placeholder="Password">
            
        </label>

        <button>
            Entrar
        </button>

    </form>

    <form method="get" action="/portafolio/public/panel-admin">
    
        <label for="name">
            <input id="name" name="name" type="text">
        </label>

        <button>
            enviar
        </button>

    </form>


</section>
@endsection