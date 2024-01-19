<div>
    <div class="flex">
        <div id="divusers" class="w-full p-5 bg-white rounded shadow-lg">
            <p class="text-3xl font-bold">Usuarios</p>
            <div class="lg:flex my-3">
                <input class="w-full lg:w-4/12 mr-3 my-2 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 text-gray-700" type="text" name="" id="" placeholder="Buscar">
                
                <div class="flex">
                    <button onclick="showimportusers()" class="w-fit mr-3 my-2 py-2 px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                            <path d="M12 1.5a.75.75 0 0 1 .75.75V7.5h-1.5V2.25A.75.75 0 0 1 12 1.5ZM11.25 7.5v5.69l-1.72-1.72a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l3-3a.75.75 0 1 0-1.06-1.06l-1.72 1.72V7.5h3.75a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-9a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h3.75Z" />
                        </svg>
                        Importar
                    </button>
                    <button class="w-fit mr-3 my-2 py-2 px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                            <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                        </svg>                      
                        Asignar
                    </button>
                    <button onclick="showcreateusers()" class="w-fit mr-3 my-2 py-2 px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6  mr-2">
                            <path d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                        </svg>                                           
                        Crear
                    </button>
                </div>
            </div>
            <div>
                <ul class="flex border-b">
                    <li class="-mb-px mr-1">
                      <button class="bg-white inline-block border-l border-t border-r rounded-t py-2 px-4 font-semibold" href="#">Usuarios</button>
                    </li>
                    <li class="mr-1">
                      <button class="bg-white inline-block py-2 px-4 font-semibold" href="#">Operadores</button>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border md:rounded-lg">
                            <table class="min-w-full divide-y">
                                <thead class="bg-neutral-400 text-white">
                                    <tr>
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">Nomina</th>
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">Nombre</th>
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">Puesto</th>
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">Rol</th>
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">Área</th>
                                        <th scope="col" class="py-4 px-4 text-sm font-normal text-left rtl:text-right">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-4">
                                            13431
                                        </td>
                                        <td class="px-4 py-4">
                                            Hilario Ojeda
                                       </td>
                                        <td class="px-4 py-4">
                                            Lider   
                                        </td>
                                        <td class="px-4 py-4">
                                            Operador
                                        </td>
                                        <td class="px-4 py-4">
                                            Ball joint
                                        </td>
                                        <td class="px-4 py-4">
                                            <button onclick="showeditusers()" class="bg-cyan-700 p-2 rounded-lg mx-2"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                    <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                </svg>
                                            </button>
                                            <button class="bg-red-500 p-2 rounded-lg mx-2"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                </svg>
                                            </button>

                                       </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-4">
                                            34347
                                        </td>
                                        <td class="px-4 py-4">
                                            Mayte del Angel
                                       </td>
                                        <td class="px-4 py-4">
                                            Lider   
                                        </td>
                                        <td class="px-4 py-4">
                                            Operador
                                        </td>
                                        <td class="px-4 py-4">
                                            Ball joint
                                        </td>
                                        <td class="px-4 py-4">
                                            <button onclick="showeditusers()" class="bg-cyan-700 p-2 rounded-lg mx-2"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                                                    <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                    <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                </svg>
                                            </button>
                                            <button class="bg-red-500 p-2 rounded-lg mx-2"> 
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                                                    <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                </svg>
                                            </button>

                                       </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div id="divcreateusers" class="w-38p hidden ml-auto p-5 bg-white rounded shadow-lg">
            <livewire:users.userscreate/>
        </div>

        <div id="diveditusers" class="w-38p hidden ml-auto p-5 bg-white rounded shadow-lg">
            <livewire:users.usersedit/>
        </div>

        <div id="divimportusers" class="w-38p hidden ml-auto p-5 bg-white rounded shadow-lg">
            <livewire:users.importusers/>
        </div>
    </div>
</div>

    <script>
        
        function showcreateusers()
        {
            closeeditusers();
            closeimportusers()
            document.getElementById('divcreateusers').classList.remove("hidden");
            document.getElementById('divusers').classList.remove("w-full");
            document.getElementById('divusers').classList.add("w-60p");
        }

        function closecreateusers()
        {
            document.getElementById('divcreateusers').classList.add("hidden");
            document.getElementById('divusers').classList.add("w-full");
            document.getElementById('divusers').classList.remove("w-60p");
        }

        function showeditusers()
        {
            closecreateusers()
            closeimportusers()
            document.getElementById('diveditusers').classList.remove("hidden");
            document.getElementById('divusers').classList.remove("w-full");
            document.getElementById('divusers').classList.add("w-60p");
        }

        function closeeditusers()
        {
            document.getElementById('diveditusers').classList.add("hidden");
            document.getElementById('divusers').classList.add("w-full");
            document.getElementById('divusers').classList.remove("w-60p");
        }

        function showimportusers()
        {
            closecreateusers()
            closeeditusers();
            document.getElementById('divimportusers').classList.remove("hidden");
            document.getElementById('divusers').classList.remove("w-full");
            document.getElementById('divusers').classList.add("w-60p");
        }

        function closeimportusers()
        {
            document.getElementById('divimportusers').classList.add("hidden");
            document.getElementById('divusers').classList.add("w-full");
            document.getElementById('divusers').classList.remove("w-60p");

            document.getElementById('divimport1').classList.remove('hidden');
            document.getElementById('divimport2').classList.add('hidden');
            document.getElementById('divimport3').classList.add('hidden');
        }

    </script>
    @push('js')
        <script>

        </script>
    @endpush