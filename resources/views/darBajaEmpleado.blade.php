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
    <title>Dar baja a un empleado</title>
</head>

<body>
    <div class="container">

        <x-plantilla>


        </x-plantilla>

        <table class="table table-hover caption-top ">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo de usuario</th>
                    <th scope="col">Dar de baja</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre }}</td>
                        <td>{{ $usuario->categoria_usuario }}</td>
                        <td>
                            {{-- Evitamos que un tecnico pueda eliminarse a si mismo

                                Con Auth::user()->id obtenemos el id del usuario conectado
                                Se va recorriendo el bucle y si el id del usuario es distinto al del usuario conectado me muestra el boton, solo me muestra el
                                boton de los usuarios con distinto id al que esta conectado--}}
                            @if (Auth::user()->id != $usuario->id)
                                <form action="{{ route('hacerTecnico', ['id' => $usuario->id]) }}" method="POST">
                                    @csrf
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#deleteUsuario{{ $usuario->id }}"
                                        data-id="{{ $usuario->id }}">Dar de baja</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @include('models/modalDarBajaEmpleado')
                @endforeach
            </tbody>
        </table>

    </div>
</body>

</html>
