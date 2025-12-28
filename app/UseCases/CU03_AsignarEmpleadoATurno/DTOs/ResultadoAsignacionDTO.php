<?php

namespace App\UseCases\CU03_AsignarEmpleadoATurno\DTOs;

final class ResultadoAsignacionDTO
{
    public function __construct(
        public readonly int $asignacionId,
        public readonly string $estado,
        public readonly string $mensaje,
    ) {}
}   