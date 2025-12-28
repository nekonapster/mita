<?php

namespace App\UseCases\CU03_AsignarEmpleadoATurno\DTOs;

final class AsignarEmpleadoATurnoDTO
{
    public function __construct(
        public readonly int $empleadoId,
        public readonly int $turnoId,
        public readonly ?string $observaciones = null,
    ) {
    }
}