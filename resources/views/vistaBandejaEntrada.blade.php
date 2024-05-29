<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <title>Vista correo</title>
</head>
@php
    $usuario = Auth::User();
@endphp
<style>
    .bg-red {
        background-color: rgba(3, 39, 129, 0.833);
        border-radius: 10px;
    }

    .bg-body-tertiary {
        background-color: #fdfffb;
        border-radius: 10px;
    }
</style>

<body>


    <div class="container-fluid">
        <div class="row flex-nowrap">
 
            <x-plantillaCorreo>

            </x-plantillaCorreo>

            <section>
                <div class="container " style="max-width: 90%;">
                    <div class="row">
                        <div class="col">
                            <!-- Aquí puedes añadir tu formulario o cualquier otro contenido -->
                            <p class="display-3 col-12 col-sm-6 col-lg-9" style="margin-left: 40px;">Aqui van mis mensajes recibidos</p>
            
                            <div class="row ">
                                @if ($correosRecibidos)
                                    @foreach ($correosRecibidos as $correo)
                                        <div class="col-12 col-sm-6 col-md-6 py-4 ml-sm-3" style="margin-left: 40px;">
                                            <div class="card shadow bg-white rounded">
                                                <div class="card-header">
                                                    Enviado por 
                                                    @if($correo->usuarioRemitente)
                                                        {{ $correo->usuarioRemitente->nombre }}
                                                    @else
                                                        (No hay nombre asociado)
                                                    @endif
                                                </div>
                                                <div class="card-body">
                                                    <blockquote class="blockquote mb-0">
                                                        <p>Asunto: {{ $correo->asunto }}</p>
                                                        <p>Contenido: {{ $correo->contenido }}</p>
                                                        <footer class="blockquote-footer">Enviado por 
                                                            @if($correo->usuarioRemitente)
                                                                {{ $correo->usuarioRemitente->nombre }}
                                                            @else
                                                                (No hay nombre asociado)
                                                            @endif</footer>
                                                            <form action="{{ route('insertarCorreo', ['id' => $correo->id]) }}" method="POST">
                                                                @csrf
                                                        <button type="button" class="btn btn-sm btn-outline-info col-auto mr-3 "
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#contestarCorreo{{ $correo->id }}">
                                                            Contestar correo
                                                        </button>
                                                            </form>
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                        @include('models/modalResponderCorreo', ['correo' => $correo])
                                    @endforeach
                                @else
                                    <p>No hay correos</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
 
        </div>
    </div>

    </div>

</body>
<script src="{{ asset('js/main.js') }}"></script>
</html>
