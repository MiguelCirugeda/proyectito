<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CodigoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\CorreoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/* Para un futuro login que se haga hay que tener en cuenta que la columna que almacena la contraseña debe ser password, no contrasena y si se cambia el nombre de esa 
columna hay que especificarselo en el modelo sino el metodo Auth:: no funciona correctamente y me saca de las vistas si las rutas 
tinen el middleware('auth'), detectara que no estas logueado para ver esa vista */

Route::get('/', function () {
    return view('index');
})->name('index');


//Funcion de comprobar codigo y password
Route::post('/login', [LoginController::class, 'store'])->name('login'); //Despues de la comprobacion en store(), redirecciona a vista principal

//Funcion de cerrar sesion ó Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); //La funcion logout me redirecciona al index
Route::get('/index', [LoginController::class, 'mostrarLogin'])->name('despuesLogout');//Funcion que lleva a la vista index una vez cerrada la session

//Primera vista, pagina principal
Route::get('/principal/{id}', [LoginController::class, 'vistaPrincipal'])->middleware('auth')->name('principal');

Route::get('/formRegistro', [RegistroController::class, 'vista'])->name('formRegistro');//Vista del formulario de registro
Route::post('/registro', [RegistroController::class, 'store'])->name('registro.store');//Ruta que lleva a la funcion de registro

//Vista de todos los codigos disponibles y no disponibles
Route::get('/listaCodigos/{id}', [CodigoController::class, 'vista'])->middleware('auth')->name('listaCodigos');


//Mostrar todos los usuarios y hacer tecnico a alguno (INCLUYE MODAL 'modalHacerTecnico.blade.php')
Route::get('/listadoUsuariosTecnico/{id}', [UsuarioController::class, 'lista'])->middleware('auth')->name('listadoUsuariosTecnico');//Vista a todos los usuarios
Route::post('/hacerTecnico/{id}', [UsuarioController::class, 'hacerTecnico'])->middleware('auth')->name('hacerTecnico');//Funcion para estado de un usuario

//Crear una incidencia
Route::get('/vistaCrearIncidencia/{id}', [IncidenciaController::class, 'vista'])->middleware('auth')->name('vistaCrearIncidencia'); //Vista para crear una incidencia y enviar los datos a la funcion
Route::post('/incidencia', [IncidenciaController::class, 'store'])->middleware('auth')->name('incidencia.store'); //Insertamos una incidencia y redirigimos a principal

//Ver un incidencia y resolverla
Route::get('/verIncidencias/{id}', [IncidenciaController::class, 'vistaIncidencias'])->middleware('auth')->name('verIncidencias');

//Modificar una incidencia
Route::get('/vista_ModificarIncidencia/{id}', [IncidenciaController::class, 'vistaEdicion'])->middleware('auth')->name('vista_ModificarIncidencia');//incluye el modal 'modalModificar.blade.php'
Route::put('/vista_ModificarIncidencia/{id}', [IncidenciaController::class, 'update'])->middleware('auth')->name('incidencia.update'); 


//Eliminar una incidencia (INCLUYE MODAL 'modalEliminar.blade.php')
Route::get('/vista_EliminarIncidencia/{id}', [IncidenciaController::class, 'vistaDelete'])->middleware('auth')->name('vista_EliminarIncidencia');
Route::delete('/vista_EliminarIncidencia/{id}', [IncidenciaController::class, 'delete'])->middleware('auth')->name('incidencia.delete'); 

//Ver incidencias filtradas
Route::post('/verIncidencias_filtradas', [IncidenciaController::class, 'filtrado'])->middleware('auth')->name('verIncidencias_filtradas');

//Contactar
Route::get('/contactoUsuario/{id}', [UsuarioController::class, 'vistaContacto'])->middleware('auth')->name('contactoUsuario');
//Enviar correo (funcion del controlador)
Route::post('/contactoUsuario', [CorreoController::class, 'insertarCorreo'])->middleware('auth')->name('insertarCorreo');

//Ver comentarios y añadir un comentario
Route::post('/vistaComentario', [ComentarioController::class, 'vistaComentario'])->middleware('auth')->name('vistaComentario');
Route::post('/vistaComentario/{id}', [ComentarioController::class, 'insertarComentario'])->middleware('auth')->name('insertarComentario');
Route::get('/vistaComentario/{id}', [ComentarioController::class, 'mostrarComentario'])->middleware('auth')->name('mostrarComentario');

//Responder a un comentario
Route::post('/responderComentario/{id}', [ComentarioController::class, 'responderComentario'])->middleware('auth')->name('responderComentario');


//Cambiar estado de incidencia (resuelta, en proceso, no resuelta)
Route::post('/resolverIncidencia/{id}', [IncidenciaController::class, 'estadoIncidencia'])->middleware('auth')->name('resolverIncidencia');

//Vista al correo 
Route::get('/comprobarContra/{id}', [LoginController::class, 'vistaComprobarContra'])->middleware('auth')->name('vistaCorreo');//ruta a la vista para poder entrar al correo
Route::post('/verificarContra', [LoginController::class, 'verificarContra'])->middleware('auth')->name('verificarContra'); 

//Vista bandeja de entrada
Route::get('/vistaBandeja/{id}', [CorreoController::class, 'vistaBandeja'])->middleware('auth')->name('vistaBandeja');

//Vista envio de correo
Route::get('/vistaEnviarCorreo/{id}', [CorreoController::class, 'vistaEnviarCorreo'])->middleware('auth')->name('vistaEnviarCorreo');

/* Dar de baja a un empleado */
Route::get('/listadoEmpleados/{id}', [UsuarioController::class, 'listaEmpleados'])->middleware('auth')->name('listadoEmpleados');//Vista a todos los empleados
Route::delete('/darBajaEmpleado/{id}', [UsuarioController::class, 'delete'])->middleware('auth')->name('darBaja');//Funcion para dar baja a un empleado

/* Darme de baja (eliminar mi perfil) */
Route::get('/vistaDarmeBaja/{id}', [UsuarioController::class, 'vistaDarmeBaja'])->middleware('auth')->name('vistaDarmeBaja');
Route::post('/darmeBaja/{id}', [UsuarioController::class, 'darmeBaja'])->middleware('auth')->name('darmeBaja'); //Vista para darme de baja
Route::post('/verificarContraBaja/{id}', [UsuarioController::class, 'verificarContraBaja'])->middleware('auth')->name('verificarContraBaja'); //Vista para darme de baja

/* Ver mi perfil */
Route::get('/miPefil/{id}', [UsuarioController::class, 'miPerfil'])->middleware('auth')->name('miPerfil');

/* Modificar mi perfil */
Route::put('/miPerfil/{id}', [UsuarioController::class, 'update'])->middleware('auth')->name('perfil.update'); //ruta a mi funcion update

/* Ver las incidencias adjudicadas a cada tecnico */
Route::get('/misIncidencias/{id}', [IncidenciaController::class, 'misIncidencias'])->middleware('auth')->name('misIncidencias');

