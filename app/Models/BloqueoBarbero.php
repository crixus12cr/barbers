<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloqueoBarbero extends Model
{
    protected $table = 'bloqueos_barberos';

    protected $fillable = [
        'barbero_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'motivo',
    ];

    public function barbero()
    {
        return $this->belongsTo(Barbero::class);
    }
}
