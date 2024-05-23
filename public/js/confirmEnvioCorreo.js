/* Para mostrar si se ha enviado correctamente el correo */
var alertaMensaje = document.getElementById('alertConfirmEnvio'); //seleccionamos el elemento (mensaje) por su id que queremos mostrar
var alerta = new bootstrap.Toast(alertaMensaje); //creamos un nuevo toast y lo relacionamos con el bloque (mensaje) que quiero mostrar

if (window.correoEnviado) {
    alerta.show(); //Ya por ultimo lo mostramos
}