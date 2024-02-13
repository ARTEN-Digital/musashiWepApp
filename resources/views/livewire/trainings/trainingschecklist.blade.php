<div>
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
                                <tbody class="bg-white divide-y divide-gray-200">
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
                                                    <button wire:click="showeditConcept('{{$concept->id}}')" class="bg-cyan-700 p-2 rounded-lg mx-2"> 
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                        </svg>
                                                    </button>
                                                    <button wire:click="$emit('deletec',{{$concept->id}})" class="bg-red-500 p-2 rounded-lg mx-2"> 
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
                    confirmButtonText: 'Si, desactivar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.Livewire.emit('deleteconcept', idconcept);
                        // Swal.fire(
                        //   '¡Eliminado!',
                        //   'Tu elemento ha sido eliminado.',
                        //   'Exito'
                        // )
                    }
                })
            });
        </script>
    @endpush