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
    <title>Principal</title>
</head>

<body>


    <div class="container">
        <x-plantilla>

           
        </x-plantilla>
        <div class="row mx-auto">
        <p class="display-3">Bienvenido/a  {{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</p>
        <p class="display-6">Aqui puedes visualizar todas las incidencias pendientes</p>
        
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

                        <div class="card-body" style="background-color: #89e4f2;">
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
                                @if($incidencia->usuarioSubio)
                                    {{ $incidencia->usuarioSubio->nombre }}
                                @else
                                    (No hay nombre asociado)
                                @endif

                            </p>
                    
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    </div>
</body>

</html>
