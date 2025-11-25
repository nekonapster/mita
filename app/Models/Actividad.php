<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo',
        'observaciones',
    ];  

    // Relaciones
     public function necesidadesServicio()
    {
        return $this->hasMany(NecesidadServicio::class);
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}
