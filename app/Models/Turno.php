<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
     use HasFactory;

    protected $fillable = [
        'proyecto_id',
        'fecha',
        'hora_inicio',
        'hora_fin',    
        'instalacion_id',
        'actividad_id',
        'categoria_profesional_id',
        'necesidad_servicio_id',
        'estado',
        'observaciones',
    ];

    protected $casts = [
        'fecha' => 'date',
        'hora_inicio' => 'datetime:H:i',
        'hora_fin' => 'datetime:H:i',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function instalacion()
    {
        return $this->belongsTo(Instalacion::class);
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }

    public function categoriaProfesional()
    {
        return $this->belongsTo(CategoriaProfesional::class);
    }

    public function necesidadServicio()
    {
        return $this->belongsTo(NecesidadServicio::class);
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }
}
