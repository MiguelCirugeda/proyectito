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
    <title>Crear una incidencia</title>
</head>

<body>
    <div class="container">

        <x-plantilla>


        </x-plantilla>
        <p class="display-3">Crear incidencia</p>

        <form class="w-100" action="{{ route('incidencia.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn btn-info" xmlns="http://www.w3.org/2000/svg" width="50"
                        height="50" fill="currentColor" class="bi bi-alphabet-uppercase" viewBox="0 0 16 16">
                        <path
                            d="M1.226 10.88H0l2.056-6.26h1.42l2.047 6.26h-1.29l-.48-1.61H1.707l-.48 1.61ZM2.76 5.818h-.054l-.75 2.532H3.51zm3.217 5.062V4.62h2.56c1.09 0 1.808.582 1.808 1.54 0 .762-.444 1.22-1.05 1.372v.055c.736.074 1.365.587 1.365 1.528 0 1.119-.89 1.766-2.133 1.766zM7.18 5.55v1.675h.8c.812 0 1.171-.308 1.171-.853 0-.51-.328-.822-.898-.822zm0 2.537V9.95h.903c.951 0 1.342-.312 1.342-.909 0-.591-.382-.954-1.095-.954zm5.089-.711v.775c0 1.156.49 1.803 1.347 1.803.705 0 1.163-.454 1.212-1.096H16v.12C15.942 10.173 14.95 11 13.607 11c-1.648 0-2.573-1.073-2.573-2.849v-.78c0-1.775.934-2.871 2.573-2.871 1.347 0 2.34.849 2.393 2.087v.115h-1.172c-.05-.665-.516-1.156-1.212-1.156-.849 0-1.347.67-1.347 1.83" />
                    </svg>
                    <input class="form-control ms-1" name="titulo" type="text"
                        placeholder="Ingresar titulo de la incidencia">

                </div>

            </div>

            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn btn-info" xmlns="http://www.w3.org/2000/svg" width="50"
                        height="50" fill="currentColor" class="bi bi-body-text" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M0 .5A.5.5 0 0 1 .5 0h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 0 .5m0 2A.5.5 0 0 1 .5 2h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m9 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-9 2A.5.5 0 0 1 .5 4h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m5 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m7 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-12 2A.5.5 0 0 1 .5 6h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m8 0a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m-8 2A.5.5 0 0 1 .5 8h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m7 0a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-7 2a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1h-8a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5" />
                    </svg>
                    <textarea class="form-control ms-1" name="descripcion" rows="10" cols="60"
                        placeholder="Descripcion de la incidencia"></textarea>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn btn-info" xmlns="http://www.w3.org/2000/svg" width="50"
                        height="50" fill="currentColor" class="bi bi-exclamation-octagon" viewBox="0 0 16 16">
                        <path
                            d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1z" />
                        <path
                            d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                    </svg>
                    <select class="form-select form-select-lg mb-3 ms-1" name="prioridad" id="">
                        <option value="prioridad alta">Prioridad Alta</option>
                        <option value="prioridad media ">Prioridad Media</option>
                        <option value="prioridad baja">Prioridad Baja</option>
                    </select>
                </div>
            </div>

            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn btn-info" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                      </svg>
                    <select class="form-select form-select-lg mb-3 ms-1" name="categoria" id="">
                        <option value="software">Software</option>
                        <option value="hardware ">Hardware</option>
                        <option value="redes">Redes</option>
                        <option value="sistemas">Sistemas</option>
                        <option value="otros">Otros</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="fecha_creacion" value="{{ date('Y-m-d H:i:s') }}">
            <input type="hidden" name="estado" value="no resuelta">
            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn btn-info" xmlns="http://www.w3.org/2000/svg" width="50"
                        height="50" fill="currentColor" class="bi bi-image-fill" viewBox="0 0 16 16">
                        <path
                            d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2zm1 9v1a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V9.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062zm5-6.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0" />
                    </svg>
                    <input class="form-control form-control-lg ms-1" type="file" name="formFile" id="formFile">
                </div>
            </div>
            <div class="row justify-content-center align-items-center">

                <div class="input mb-3 w-50">
                    <input class="btn btn-success" type="submit" value="Enviar"><br><br>
                </div>
            </div>

        </form>
        {{-- Codigos de errores --}}
        <div class="row justify-content-center align-items-center">
            @error('codigo')
                <div class="input-group mb-3 w-50">
                    <div class="alert alert-danger alert-dismissible">
                        <span class="alert alert-danger ">{{ $message }}</span>
                        <button class="btn-close" data-bs-dismiss="alert" aria-label="Close alert"></button>
                    </div>
                </div>
            @enderror
        </div>

        <div class="row justify-content-center align-items-center">
            @error('contrasena2')
                <div class="input-group mb-3 w-50">
                    <div class="alert alert-danger alert-dismissible">
                        <span class="alert alert-danger ">{{ $message }}</span>
                        <button class="btn-close" data-bs-dismiss="alert" aria-label="Close alert"></button>
                    </div>
                </div>
            @enderror
        </div>
    </div>
    </div>
</body>

</html>
