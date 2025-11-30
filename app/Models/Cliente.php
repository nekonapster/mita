<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'tipo',
        'cif_nif',
        'direccion',
        'persona_contacto',
        'telefono',
        'email',
        'observaciones',
        'extra_data',
    ];

    protected $casts = [
        'extra_data' => 'array',
    ];


    // Relaciones
    public function instalaciones()
    {
        return $this->hasMany(Instalacion::class);
    }
   
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }

}
