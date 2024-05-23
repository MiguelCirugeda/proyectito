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
    <title>Login</title>
</head>

<body class="cuerpo">
    <center>
        <div class="container py-4 ">
            <h1 class="display-6">Pagina de login</h1>
            <form class=" w-100" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="row justify-content-center align-items-center">
                    <div class="input-group mb-3 w-50">
                        <!-- Importante modificar el width y el height porque por defecto es pequeño y no se vera -->
                        <svg class="input-group-text  btn-success" style="background-color:rgba(23, 180, 49, 0.833)" xmlns="http://www.w3.org/2000/svg" width="50"
                            height="50" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                            <path
                                d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                        </svg>
                        <input class="form-control" name="codigo" type="text" placeholder="Ingresar código">
                    </div>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="input-group mb-3 w-50">
                        <!-- Importante modificar el width y el height porque por defecto es pequeño y no se vera -->
                        <svg class="input-group-text" style="background-color:rgba(23, 180, 49, 0.833)" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                            fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path
                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2" />
                        </svg>
                        <input class="form-control" name="password" type="password" placeholder="Ingresar contraseña">
                    </div>
                    <div class="row justify-content-center align-items-center">
                        @error('credenciales')
                        <div class="text-center text-danger mb-3">
                            <span class="errorMensaje">{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div>
                        <input class="btn btn-success" type="submit" value="Enviar"><br><br>
                        <a class="btn btn-outline-danger" href={{ route('formRegistro') }}>Registro</a>
                    </div>
                </div>
                
            </form>
            
        </div>
    </center>
</body>

</html>
