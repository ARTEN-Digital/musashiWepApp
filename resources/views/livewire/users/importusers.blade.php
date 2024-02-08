<div>
    <div class="flex">
        <button onclick="closeimportusers()" class="closebttn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <div id="divimport1" class="">
        <p class="text-center font-semibold my-3">Importar usuarios</p>
        <label class="block">
            <input onChange='showimportdiv2()' type="file" class="block w-10/12 mx-auto text-xs text-gray-500 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-neutral-400  file:text-white hover:file:bg-neutral-500 file:disabled:opacity-50 file:disabled:pointer-events-none file:text-sm">
        </label>
        <p class="text-center text-xs text-blue-500 my-5">Descargar formato de ejemplo</p>
    </div>


    <div id="divimport2" class="shadow-lg p-2 rounded hidden">
        <p class="text-sm text-center font-semibold my-3">Actualizar estados y nuevos usuarios</p>
        <button onclick="showimportdiv3()" class="w-fit mx-auto my-2 py-2 px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
            </svg>                                         
            Actualizar todos
        </button>
        <p class="text-center text-xs my-5">Im portando 117 usuarios</p>
    
        <div class="mx-8">
            <div class="flex my-3">
                <p class="flex px-1 font-semibold">
                    <span class="text-red-600 mr-3">5</span> 
                    Duplicados 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600 mx-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                </p>
                
                <p class="text-xs text-left">Los datos importados sobrescribirán los actuales.</p>
            </div>
            <div class="overflow-y-auto" style="height:21vh">
                <table class="min-w-full divide-y text-sm">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-1 py-4">
                                1343117
                            </td>
                            <td class="px-1 py-4">
                                Hilario Ojeda
                            </td>
                            <td class="px-1 py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-neutral-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </td>
                        </tr>
                        <tr>
                            <td class="px-1 py-4">
                                1343117
                            </td>
                            <td class="px-1 py-4">
                                Hilario Ojeda
                            </td>
                            <td class="px-1 py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-neutral-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </td>
                        </tr>
                        <tr>
                            <td class="px-1 py-4">
                                1343117
                            </td>
                            <td class="px-1 py-4">
                                Hilario Ojeda
                            </td>
                            <td class="px-1 py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-neutral-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </td>
                        </tr>
                        <tr>
                            <td class="px-1 py-4">
                                1343117
                            </td>
                            <td class="px-1 py-4">
                                Hilario Ojeda
                            </td>
                            <td class="px-1 py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-neutral-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>

        <div class="mx-8 my-2">
            <div class="flex my-3">
                <p class="flex px-1 font-semibold">
                    <span class="text-blue-600 mr-3">25</span> 
                    Nuevos
                </p>
            </div>
            <div class="overflow-y-auto" style="height:21vh">
                <table class="min-w-full divide-y text-sm">
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-1 py-4">
                                1343117
                            </td>
                            <td class="px-1 py-4">
                                Hilario Ojeda
                            </td>
                            <td class="px-1 py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-neutral-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </td>
                        </tr>
                        <tr>
                            <td class="px-1 py-4">
                                1343117
                            </td>
                            <td class="px-1 py-4">
                                Hilario Ojeda
                            </td>
                            <td class="px-1 py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-neutral-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </td>
                        </tr>
                        <tr>
                            <td class="px-1 py-4">
                                1343117
                            </td>
                            <td class="px-1 py-4">
                                Hilario Ojeda
                            </td>
                            <td class="px-1 py-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-neutral-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>

    <div id="divimport3" class="shadow-lg p-2 rounded hidden">
        <p class="text-center font-semibold my-3">Actualizar estados y nuevos usuarios</p>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24 mx-auto text-green-500 my-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 0 1 9 9v.375M10.125 2.25A3.375 3.375 0 0 1 13.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 0 1 3.375 3.375M9 15l2.25 2.25L15 12" />
        </svg>
        <p class="text-center font-bold text-lg mb-3">Carga exitosa</p>

    </div>
    
</div>

<script>
    function showimportdiv2(){
        document.getElementById('divimport1').classList.add('hidden');
        document.getElementById('divimport2').classList.remove('hidden');
    }

    function showimportdiv3(){
        document.getElementById('divimport2').classList.add('hidden');
        document.getElementById('divimport3').classList.remove('hidden');
    }
</script>
    @push('js')
        <script>

        </script>
    @endpush