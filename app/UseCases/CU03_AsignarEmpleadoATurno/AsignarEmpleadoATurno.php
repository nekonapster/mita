<?php

namespace App\UseCases\CU03_AsignarEmpleadoATurno;

use App\Models\User;
use App\UseCases\CU03_AsignarEmpleadoATurno\DTOs\AsignarEmpleadoATurnoDTO;
use App\UseCases\CU03_AsignarEmpleadoATurno\DTOs\ResultadoAsignacionDTO;

final class AsignarEmpleadoATurno
{
    public function execute(AsignarEmpleadoATurnoDTO $dto, User $actor): ResultadoAsignacionDTO
    {
        throw new \RuntimeException('TODO: CU03');
    }
}
