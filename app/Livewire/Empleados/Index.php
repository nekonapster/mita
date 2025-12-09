<?php

namespace App\Livewire\Empleados;

use App\Models\CategoriaProfesional; // 👈 IMPORTANTE
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    // public function mount()
    // {
    //     if (! auth()->user()->hasAtLeastRole('rrhh')) {
    //         abort(403);
    //     }
    // }

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'dni_nie' => 'required|string|unique:empleados',
        'telefono' => 'nullable|string',
        'email' => 'required|email|unique:empleados',
        'categoria_profesional_id' => 'required|exists:categorias_profesionales,id',
        'horas_semanales_contratadas' => 'required|integer|min:1',
    ];

    public function render()
    {
        // 👇 ESTO ES LO QUE FALTABA
        $categoriasProfesionales = CategoriaProfesional::orderBy('nombre')->get();

        return view('livewire.empleados.index', [
            // 'empleados' => $empleados,
            'categoriasProfesionales' => $categoriasProfesionales,
        ]);
    }
}
