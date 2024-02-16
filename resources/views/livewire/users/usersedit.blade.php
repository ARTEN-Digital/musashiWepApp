<div>
    <div class="top-20  left-0 z-50 fixed   max-h-full overflow-y-auto"   wire:loading wire:target="edituser, activateuser" >
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
        <p class="text-2xl font-bold my-2">Editar usuario</p>
        <button onclick="closeeditusers()" class="closebttn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <div class="col-span-6 sm:col-span-3 my-2">
        <div class="w-full relative text-center mt-4">
            <div class="relative h-32 w-32 shadow-xl mx-auto  border-gray-100 rounded-full overflow-hidden border-2 mb-4">
                <label for="imguseredit">
                    @if($profile_photo_path)
                        @if($profile_photo_path == $old_profile_photo_path )
                            <img  src="{{$profile_photo_path}}" class="h-32 w-32 rounded-full object-cover">
                        @else
                            <img src="{{$profile_photo_path->temporaryUrl()}}" class="h-32 w-32 rounded-full object-cover">
                        @endif
                    @else
                        <img class="h-32 w-32 rounded-full object-cover" src="{{$img}}" alt="perfil" />
                    @endif
            
                    <input type="file" wire:change="changeflag" wire:model="profile_photo_path" name="imguseredit" id="imguseredit" accept="image/*" style="display: none;">
                </label>
            </div>
        </div>
    </div>

    @if($userstatus == 0)
        <p class="w-fit mx-auto text-center py-1 px-2 rounded-lg text-white bg-red-400 animate-pulse">Usuario desactivado</p>
    @endif

    <div class="overflow-y-auto" style="height:44vh">
        <div class="w-3/4 my-2 mx-auto">
            <p class="">Nombre(s):</p>
            <input wire:model.defer="name" type="text" class="inputGeneral">
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-2 mx-auto">
            <p class="">Apellidos:</p>
            <input wire:model.defer="lastname" type="text" class="inputGeneral">
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('lastname')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-2 mx-auto">
            <p class=""># Nómina:</p>
            <input wire:model.defer="payroll" type="text" class="inputGeneral">
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('payroll')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        {{-- <div class="w-3/4 my-2 mx-auto">
            <p class="">Puesto:</p>
            <input wire:model.defer="id_position" type="text" class="inputGeneral">
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('id_position')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div> --}}
        <div class="w-3/4 my-2 mx-auto">
            <p class="">Correo:</p>
            <input wire:model.defer="email" type="mail" class="inputGeneral">
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('email')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-2 mx-auto">
            <p class="">Télefono:</p>
            <input wire:model.defer="phone" type="number" class="inputGeneral">
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('phone')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-2 mx-auto">
            <p class="">Rol:</p>
            <select wire:model.defer="id_usertype" class="inputGeneral">
                <option value="null">Seleccionar...</option>
                @foreach ($roles as $rol)
                    <option value="{{$rol->id}}">{{$rol->name}}</option>
                @endforeach
            </select>
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('id_usertype')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-2 mx-auto">
            <p class="">Área:</p>
            <select wire:model.defer="id_area" class="inputGeneral">
                <option value="null">Seleccionar...</option>
                @foreach ($areas as $area)
                    <option value="{{$area->id}}">{{$area->name}}</option>
                @endforeach
            </select>
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('id_area')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-2 mx-auto">
            <p class="">Posición:</p>
            <select wire:model.defer="id_position" class="inputGeneral">
                <option value="null">Seleccionar...</option>
                @foreach ($positions as $position)
                    <option value="{{$position->id}}">{{$position->name}}</option>
                @endforeach
            </select>
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('id_position')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>

        <div class="w-3/4 my-2 mx-auto">
            <p class="">Nueva contraseña:</p>
            <div class="" x-data="{ show: true }">
                <div class="relative">
                    <input wire:model.defer="password" :type="show ? 'password' : 'text'" class="w-10/12 mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 text-gray-700">
                    <div class="absolute inset-y-0 right-0 flex items-center text-sm leading-5" style="padding-right: 1vw">
                        <svg class="h-5 text-gray-500" fill="none" @click="show = !show"
                            :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 576 512">
                            <path fill="currentColor"
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                            </path>
                        </svg>
                        
                        
                        <svg class="h-5 text-gray-500" fill="none" @click="show = !show"
                        :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                        viewbox="0 0 640 512">
                        <path fill="currentColor"
                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                        </path>
                        </svg>
                    </div>
                </div>
            </div>
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('password')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
    </div>
    <div class="w-3/4 my-3 mx-auto">
        @if($userstatus == 0)
            <button wire:click="activateuser" class="bg-neutral-400 hover:bg-neutral-500 p-2 rounded-lg w-full text-white">Activar </button>
        @else
            <button wire:click="edituser" class="bg-neutral-400 hover:bg-neutral-500 p-2 rounded-lg w-full text-white">Actualizar</button>
        @endif
    </div>

</div>

<script>
</script>  