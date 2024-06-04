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
    <title>Enviar un correo</title>
</head>
@php
    $usuario = Auth::User();
@endphp
<style>
    .bg-red {
        background-color: rgba(3, 39, 129, 0.833);
        border-radius: 10px;
    }

    .bg-body-tertiary {
        background-color: #fdfffb;
        border-radius: 10px;
    }
</style>

<body>


    <div class="container-fluid">
        <div class="row flex-nowrap">

            <x-plantillaCorreo>

            </x-plantillaCorreo>
            <section>
                <div class="container " style="max-width: 70%;">
                    <div class="row">
                        <div class="col">

                            <p class="display-3 col-12 col-sm-10 col-lg-9" style="margin-left: 20px;">Envio de correos</p>
                            <div class="row">
                                <form class="col-12 col-sm-10 col-md-8 col-lg-6 py-4" style="margin-left: 20px;"
                                    action="{{ route('insertarCorreo') }}" method="POST">
                                    @csrf
                                    <div class="row justify-content-center align-items-center">
                                        <div class="input-group mb-3 col-12 col-sm-8 col-lg-6">
                                            <svg class="input-group-text "
                                                style="background-color:rgba(8, 69, 224, 0.833)"
                                                xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 16 16">
                                                <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                                <path
                                                    d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z" />
                                            </svg>

                                            <select class="form-select" id="usuario" name="usuario">
                                                @foreach ($usuarios as $usuario)
                                                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center align-items-center">
                                        <div class="input-group mb-3 col-12 col-sm-8 col-lg-6">
                                            <svg class="input-group-text "
                                                style="background-color:rgba(8, 69, 224, 0.833)"
                                                xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                fill="currentColor" class="bi bi-alphabet-uppercase"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M1.226 10.88H0l2.056-6.26h1.42l2.047 6.26h-1.29l-.48-1.61H1.707l-.48 1.61ZM2.76 5.818h-.054l-.75 2.532H3.51zm3.217 5.062V4.62h2.56c1.09 0 1.808.582 1.808 1.54 0 .762-.444 1.22-1.05 1.372v.055c.736.074 1.365.587 1.365 1.528 0 1.119-.89 1.766-2.133 1.766zM7.18 5.55v1.675h.8c.812 0 1.171-.308 1.171-.853 0-.51-.328-.822-.898-.822zm0 2.537V9.95h.903c.951 0 1.342-.312 1.342-.909 0-.591-.382-.954-1.095-.954zm5.089-.711v.775c0 1.156.49 1.803 1.347 1.803.705 0 1.163-.454 1.212-1.096H16v.12C15.942 10.173 14.95 11 13.607 11c-1.648 0-2.573-1.073-2.573-2.849v-.78c0-1.775.934-2.871 2.573-2.871 1.347 0 2.34.849 2.393 2.087v.115h-1.172c-.05-.665-.516-1.156-1.212-1.156-.849 0-1.347.67-1.347 1.83" />
                                            </svg>
                                            <input class="form-control ms-1" name="asunto" type="text"
                                                placeholder="Ingresar asunto">

                                        </div>

                                    </div>

                                    <div class="row justify-content-center align-items-center">
                                        <div class="input-group mb-3 col-12 col-sm-8 col-lg-6">
                                            <svg class="input-group-text"
                                                style="background-color:rgba(8, 69, 224, 0.833)"
                                                xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                                fill="currentColor" class="bi bi-envelope-paper" viewBox="0 0 16 16">
                                                <path
                                                    d="M4 0a2 2 0 0 0-2 2v1.133l-.941.502A2 2 0 0 0 0 5.4V14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V5.4a2 2 0 0 0-1.059-1.765L14 3.133V2a2 2 0 0 0-2-2zm10 4.267.47.25A1 1 0 0 1 15 5.4v.817l-1 .6zm-1 3.15-3.75 2.25L8 8.917l-1.25.75L3 7.417V2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1zm-11-.6-1-.6V5.4a1 1 0 0 1 .53-.882L2 4.267zm13 .566v5.734l-4.778-2.867zm-.035 6.88A1 1 0 0 1 14 15H2a1 1 0 0 1-.965-.738L8 10.083zM1 13.116V7.383l4.778 2.867L1 13.117Z" />
                                            </svg>
                                            <textarea class="form-control ms-1" name="contenido" rows="10" cols="60" placeholder="Contenido del mensaje"></textarea>
                                        </div>
                                    </div>


                                    <input type="hidden" name="estado" value="no leido">

                                    <div class="row justify-content-center align-items-center">

                                        <div class="input-group col-12 col-sm-8 col-lg-6">
                                            <input class="btn btn-success" type="submit" value="Enviar"><br><br>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    {{-- Alerta tipo Toast que mostramos cuando enviamos correctamente un correo --}}
    <div class="toast" id="alertConfirmEnvio"
        style="position: fixed; top: 60px; left: 50%; transform: translate(-50%, 0); background-color: #3fe304; opacity: 0.9;"
        data-delay="2000" data-autohide="true">
        <div class="toast-body">
            Correo enviado
        </div>
    </div>
    </div>

    </div>
    <script>
        /* Con json pasamos datos de php al archivo javascript
            Creamos variable global de Javascript y la llamamos 'correoEnviado, despues le asignamos el valor de la sesion
            Como existe correoEnviado porque al registrar un correo se devuelve con esa sesion' */
        window.correoEnviado = @json(session('correoEnviado', false));

        /* si la sesión correoEnviado existe y su valor es true, entonces se ejecutara window.correoEnviado que en el archivo js
        me mostrara el toast*/
    </script>


</body>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/confirmEnvioCorreo.js') }}"></script>

</html>
