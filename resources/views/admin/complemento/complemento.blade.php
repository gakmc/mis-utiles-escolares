<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Complementos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    


                    <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="sm:hidden">
                            <label for="tabs" class="sr-only">Seleccionar opción</label>
                            <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="showTabContent(this.value)">
                                <option value="sucursales">Sucursales</option>
                                <option value="tipos">Tipos de Producto</option>
                                <option value="ciudades">Ciudades</option>
                            </select>
                        </div>
                        <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400 rtl:divide-x-reverse" id="fullWidthTab" role="tablist">
                            <li class="w-full">
                                <button onclick="showTabContent('sucursales')" id="sucursales-tab" type="button" role="tab" aria-controls="sucursales" class="inline-block w-full p-4 rounded-ss-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Sucursales</button>
                            </li>
                            <li class="w-full">
                                <button onclick="showTabContent('tipos')" id="tipos-tab" type="button" role="tab" aria-controls="tipos" class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Tipos de Producto</button>
                            </li>
                            <li class="w-full">
                                <button onclick="showTabContent('ciudades')" id="ciudades-tab" type="button" role="tab" aria-controls="ciudades" class="inline-block w-full p-4 rounded-se-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Ciudades</button>
                            </li>
                        </ul>
                        <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                            <div class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="sucursales" role="tabpanel" aria-labelledby="sucursales-tab">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Sucursales</h3>
                                    <a href="{{route('admin.sucursal.create')}}">

                                        <button class="px-4 py-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-600 dark:hover:bg-blue-700">Añadir</button>
                                    </a>
                                </div>
                                <ul class="mt-2 text-gray-700 dark:text-gray-300">
                                    @if ($sucursales->isEmpty())
                                        <li class="py-1">No existen registros</li>
                                    @else
                                        
                                    @foreach($sucursales as $sucursal)
                                    <li class="py-1">{{ $sucursal->nombre_sucursal }} - {{$sucursal->ciudad->nombre_ciudad}} - @if (is_null($sucursal->direccion))
                                        No Registra direccion
                                    @else
                                    
                                    {{$sucursal->direccion}}
                                    @endif
                                </li>
                                    
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                    
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="tipos" role="tabpanel" aria-labelledby="tipos-tab">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tipos de Producto</h3>
                                    <a href="{{route('admin.tipo_producto.create')}}">

                                        <button class="px-4 py-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-600 dark:hover:bg-blue-700">Añadir</button>
                                    </a>
                                </div>
                                <ul class="mt-2 text-gray-700 dark:text-gray-300">
                                    @if ($tipos->isEmpty())
                                        <li class="py-1">No existen registros</li>
                                    @else
                                        
                                    @foreach($tipos as $tipo)
                                    <li class="py-1">{{ $tipo->nombre_tipo_producto }}</li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                    
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="ciudades" role="tabpanel" aria-labelledby="ciudades-tab">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Ciudades</h3>
                                    <a href="{{route('admin.ciudad.create')}}">

                                        <button class="px-4 py-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-600 dark:hover:bg-blue-700">Añadir</button>
                                    </a>
                                </div>
                                <ul class="mt-2 text-gray-700 dark:text-gray-300">
                                    @if ($ciudades->isEmpty())
                                        <li class="py-1">No existen registros</li>
                                    @else
                                        
                                    @foreach($ciudades as $ciudad)
                                    <li class="py-1">{{ $ciudad->nombre_ciudad }}</li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    



                </div>
            </div>
        </div>
    </div>
</x-app-layout>

                
<script>
    function showTabContent(tabId) {
        document.querySelectorAll('[role="tabpanel"]').forEach(function(tabContent) {
            tabContent.classList.add('hidden');
        });
        document.getElementById(tabId).classList.remove('hidden');
    }

    // Obtiene el parámetro "tab" de la URL
    const urlParams = new URLSearchParams(window.location.search);
    const tab = urlParams.get('tab');

    // Mostrar la pestaña correspondiente si "tab" existe, de lo contrario mostrar "sucursales"
    if (tab) {
        showTabContent(tab);
    } else {
        showTabContent('sucursales');
    }
</script>
                