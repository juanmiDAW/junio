<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Videojuego
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
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Año
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Desarrolladora id
                                        </th>

                                </thead>
                                <tbody>
                                    @foreach ($videojuegos as $videojuego)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $videojuego->id }}
                                            </th>
                                            <td class="px-6 py-4">
                                                <a href="{{ route('videojuegos.show', $videojuego) }}"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                                    {{ $videojuego->titulo }}
                                                </a>
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $videojuego->anyo }}
                                            </td>

                                        
                                            <td class="px-6 py-4">
                                                {{ $videojuego->desarrolladora_id }}
                                            </td>


                                            <td class="px-6 py-4">
                                                <a href="{{ route('videojuegos.edit', $videojuego) }}"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                    Editar videojuego
                                                </a>
                                            </td>
                                            <td class="px-6 py-4">
                                                <form method="POST"
                                                    action="{{ route('videojuegos.destroy', $videojuego) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="{{ route('videojuegos.destroy', $videojuego) }}"
                                                        class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800"
                                                        onclick="event.preventDefault(); if (confirm('¿Está seguro?')) this.closest('form').submit();">
                                                        Eliminar
                                                    </a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-6 text-center">
                            <a href="{{ route('videojuegos.create') }}"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                Crear un nuevo videojuego
                            </a>
                        </div>

                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Posesion
                        </h2>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                           
                            <tbody>
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Año
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Desarrolladora ID
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Distribuidora ID
                                        </th>

                                </thead>
                                <tbody>
                                    @foreach ($posesiones as $posesion)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $posesion->id }}
                                            </th>
                                            <td class="px-6 py-4">
                                                
                                                    {{ $posesion->videojuego->titulo }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $posesion->videojuego->anyo }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $posesion->videojuego->desarrolladora->nombre }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $posesion->videojuego->desarrolladora->distribuidora->nombre }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
