
@extends('components.layout')

@section('content')
    
<section class="questions contenedor" id="contactar" style="justify-content: center;">
    <style>
        .card{
            color:black !important;
        }
        .card h5{
            color:black !important;
        }
    </style>
    <div class="form">

        @foreach ($messages as $message)

            <div class="card" style="margin-bottom: 15px;">
                <h5 class="card-header"> {{ $message->name }} </h5>
                
                <div class="card-body">
                    <h5 class="card-title"> {{ $message->affair }} </h5>
                    <p class="card-text"> {{ $message->message }} </p>
                    <h5 class="card-title"> {{ $message->email }} </h5>
                </div>
                <div class="form" style="padding: 0;margin: 0;">
                    <button>
                        <a href="{{ route('message.destroy', $message->id) }}">Eliminar</a>
                    </button>
                </div>
            </div>
        
        @endforeach

    </div>


</section>
@endsection