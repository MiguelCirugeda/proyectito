<?php

namespace App\Http\Controllers;

use App\Models\Correo;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CorreoController extends Controller
{
    public function insertarCorreo(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'usuario' => 'required',
            'asunto' => 'required',
            'contenido' => 'required',
            'estado' => 'required|in:leido,no leido,favoritos',
        ]);

        // Crear una nueva instancia de Correo
        $correo = new Correo;

        // Asignar los datos del formulario a las propiedades del correo
        $correo->id_usuario_destinatario = $request->usuario;
        $correo->id_usuario_remitente = Auth::id();
        $correo->asunto = Crypt::encrypt($request->asunto);
        $correo->contenido = Crypt::encrypt($request->contenido);
        $correo->estado = $request->estado;

        
        $correo->save();
        
        return redirect()->back()->with('correoEnviado', true);
       
        return back();
    }

    public function vistaBandeja($id)
    {
        $user= auth()->id();
        if ($user != $id) {
            return redirect()->back();
        }else{
        // Obtén el usuario autenticado
        $usuario = Usuario::find($id);

        // Obtén los correos recibidos por el usuario
        $correosRecibidos = $usuario->correosRecibidos;

        /* Usamos un bucle para recorrer todos los correos e ir descifrando sus los campos seleccionados uno a uno
        Con que haya un solo campo sin cifrar el metodo dara un error debido a que necesita que todo */
        foreach ($correosRecibidos as $correo) {
            $correo->asunto = Crypt::decrypt($correo->asunto);
            $correo->contenido = Crypt::decrypt($correo->contenido);
            
        }
        // Muestra la vista 'vistaBandejaEntrada.blade.php' con los datos del usuario y sus correos recibidos
        return view('vistaBandejaEntrada', ['usuario' => $usuario, 'correosRecibidos' => $correosRecibidos]);
    }
}

    public function vistaEnviarCorreo($id)
    {

        $user= auth()->id();
        if ($user != $id) {
            return redirect()->back();
        }else{
        $usuarios = Usuario::select('id', 'nombre')->get();
        return view('vistaEnviarCorreo', ['usuarios' => $usuarios]);

    }
}

}
