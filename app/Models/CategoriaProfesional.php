<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProfesional extends Model
{
    use HasFactory;

    protected $table = 'categorias_profesionales';

    protected $fillable = [
        'nombre',
        'codigo',
        'descripcion',
    ];

    // Relaciones

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }

    public function empleadosHabilidad()
    {
        return $this->belongsToMany(
            Empleado::class,
            'empleado_habilidad',
            'categoria_profesional_id',
            'empleado_id'    
        );
    }

    public function necesidadesServicio()
    {
        return $this->hasMany(NecesidadServicio::class);
    }

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}
