<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorarioBarbero extends Model
{
    protected $table = 'horarios_barberos';

    protected $fillable = [
        'barbero_id',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
    ];

    public function barbero()
    {
        return $this->belongsTo(Barbero::class);
    }
}
