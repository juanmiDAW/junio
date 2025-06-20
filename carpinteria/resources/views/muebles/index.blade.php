@php
    use App\Models\Nota;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Muebles
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-x-20">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Denomicacion
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Precio
                                        </th>
                                </thead>
                                <tbody>
                                    @foreach ($muebles as $mueble)
                                        <tr
                                            class="bg-white border-b hover:bg-gray-50">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $mueble->id }}
                                            </th>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('muebles.show', $mueble) }}"
                                                    class="font-medium text-blue-600 hover:underline">
                                                    {{ $mueble->denominacion }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4">
                                                    {{ $mueble->precio }}
                                            </td>
                                            <td class="flex">
                                                <a href="{{ route('muebles.edit', $mueble) }}"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                                    Editar mueble
                                                </a>

                                                <form action="{{ route('muebles.destroy', $mueble) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit"
                                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                                        Eliminar mueble
                                                    </button>
                                                </form>

                                                <form action="{{ route('pedidos.store') }}" method="post">
                                                    @csrf

                                                    <input type="hidden" name="mueble_id" value="{{$mueble->id}}">
                                                    <button type="submit"
                                                        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                                        Añadir a pedido
                                                    </button>
                                                </form>
                                            </td>
                                          
                                            {{-- <td class="px-6 py-4">
                                                <a href="{{ route('alumnos.notas', ['alumno'=>$alumno->id]) }}"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                                    Ver notas
                                                </a>
                                            </td> --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-6 text-center">
                            <a href="{{ route('muebles.create') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none">
                                Crear un nuevo mueble
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
