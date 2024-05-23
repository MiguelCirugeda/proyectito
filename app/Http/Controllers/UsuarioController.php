<?php

namespace App\Http\Controllers;

use App\Models\Codigo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function lista($id)
    {
        $user = auth()->id();
        $usuario = Usuario::find($user);
        /* Tiene en cuenta el id del usuario ó que el campo esTecnico este como false
        Asi nos evitamos que un usuario no tecnico acceda a esta vista mediante su id */
        if ($user != $id || !$usuario->esTecnico) {
            return redirect()->back();
        } else {
            $usuarios = Usuario::select('id', 'nombre', 'categoria_usuario', 'esTecnico', 'tipo_tecnico')->get();
            return view('crearTecnico', ['usuarios' => $usuarios]);
        }
    }

    public function hacerTecnico(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if ($usuario->tipo_tecnico) {
            // Si el usuario ya tiene un tipo de técnico, sobrescribirlo
            $usuario->tipo_tecnico = $request->tipo_tecnico;

        } else {
            // Si el usuario no tiene un tipo de técnico, insertar el nuevo registro
            $usuario->esTecnico = 1;
            $usuario->tipo_tecnico = $request->tipo_tecnico;
        }

        /* Insertamos en el campo 'esTecnico' el valor 0 si el tipo_tecnico es igual a null */
        if ($usuario->tipo_tecnico == null) {
            $usuario->esTecnico = 0;
        }

        $usuario->save();
        return redirect()->route('listadoUsuariosTecnico', ['id' => auth()->id()]);
    }

    public function vistaContacto($id)
    {
        $user = auth()->id();
        if ($user != $id) {
            return redirect()->back();
        } else {
            $usuarios = Usuario::select('id', 'nombre')->get();
            return view('vistaContactar', ['usuarios' => $usuarios]);
        }
    }

    public function listaEmpleados($id)
    {
        $user = auth()->id();
        $usuario = Usuario::find($user);
        /* Tiene en cuenta el id del usuario ó que el campo esTecnico este como false
        Asi nos evitamos que un usuario no tecnico acceda a esta vista mediante su id */
        if ($user != $id) {
            return redirect()->back();
        } else {
            $usuarios = Usuario::select('id', 'nombre', 'categoria_usuario')->get();
            return view('darBajaEmpleado', ['usuarios' => $usuarios]);
        }
    }

    public function delete($id)
    {
        // Busca la incidencia por su id
        $usuario = Usuario::find($id);

        // Verifica si la incidencia existe
        if (!$usuario) {
            return redirect()->back();
        }
        /* Buscamos el codigo */
        $codigo = Codigo::where('id_usuario', $id)->first();
        if ($codigo) {
            $codigo->estado = 0; //cambiamos valor del codigo para ponerlo disponible de nuevo
            $codigo->save();
        }

        // Elimina la incidencia
        $usuario->delete();

        // Redirige a la página anterior con un mensaje de éxito
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        // Encuentra al usuario por su id
        $usuario = Usuario::find($id);

        // Verificamos si se ha enviado una contraseña en la solicitud
        if ($request->filled('contrasena1')) {
            // Verifica si la contraseña actual ingresada coincide con la del usuario
            if (Hash::check($request->contrasena1, $usuario->password)) {
                // Si la contraseña coincide, sobrescribe la contraseña con la nueva
                $usuario->password = Hash::make($request->contrasena2);
            } else {
                // Si la contraseña no coincide, regresa con un error
                
                return back();
            }
        }

        // Actualiza los campos del usuario con los datos del formulario
        if ($request->filled('nombre')) {
            $usuario->nombre = $request->nombre;
        }
        if ($request->filled('apellido')) {
            $usuario->apellido = $request->apellido;
        }
        if ($request->filled('categoria')) {
            $usuario->categoria_usuario = $request->categoria;
        }
        $usuario->save();

        // Redirige al usuario a la página de perfil con un mensaje de éxito
        return redirect()->route('miPerfil', ['id' => $usuario->id])->with('success', 'Perfil actualizado con éxito');
    }

    public function vistaDarmeBaja($id)
    {
        $user = auth()->id();
        if ($user != $id) {
            return redirect()->back();
        } else {
            $usuarios = Usuario::select('id', 'nombre')->get();
            return view('darmeBaja', ['id' => $usuarios, 'usuario' => auth()->user()]);
        }
    }

    public function darmeBaja(Request $request, $id)
    {

        $usuario = auth()->user(); // obtenemos el usuario actual
        // Verificar si la contraseña proporcionada es correcta

        $contrasenaModal = $request->input('contrasena1');

        if (Hash::check($contrasenaModal, $usuario->password)) {

            $codigo = Codigo::where('id_usuario', $id)->first();
            if ($codigo) {
                $codigo->estado = 0; //cambiamos valor del codigo para ponerlo disponible de nuevo
                $codigo->save();
            }
            // Eliminar usuario
            $usuario->delete();

            Auth::logout(); // cerramos la sesión
            return redirect()->route('index'); // redirigimos al login
        } else {
            // Redirigir al modal con un mensaje de error
            return back()->withErrors(['contrasena1' => 'La contraseña proporcionada es incorrecta.']);
        }
    }

    public function verificarContraBaja(Request $request) /* Comprobamos si la contraseña coincide con la almacenada */
    {
        $messages = [
            'contrasena1' => 'La contraseña no es correcta',
        ];
        // Validamos que el campo contrasena1 no esté vacío
        $request->validate([
            'contrasena1' => 'required',
        ]);

        $usuario = Auth::user();

        // Verificamos si la contraseña ingresada coincide con la del usuario conectado
        if (Hash::check($request->contrasena1, $usuario->password)) {

            // Si la contraseña coincide, creamos una variable de sesión llamada modal_baja
            session(['modal_baja' => true]);
            // Guarda la contraseña en la sesión
            session(['contrasena1' => $request->contrasena1]);
            return redirect()->back();
        } else {
            // Si la contraseña no coincide, regresa con un error
            return back()->withErrors(['contrasena1' => 'La contraseña no es correcta']);
        }
    }

    public function miPerfil($id)
    {
        $user = auth()->id();
        $usuario = auth()->user();
        if ($user != $id) {
            return redirect()->back();
        } else {
            return view('miPerfil', ['usuario' => $usuario]);
        }
    }

}
