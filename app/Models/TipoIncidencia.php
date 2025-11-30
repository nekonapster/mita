<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoIncidencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'codigo',
        'afecta_pago',
        'descripcion',
    ];


    protected $casts = [
        'afecta_pago' => 'boolean',
    ];

    public function incidencias()
    {
        return $this->hasMany(Incidencia::class, 'tipo_incidencia_id');
    }

}
