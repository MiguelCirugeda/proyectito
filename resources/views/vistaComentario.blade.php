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
    <title>Comentarios realizados</title>
</head>

<body>
    <div class="container">
        <x-plantilla>


        </x-plantilla>
        {{-- Seccion de la incidencia --}}
        <div class="row ms-4">

            <div class="col-sm-6 py-4">
                <div class="card shadow bg-white rounded mr-2 " style="width: 20rem;">
                    @if ($incidencia->fotos->count() > 0)
                        <img src="{{ asset($incidencia->fotos[0]->ruta_imagen) }}" class="card-img-top img-fluid"
                            alt="{{ $incidencia->titulo }}" style="height: 10rem; object-fit: cover;">
                    @else
                        <img src="{{ asset('/images/imgPorDefecto.jpg') }}" class="card-img-top img-fluid"
                            alt="Imagen por defecto" style="height: 10rem; object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <h4 class="card-title">{{ $incidencia->titulo }}</h4>
                        <h6 class="card-subtitle text-muted mb-3">{{ $incidencia->descripcion }}</h6>
                        <p class="card-text">
                            <span class="font-weight-bold">Estado:</span>
                            @if ($incidencia->estado == 'no resuelta')
                                <span class="badge text-bg-danger">{{ $incidencia->estado }}</span>
                            @elseif ($incidencia->estado == 'en proceso')
                                <span class="badge text-bg-warning">{{ $incidencia->estado }}</span>
                            @else
                                <span class="badge text-bg-success">{{ $incidencia->estado }}</span>
                            @endif <br>
                            <span class="font-weight-bold">Prioridad:</span>
                            @if ($incidencia->prioridad == 'prioridad alta')
                                <span style="color: red; text-shadow: 1px 0 black;">{{ $incidencia->prioridad }}</span>
                            @elseif ($incidencia->prioridad == 'prioridad media')
                                <span
                                    style="color: orange; text-shadow: 1px 0 black;">{{ $incidencia->prioridad }}</span>
                            @else
                                <span
                                    style="color: yellow; text-shadow: 1px 0 black;">{{ $incidencia->prioridad }}</span>
                            @endif <br>
                            <span class="font-weight-bold">Categoría:</span>
                                @if ($incidencia->categoria)
                                    {{ $incidencia->categoria->tipo}}
                                @else
                                    (No hay categoría asociada)
                                @endif <br>
                            <span class="font-weight-bold">Subido por:</span> @if($incidencia->usuarioSubio)
                            {{ $incidencia->usuarioSubio->nombre }}
                        @else
                            No hay nombre asociado
                        @endif
                        </p>
                        <form action="{{ route('vistaComentario') }}" method="POST">
                            @csrf
                            <input type="hidden" name="incidencia_id" value="{{ $incidencia->id }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#comentarioModal{{ $incidencia->id }}"
                                data-id="{{ $incidencia->id }}">Añadir un comentario</button>
                        </form>
                        @include('models/modalComentario')
                    </div>
                </div>
            </div>

            <!-- Sección de comentarios -->
            <div class="col-md-6">
                @foreach ($incidencia->comentarios as $comentario)
                    @if ($comentario->comentario_padre_id == null) <!-- Solo mostramos los comentarios que no son respuestas -->
                        @include('models/modalRespuestaComentario', ['comentario' => $comentario])
                        <div class="col-12 py-4">
                            <div class="card shadow bg-white rounded">
                                <div class="card-header">
                                    Comentarios
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p>{{ $comentario->texto_comentario }}</p>
                                        <footer class="blockquote-footer">Comentado por @if($incidencia->usuarioSubio)
                                            {{ $incidencia->usuarioSubio->nombre }}
                                        @else
                                            (No hay nombre asociado)
                                        @endif
                                        </footer>
                                        <p class="h6">Fecha de subida {{$comentario->fecha_subida}}</p>
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#comentarioRespuesta{{ $comentario->id }}">Responder
                                            comentario</button>
                                    </blockquote>
                                    <!-- Aquí agregamos las respuestas al comentario -->
                                    @foreach ($comentario->respuestas as $respuesta)
                                        <blockquote class="blockquote mb-0">
                                            <p>{{ $respuesta->texto_comentario }}</p>
                                            <footer class="blockquote-footer">Respuesta de
                                                @if($incidencia->usuarioSubio)
                                                {{ $incidencia->usuarioSubio->nombre }}
                                            @else
                                                (No hay nombre asociado)
                                            @endif
                                            </footer>
                                            
                                        </blockquote>
                                        <p class="h6">Fecha de subida {{$comentario->fecha_subida}}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            
            
            
        </div>
    </div>
</body>

</html>
