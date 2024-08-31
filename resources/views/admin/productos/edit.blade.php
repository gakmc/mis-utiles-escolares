<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Producto'), $producto->nombre_producto }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        {{-- FORMULARIO --}}
                        <form class="max-w-xxl mx-auto" method="POST" action="{{ route('admin.producto.update', $producto->id_producto)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="grid md:grid-cols-2 md:gap-4 mb-4">
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="nombre_producto" id="nombre_producto"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{ old('nombre_producto', $producto->nombre_producto) }}" autofocus/>
                                    <label for="nombre_producto"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                                    @error('nombre_producto')
                                    <div class="alert alert-danger"  style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="number" name="codigo_barra" id="codigo_barra"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{ old('codigo_barra', $producto->codigo_barra) }}"/>
                                    <label for="codigo_barra"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Codigo
                                        de Barra</label>
                                    @error('codigo_barra')
                                    <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="number" name="lote_id" id="lote_id"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{ old('lote_id', $producto->lote_id) }}"/>
                                    <label for="lote_id"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">N.°
                                        Lote</label>
                                    @error('lote_id')
                                    <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <textarea id="descripcion" name="descripcion" rows="1"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Descripción">{{ old('descripcion', $producto->descripcion) }}</textarea>
                                    @error('descripcion')
                                    <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 md:gap-4">
                                <div class="relative z-0 w-full mb-5 group">
                                    <label for="tipo_producto_id"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Tipo de
                                        Producto</label>
                                    <select id="tipo_producto_id" name="tipo_producto_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option disabled>Seleccione</option>
                                        @foreach ($tipos as $tipo)
                                        <option value="{{$tipo->id_tipo_producto}}" {{ old('tipo_producto_id', $producto->tipo_producto_id) == $tipo->id_tipo_producto ? 'selected' : '' }}>{{$tipo->nombre_tipo_producto}}</option>
                                        @endforeach
                                    </select>
                                    @error('tipo_producto_id')
                                    <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"
                                        for="imagen_producto">Imagen Producto</label>
                                    <input
                                    class="block w-full mb-2 text-sm font-medium text-gray-900 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="imagen_producto" name="imagen_producto" type="file">
                                    @error('imagen_producto')
                                    <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit"
                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Guardar
                                Cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
