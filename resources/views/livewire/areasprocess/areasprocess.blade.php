<div>
    <div class="top-20  left-0 z-50 fixed   max-h-full overflow-y-auto"   wire:loading wire:target="showeditarea">
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

    <div id="loader" class="top-20 hidden left-0 z-50 fixed   max-h-full overflow-y-auto" >
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
        <div id="divareas" class="w-full p-3 rounded">
            <p class="text-3xl font-bold">Áreas y operaciones</p>
            <div class="lg:flex my-3">
                <input wire:model="search" class="w-full lg:w-4/12 mr-3 my-2 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 text-gray-700" type="text" name="" id="" placeholder="Buscar">
                
                <div class="flex">
                    <button onclick="showcreatearea()" class="w-fit mr-3 my-2 py-2 px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>                                                                   
                        Nueva área
                    </button>
                </div>
            </div>

            <div class="overflow-y-auto p-1" style="height: 68vh">
                @foreach ($areas as $area)
                    <div class="flex flex-col bg-white p-4 rounded-lg w-full mb-6 shadow-lg">
                        <div class="my-3 flex">
                            <p class="text-2xl my-2">{{$area->name}}</p>
                            <div class="flex ml-auto">
                                <button wire:click="showeditarea({{$area->id}})" class="w-fit mr-3 my-2 py-2 px-3 bg-cyan-700 hover:bg-cyan-600 text-white rounded-lg flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                    </svg>                                                                   
                                    Editar área
                                </button>
                                <button wire:click="screateprocess('{{$area->id}}', '{{$area->name}}')" class="w-fit mr-3 my-2 py-2 px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>                                                                   
                                    Nueva operación
                                </button>
                            </div>
                        </div>
                        <table class="divide-y overflow-y-auto">
                            <thead class="bg-neutral-400 text-white rounded">
                                <tr>
                                    {{-- <th scope="col" class="headertableprocess rounded-l-lg">ID</th> --}}
                                    <th scope="col" class="headertableprocess">Número operación</th>
                                    <th scope="col" class="headertableprocess">Operación</th>
                                    <th scope="col" class="headertableprocess">Línea</th>
                                    <th scope="col" class="headertableprocess">Categoría</th>
                                    <th scope="col" class="headertableprocess">Modelo(s)</th>
                                    <th scope="col" class="headertableprocess rounded-r-lg">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($area->processes as $process)
                                    <tr>
                                        {{-- <td class="px-4 py-4">
                                            {{$process->id}}
                                        </td> --}}
                                        
                                        <td class="px-10 py-2">
                                            {{$process->number_process}}
                                        </td>
                                        <td class="px-4 py-2">
                                            {{$process->name}}
                                        </td>
                                        <td class="px-4 py-2">
                                            @if($process->line->first() != null)
                                                {{$process->line->first()['name']}}  
                                            @endif
                                        </td>
                                        <td class="px-10 py-2">
                                            @if($process->category->first() != null)
                                                {{$process->category->first()['name']}}  
                                            @endif
                                        </td>
                                        <td class="px-10 py-2">
                                            @foreach($process->models as $pm)
                                                {{$pm->name}},&nbsp; 
                                            @endforeach
                                        </td>
                                        <td class="px-4 py-2">
                                            <button wire:click="showeditprocess('{{$area->id}}', '{{$area->name}}', '{{$process->id}}')" class="bg-cyan-700 p-2 rounded-lg mx-2"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                    <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                </svg>
                                            </button>
                                            <button wire:click="$emit('deletproc',{{$process->id}})" class="bg-red-500 p-2 rounded-lg mx-2"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                </svg>
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
            
        </div>
        <div id="divcreatearea" class="w-38p hidden ml-auto p-4 bg-white rounded shadow-lg">
            <livewire:areasprocess.areacreate/>
        </div>

        <div id="divcreateprocess" class="w-38p hidden ml-auto p-4 bg-white rounded shadow-lg">
            <livewire:areasprocess.processcreate/>
        </div>

        <div id="diveditprocess" class="w-38p hidden ml-auto p-4 bg-white rounded shadow-lg">
            <livewire:areasprocess.processedit/>
        </div>
    </div>
</div>

    <script>
        
        function showcreatearea(){
            closecreatearea();
            closeeditprocess()
            document.getElementById('divcreatearea').classList.remove("hidden");
            document.getElementById('divareas').classList.remove("w-full");
            document.getElementById('divareas').classList.add("w-60p");
        }

        function closecreatearea(){
            document.getElementById('divcreatearea').classList.add("hidden");
            document.getElementById('divareas').classList.add("w-full");
            document.getElementById('divareas').classList.remove("w-60p");
        }

        function showcreateprocess(){
            closecreatearea()
            closeeditprocess()
            document.getElementById('divcreateprocess').classList.remove("hidden");
            document.getElementById('divareas').classList.remove("w-full");
            document.getElementById('divareas').classList.add("w-60p");
        }

        function closecreateprocess(){
            document.getElementById('divcreateprocess').classList.add("hidden");
            document.getElementById('divareas').classList.add("w-full");
            document.getElementById('divareas').classList.remove("w-60p");
        }

        function showeditprocess()
        {
            closecreatearea()
            closecreateprocess();
            document.getElementById('diveditprocess').classList.remove("hidden");
            document.getElementById('divareas').classList.remove("w-full");
            document.getElementById('divareas').classList.add("w-60p");
        }

        function closeeditprocess()
        {
            document.getElementById('diveditprocess').classList.add("hidden");
            document.getElementById('divareas').classList.add("w-full");
            document.getElementById('divareas').classList.remove("w-60p");
        }

        window.addEventListener('aftercreatearea', event => {
            showcreatearea();
        })

        window.addEventListener('aftereditarea', event => {
            showcreatearea();
        })

        window.addEventListener('showarea', event => {
            showcreatearea();
        })

        window.addEventListener('showcreateprocess', event => {
            showcreateprocess();
        })

        window.addEventListener('aftercreateprocess', event => {
            showcreateprocess();
        })

        window.addEventListener('showeditprocess', event => {
            showeditprocess();
        })

        window.addEventListener('aftereditprocess', event => {
            showeditprocess();
        })

    </script>
    @push('js')
        <script>
            window.Livewire.on('deletproc', idprocess => {
                Swal.fire({
                    title: '¿Seguro que deseas eliminar este proceso?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3088d9',
                    cancelButtonColor: '#EF4444',
                    confirmButtonText: 'Si, Eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                    
                    document.getElementById("loader").classList.remove('hidden');
                    setTimeout(() => {
                            document.getElementById("loader").classList.add('hidden');
                        }, 5000);
                    
                    window.Livewire.emit('deleteprocess', idprocess);
                    }
                })
            });
        </script>
    @endpush