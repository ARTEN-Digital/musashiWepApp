<div>
    <div class="top-20  left-0 z-50 fixed   max-h-full overflow-y-auto"   wire:loading wire:target="showedituser, activeuser, deleteuser, scmodalhistory" >
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
        <div id="divusers" class="w-full p-5 bg-white rounded shadow-lg">

            <p class="text-3xl font-bold px-8">Usuarios</p>
            <div class="lg:flex my-3 px-8">
                <input wire:model="search" class="w-full lg:w-4/12 mr-3 my-2 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 text-gray-700" type="text" name="" id="" placeholder="Buscar">
                
                <div class="flex">
                    <button onclick="showimportusers()" class="w-fit mr-3 my-2 py-2 px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                            <path d="M12 1.5a.75.75 0 0 1 .75.75V7.5h-1.5V2.25A.75.75 0 0 1 12 1.5ZM11.25 7.5v5.69l-1.72-1.72a.75.75 0 0 0-1.06 1.06l3 3a.75.75 0 0 0 1.06 0l3-3a.75.75 0 1 0-1.06-1.06l-1.72 1.72V7.5h3.75a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-9a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h3.75Z" />
                        </svg>
                        Importar
                    </button>
                    <a href="/users/assigment" class="w-fit mr-3 my-2 py-2 px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2">
                            <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                        </svg>                      
                        Asignar
                    </a>
                    <button onclick="showcreateusers()" class="w-fit mr-3 my-2 py-2 px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6  mr-2">
                            <path d="M5.25 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM2.25 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM18.75 7.5a.75.75 0 0 0-1.5 0v2.25H15a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H21a.75.75 0 0 0 0-1.5h-2.25V7.5Z" />
                        </svg>                                           
                        Crear
                    </button>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto" style="height: 66vh">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border md:rounded-lg">
                            <table class="min-w-full divide-y">
                                <thead class="bg-neutral-400 text-white">
                                    <tr>
                                        <th scope="col" class="headertableusers">Nómina</th>
                                        <th scope="col" class="headertableusers">Nombre</th>
                                        <th scope="col" class="headertableusers">Puesto</th>
                                        <th scope="col" class="headertableusers">Rol</th>
                                        <th scope="col" class="headertableusers">Área</th>
                                        <th scope="col" class="headertableusers">Estatus</th>
                                        <th scope="col" class="headertableusers">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 text-gray-500 text-sm">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-4 py-4">
                                                {{$user->payroll}}
                                            </td>
                                            <td class="px-4 py-4">
                                                {{$user->name . ' ' . $user->lastname}}
                                            </td>
                                            <td class="px-4 py-4">
                                                {{$user->positions_name}}  
                                            </td>
                                            <td class="px-4 py-4">
                                                {{$user->usertype_name}}
                                            </td>
                                            <td class="px-4 py-4">
                                                {{$user->area_name}}
                                            </td>
                                            
                                            <td class="px-4 py-4">
                                                @switch($user->active)
                                                    @case(1)
                                                        <p class="w-fit mx-auto text-center py-1 px-2 rounded-lg text-white bg-green-500">Activo</p>
                                                        @break
                                                    @case(0)
                                                        <p class="w-fit mx-auto text-center py-1 px-2 rounded-lg text-white bg-red-400">Inactivo</p>
                                                        @break
                                                    @default
                                                        
                                                @endswitch
                                            </td>
                                            <td class="px-4 py-4 flex">
                                                <button wire:click="scmodalhistory({{$user->id}})" class="bg-violet-500 hover:bg-violet-600 p-2 rounded-lg mx-1"> 
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                                      </svg>                                                      
                                                </button>
                                                <button wire:click="showedituser({{$user->id}})" onclick="showeditusers()" class="bg-cyan-700 hover:bg-cyan-600 p-2 rounded-lg mx-1"> 
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                                    </svg>
                                                </button>

                                                @if($user->active)
                                                    <button wire:click="$emit('deleteuserf',{{$user->id}})" class="bg-red-500 hover:bg-red-400 p-2 rounded-lg mx-1"> 
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 text-white">
                                                            <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button> 
                                                @else
                                                    <button wire:click="$emit('activeuserf',{{$user->id}})" class="bg-green-500 hover:bg-green-400 p-2 rounded-lg mx-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                                                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button> 
                                                @endif

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
        <div id="divcreateusers" class="w-38p hidden ml-auto p-4 bg-white rounded shadow-lg">
            <livewire:users.userscreate/>
        </div>

        <div id="diveditusers" class="w-38p hidden ml-auto p-4 bg-white rounded shadow-lg">
            <livewire:users.usersedit/>
        </div>

        <div id="divimportusers" class="w-38p hidden ml-auto p-4 bg-white rounded shadow-lg">
            <livewire:users.importusers/>
        </div>
    </div>

    <div id="modaluserhistory" class="top-20 @if(!$modaluserhistory) hidden @endif left-0 z-50 max-h-full overflow-y-auto">
        @if($mhuser != null)
        <div class="flex justify-center h-screen items-center  bg-gray-800 antialiased top-0 opacity-70 left-0  z-30 w-full h-full fixed "></div>
        
        <div class="flex text-gray-500 text:md justify-center h-screen items-center antialiased top-0  left-0  z-40 w-full h-full fixed">
            <div class=" flex flex-col w-10/12 mx-auto rounded-lg shadow-xl overflow-y-auto" style="max-height: 90%;">
                    <div class="flex flex-row justify-between pt-2 pr-2 bg-white text-white rounded-tl-lg rounded-tr-lg">
                        <button wire:click="scmodalhistory(0)" class="closebttn">
                            <svg  class="w-6 h-6 text-white "  fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex w-full bg-white">
                        <div class="w-1/2 p-3">
                            <div class="flex">
                                @if ($mhuser != null)
                                    <div class="w-5/12">
                                        <img src="{{$mhuser->image_profile}}" class="h-32 w-32 object-cover mx-auto shadow-b rounded-full" alt="">
                                    </div>
                                    <div class="w-7/12 text-gray-400 my-auto">
                                        <p class="text-xl text-gray-500 font-semibold">{{$mhuser->payroll . ' - ' . $mhuser->name . ' ' . $mhuser->lastname}}</p>
                                        <p class="text-base my-1">{{$mhuser->area->name}} - {{$mhuser->position->name}}</p>
                                        <p class="text-base my-1">{{$mhuser->email}}</p>
                                    </div>
                                @endif
                            </div>
                            
                            <h2 class="text-lg text-center text-gray-500 w-full mt-4 mb-1">
                                Historial de movimientos del usuario
                            </h2>
                            <div class="w-full p-3 overflow-y-auto" style="height: 53vh;">
                                <div class="space-y-8 relative w-11/12 mx-auto before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:ml-[8.75rem] md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-primaryColor before:via-primaryColor before:to-primaryColor">
                                    @foreach ($mhuser->history as $h)
                                        <div class="relative">
                                            <div class="md:flex items-center md:space-x-4 mb-1">
                                                <div class="flex items-center space-x-4 md:space-x-2 md:space-x-reverse">

                                                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-primaryColor shadow-bl md:order-1">
                                                        
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                                                            <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                                                            <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                                                        </svg>
                                                        
                                                    </div>

                                                    <time class="font-medium text-primaryColor md:w-28">{{$h->dateaction}}</time>
                                                </div>
                                                <p class="text-gray-500 ml-14 font-bold">{{$h->action}}</p>
                                            </div>
                                            <p class="text-gray-500 ml-14 md:ml-44">
                                                {{$h->description}}
                                            </p>
                                            <p class="text-gray-500 text-sm ml-14 md:ml-44">
                                                Acción realizada por: {{$h->whomade->name . ' ' . $h->whomade->lastname}}
                                            </p>
                                        </div>
                                    @endforeach
                                
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2 pb-3 px-3">
                            <h2 class="text-lg text-gray-500 w-full mb-1">
                                Certificaciones
                            </h2>

                            <div class="overflow-y-auto" style="height: 70vh">
                                <div class="inline-block min-w-full py-2 align-middle">
                                    <div class="overflow-hidden border md:rounded-lg">
                                        <table class="min-w-full divide-y">
                                            <thead class="bg-neutral-400 text-white">
                                                <tr>
                                                    <th scope="col" class="headertabletrainingsusers">Área / Certificación</th>
                                                    <th scope="col" class="headertabletrainingsusers">Nivel</th>
                                                    <th scope="col" class="headertabletrainingsusers">Fecha de inicio</th>
                                                    <th scope="col" class="headertabletrainingsusers">Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white text-gray-500 text-sm">
                                                    <td class="text-gray-500 font-bold p-3">{{$mhuser->area->name}}</td>
                                                    @foreach($mhuser->area->processes as $pcss)
                                                        @if($pcss->training != null)
                                                        <tr class="border-b border-dotted border-gray-200">
                                                            <td class="p-3">{{$pcss->training->name}}</td>
                                                            @if($mhuser->processstatuses($pcss->id) != null)
                                                                
                                                                @switch($mhuser->processstatuses($pcss->id)->status)
                                                                    @case('pending')
                                                                        <td class="p-2">
                                                                            <div class="bg-neutral-400 hover:bg-neutral-500 px-3 py-1 rounded-lg w-fit text-white font-semibold w-1/2 text-center">Pendiente</div>
                                                                        </td>
                                                                        <td class="p-3">
                                                                            {{$mhuser->processstatuses($pcss->id)->created_at}}
                                                                        </td>
                                                                        <td class="p-3">
                                                                            <p class="text-neutral-500">Pendiente</p>
                                                                        </td>
                                                                    
                                                                        @break
                                                                    @case('l1')
                                                                        <td class="p-2">
                                                                            <div class="bg-yellow-500 hover:bg-yellow-500/80 px-3 py-1 rounded-lg w-16 text-white font-semibold w-1/2 text-center">ET</div>
                                                                        </td>
                                                                        <td class="p-3">
                                                                            {{$mhuser->processstatuses($pcss->id)->created_at}}
                                                                        </td>
                                                                        <td class="p-3">
                                                                            <p class="text-green-500">Activo</p>
                                                                        </td>
                                                                        @break
                                                                    @case('l2')
                                                                        <td class="p-2">
                                                                            <div class="bg-orangeColor hover:bg-orangeColor/80 px-3 py-1 rounded-lg w-16 text-white font-semibold w-1/2 text-center">EE</div>
                                                                        </td>
                                                                        <td class="p-3">
                                                                            {{$mhuser->processstatuses($pcss->id)->created_at}}
                                                                        </td>
                                                                        <td class="p-3">
                                                                            <p class="text-green-500">Activo</p>
                                                                        </td>
                                                                        @break
                                                                    @case('l3')
                                                                        <td class="p-2">
                                                                            <div class="bg-greenColor hover:bg-greenColor/80 px-3 py-1 rounded-lg w-16 text-white font-semibold w-1/2 text-center">H</div>
                                                                        </td>
                                                                        <td class="p-3">
                                                                            {{$mhuser->processstatuses($pcss->id)->created_at}}
                                                                        </td>
                                                                        <td class="p-3">
                                                                            <p class="text-green-500">Activo</p>
                                                                        </td>
                                                                        @break
                                                                    @case('l4')
                                                                        <td class="p-2">
                                                                            <div class="bg-blueColor hover:bg-blueColor/80 px-3 py-1 rounded-lg w-16 text-center text-white font-semibold w-1/2 text-center">C</div>
                                                                        </td>
                                                                        <td class="p-3">
                                                                            {{$mhuser->processstatuses($pcss->id)->created_at}}
                                                                        </td>
                                                                        <td class="p-3">
                                                                            <p class="text-green-500">Activo</p>
                                                                        </td>
                                                                        @break
                                                                @endswitch
                                                            
                                                            @else
                                                                <td class="p-2">
                                                                    <div class="bg-neutral-200 hover:bg-neutral-200 text-neutral-400 text-xs px-2 py-1 rounded-lg w-11/12 text-center">
                                                                        Sin asignar
                                                                    </div>
                                                                </td>
                                                                <td class="p-3">NA</td>
                                                                <td class="p-3"></td>
                                                            @endif
                                                        </tr>
                                                        @endif
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
        @endif
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

        window.addEventListener('aftercreateuser', event => {
            showcreateusers();
        })

        window.addEventListener('afteredituser', event => {
            showeditusers();
        })

        window.addEventListener('showedit', event => {
            showeditusers();
        })

        

    </script>

    @push('js')
        <script>
            window.Livewire.on('deleteuserf', iduser => {
                Swal.fire({
                    title: '¿Seguro que deseas desactivar este usuario?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3088d9',
                    cancelButtonColor: '#EF4444',
                    confirmButtonText: 'Si, Eliminar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.Livewire.emit('deleteuser', iduser);
                    }
                })
            });

            window.Livewire.on('activeuserf', iduser => {
                Swal.fire({
                    title: '¿Seguro que deseas activar este usuario?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3088d9',
                    cancelButtonColor: '#EF4444',
                    confirmButtonText: 'Si, activar',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.Livewire.emit('activeuser', iduser);
                    }
                })
            });
            
        </script>
    @endpush