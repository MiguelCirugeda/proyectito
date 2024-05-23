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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <title>Eliminar Incidencia</title>
</head>

<body>
    <div class="container">
        <x-plantilla>


        </x-plantilla>

        <table class="table table-hover caption-top">
            <thead>
                <tr>
                    <th scope="col">Título de la incidencia</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Prioridad</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incidencias as $incidencia)
                    <tr>
                        <td>{{ $incidencia->titulo }}</td>
                        <td>{{ $incidencia->estado }}</td>
                        <td>{{ $incidencia->prioridad }}</td>
                        <td>
                            @if($incidencia->usuarioSubio)
                            {{ $incidencia->usuarioSubio->nombre }}
                        @else
                            (No hay nombre asociado)
                        @endif</td>
                        <td>
                            <form action="{{ route('incidencia.delete', ['id' => $incidencia->id]) }}" method="POST">
                                @csrf
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $incidencia->id }}"
                                    data-id="{{ $incidencia->id }}">Eliminar incidencia</button>
                            </form>
                        </td>
                    </tr>
                    @include('models/modalEliminar')
                @endforeach
            </tbody>
        </table>




    </div>
</body>

</html>
