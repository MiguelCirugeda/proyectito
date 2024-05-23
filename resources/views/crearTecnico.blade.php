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
    <title>Crear un tecnico</title>
</head>

<body>
    <div class="container">

        <x-plantilla>


        </x-plantilla>
        
        <table class="table table-hover caption-top ">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Es Tecnico</th>
                    <th scope="col">Categoria de usuario</th>
                    <th scope="col">Tipo técnico</th>
                    <th scope="col">Cambiar a tecnico</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->esTecnico ? 'Si' : 'No' }}</td>
                        <td>{{ $usuario->categoria_usuario}}</td>
                        @if($usuario->tipo_tecnico)
                        <td>{{ $usuario->tipo_tecnico}}</td>
                        @else
                        <td>No es tecnico</td>
                        @endif
                        <td>
                            <form action="{{ route('hacerTecnico', ['id' => $usuario->id]) }}" method="POST">
                                @csrf
                                @if($usuario->tipo_tecnico)
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#hacerTecnicoModal{{ $usuario->id }}"
                                    data-id="{{ $usuario->id }}">Cambiar tipo de técnico</button>
                                    @else
                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#hacerTecnicoModal{{ $usuario->id }}"
                                    data-id="{{ $usuario->id }}">Hacer técnico</button>
                                    @endif
                            </form>
                        </td>
                    </tr>
                    @include('models/modalHacerTecnico')
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
