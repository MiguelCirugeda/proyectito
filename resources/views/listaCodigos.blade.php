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
    <title>Lista de usuarios</title>
</head>

<body>

    <div class="container">
        @csrf
        <x-plantilla>


        </x-plantilla>
        <div class="mt-3">
            @foreach ($codigos as $codigo)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Código: <span class="codigo">{{ $codigo->codigo }}</span></h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text mb-0">
                                Estado:
                                @if ($codigo->estado)
                                    <span class="badge text-bg-danger">No disponible</span>
                                @else
                                    <span class="badge text-bg-success">Disponible</span>
                                @endif
                            </p>
                            @if (!$codigo->estado)
                                <input class="btn btn-primary" type="submit" onclick="copiarContenido(this)"
                                    value="Copiar codigo">
                                {{-- Pasamos con (this) la referencia del boton que se pulsa --}}
                            @endif
                        </div>
                        <p class="card-text">Usuario ID: {{ $codigo->id_usuario }}</p>
                    </div>
                </div>
            @endforeach

            {{-- Alerta tipo Toast que mostramos cuando se termina de copiar un codigo --}}
            <div class="toast" id="alertCopiado"
                style="position: fixed; top: 60px; left: 50%; transform: translate(-50%, 0); background-color: #4265e3; opacity:0.9" data-delay="2000"
                data-autohide="true">

                <div class="toast-body">
                    Código copiado
                </div>
            </div>
        </div>
    </div>


</body>
<script src="{{ asset('js/copiarCodigo.js') }}"></script>

</html>
