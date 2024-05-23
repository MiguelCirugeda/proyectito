<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class Usuario extends Authenticatable
{
    use HasFactory;

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class, 'usuario_subio_id');
    }
    
    public function codigo()
    {
        return $this->hasOne(Codigo::class, 'id_usuario');
    }

     // Un usuario puede resolver muchas incidencias
     public function incidenciasResueltas()
     {
         return $this->hasMany(Incidencia::class, 'usuario_resuelve_id');
     }

     /* Un usuario puede tener muchos comentarios */
     public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

     /* Un usuario puede recibir muchos correos */
    public function correosRecibidos()
    {
        return $this->hasMany(Correo::class, 'id_usuario_destinatario');
    }

    /* Un usuario puede enviar muchos correos */
    public function correosEnviados()
    {
        return $this->hasMany(Correo::class, 'id_usuario_remitente');
    }

     
}
