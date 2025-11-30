<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NecesidadServicio extends Model
{
        use HasFactory;

    protected $fillable = [
        'proyecto_id',
        'categoria_profesional_id',
        'actividad_id',
        'dia_semana',
        'hora_inicio',
        'hora_fin',
        'cantidad_personas',
        'observaciones',
    ];

    protected $casts = [
        'hora_inicio' => 'datetime:H:i',
        'hora_fin' => 'datetime:H:i',
    ];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }

    public function categoriaProfesional()
    {
        return $this->belongsTo(CategoriaProfesional::class);
    }

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}
