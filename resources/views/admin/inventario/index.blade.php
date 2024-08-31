<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inventario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    



                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Busqueda</h3>

                        <a href="{{ route('admin.inventario.create') }}">
                            <button type="button"
                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 right" >inventariar
                                Producto</button>
                                
        
                            </a>
                    </div>
                    
                        <div>
    
    
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="search-table">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Nombre
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Stock
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Tipo Producto
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Numero de estante
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Sucursal
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Ciudad
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Lote N.°
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Codigo barra
                                            </th>
                                            <th scope="col" colspan="2" class="px-6 py-3">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($inventarios->isEmpty())
                                        <tr
                                            class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                            <td colspan="8">
    
                                                <h3
                                                    class="mt-4 mb-4 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-3xl dark:text-white text-center">
                                                    No se han registrado Productos
                                                </h3>
                                            </td>
                                        </tr>
    
                                        @else
                                        @foreach ($inventarios as $inventario)
                                        <tr>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$inventario->producto->nombre_producto}}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{$inventario->total_piezas}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$inventario->producto->tipoProducto->nombre_tipo_producto}}
                                            </td>
                                            <td class="px-6 py-4">
                                                Estante N.° {{$inventario->numero_estante}}
                                            </td>
                                            <th class="px-6 py-4">
                                                {{$inventario->sucursal->nombre_sucursal}}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{$inventario->sucursal->ciudad->nombre_ciudad}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$inventario->producto->lote_id}}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{$inventario->producto->codigo_barra}}
                                            </td>
                                            <td class="px-6 py-4" colspan="2">
                                                <a href="#"
                                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                                                <a href="#"
                                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</a>
                                                
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
    
    
                                    </tbody>
                                </table>
                            </div>





                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    

    if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
    const dataTable = new simpleDatatables.DataTable("#search-table", {
        searchable: true,
        sortable: false
    });
}


</script>