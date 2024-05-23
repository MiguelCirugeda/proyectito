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
    <title>Contactar</title>
</head>

<body>
    <div class="container">

        <x-plantilla>


        </x-plantilla>
        <p class="display-3">Contactar</p>

        <form class="w-100" action="{{ route('insertarCorreo') }}" method="POST">
            @csrf
            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn-info" style="background-color:rgba(8, 223, 251, 0.833)" xmlns="http://www.w3.org/2000/svg" width="50"
                        height="50" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                        <path
                            d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5" />
                        <path
                            d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z" />
                    </svg>

                    <select class="form-select" id="usuario" name="usuario">
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn-info" style="background-color:rgba(8, 223, 251, 0.833)" xmlns="http://www.w3.org/2000/svg" width="50"
                        height="50" fill="currentColor" class="bi bi-alphabet-uppercase" viewBox="0 0 16 16">
                        <path
                            d="M1.226 10.88H0l2.056-6.26h1.42l2.047 6.26h-1.29l-.48-1.61H1.707l-.48 1.61ZM2.76 5.818h-.054l-.75 2.532H3.51zm3.217 5.062V4.62h2.56c1.09 0 1.808.582 1.808 1.54 0 .762-.444 1.22-1.05 1.372v.055c.736.074 1.365.587 1.365 1.528 0 1.119-.89 1.766-2.133 1.766zM7.18 5.55v1.675h.8c.812 0 1.171-.308 1.171-.853 0-.51-.328-.822-.898-.822zm0 2.537V9.95h.903c.951 0 1.342-.312 1.342-.909 0-.591-.382-.954-1.095-.954zm5.089-.711v.775c0 1.156.49 1.803 1.347 1.803.705 0 1.163-.454 1.212-1.096H16v.12C15.942 10.173 14.95 11 13.607 11c-1.648 0-2.573-1.073-2.573-2.849v-.78c0-1.775.934-2.871 2.573-2.871 1.347 0 2.34.849 2.393 2.087v.115h-1.172c-.05-.665-.516-1.156-1.212-1.156-.849 0-1.347.67-1.347 1.83" />
                    </svg>
                    <input class="form-control ms-1" name="asunto" type="text" placeholder="Ingresar asunto">

                </div>

            </div>

            <div class="row justify-content-center align-items-center">
                <div class="input-group mb-3 w-50">
                    <svg class="input-group-text btn-info" style="background-color:rgba(8, 223, 251, 0.833)" xmlns="http://www.w3.org/2000/svg" width="50"
                        height="50" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                        <path
                            d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z" />
                        <path
                            d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                    </svg>
                    <textarea class="form-control ms-1" name="contenido" rows="10" cols="60" placeholder="Contenido del mensaje"></textarea>
                </div>
            </div>


            <input type="hidden" name="estado" value="no leido">

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

        {{-- Alerta tipo Toast que mostramos cuando se termina de copiar un codigo --}}
        <div class="toast" id="alertConfirmEnvio"
            style="position: fixed; top: 60px; left: 50%; transform: translate(-50%, 0);" data-delay="2000"
            data-autohide="true">
            <div class="toast-body">
                Correo enviado
            </div>
        </div>
    </div>
    </div>
</body>
<script>
    /* Con json pasamos datos de php al archivo javascript
    Creamos variable global de Javascripy y la llamamos 'correoEnviado, despues le asignamos el valor de la sesion
    Como existe correoEnviado porque al registrar un correo se devuelve con esa sesion' */
    window.correoEnviado = @json(session('correoEnviado', false)); 

    /* si la sesión correoEnviado existe y su valor es true, entonces se ejecutara window.correoEnviado que en el archivo js
    me mostrara el toast*/
</script>
<script src="{{ asset('js/confirmEnvioCorreo.js') }}"></script>
</html>
