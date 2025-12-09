        <div class="card bg-base-100 shadow">
            <div class="card-body space-y-4">

                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-error">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <!-- FORMULARIO -->
                <form wire:submit.prevent="save" class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <label class="form-control">
                            <span class="label-text">Nombre *</span>
                            <input type="text" class="input input-bordered" wire:model.defer="nombre">
                        </label>

                        <label class="form-control">
                            <span class="label-text">Apellidos *</span>
                            <input type="text" class="input input-bordered" wire:model.defer="apellidos">
                        </label>

                        <label class="form-control">
                            <span class="label-text">DNI / NIE *</span>
                            <input type="text" class="input input-bordered" wire:model.defer="dni_nie">
                        </label>

                        <label class="form-control">
                            <span class="label-text">Teléfono</span>
                            <input type="text" class="input input-bordered" wire:model.defer="telefono">
                        </label>

                        <label class="form-control">
                            <span class="label-text">Email *</span>
                            <input type="email" class="input input-bordered" wire:model.defer="email">
                        </label>

                        <label class="form-control">
                            <span class="label-text">Categoría profesional *</span>
                            <select class="select select-bordered" wire:model.defer="categoria_profesional_id">
                                <option value="">-- seleccionar --</option>
                                @foreach($categoriasProfesionales as $categoria)
                                <option value="{{ $categoria->id }}">
                                    {{ $categoria->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </label>

                        <label class="form-control">
                            <span class="label-text">Horas semanales *</span>
                            <input type="number" min="1" class="input input-bordered"
                                wire:model.defer="horas_semanales_contratadas">
                        </label>

                        <label class="form-control flex flex-row items-center gap-2 mt-6">
                            <input type="checkbox" class="toggle" wire:model.defer="activo">
                            <span class="label-text">Activo</span>
                        </label>
                    </div>

                    <label class="form-control">
                        <span class="label-text">Observaciones</span>
                        <textarea class="textarea textarea-bordered w-full"
                            wire:model.defer="observaciones"></textarea>
                    </label>

                    <div class="flex justify-end gap-2 mt-5">
                        <a href="{{ route('rrhh.empleados.index') }}" class="btn btn-ghost">
                            Cancelar
                        </a>

                        <button type="submit" class="btn btn-primary">
                            Guardar cambios
                        </button>
                    </div>

                </form>
                <!-- FIN FORMULARIO -->

            </div>
        </div>