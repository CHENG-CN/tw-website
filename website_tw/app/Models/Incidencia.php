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


    public function getBadgeColorAttribute()
    {
        // Limpiamos el string por si acaso
        $estado = strtolower(trim($this->estado));

        switch ($estado) {
            case 'solucionado':
                return 'bg-success text-white'; 
            case 'en_proceso':
                return 'bg-primary text-white';
            case 'pendiente':
                return 'bg-warning text-dark'; 
            case 'rechazado':
                return 'bg-danger text-white';
            case 'sin_validar':
                return 'bg-secondary text-white';
            default:
                return 'bg-dark text-white';
        }
    }

    public function getEstadoTextoAttribute()
    {
        return strtoupper(str_replace('_', ' ', $this->estado ?? 'POR VALIDAR'));
    }

}
