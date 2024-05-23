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


    <title>Darse de baja</title>
</head>

<body>
    <div class="container">
        <x-plantilla>


        </x-plantilla>
        
        {{-- En la sesion tenemos la variable modal_baja --}}
        @if(session('modal_baja')) {{-- Si existe modal_baja ejecutamos el modal --}}
        @include('models/modalDarmeBaja', ['contrasena1' => session('contrasena1')]){{-- En el modal le pasamos la contraseña por sesion --}}
            <script>
                $(document).ready(function() {
                    // Muestra el modal si la variable de sesión 'modal_baja' está establecida
                    $('#deleteUserModal').modal('show');
                });
                    $('#deleteUserModal').on('hidden.bs.modal', function (e) {
                // Elimina la variable de sesión 'modal_baja' cuando se cierra el modal
                /* @php
                    session()->forget('modal_baja');
                @endphp */
            });
            </script>
        @endif
        <div class="d-flex justify-content-center align-items-center" style="height: 50vh;">
            <form class="w-100" action="{{ route('verificarContraBaja', ['id' => $usuario->id]) }}" method="POST">
                @csrf
                <div class="row justify-content-center align-items-center">

                    <p class="display-5 mx-auto">Debe introducir su contraseña para darse de baja</p>

                    <div class="input-group mb-3 w-50">

                        <input class="form-control ms-1" name="contrasena1" type="password"
                            placeholder="Introduce tu contraseña">

                    </div>
                    <div class="input w-25">

                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#deleteUserModal{{ $usuario->id }}" data-id="{{ $usuario->id }}">Dar
                            baja</button><br><br>
                    </div>
                </div>
            </form>
            
           
        </div>
        <div class="row justify-content-center align-items-center">
            @error('contrasena1')
                <div class="input-group mb-3 w-50">
                    <div class="alert alert-danger alert-dismissible">
                        <span class="alert-">{{ $message }}</span>
                        <button class="btn-close" data-bs-dismiss="alert" aria-label="Close alert"></button>
                    </div>
                </div>
            @enderror
        </div>

    </div>
</body>

</html>
