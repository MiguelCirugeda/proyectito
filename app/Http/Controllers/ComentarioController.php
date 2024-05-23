<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Incidencia;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function vistaComentario(Request $request)
    {
        // Obtener la incidencia que nos interesa
        $incidencia = Incidencia::with('usuarioSubio')->find($request->incidencia_id);
       

        // Pasar la incidencia a la vista
        return view('vistaComentario', [
            'incidencia' => $incidencia,
            'comentarios' => $incidencia->comentarios,
        ]);
    }

    public function insertarComentario(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'texto_comentario' => 'required',
        ]);

        // Crear un nuevo comentario
        $comentario = new Comentario;
        $comentario->texto_comentario = $request->texto_comentario;
        $comentario->id_usuario = auth()->user()->id;
        $comentario->id_incidencia = $id;

        // Guardar el comentario en la base de datos
        $comentario->save();

        return redirect()->route('mostrarComentario', ['id' => $id]);
    }
    public function mostrarComentario($id)
    {
        // Obtén la incidencia y sus comentarios
        $incidencia = Incidencia::with('comentarios')->find($id);

        // Muestra la vista 'vistaComentario.blade.php' con los datos de la incidencia
        return view('vistaComentario', ['incidencia' => $incidencia]);
    }

    public function responderComentario(Request $request, $id)
    {
        $request->validate([
            'texto_comentario' => 'required',
        ]);

        // Crear un nuevo comentario
        $comentario = new Comentario;
        $comentario->texto_comentario = $request->texto_comentario;
        $comentario->id_usuario = auth()->user()->id;
        $comentario->id_incidencia = $id;
        $comentario->comentario_padre_id = $request->comentario_padre_id; // Aquí se establece la relación con el comentario original

        
        $comentario->save();

        return redirect()->route('mostrarComentario', ['id' => $id]);
    }
}
