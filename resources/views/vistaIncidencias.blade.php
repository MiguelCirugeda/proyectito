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
    <title>Vista de todas las incidencias</title>
</head>

<body>
    <div class="container">
        <x-plantilla>


        </x-plantilla>
        <div class="row mx-auto">
            @include('models/modalFiltrarPorEstado')



            <div class="d-flex justify-content-end align-items-center py-4">
                <div class="row" style="margin-right: 2rem;">
                    
                    @if(auth()->user()->esTecnico)
                    <div class="col-auto my-auto">
                        <form action="{{ route('misIncidencias', ['id' => auth()->user()->id]) }}" method="GET">
                            <span class="badge bg-danger rounded-pill">{{ $incidenciasPendientes }}</span><input type="submit" class="btn btn-sm btn-outline-dark col-auto mr-3 " value="Resolver mis incidencias">
                        </form>
                    </div>
                    @endif

                    <div class="col-auto my-auto">
                        <button type="button" class="btn btn-sm btn-outline-dark col-auto mr-3 " data-bs-toggle="modal"
                            data-bs-target="#incidenciasFiltrar">
                            Filtrar
                        </button>
                    </div>

                </div>
            </div>


            @if (session('error'))
                <div class="alert alert-dismissible fade show" style="background-color: #f8313b;" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                        <path
                            d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1z" />
                        <path
                            d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                    </svg>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @foreach ($incidencias as $incidencia)
                <div class="col-sm-6 col-md-4 py-4">
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
                                    <span
                                        style="color: red; text-shadow: 1px 0 black;">{{ $incidencia->prioridad }}</span>
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
                                <span class="font-weight-bold">Subido por:</span>
                                @if ($incidencia->usuarioSubio)
                                    {{ $incidencia->usuarioSubio->nombre }}
                                @else
                                    (No hay nombre asociado)
                                @endif

                            </p>
                            <form action="{{ route('vistaComentario') }}" method="POST">
                                @csrf
                                <input type="hidden" name="incidencia_id" value="{{ $incidencia->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <button type="submit" class="btn btn-outline-primary btn-sm">Comentarios</button>
                            </form><br>
                            @if (auth()->user()->esTecnico == 1)
                                <button type="button" class="btn btn-sm btn-outline-danger col-auto mr-3 "
                                    data-bs-toggle="modal" data-bs-target="#resolverIncidencia{{ $incidencia->id }}">
                                    Resolver Incidencia
                                </button>
                                @include('models/modalEstadoIncidencia', ['incidencia' => $incidencia])
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>

</html>
