<?php

namespace App\Livewire\Empleados;

use App\Models\Empleado;
use App\Models\CategoriaProfesional;
use Livewire\Component;

class Edit extends Component
{
    public Empleado $empleado;

    public string $nombre = '';
    public string $apellidos = '';
    public string $dni_nie = '';
    public ?string $telefono = null;
    public ?string $email = null;
    public ?int $categoria_profesional_id = null;
    public ?int $horas_semanales_contrato = null;
    public bool $activo = true;
    public ?string $observaciones = null;
    public array $extra_data = [];

    public function mount(Empleado $empleado): void
    {
        // if (! auth()->user()->hasAtLeastRole('rrhh')) {
        //     abort(403);
        // }

        $this->empleado = $empleado;

        // Cargar valores iniciales
        $this->nombre                    = $empleado->nombre;
        $this->apellidos                 = $empleado->apellidos;
        $this->dni_nie                   = $empleado->dni_nie;
        $this->telefono                  = $empleado->telefono;
        $this->email                     = $empleado->email;
        $this->categoria_profesional_id  = $empleado->categoria_profesional_id;
        $this->horas_semanales_contrato  = $empleado->horas_semanales_contrato;
        $this->activo                    = $empleado->activo;
        $this->observaciones             = $empleado->observaciones;
        $this->extra_data                = $empleado->extra_data ?? [];
    }

    public function rules(): array
    {
        return [
            'nombre'                   => ['required', 'string', 'max:255'],
            'apellidos'                => ['required', 'string', 'max:255'],

            // Ignorar el valor actual:
            'dni_nie'                  => ['required', 'string', 'max:255', 'unique:empleados,dni_nie,' . $this->empleado->id],
            'email'                    => ['required', 'email', 'max:255', 'unique:empleados,email,' . $this->empleado->id],

            'telefono'                 => ['nullable', 'string', 'max:255'],
            'categoria_profesional_id' => ['required', 'exists:categorias_profesionales,id'],
            'horas_semanales_contrato' => ['required', 'integer', 'min:1'],
            'activo'                   => ['boolean'],
            'observaciones'            => ['nullable', 'string'],
        ];
    }

        public function save(): void
        {
            $data = $this->validate();

            $data['extra_data'] = $this->extra_data;

            $this->empleado->update($data);

            session()->flash('status', 'Empleado actualizado correctamente.');

            $this->redirectRoute('rrhh.empleados.index');
        }

    public function render()
    {
        return view('livewire.empleados.edit', [
            'categoriasProfesionales' => CategoriaProfesional::orderBy('nombre')->get(),
        ]);
    }
}
