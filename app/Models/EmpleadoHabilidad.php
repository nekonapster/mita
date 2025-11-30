<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmpleadoHabilidad extends Model
{
    use HasFactory;

    protected $table = 'empleado_habilidad';

    protected $fillable = [
        'empleado_id',
        'categoria_profesional_id',
    ];

    public $timestamps = true;

    // Relaciones
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function categoriaProfesional()
    {
        return $this->belongsTo(CategoriaProfesional::class);
    }
}

