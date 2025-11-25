<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'turno_id',
        'proyecto_id',
        'tipo_incidencia_id',
        'coordinador_id',
        'fecha_hora',
        'descripcion',
        'gravedad',
    ];

    protected $casts = [
        'fecha_hora' => 'datetime',
        'gravedad' => 'integer',
    ];

    public function empleado()
{
    return $this->belongsTo(Empleado::class);
}

public function turno()
{
    return $this->belongsTo(Turno::class);
}

public function proyecto()
{
    return $this->belongsTo(Proyecto::class);
}

public function tipoIncidencia()
{
    return $this->belongsTo(TipoIncidencia::class, 'tipo_incidencia_id');
}

public function coordinador()
{
    return $this->belongsTo(User::class, 'coordinador_id');
}


}
