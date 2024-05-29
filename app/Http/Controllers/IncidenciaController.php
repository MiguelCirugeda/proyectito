<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Foto;
use App\Models\Incidencia;
use App\Models\Usuario;
use Illuminate\Http\Request;

class IncidenciaController extends Controller
{
    public function vista($id)
    {
        $user = auth()->id();
        if ($user != $id) {
            return redirect()->back();
        } else {
            return view('crearIncidencia');
        }

    }

    public function vistaEdicion($id)
    {
        $user = auth()->id();
        if ($user != $id) {
            return redirect()->back();
        } else {
            $incidencias = Incidencia::with('categoria')->get();
            return view('modificarIncidencia', ['incidencias' => $incidencias]);
        }
    }

    public function vistaDelete($id)
    {
        $user = auth()->id();
        $usuario = Usuario::find($user);
        /* Tiene en cuenta el id del usuario ó que el campo esTecnico este como false
        Asi nos evitamos que un usuario no tecnico acceda a esta vista mediante su id */
        if ($user != $id || !$usuario->esTecnico) {
            return redirect()->back();
        } else {
            $incidencias = Incidencia::all();
            return view('eliminarIncidencia', ['incidencias' => $incidencias]);
        }
    }

    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_creacion' => 'required',
            'estado' => 'required',
            'prioridad' => 'required',
            'categoria' => 'required',
            'formFile' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', 
        ]);

        $incidencia = new Incidencia;
        $incidencia->titulo = $request->titulo;
        $incidencia->descripcion = $request->descripcion;
        $incidencia->fecha = $request->fecha_creacion;
        $incidencia->estado = $request->estado;
        $incidencia->prioridad = $request->prioridad;
        $incidencia->usuario_resuelve_id = null;

        // Asignar el id del usuario que está subiendo la incidencia
        $incidencia->usuario_subio_id = auth()->user()->id;
        $incidencia->save();

        // Creacion categoria
        $categoria = new Categoria;
        $categoria->tipo = $request->categoria;
        $categoria->descripcion = 'Descripción por defecto';
        $categoria->id_incidencia = $incidencia->id;
        $categoria->save();

        $ruta_imagen = 'images/imgPorDefecto.jpg'; 

        if ($request->hasFile('formFile')) {
            $imagen = $request->file('formFile');
            $nombre_imagen = time() . '.' . $imagen->getClientOriginalExtension();
            //creamos un nombre unico compuesto por la hora actual y la extension original del archivo
            /* Se guarda la extension original con getClientOriginalExtension() */
            $destino = public_path('/images');
            $imagen->move($destino, $nombre_imagen);
            $ruta_imagen = 'images/' . $nombre_imagen;

        }
        $foto = Foto::where('id_incidencia', $incidencia->id)->first();

        if ($foto) {

            $foto = new Foto;
            $foto->fecha_subida = now();
            $foto->ruta_imagen = $ruta_imagen;
            $foto->nombre_usuario = auth()->user()->nombre;
            $foto->descripcion = 'Descripción por defecto';
            $foto->id_incidencia = $incidencia->id;
            $foto->save();
        } else {
            $foto = new Foto;
            $foto->ruta_imagen = $ruta_imagen;
            $foto->nombre_usuario = auth()->user()->nombre;
            $foto->descripcion = 'Descripción por defecto';
            $foto->id_incidencia = $incidencia->id;
        }
        $foto->save();

        return redirect()->route('principal', ['id' => auth()->id()]);
    }

    public function update(Request $request, $id)
    {
       

        $request->validate([
            'titulo' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required|in:software,hardware,redes,sistemas,otros',
            'prioridad' => 'required|in:prioridad alta,prioridad media,prioridad baja',

        ]);

        // Buscar la incidencia en la base de datos
        /* Con findOrFail intentamos buscar un registro con el ID que le proporcionamos */
        $incidencia = Incidencia::findOrFail($id);

        // Actualizar los campos de la incidencia
        $incidencia->titulo = $request->input('titulo');
        $incidencia->descripcion = $request->input('descripcion');
        $incidencia->prioridad = $request->input('prioridad');

        
        $incidencia->save();

        // Buscar la categoría asociada con la incidencia
        $categoria = Categoria::where('id_incidencia', $id)->first();

        // Si la categoría existe, actualizar su tipo
        if ($categoria) {
            $categoria->tipo = $request->input('categoria');
            $categoria->save();
        }

        
        return redirect()->route('vista_ModificarIncidencia', ['id' => auth()->id()]);

    }

    public function vistaIncidencias($id)
    {
        $user = auth()->id();
        if ($user != $id) {
            return redirect()->back();
        } else {
            // Obtenemos todas las incidencias con sus categorías
            $incidencias = Incidencia::with(['usuarioSubio', 'categoria'])->get();
            $usuarios = Usuario::has('incidencias')->get();

             /* Obtenemos el usuario actual */
            $usuario = Usuario::find($id);

            // Mapea el tipo de técnico al tipo de categoría
            $mapaTecnicoACategoria = [
                'tecnico de software' => 'software',
                'tecnico de hardware' => 'hardware',
                'tecnico de redes' => 'redes',
                'tecnico de sistemas' => 'sistemas',
                'direccion' => 'otros',
            ];

            // Comprobamos si el usuario es un técnico
            /* Verificamos si una variable esta definida y no es null con isset
            Comprobamos si existe una clave en el array $mapaTecnicoACategoria que corresponda al valor $usuario->tipo_tecnico */
            // Comprobamos si el usuario es un técnico
        if (isset($mapaTecnicoACategoria[$usuario->tipo_tecnico])) {
            $categoria = $mapaTecnicoACategoria[$usuario->tipo_tecnico];
            // Filtra las incidencias basándose en la categoría y el estado 'no resuelta' o 'en proceso'
            $incidencias2 = Incidencia::whereIn('estado', ['no resuelta', 'en proceso'])
                ->whereHas('categoria', function ($query) use ($categoria) {
                    $query->where('tipo', $categoria);
                })
                ->get();

            /* Contamos el número de incidencias pendientes */
            $incidenciasPendientes = $incidencias2->count();
        } else {
            // Si el usuario no es un técnico, no filtra las incidencias y el contador de incidencias pendientes es 0
            $incidenciasPendientes = 0;
        }

        // Retorna la vista con todas las incidencias y el contador de incidencias pendientes
        return view('vistaIncidencias', [
            'incidencias' => $incidencias,
            'usuarios' => $usuarios,
            'incidenciasPendientes' => $incidenciasPendientes,
        ]);
    }
    }

    public function filtrado(Request $request)
    {
        
        $usuario = $request->input('usuario');
        $estado = $request->input('estado');
        $prioridad = $request->input('prioridad');

        /* Se va construyendo la consulta query() con los filtros que le vamos poniendo */
        $query = Incidencia::query();

        if ($usuario) {
            $query->where('usuario_subio_id', $usuario);
        }

        if ($estado) {
            $query->where('estado', $estado);
        }

        if ($prioridad) {
            $query->where('prioridad', $prioridad);
        }

         /* Ejecutamos la consulta y obtenemos las incidencias filtradas */
        $incidencias = $query->get();

        /* Si no seleccionamos ningun campo devolvemos a la misma vista con     ->back() */
        if ($incidencias->isEmpty() || (!$usuario && !$estado && !$prioridad)) {
            /* return redirect()->route('verIncidencias', ['incidencias' => $incidencias]); */

            // Redirigir al usuario a la página anterior
            /* return redirect()->route('verIncidencias', ['id' => $incidencias]); */
            return redirect()->back();

        }

        // Retornar la vista con las incidencias filtradas
        return view('vistaIncidenciasFiltradas', ['incidencias' => $incidencias]);
    }

    public function delete($id)
    {
        // Busca la incidencia por su id
        $incidencia = Incidencia::find($id);

        // Comprobamos si la incidencia existe
        if (!$incidencia) {
            return redirect()->back()->with('error', 'Incidencia no encontrada');
        }

        /* Siempre se va a poder eliminar una incidencia asi que lo anterior NO SE EJECUTARA
        Cuando se elimine me devolvera a la misma pagina */
        $incidencia->delete();

        
        return redirect()->back();
    }

    /* Funcion para cambiar estado de una incidencia  */

    public function estadoIncidencia(Request $request, $id)
    {
        
        $request->validate([
            'estado' => 'required|in:no resuelta,en proceso,resuelta',
        ]);

        // Buscar la incidencia en la base de datos por el id que le pasamos
        $incidencia = Incidencia::findOrFail($id);

        // Actualizar el estado de la incidencia
        $incidencia->estado = $request->input('estado');

        
        $incidencia->save();

       
        return redirect()->back();
    }

    public function misIncidencias($id)
    {

        $user = auth()->id();
        if ($user != $id) {
            return redirect()->back();
        } else {
            // Obtén el usuario actual
            $usuario = Usuario::find($id);

            // Mapea el tipo de técnico al tipo de categoría
            $mapaTecnicoACategoria = [
                'tecnico de software' => 'software',
                'tecnico de hardware' => 'hardware',
                'tecnico de redes' => 'redes',
                'tecnico de sistemas' => 'sistemas',
                'direccion' => 'otros',
            ];
            $categoria = $mapaTecnicoACategoria[$usuario->tipo_tecnico];

            // Comprueba si el usuario es un técnico
            if ($categoria) {
                // Filtra las incidencias basándose en la categoría y el estado 'no resuelta'
                $incidencias = Incidencia::whereIn('estado', ['no resuelta', 'en proceso'])
                    ->whereHas('categoria', function ($query) use ($categoria) {
                        $query->where('tipo', $categoria);
                    })->get();

                // Retorna la vista con las incidencias filtradas
                return view('misIncidencias', ['incidencias' => $incidencias]);
            } else {
                // Si el usuario no es un técnico, redirige a otra página
                return redirect()->back();
            }
        }
    }

}
