<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'cliente_id',
        'barbero_id',
        'servicio_id',
        'fecha',
        'hora_inicio',
        'hora_fin',
        'estado',
        'notas'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function barbero()
    {
        return $this->belongsTo(Barbero::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function pago()
    {
        return $this->hasOne(Pago::class);
    }
}
