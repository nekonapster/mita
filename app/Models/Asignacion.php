<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asignacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'turno_id',
        'empleado_id',
        'tipo',
        'creado_por',
        'observaciones',
    ];

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }

    public function creador()
    {
        return $this->belongsTo(User::class, 'creado_por');
    }
}
