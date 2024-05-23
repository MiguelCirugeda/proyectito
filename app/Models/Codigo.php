<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codigo extends Authenticatable
{
    use HasFactory;
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }
}
