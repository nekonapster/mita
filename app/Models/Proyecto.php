<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_programa',
        'cliente_id',
        'instalacion_id',
        'fecha_inicio',
        'fecha_fin',
        'dias_habiles',
        'hora_inicio_global',
        'hora_fin_global',
        'estado',
        'observaciones',
        'extra_data',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'dias_habiles' => 'array',
        'hora_inicio_global' => 'datetime:H:i',
        'hora_fin_global' => 'datetime:H:i',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function instalacion()
    {
        return $this->belongsTo(Instalacion::class);
    }

    public function necesidadesServicio()
    {
        return $this->hasMany(NecesidadServicio::class); 
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }

    public function ausencias()
    {
        return $this->hasMany(Ausencia::class);
    }
}
