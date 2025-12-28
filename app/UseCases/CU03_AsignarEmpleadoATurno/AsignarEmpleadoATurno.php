<?php

namespace App\UseCases\CU03_AsignarEmpleadoATurno;

use App\Models\Empleado;
use App\Models\Turno;
use App\Models\User;
use App\UseCases\CU03_AsignarEmpleadoATurno\DTOs\AsignarEmpleadoATurnoDTO;
use App\UseCases\CU03_AsignarEmpleadoATurno\DTOs\ResultadoAsignacionDTO;

final class AsignarEmpleadoATurno
{
    public function execute(AsignarEmpleadoATurnoDTO $dto, User $actor): ResultadoAsignacionDTO
    {
        $empleado = Empleado::findOrFail($dto->empleadoId);
        
        if (! $empleado->activo) {
            throw new \InvalidArgumentException("El empleado no está activo, no se puede asignar.");
        }
        
        $turno = Turno::findOrFail($dto->turnoId);
        $estadoAsignables = ["planificado", "confirmado"];
        
        if (! in_array($turno->estado, $estadoAsignables, true)) {
            throw new \InvalidArgumentException("El turno no está en un estado asignable ({$turno->estado}).");
        }
        throw new \RuntimeException('TODO: CU03');
    }
}
