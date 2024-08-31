<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('admin.producto.create') }}">
                    <button type="button"
                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 right" >Ingresar
                        Producto</button>
                        

                    </a>
                    <div>


                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Imagen Producto
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nombre
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Codigo de barra
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Codigo QR
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Lote N.°
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tipo Producto
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Descripción
                                        </th>
                                        <th scope="col" colspan="2" class="px-6 py-3">
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($productos->isEmpty())
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
                                    @foreach ($productos as $producto)
                                    <tr>
                                        <td class="px-6 py-4">

                                            <img class="h-20 max-w-lg mx-auto"
                                                src="/storage/img/productos/{{ basename($producto->imagen_producto) }}" alt="{{$producto->nombre_producto}}">

                                        </td>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$producto->nombre_producto}}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{$producto->codigo_barra}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <img class="h-20 max-w-lg mx-auto"
                                                src="/storage/img/qr/{{$producto->codigo_qr}}" alt="image description">
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$producto->lote_id}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$producto->tipoProducto->nombre_tipo_producto}}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{$producto->descripcion}}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="w-full flex justify-between items-center">
                                                <a href="{{route('admin.producto.edit', $producto)}}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-1">Editar</a>
                                                <a href="#"
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline ml-1" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $producto->id_producto }}').submit(); return confirm('¿Estás seguro de que deseas eliminar este producto?');">Eliminar</a>
                                                <form id="delete-form-{{ $producto->id_producto }}" action="{{ route('admin.producto.destroy', $producto->id_producto) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
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
    </div>


    
</x-app-layout>

