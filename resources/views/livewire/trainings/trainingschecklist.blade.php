<div>
    <div class="top-20  left-0 z-50 fixed   max-h-full overflow-y-auto"   wire:loading wire:target="showeditConcept, addconceptstochecklist, scmodalconcepts">
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
        <div id="divchecklist" class="w-full p-4 bg-white rounded shadow-lg">
            <div class="flex">
                <a href="/trainings">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 my-auto mr-3 text-neutral-400 hover:text-neutral-500">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-4.28 9.22a.75.75 0 0 0 0 1.06l3 3a.75.75 0 1 0 1.06-1.06l-1.72-1.72h5.69a.75.75 0 0 0 0-1.5h-5.69l1.72-1.72a.75.75 0 0 0-1.06-1.06l-3 3Z" clip-rule="evenodd" />
                    </svg>
                </a>
                <p class="text-3xl font-bold">Checklist de evaluación</p>
            </div>
            
            
            <div class="flex my-3">
                {{-- <input class="w-full lg:w-5/12 mr-3 my-2 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 text-gray-700" type="text" name="" id="" placeholder="Buscar"> --}}
                <p class="text-2xl font-bold my-5">{{$trainingname}}</p>
                <div class="flex ml-auto">
                    <button wire:click="scmodalconcepts" class="w-fit h-fit my-2 py-2 px-3 mx-5 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                            <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                        </svg>
                        Agregar concepto
                    </button>

                    <button wire:click="showcreateConcept" class="w-fit h-fit my-2 py-2 px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                          </svg>
                        Nuevo concepto
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
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">Tópico</th>
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">#</th>
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">Concepto</th>
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">Responsable</th>
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 text-neutral-500 text-sm">
                                    @foreach ($concepts as $concept)
                                        <tr>
                                            <td class="px-4 py-4">
                                                {{$concept->topics->name}}
                                            </td>
                                            <td class="px-4 py-4">
                                                    {{$concept->number}}
                                                </td>
                                                <td class="px-4 py-4">
                                                    {{$concept->concept}}
                                                </td>
                                                <td class="px-4 py-4">
                                                    {{$concept->user->name . ' ' . $concept->user->lastname}}
                                                </td>
                                                <td class="px-4 py-4 flex">
                                                    <button wire:click="showeditConcept('{{$concept->id}}')" class="bg-cyan-700 hover:bg-cyan-600 p-2 rounded-lg mx-2"> 
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                        </svg>
                                                    </button>
                                                    <button wire:click="$emit('deletec',{{$concept->id}})" class="bg-red-500 hover:bg-red-600 p-2 rounded-lg mx-2"> 
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
        <div id="divcreatetopics" class="w-38p hidden ml-auto p-4 bg-white rounded shadow-lg">
            <livewire:trainings.checklistcreatetopic/>
        </div>
    </div>

    <!--modal allconcepts -->
    <div id="modalconcepts" class="top-20 @if(!$modalconcepts) hidden @endif left-0 z-50 max-h-full overflow-y-auto">
        <div class="flex justify-center h-screen items-center  bg-gray-800 antialiased top-0 opacity-70 left-0  z-30 w-full h-full fixed "></div>
        
        <div class="flex text-gray-500 text:md justify-center h-screen items-center antialiased top-0  left-0  z-40 w-full h-full fixed">
            <div class=" flex flex-col w-7/12 mx-auto rounded-lg shadow-xl overflow-y-auto" style="max-height: 90%;">
                    <div class="flex flex-row justify-between px-6 py-2 bg-white text-white rounded-tl-lg rounded-tr-lg">
                        <h2 class="text-2xl text-gray-500 font-semibold w-full text-center py-2">
                            Agregar conceptos
                        </h2>
                        <button wire:click="scmodalconcepts" class="closebttn">
                            <svg  class="w-6 h-6 text-white"  fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>


                    <div class="flex bg-white py-3 px-8">
                        <div class="w-full my-1">
                            <input wire:input="getconcepts" type="text" wire:model.defer="search" class="w-1/3 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700" placeholder="Buscar...">
                        </div>
                        <button wire:click="addconceptstochecklist" class="w-fit h-fit my-auto mr-5 py-2 px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white mr-3">
                                <path d="M4.08 5.227A3 3 0 0 1 6.979 3H17.02a3 3 0 0 1 2.9 2.227l2.113 7.926A5.228 5.228 0 0 0 18.75 12H5.25a5.228 5.228 0 0 0-3.284 1.153L4.08 5.227Z" />
                                <path fill-rule="evenodd" d="M5.25 13.5a3.75 3.75 0 1 0 0 7.5h13.5a3.75 3.75 0 1 0 0-7.5H5.25Zm10.5 4.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm3.75-.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" clip-rule="evenodd" />
                              </svg>
                            Guardar
                        </button>
                    </div>

                    <div class="flex flex-col bg-white px-8 overflow-y-auto" style="height: 65vh;">
                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="overflow-hidden border md:rounded-lg">
                                    <table class="min-w-full divide-y text-sm">
                                        <thead class="bg-neutral-400 text-white">
                                            <tr>
                                                <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Tópico</th>
                                                <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">#</th>
                                                <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Concepto</th>
                                                <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Responsable</th>
                                                <th scope="col" class="p-3 w-fit text-sm font-normal">Agregar</th>

                                                
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 text-sm text-neutral-500">
                                            @foreach ($allconcepts as $cpts)
                                                <tr>
                                                    <td class="p-3">{{$cpts->topics->name}}</td>
                                                    <td class="p-3">{{$cpts->number}}</td>
                                                    <td class="p-3">{{$cpts->concept}}
                                                    </td>
                                                    <td class="p-3">{{$cpts->user->name . ' ' . $cpts->user->lastname}}</td>
                                                    <td class="p-3 text-center">
                                                        <input wire:model.defer="msconceptselect.{{ $cpts->id }}" class="before:content[''] peer relative h-8 w-8 mx-auto cursor-pointerappearance-none rounded-md border border-neutral-400 transition-allbefore:absolute before:top-2/4 before:left-2/4 before:block before:h-12before:w-12 before:-translate-y-2/4 before:-translate-x-2/4before:rounded-full before:bg-blue-500 before:opacity-0before:transition-opacity checked:bg-blue-500  checked:bg-blue-500checked:before:bg-blue-500 hover:before:opacity-10 my-auto" type="checkbox">
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
        </div>
    </div>
</div>

    <script>
        
        function showcreatetopics(){
            document.getElementById('divcreatetopics').classList.remove("hidden");
            document.getElementById('divchecklist').classList.remove("w-full");
            document.getElementById('divchecklist').classList.add("w-60p");
        }

        function closecreatetopics(){
            document.getElementById('divcreatetopics').classList.add("hidden");
            document.getElementById('divchecklist').classList.add("w-full");
            document.getElementById('divchecklist').classList.remove("w-60p");
        }

        window.addEventListener('showcreateC', event => {
            showcreatetopics();
        })

    </script>
    @push('js')
        <script>
            window.Livewire.on('deletec', idconcept => {
                Swal.fire({
                    title: '¿Seguro que deseas eliminar este concepto?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3088d9',
                    cancelButtonColor: '#EF4444',
                    confirmButtonText: 'Si, eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("loader").classList.remove('hidden');
                        
                        setTimeout(() => {
                            document.getElementById("loader").classList.add('hidden');
                        }, 5000);
                        window.Livewire.emit('deleteconcept', idconcept);
                    }
                })
            });
        </script>
    @endpush