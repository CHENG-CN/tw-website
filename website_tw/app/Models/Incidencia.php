<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Incidencia extends Model
{
    protected $table = 'incidencias';
    protected $fillable = [
        'titulo',
        'fecha',
        'user_id',
        'detalle',
        'ubicacion',
        'estado',  // solucionado, sin_validar, en_proceso, pendiente
        'foto',
        'info_img',
    ];
}
