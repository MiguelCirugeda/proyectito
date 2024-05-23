<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Una categoría puede tener muchas incidencias
    public function incidencia()
{
    return $this->belongsTo(Incidencia::class, 'id_incidencia');
}
}
