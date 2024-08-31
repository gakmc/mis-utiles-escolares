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
                            </select>
                        </div>
                        <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400 rtl:divide-x-reverse" id="fullWidthTab" role="tablist">

                            <li class="w-full">
                                <button onclick="showTabContent('sucursales')" id="sucursales-tab" type="button" role="tab" aria-controls="sucursales" class="inline-block w-full p-4 rounded-se-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Sucursales</button>
                            </li>
                        </ul>
                        <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
               
                    
                            <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="sucursales" role="tabpanel" aria-labelledby="sucursales-tab">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Ingrese la informacion de la sucursal</h3>
                                </div>


                                <form class="max-w-xxl mx-auto" method="POST" action="{{ route('admin.sucursal.store')}}" >
                                    @csrf
        
        
                                    <div class="grid md:grid-cols-3 md:gap-4 mb-4 mt-4">
        
                                        <div class="relative z-0 w-full mb-5 group">
                                            <input type="text" name="nombre_sucursal" id="nombre_sucursal"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " value="{{ old('nombre_sucursal') }}" autofocus/>
                                            <label for="nombre_sucursal"
                                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                                            @error('nombre_sucursal')
                                            <div class="alert alert-danger" style="color: red" style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>


                                        <div class="relative z-0 w-full mb-5 group">
                                            <select id="ciudad_id" name="ciudad_id"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected disabled>Seleccione</option>
                                                @foreach ($ciudades as $ciudad)
                                                <option value="{{$ciudad->id_ciudad}}" {{old('id_ciudad') === $ciudad->nombre_ciudad ? 'selected' : ''}}>{{$ciudad->nombre_ciudad}}</option>
                                                @endforeach
                                            </select>
                                            <label for="ciudad_id"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ciudad</label>
                                            @error('ciudad_id')
                                            <div class="alert alert-danger" style="color: red" style="color: red;">{{ $message }}</div>
                                            @enderror
                                        </div>



                                        <div class="relative z-0 w-full mb-5 group">
                                            <input type="text" name="direccion" id="direccion"
                                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                placeholder=" " value="{{ old('direccion') }}" autofocus/>
                                            <label for="direccion"
                                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dirección</label>
                                            @error('direccion')
                                            <div class="alert alert-danger" style="color: red">{{ $message }}</div>
                                            @enderror
                                        </div>
        
                                    </div>
        
        
                                    
        
        
        
        
        
        
                                        <button type="submit"
                                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2" >Guardar
                                        Sucursal</button>
                                </form>
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