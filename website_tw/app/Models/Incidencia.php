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
        'estado',  // solucionado, sin_validar, en_proceso, pendiente, rechazado
        'foto',
        'info_img',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
