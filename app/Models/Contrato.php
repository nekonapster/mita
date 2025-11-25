<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'fecha_inicio',
        'fecha_fin',
        'horas_semanales',
        'tipo_contrato',
        'observaciones',
    ];

    protected $casts = [
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
