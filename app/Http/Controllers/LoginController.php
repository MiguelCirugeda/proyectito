<?php

namespace App\Http\Controllers;

use App\Models\Codigo;
use App\Models\Incidencia;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    public function mostrarLogin()
    {
        return view('index');
    }

    /* La usamos tambien para visualizar todas las incidencias en pantalla */
    public function vistaPrincipal($id)
    {
        $user = auth()->id();
        if ($user != $id) {
            return redirect()->back();
        } else {
            // Obtener solo las incidencias con estado 'no resuelta'
            $incidencias = Incidencia::with('usuarioSubio')->where('estado', 'no resuelta')->get();
            $usuarios = Usuario::has('incidencias')->get();

            // Pasar las incidencias a la vista
            return view('principal', [
                'incidencias' => $incidencias,
                'usuarios' => $usuarios,
            ]);
        }
    }

    //Funcion de comprobacion por codigo y password
    public function store(Request $request)
    {
        $messages = [
            'required' => 'El campo :attribute es obligatorio.',
        ];

        $request->validate([
            'codigo' => 'required',
            'password' => 'required',
        ]);
        $codigo = Codigo::where('codigo', $request->codigo)->first();

        if (!$codigo) {
            return back()->withErrors([
                'credenciales' => 'Credenciales incorrectas',
            ]);
        }

        $usuario = Usuario::find($codigo->id_usuario);

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return back()->withErrors([
                'credenciales' => 'Credenciales incorrectas',
            ]);
        }

        Auth::login($usuario);

        $request->session()->regenerate();
        return redirect()->route('principal', ['id' => $usuario]);
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('despuesLogout');

        $response->headers->set('Cache-Control', 'nocache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
    }

    public function vistaComprobarContra($id)
    {
        $user = auth()->id();
        if ($user != $id) {
            return redirect()->back();
        } else {
            return view('vistaCorreo');
        }
    }

    /* Comprobacion de contraseña para acceder a la vista correo */
    public function verificarContra(Request $request)
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
        if (!Hash::check($request->contrasena1, $usuario->password)) {
            // Si la contraseña no coincide, regresamos con un error
            return back()->withErrors(['contrasena1' => 'La contraseña no es correcta']);
        } else {

            // Si la contraseña coincide, redirigimos a la vista 'vistaBandejaEntrada.blade.php'
            return redirect()->route('vistaBandeja', ['id' => $usuario->id]);
        }
    }

    public function vistaBandeja()
    {
        // Obtén el usuario autenticado y sus correos
        $usuario = Auth::user()->load('correos');

        // Muestra la vista 'vistaBandejaEntrada.blade.php' con los datos del usuario
        return view('vistaBandejaEntrada', ['usuario' => $usuario]);
    }

}
