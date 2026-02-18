<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuario';   // nombre de tu tabla
    public $timestamps = false;     // si tu tabla no tiene created_at/updated_at

    protected $fillable = [
        'nombre',
        'email',
        'password'

    ];

    protected $hidden = [
        'password',
    ];
}
