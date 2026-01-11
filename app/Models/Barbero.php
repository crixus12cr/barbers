<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barbero extends Model
{
    protected $fillable = [
        'usuario_id', 
        'anios_experiencia', 
        'activo'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function horarios()
    {
        return $this->hasMany(HorarioBarbero::class);
    }

    public function bloqueos()
    {
        return $this->hasMany(BloqueoBarbero::class);
    }
}
