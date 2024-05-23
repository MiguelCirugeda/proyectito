<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correo extends Model
{
    use HasFactory;
    protected $table = 'correos';

    public function usuarioDestinatario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_destinatario');
    }

    public function usuarioRemitente()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario_remitente');
    }
}
