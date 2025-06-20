<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver mueble
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                ID mueble
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $mueble->id }}
                            </dd>
                        </div>
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Denominacion
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $mueble->denominacion }}
                            </dd>
                        </div>

                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Precio
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $mueble->precio }}
                            </dd>
                        </div>
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Tipo de mueble
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $mueble->fabricable_type === 'App\Models\Fabricado' ? 'Fabricado' : 'Prefabricado'}}
                            </dd>
                        </div>
                        @if ($mueble->fabricable_type == 'App\Models\Fabricado')
                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Ancho
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $mueble->fabricable->ancho }}
                            </dd>
                        </div>

                        <div class="flex flex-col pb-3">
                            <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">
                                Alto
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $mueble->fabricable->alto }}
                            </dd>
                        </div>
                        @endif
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>