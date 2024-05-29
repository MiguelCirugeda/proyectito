<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="{{ asset('css/estilos.css')}}" rel="stylesheet">
    <title>Formulario registro</title>
</head>


<body class="cuerpo">
    <div class="container py-4">
        <h1 class="display-6 row justify-content-center">Registrarse</h1>

        <form class="w-100" action="{{ route('registro.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn-info" style="background-color:rgba(8, 223, 251, 0.833)" xmlns="http://www.w3.org/2000/svg" width="50"
                        height="50" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                        <path
                            d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                    </svg>
                    <input class="form-control ms-1" name="nombre" type="text" placeholder="Ingresar tu nombre">

                </div>

            </div>
            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn-info" style="background-color:rgba(8, 223, 251, 0.833)" xmlns="http://www.w3.org/2000/svg" width="50"
                        height="50" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                        <path
                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                        <path
                            d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                    </svg>
                    <input class="form-control ms-1" name="apellido" type="text" placeholder="Ingresar apellidos">
                </div>
            </div>

            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn-info" style="background-color:rgba(8, 223, 251, 0.833)" xmlns="http://www.w3.org/2000/svg" width="50"
                        height="50" fill="currentColor" class="bi bi-code-square" viewBox="0 0 16 16">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path
                            d="M6.854 4.646a.5.5 0 0 1 0 .708L4.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0m2.292 0a.5.5 0 0 0 0 .708L11.793 8l-2.647 2.646a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708 0" />
                    </svg>
                    <select class="form-select form-select-lg mb-3 ms-1" name="categoria_usuario" id="">
                        <option value="diseñador">Diseñador</option>
                        <option value="programador">Programador</option>
                        <option value="sistema">Sistemas</option>
                        <option value="direccion">Direccion</option>
                    </select>
                </div>
            </div>

            <input type="hidden" name="tipo_tecnico" value="">{{-- Campo vacio para que por defecto todos los nuevos registros sean null en tipo_tecnico --}}


            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn-info" style="background-color:rgba(8, 223, 251, 0.833)" width="50" height="50" fill="currentColor"
                        class="bi bi-123" viewBox="0 0 16 16">
                        <path
                            d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75z" />
                    </svg>
                    <input class="form-control ms-1" name="codigo" type="text"
                        placeholder="Ingresa codigo empleado">

                </div>
            </div>

            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn-info" style="background-color:rgba(8, 223, 251, 0.833)" width="50" height="50" fill="currentColor"
                        class="bi bi-shield-check" viewBox="0 0 16 16">
                        <path
                            d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                        <path
                            d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                    </svg>
                    <input class="form-control ms-1" name="contrasena1" type="password"
                        placeholder="Contraseña de al menos 6 carácteres">

                </div>
            </div>

            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn-info" style="background-color:rgba(8, 223, 251, 0.833)" width="50" height="50" fill="currentColor"
                        class="bi bi-shield-check" viewBox="0 0 16 16">
                        <path
                            d="M5.338 1.59a61 61 0 0 0-2.837.856.48.48 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.7 10.7 0 0 0 2.287 2.233c.346.244.652.42.893.533q.18.085.293.118a1 1 0 0 0 .101.025 1 1 0 0 0 .1-.025q.114-.034.294-.118c.24-.113.547-.29.893-.533a10.7 10.7 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.8 11.8 0 0 1-2.517 2.453 7 7 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7 7 0 0 1-1.048-.625 11.8 11.8 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 63 63 0 0 1 5.072.56" />
                        <path
                            d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                    </svg>
                    <input class="form-control ms-1" name="contrasena2" type="password"
                        placeholder="Repite la contraseña">

                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center w-50 mx-auto">
                <a class="btn btn-danger" href={{ route('index') }}>Atras</a>
                <input class="btn btn-success" type="submit" value="Enviar">
            </div>
            
            

        </form>
        <br>
        {{-- Codigos de errores --}}
        <div class="row justify-content-center align-items-center">
            @error('codigo')
                <div class="input-group mb-3 w-50">
                    <div class="alert alert-danger alert-dismissible">
                        <span class="alert-">{{ $message }}</span>
                        <button class="btn-close" data-bs-dismiss="alert" aria-label="Close alert"></button>
                    </div>
                </div>
            @enderror
        </div>

        <div class="row justify-content-center align-items-center">
            @error('contrasena2')
                <div class="input-group mb-3 w-50">
                    <div class="alert alert-danger alert-dismissible">
                        <span class="alert- ">{{ $message }}</span>
                        <button class="btn-close" data-bs-dismiss="alert" aria-label="Close alert"></button>
                    </div>
                </div>
            @enderror
        </div>
       
    </div>
</body>

</html>
