/* Logica para copiar un codigo y que salga despues una alerta con el mensaje "codigo copiado" */

/* funcion asincrona, la funcion devolvera una accion al final de su ejecucion
   Esta funcion toma como argumento 'boton' */
const copiarContenido = async (boton) => {

    /* Se busca el elemento con la clase 'codigo' y se almacena en la variable codigo 
    Luego seleccionamos el elemento ‘card-body’ que contiene tanto el botón como el código.*/
    let codigo = boton.parentElement.parentElement.querySelector('.codigo').textContent;

    /* función del API del portapapeles del navegador que intenta escribir el texto que le proporcionamos al portapapeles del usuario */
    await navigator.clipboard.writeText(codigo);
    /* Con await le decimos que espere hasta que la operacion de escritura en el portapapeles se complete */

    /* Esta es la parte de la alerta que informa si se ha copiado el codigo */
    var alertaCodigo = document.getElementById('alertCopiado'); //seleccionamos el elemento (mensaje) por su id que queremos mostrar
    var alerta = new bootstrap.Toast(alertaCodigo); //creamos un nuevo toast y lo relacionamos con el bloque (mensaje) que quiero mostrar
    alerta.show(); //Ya por ultimo lo mostramos


}