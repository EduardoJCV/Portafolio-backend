<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
</head>
<body>

    
<header>

    <nav>
        <section class="contenedor nav">
            <div class="logo">
                <h1>Panel Admin</h1>
            </div>
            
            <div class="enlaces-header">
                <a class="{{ request()->routeIs('home.panel') ? 'active' : '' }}" href="{{ route('home.panel') }}">Inicio</a>
                <a class="{{ request()->routeIs('skills.view') ? 'active' : '' }}" href="{{ route('skills.view') }}">Skills</a>
                <a class="{{ request()->routeIs('about.edit') ? 'active' : '' }}" href="{{ route('about.edit') }}">About</a>
                <a class="{{ request()->routeIs('projects.view') ? 'active' : '' }}" href="{{ route('projects.view') }}"> Proyectos</a>
                <a class="{{ request()->routeIs('message.index') ? 'active' : '' }}" href="{{ route('message.index') }}">Mensajes</a>
                <a class="{{ request()->routeIs('article.view') ? 'active' : '' }}" href="{{ route('article.view') }}">Blog</a>
            </div>

            <div class="hamburguer" >
                <i class="fas fa-bars"></i>
            </div>
        </section>
        <div style="height: 150px; overflow: hidden;" >
            <svg  viewBox="0 0 500 150" preserveAspectRatio="none" style="filter:drop-shadow(1px 1px 3px rgba(0, 0, 0, .2));height: 100%; width: 100%;">
                <path d="M0.00,49.98 C156.04,87.33 271.49,-49.98 500.00,49.98 L500.00,0.00 L0.00,0.00 Z" style="stroke: none; fill: #1a2035;">
                </path>
            </svg>
        </div>
    </nav>

</header>
