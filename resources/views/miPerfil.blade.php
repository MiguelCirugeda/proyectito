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
    <title>Mi perfil</title>
</head>
<body>
    <div class="container">
        <x-plantilla>


        </x-plantilla>

        <div class="row">
            <p class="display-6">Aqui puedes visualizar tus datos</p>
            <div class="d-flex justify-content-center align-items-center vh-100">
                <div class="card shadow bg-white rounded" style="width: 50rem; height: 30rem;">
                    <div class="card-body">
                        <h3>Datos de perfil</h3> 
                        <form action="{{ route('perfil.update', ['id' => $usuario->id]) }}" method="POST">
                            @csrf
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editarPerfil{{ $usuario->id }}"
                                data-id="{{ $usuario->id }}">Editar perfil</button>

                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editarContra{{ $usuario->id }}"
                                data-id="{{ $usuario->id }}">Editar contraseña</button>
                        </form>
                    </tr>
                    @include('models/modalEditarPerfil')
                    @include('models/modalEditarContrasena')
                        <table class="table table-borderless caption-top">
                            <tbody>
                                <tr>
                                    <th scope="row">Nombre</th>
                                    <td>{{ $usuario->nombre }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Apellidos</th>
                                    <td>{{ $usuario->apellido }}</td>
                                </tr>
                                
                                
                                <tr>
                                    <th scope="row">Categoría de usuario</th>
                                    <td>{{ $usuario->categoria_usuario }}</td>
                                </tr>
                                
                                <tr>
                                    <th scope="row">¿Es técnico?</th>
                                    <td>{{ $usuario->esTecnico ? 'Sí' : 'No' }}</td>
                                </tr>
                                @if($usuario->tipo_tecnico==null)
                                @else
                                <tr>
                                    <th scope="row">Tipo tecnico</th>
                                    <td>{{ $usuario->tipo_tecnico }}</td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</body>
</html>