<div>
    <div class="top-20  left-0 z-50 fixed   max-h-full overflow-y-auto"   wire:loading wire:target="uploadcvs, uploadusers" >
        <div class="flex justify-center h-screen items-center  bg-gray-100 antialiased top-0 opacity-70 left-0  z-40 w-full h-full fixed "  ></div>
        <div class="flex justify-center h-screen items-center   antialiased top-0  left-0  z-50 w-full h-full fixed " >
            <div class="flex justify-center items-center">
                <div
                class="
                    loader
                    ease-linear
                    rounded-full
                    border-8 border-t-8 border-gray-200
                    h-32
                    w-32
                "
                ></div>
                <div class="absolute">Cargando...</div>
            </div>
        </div>
    </div>
    <div class="flex">
        <button onclick="closeimportusers()" class="closebttn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <div id="divimport1" class="w-full">
        <p class="text-center font-semibold mb-6 text-lg">Importar usuarios</p>
        <label class="block">
            <input wire:model.defer="archivedata" type="file" accept=".csv" class="block w-10/12 mx-auto text-sm text-gray-500 file:me-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-neutral-500  file:text-white hover:file:bg-neutral-500 file:disabled:opacity-50 file:disabled:pointer-events-none file:text-sm">
        </label>
        <div class="w-1/3 mx-auto">
            <button wire:click="uploadcvs" class="w-full mt-8 p-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-semibold">Cargar</button>
        </div>
        <p class="text-center text-xs text-blue-500 my-5">Descargar formato de ejemplo</p>
    </div>


    <div id="divimport2" class="rounded hidden">
        <p class="text-sm text-center font-semibold my-3">Actualizar estados y nuevos usuarios</p>
        <button wire:click="uploadusers" class="w-fit mx-auto my-2 py-2 px-3 bg-blue-500 hover:bg-blue-600 text-white rounded-lg flex">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm14.024-.983a1.125 1.125 0 0 1 0 1.966l-5.603 3.113A1.125 1.125 0 0 1 9 15.113V8.887c0-.857.921-1.4 1.671-.983l5.603 3.113Z" clip-rule="evenodd" />
              </svg>
                                                       
            Actualizar datos
        </button>
        <p class="text-center text-xs my-5">Importando {{$totalusers}} usuarios</p>
    
        <div class="mx-4">
            <div class="flex my-3">
                <p class="flex px-1 font-semibold">
                    <span class="text-red-600 mr-3">{{count($usersduplicated)}}</span> 
                    Duplicados 
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600 mx-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                    </svg>
                </p>
                
                <p class="text-xs text-justify">Los datos importados sobrescribirán los actuales. Si hay usuarios que esten desactivados y aparcen en esta lista serán activados.</p>
            </div>
            <div class="overflow-y-auto" style="height:21vh">
                <table class="min-w-full divide-y text-sm">
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($usersduplicated as $udkey => $ud)
                            <tr>
                                <td class="px-1 py-4">
                                    {{$ud[0]}}
                                </td>
                                <td class="px-1 py-4">
                                    {{$ud[2] . ' ' . $ud[1]}}
                                </td>
                                <td class="px-1 py-4">
                                    <svg  wire:click="$emit('removeud',{{$udkey}})"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-neutral-500 hover:text-red-500 hover:w-7 hover:h-7 cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>

        <div class="mx-4 my-2">
            <div class="flex my-3">
                <p class="flex px-1 font-semibold">
                    <span class="text-blue-600 mr-3">{{count($usernew)}}</span> 
                    Nuevos
                </p>
            </div>
            <div class="overflow-y-auto" style="height:21vh">
                <table class="min-w-full divide-y text-sm">
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($usernew as $unkey => $un)
                            <tr>
                            <td class="px-1 py-4">
                                {{$un[0]}}
                            </td>
                            <td class="px-1 py-4">
                                {{$un[2] . ' ' . $un[1]}}
                            </td>
                            <td class="px-1 py-4">
                                <svg wire:click="$emit('removeun',{{$unkey}})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-neutral-500 hover:text-red-500 hover:w-7 hover:h-7 cursor-pointer">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </td>
                            </tr>
                        @endforeach
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

    window.addEventListener('showstep2', event => {
        showimportdiv2();
    })

    window.addEventListener('showstep3', event => {
        showimportdiv3();
    })

    window.addEventListener('closeimport', event =>{
        closeimportusers();
    })
</script>
    @push('js')
        <script>
            window.Livewire.on('removeud', idinarray=> {
                Swal.fire({
                    title: '¿Seguro que deseas eliminar este registro?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3088d9',
                    cancelButtonColor: '#EF4444',
                    confirmButtonText: 'Si, Eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.Livewire.emit('removeuserduplicated', idinarray);
                    }
                })
            });

            window.Livewire.on('removeun', idinarray=> {
                Swal.fire({
                    title: '¿Seguro que deseas eliminar este registro?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3088d9',
                    cancelButtonColor: '#EF4444',
                    confirmButtonText: 'Si, Eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.Livewire.emit('removeusernew', idinarray);
                    }
                })
            });
        </script>
    @endpush