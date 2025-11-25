<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instalacion extends Model
{
    use HasFactory;


    protected $fillable = [
        'cliente_id',
        'nombre',
        'tipo',
        'direccion',
        'osbervaciones',
        'extra_data',
    ];  
    
    protected $casts = [
        'extra_data' => 'array',
    ];

    // Relaciones
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function proyectos()
    {
        return $this->hasMany(Proyecto::class);
    }


    public function turnos()
    {
        return $this->hasMany(Turno::class); 
    }

}
