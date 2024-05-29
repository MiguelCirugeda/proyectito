var alertaMensaje = document.getElementById('alertaConfirm'); //seleccionamos el elemento (mensaje) por su id que queremos mostrar
var alerta = new bootstrap.Toast(alertaMensaje); //creamos un nuevo toast y lo relacionamos con el bloque (mensaje) que quiero mostrar

if (window.contraCambiada) {
    alerta.show(); //Ya por ultimo lo mostramos
}