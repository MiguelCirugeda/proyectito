<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    // Una incidencia puede tener muchos comentarios
    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'id_incidencia');
    }

    // Una incidencia pertenece a una categoría
    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id_incidencia');
    }

    // Una incidencia puede tener muchas fotos
    public function fotos()
    {
        return $this->hasMany(Foto::class, 'id_incidencia');
    }
    public function usuarioResuelve()
    {
        return $this->belongsTo(Usuario::class, 'usuario_resuelve_id');
    }

    public function usuarioSubio()
    {
        return $this->belongsTo(Usuario::class, 'usuario_subio_id');
    }

}
