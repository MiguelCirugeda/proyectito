<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    /* Comentario pertenece a un usuario */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    // Un comentario pertenece a una incidencia
    public function incidencia()
    {
        return $this->belongsTo(Incidencia::class);
    }

    // Un comentario puede tener muchos comentarios hijos
    public function respuestas()
    {
        return $this->hasMany(Comentario::class, 'comentario_padre_id');
    }

    // Un comentario puede pertenecer a un comentario padre
    public function padre()
    {
        return $this->belongsTo(Comentario::class, 'comentario_padre_id');
    }


}
