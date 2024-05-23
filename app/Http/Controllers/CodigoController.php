<?php

namespace App\Http\Controllers;

use App\Models\Codigo;
use App\Models\Usuario;

class CodigoController extends Controller
{
    public function vista($id)
    {
        $user = auth()->id();
        $usuario = Usuario::find($user);
        /* Tiene en cuenta el id del usuario ó que el campo esTecnico este como false
        Asi nos evitamos que un usuario no tecnico acceda a esta vista */
        if ($user != $id || !$usuario->esTecnico) {
            return redirect()->back();
        } else {
            $usuarios = Usuario::with('codigo')->get();
            $codigos = Codigo::all();
            return view('listaCodigos', ['usuarios' => $usuarios, 'codigos' => $codigos]);
        }
    }
}
