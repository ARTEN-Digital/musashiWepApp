<div>
    <div class="top-20  left-0 z-50 fixed   max-h-full overflow-y-auto"   wire:loading wire:target="showedittraining">
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
        <div id="divtrainings" class="w-full p-5 bg-white rounded shadow-lg">
            <p class="text-3xl font-bold">Capacitaciones</p>
            <div class="lg:flex my-3">
                <input wire:model="search" class="w-full lg:w-5/12 mr-3 my-2 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 text-gray-700" type="text" name="" id="" placeholder="Buscar">
                
                <div class="flex ml-auto">
                    <button onclick="showcreatetrainings()" class="w-fit mr-3 my-2 py-2 px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6  mr-2">
                            <path d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                        </svg>                                           
                        Nueva capacitación
                    </button>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border md:rounded-lg">
                            <table class="min-w-full divide-y">
                                <thead class="bg-neutral-400 text-white">
                                    <tr>
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">Nombre</th>
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">Responsable</th>
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 text-neutral-500 text-sm">
                                    @foreach ($trainings as $training)
                                        <tr>
                                            <td class="px-4 py-4">
                                                {{$training->name}}
                                            </td>
                                            <td class="px-4 py-4">
                                                {{$training->respon}}
                                        </td>
                                            <td class="px-4 py-4">
                                                <button wire:click="showedittraining('{{$training->id }}')" class="bg-cyan-700 hover:bg-cyan-600 p-2 rounded-lg mx-2"> 
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                    </svg>
                                                </button>
                                                <button wire:click="$emit('deletet',{{$training->id}})" class="bg-red-500 hover:bg-red-600 p-2 rounded-lg mx-2"> 
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
                    </div>
                </div>
            </div>
            
        </div>
        <div id="divcreatetrainings" class="w-38p hidden ml-auto p-4 bg-white rounded shadow-lg">
            <livewire:trainings.trainingscreate/>
        </div>

        <div id="divedittrainings" class="w-38p hidden ml-auto p-4 bg-white rounded shadow-lg">
            <livewire:trainings.trainingsedit/>
        </div>
    </div>
</div>

    <script>
        
        function showcreatetrainings()
        {
            closeedittrainings()
            document.getElementById('divcreatetrainings').classList.remove("hidden");
            document.getElementById('divtrainings').classList.remove("w-full");
            document.getElementById('divtrainings').classList.add("w-60p");
        }

        function closecreatetrainings()
        {
            document.getElementById('divcreatetrainings').classList.add("hidden");
            document.getElementById('divtrainings').classList.add("w-full");
            document.getElementById('divtrainings').classList.remove("w-60p");
        }

        function showedittrainings()
        {
            closecreatetrainings()
            document.getElementById('divedittrainings').classList.remove("hidden");
            document.getElementById('divtrainings').classList.remove("w-full");
            document.getElementById('divtrainings').classList.add("w-60p");
        }

        function closeedittrainings()
        {
            document.getElementById('divedittrainings').classList.add("hidden");
            document.getElementById('divtrainings').classList.add("w-full");
            document.getElementById('divtrainings').classList.remove("w-60p");
        }

        window.addEventListener('aftercreatetraining', event => {
            showcreatetrainings();
        })

        window.addEventListener('aftercreatetraining', event => {
            showcreatetrainings();
        })
        window.addEventListener('showedittraining', event => {
            showedittrainings();
        })

    </script>
    @push('js')
        <script>
            window.Livewire.on('deletet', idtraining => {
                Swal.fire({
                    title: '¿Seguro que deseas desactivar esta capacitación?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3088d9',
                    cancelButtonColor: '#EF4444',
                    confirmButtonText: 'Si, desactivar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("loader").classList.remove('hidden');
                        
                        setTimeout(() => {
                            document.getElementById("loader").classList.add('hidden');
                        }, 5000);
                        window.Livewire.emit('deletetraining', idtraining);
                    }
                })
            });
        </script>
    @endpush