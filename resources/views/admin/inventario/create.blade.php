<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inventariar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>

                        {{-- FORMULARIO --}}



                        <form class="max-w-xxl mx-auto" method="POST" action="{{ route('admin.inventario.store')}}">
                            @csrf


                            <div class="grid md:grid-cols-2 md:gap-4 mb-4">

                                <div class="relative z-0 w-full mb-5 group">
                                    <label for="id_producto"
                                        class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Productos</label>
                                    <select id="id_producto" name="id_producto"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione</option>
                                        @foreach ($productos as $producto)
                                        <option value="{{$producto->id_producto}}" {{old('id_producto')===$producto->nombre_producto ? 'selected' : ''}}>{{$producto->nombre_producto}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_producto')
                                    <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <label for="id_sucursal"
                                        class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Sucursales</label>
                                    <select id="id_sucursal" name="id_sucursal"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option selected disabled>Seleccione</option>
                                        @foreach ($sucursales as $sucursal)
                                        <option value="{{$sucursal->id_sucursal}}" {{old('id_sucursal')===$sucursal->nombre_sucursal ? 'selected' : ''}}>{{$sucursal->nombre_sucursal}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_sucursal')
                                    <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="number" name="numero_estante" id="numero_estante"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{ old('numero_estante') }}" />
                                    <label for="numero_estante"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Numero
                                        Estante</label>
                                    @error('numero_estante')
                                    <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="number" name="cantidad_piezas" id="cantidad_piezas"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{ old('cantidad_piezas') }}" oninput="calcularTotal()"/>
                                    <label for="cantidad_piezas"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cantidad
                                        de piezas</label>
                                    @error('cantidad_piezas')
                                    <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="grid md:grid-cols-2 md:gap-4">


                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="number" name="cantidad_empaques" id="cantidad_empaques"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " value="{{ old('cantidad_empaques') }}" oninput="calcularTotal()"/>
                                    <label for="cantidad_empaques"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cantidad de Empaques</label>
                                    @error('cantidad_empaques')
                                    <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                
                                

                                    <div class="relative z-0 w-full mb-5 group">
                                        <input type="number" name="piezas_por_empaque" id="piezas_por_empaque"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="{{ old('piezas_por_empaque') }}" oninput="calcularTotal()"/>
                                        <label for="piezas_por_empaque"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cantidad por Empaque</label>
                                        @error('piezas_por_empaque')
                                        <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                                        @enderror
                                    </div>




                                <div class="relative z-0 w-full mb-5 group">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                        for="">Total Piezas:</label>
                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                         id="total_piezas"></label>
                                    @error('total_piezas')
                                    <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>




                            <button type="submit"
                                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Inventariar</button>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function calcularTotal() {
        let cantidadPiezas = document.getElementById('cantidad_piezas').value;
        let cantidadEmpaques = document.getElementById('cantidad_empaques').value;
        let piezasPorEmpaque = document.getElementById('piezas_por_empaque').value;

    
        let totalPiezas = parseInt(cantidadPiezas) + (parseInt(cantidadEmpaques) * parseInt(piezasPorEmpaque));
    
        // document.getElementById('total_piezas').value = isNaN(totalPiezas) ? 0 : totalPiezas;
        document.getElementById('total_piezas').innerText = (isNaN(totalPiezas) ? cantidadPiezas : totalPiezas) + " Piezas";
    }
    </script>