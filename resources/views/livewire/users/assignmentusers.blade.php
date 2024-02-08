<div>
    <div class="flex">
        <div class="w-68p p-5 bg-white rounded shadow-lg">
            <div class="flex">
                <a href="/users">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 my-auto mr-3 text-neutral-400 hover:text-neutral-500">
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-4.28 9.22a.75.75 0 0 0 0 1.06l3 3a.75.75 0 1 0 1.06-1.06l-1.72-1.72h5.69a.75.75 0 0 0 0-1.5h-5.69l1.72-1.72a.75.75 0 0 0-1.06-1.06l-3 3Z" clip-rule="evenodd" />
                    </svg>
                </a>
                <p class="text-3xl font-bold">Asignación de usuarios</p>
            </div>
            @if(!Auth::user()->is_leader)
                <div class="flex flex-col my-3">
                    <label class="w-full text-sm text-neutral-400 font-semibold">Coordinador / Líder</label>
                    <select wire:model="leaderfilteradmin" class="w-5/12 mr-3 my-2 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-2 text-gray-700">
                        <option value="">Selecciona</option>
                        @foreach ($leaders as $leader)
                            <option value="{{$leader->id}}">{{$leader->name . ' ' . $leader->lastname}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <p class="text-sm font-semibold">Personal asignado a líder</p>
                </div>
            @else
                <div>
                    <p class="text-sm font-semibold">Personal que tienes asignado</p>
                </div>
            @endif
            
            <div class="flex flex-col">
                <div class="overflow-x-auto" style="height:53vh">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="overflow-hidden border md:rounded-lg">
                            <table class="min-w-full divide-y text-sm">
                                <thead class="bg-neutral-400 text-white">
                                    <tr>
                                        <th scope="col" class="headertableassigment">Nomina</th>
                                        <th scope="col" class="headertableassigment">Nombre</th>
                                        <th scope="col" class="headertableassigment">Puesto</th>
                                        <th scope="col" class="headertableassigment">Rol</th>
                                        <th scope="col" class="headertableassigment">Área</th>
                                        <th scope="col" class="headertableassigment">Estado</th>
                                        <th scope="col" class="headertableassigment">Asignación</th>
                                        <th scope="col" class="headertableassigment">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($usersassigment as $user)
                                        @switch($user->statusleader)
                                            @case(1)
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
                                                        Asignado
                                                    </td>
                                                    <td class="px-4 py-4">
                                                        {{$this->getusername($user->id_leader)}}
                                                    </td>
                                                    <td class="px-4 py-4">
                                                        <button wire:click="$emit('unassigmentuser',{{$user->id}})" class="p-2 rounded-lg mx-2"> 
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="userleftright">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                            </svg>                                                  
                                                        </button>
                                                    </td>
                                                </tr>  
                                                @break
                                            @case(2)
                                                <tr @if($user->id_leader == $leaderfilteradmin) 
                                                        class="text-blue-500"
                                                    @else
                                                        class="text-neutral-500"
                                                    @endif>
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
                                                        @if($user->id_leader == $leaderfilteradmin)
                                                            Solicitado
                                                        @else
                                                            Solicitud enviada
                                                        @endif
                                                    </td>
                                                    <td class="px-4 py-4">
                                                        {{$this->getusernamepet($user->id)}}
                                                    </td>
                                                    <td class="px-4 py-4 flex">

                                                        @if($user->id_leader == $leaderfilteradmin)
                                                            <button wire:click="transfer({{$user->id}})" class="text-white text-xs bg-cyan-700 p-2 rounded-lg mx-1"> 
                                                                Transferir personal
                                                            </button>
                                                            <button wire:click="rejecttransfer({{$user->id}})" class="text-white text-xs bg-red-500 hover:bg-red-600 p-2 rounded-lg mx-1"> 
                                                                Rechazar
                                                            </button>
                                                        @else
                                                            <button wire:click="resendtransfer({{$user->id}})" class="text-white text-xs bg-neutral-400 hover:bg-neutral-500 p-2 rounded-lg mx-1"> 
                                                                Reenviar solicitud
                                                            </button>
                                                            <button wire:click="canceltransfer({{$user->id}})" class="text-white text-xs bg-red-500 hover:bg-red-600 p-2 rounded-lg mx-1"> 
                                                                Cancelar
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @break
                                        @endswitch
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="w-30p ml-auto py-5 px-2 bg-white rounded shadow-lg">
            <div class="flex flex-col mx-4 text-neutral-400">
                <p class="font-semibold text-sm">Área asignada</p>
                <select wire:model="areafilter" class="inputAssigment">
                    <option value="">Seleccionar</option>
                    @foreach ($areas as $area)
                        <option value="{{$area->id}}">{{$area->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mx-4 my-3 text-neutral-400">
                <p class="font-semibold text-sm">Líder al que pertenece</p>
                <select wire:model="leaderfilter" class="inputAssigment">
                    <option value="">Seleccionar</option> 
                    @foreach ($leaders as $leader)
                        <option value="{{$leader->id}}">{{$leader->name . ' ' . $leader->lastname}}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mx-4 my-5">
                <div class="my-2">
                    <p class="font-semibold">Lista de usuarios para asignar</p>
                </div>
                <div class="overflow-y-auto" style="height:53vh">
                    <table class="min-w-full divide-y text-sm">
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($userstoassigmentfree as $user)
                                @if($user->liderpet != $leaderfilteradmin && $user->statusleader != 2)
                                    <tr>
                                        <td class="px-1 py-4">
                                            @if($user->statusleader != null)
                                                <svg wire:click="$emit('assiguseragain',{{$user->id}})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="userrightleftyellow">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            @else
                                                <svg wire:click="$emit('assiguser',{{$user->id}})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="userrightleft">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            @endif
                                            
                                        </td>
                                        <td class="px-1 py-4">
                                            {{$user->payroll}}
                                        </td>
                                        <td class="px-1 py-4">
                                            {{$user->name . ' ' . $user->lastname}}
                                        </td>
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

    <script>
        

    </script>
    @push('js')
        <script>
            window.Livewire.on('assiguser', iduser => {
                Swal.fire({
                    title: '¿Seguro que deseas asignar este usuario?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3088d9',
                    cancelButtonColor: '#EF4444',
                    confirmButtonText: 'Si, asignar',
                    cancelButtonText: 'No, cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.Livewire.emit('assigment', iduser);
                         // Swal.fire(
                        //   '¡Eliminado!',
                        //   'Tu elemento ha sido eliminado.',
                        //   'Exito'
                        // )
                    }
                })
            });

            window.Livewire.on('assiguseragain', iduser => {
                Swal.fire({
                    title: 'Este usuario ya tiene un líder ¿quiere hacer una petición para asignarlo?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3088d9',
                    cancelButtonColor: '#EF4444',
                    confirmButtonText: 'Si, realizar',
                    cancelButtonText: 'No, cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.Livewire.emit('assigmentagain', iduser);
                        // Swal.fire(
                        //   '¡Eliminado!',
                        //   'Tu elemento ha sido eliminado.',
                        //   'Exito'
                        // )
                    }
                })
            });

            window.Livewire.on('unassigmentuser', iduser => {
                Swal.fire({
                    title: '¿Seguro que quieres desasignar este usuario?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3088d9',
                    cancelButtonColor: '#EF4444',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No, cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.Livewire.emit('unassigment', iduser);
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
