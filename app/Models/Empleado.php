<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',
        'dni_nie',
        'telefono',
        'email',
        'categoria_profesional_id',
        'horas_semanales_contrato',
        'activo',
        'observaciones',
        'extra_data',
    ];

    protected $casts = [
        'activo' => 'boolean',
        'extra_data' => 'array',
    ];

    public function categoriaProfesional()
    {
        return $this->belongsTo(CategoriaProfesional::class);
    }

    public function habilidades()
    {
        return $this->belongsToMany(
            CategoriaProfesional::class,
            'empleado_habilidad',
            'empleado_id',
            'categoria_profesional_id'
        );
    }

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }

    public function ausencias()
    {
        return $this->hasMany(Ausencia::class);
    }

    public function asignaciones()
    {
        return $this->hasMany(Asignacion::class);
    }
}
