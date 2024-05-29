<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{

    public function vista()
    {
        return view('formRegistro');
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'La contraseña es obligatoria.',
            'min' => 'Las contraseñas deben tener al menos :min caracteres.',
            'same' => 'Las contraseñas no coinciden.',
            'codigo' => 'El codigo no es valido',
            'regex' => 'La contraseña debe contener al menos una letra mayúscula y una minúscula, y no debe contener símbolos ni espacios.',
        ];

        $this->validate($request, [
            'nombre' => 'required',
            'apellido' => 'required',
            'categoria_usuario' => 'required|in:diseñador,programador,sistema,direccion',
            'contrasena1' => 'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]+$/',
            /* 'contrasena2' => 'required|min:6|same:contrasena1', */
            'contrasena2' => 'required|min:6|same:contrasena1|regex:/^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]+$/',
            'codigo' => 'required|exists:codigos,codigo',
        ], $messages);


        // Buscar el código en la tabla 'codigos'
        $codigo = DB::table('codigos')->where('codigo', $request->codigo)->first();
        if (!$codigo) {
            return back()->withErrors(['codigo' => 'El código no es válido']);
        } else if ($codigo->estado != 0 || $codigo->id_usuario != null) {
            return back()->withErrors(['codigo' => 'El código no está disponible']);
        } else if ($request->contrasena1 !== $request->contrasena2) {
            return back()->withErrors(['contrasena' => 'Las contraseñas no coinciden']);
        } else {
            $registro = new Usuario();
            $registro->nombre = $request->nombre;
            $registro->apellido = $request->apellido;
            $registro->categoria_usuario = $request->categoria_usuario;
            $registro->tipo_tecnico = $request->tipo_tecnico; 
            $registro->password = Hash::make($request->contrasena1);
            $registro->esTecnico = $request->input('esTecnico', false);

            $registro->save();

            /* Una vez registrado actualizamos es estado del codigo para que no este disponible */
            // Actualizar el estado y el usuario_id en la tabla 'codigos'
            DB::table('codigos')
                ->where('codigo', $request->codigo)
                ->update(['estado' => 1, 'id_usuario' => $registro->id]);

            return redirect()->route('index');
        }
    }
}
