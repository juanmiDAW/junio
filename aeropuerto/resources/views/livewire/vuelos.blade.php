<div>
    @if (session('info'))
        @if (session('info') === 'No hay plazas disponibles')
            <div class="alert alert-success bg-red-500">
                {{ session('info') }}
            </div>
        @else
            <div class="alert alert-success bg-green-500">
                {{ session('info') }}
            </div>
        @endif
    @endif

    <label for="vuelo">Selecciona un vuelo:</label>
    <select name="vuelo" id="vuelo" wire:model.live="vueloSeleccionado">
        <option value="">Seleccione un vuelo</option>
        @foreach ($vuelos as $vuelo)
            <option value="{{ $vuelo->id }}">
                {{ $vuelo->aeropuertoOrigen->nombre }} - {{ $vuelo->aeropuertoDestino->nombre }}
            </option>
        @endforeach
    </select>

    @if ($resultado)
        <table border="1" class="mt-4">
            <tr>
                <th scope="col" class="px-6 py-3">Código</th>
                <th scope="col" class="px-6 py-3">Origen</th>
                <th scope="col" class="px-6 py-3">Destino</th>
                <th scope="col" class="px-6 py-3">Salida</th>
                <th scope="col" class="px-6 py-3">Llegada</th>
                <th scope="col" class="px-6 py-3">Plazas</th>
                <th scope="col" class="px-6 py-3">Precio</th>
                <th scope="col" class="px-6 py-3">Numero de plazas disponibles</th>
                <th scope="col" class="px-6 py-3">Asientos disponibles</th>

            </tr>
            <tr>
                <td class="px-6 py-4 text-center">{{ $resultado->codigo }}</td>
                <td class="px-6 py-4 text-center">{{ $resultado->aeropuertoOrigen->nombre }}</td>
                <td class="px-6 py-4 text-center">{{ $resultado->aeropuertoDestino->nombre }}</td>
                <td class="px-6 py-4 text-center">{{ $resultado->salida }}</td>
                <td class="px-6 py-4 text-center">{{ $resultado->llegada }}</td>
                <td class="px-6 py-4 text-center">{{ $resultado->plazas }}</td>
                <td class="px-6 py-4 text-center">{{ $resultado->precio }}</td>
               
                <td class="px-6 py-4 text-center">{{ $plazasDisponibles }}</td>

                <td>
                    <form action="{{ route('reservas.store') }} " method="POST">
                        @csrf
                        <input type="hidden" name="vuelo_id" value="{{ $resultado->id }}">
                        <select name="asiento" id="asiento">
                            @for ($i = 1; $i <= $vuelo->plazas; $i++)
                                @if (!in_array($i, $ocupados))
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endif
                            @endfor
                        </select>
                        <button type="submit"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Reservar</button>
                    </form>
                </td>
            </tr>
        </table>
    @else
        <p class="mt-4">Selecciona un vuelo para ver los detalles.</p>
    @endif
</div>
