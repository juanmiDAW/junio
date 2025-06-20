<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Carrito
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex gap-x-20">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Denominacion
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Cantidad
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Importe
                                        </th>

                                </thead>

                                <tbody>

                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($carritos as $carrito)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="px-6 py-4">
                                                {{-- <a href="{{ route('alumnos.show', $carrito) }}" --}}
                                                {{-- class="font-medium text-blue-600 dark:text-blue-500 hover:underline"> --}}
                                                {{ $carrito->zapato->denominacion }}
                                                {{-- </a> --}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $carrito->zapato->precio }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $carrito->cantidad }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @php
                                                    $importe = $carrito->zapato->precio * $carrito->cantidad;
                                                    $total += $importe;
                                                @endphp
                                                {{ $importe }} euros
                                            </td>
                                            <td class="px-6 py-4">
                                                <a href="{{route('mas',$carrito->zapato->id)}}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">+</a>
                                                <a href="{{route('menos', $carrito->zapato->id)}}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">-</a>

                                            </td>
                                    @endforeach

                                </tbody>
                            </table>
                            <div  class="flex">
                                <label for="">Total: </label>
                                <p> {{$total}} euros</p>

                                <a href="{{route('realizarPedido', $carritos)}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Realizar pedido</a>
                            </div>
                        </div>
                        {{-- <div class="mt-6 text-center">
                            <a href="{{ route('alumnos.create') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Crear un nuevo alumno
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
