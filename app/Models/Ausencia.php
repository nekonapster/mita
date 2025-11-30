<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ausencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'tipo',
        'fecha_inicio',
        'fecha_fin',
        'es_asuntos_propios',
        'proyecto_id',
        'observaciones',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
        'es_asuntos_propios' => 'boolean',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}
