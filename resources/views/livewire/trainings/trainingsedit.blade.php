<div>
    <div class="top-20  left-0 z-50 fixed   max-h-full overflow-y-auto"   wire:loading wire:target="edittraining" >
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
        <p class="text-2xl font-bold mb-3 my-2">Actualizar capacitación</p>
        <button onclick="closeedittrainings()" class="closebttn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>


    <div class="overflow-y-auto" style="height: 66vh">

        <div class="w-3/4 my-5 mx-auto flex">
            <a href="/trainingschecklist/{{$idTraining}}" class="w-fit mx-auto my-2 py-2 text-center px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>                           
                Checklist de evaluación
            </a>
        </div>

        <div class="w-3/4 my-2 mx-auto">
            <p class="">Nombre de la capacitación:</p>
            <input wire:model="name" type="text" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('name')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-2 mx-auto">
            <p class="">Proceso:</p>
            <select wire:model="id_process" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                <option value="">Seleccionar...</option>
                @foreach ($processes as $process)
                    <option value="{{$process->id}}">{{$process->name}}</option>
                @endforeach
            </select>
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('id_process')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-2 mx-auto">
            <p class="">Responsable:</p>
            <select wire:model="id_responsable" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                <option value="">Seleccionar...</option>
                @foreach ($trainers as $trainer)
                    <option value="{{$trainer->id}}">{{$trainer->name . ' ' . $trainer->lastname}}</option>
                @endforeach
            </select>
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('id_responsable')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        {{-- <div class="w-3/4 my-2 mx-auto">
            <p class="">Periodo de validez:</p>
            <div class="flex mt-2">
                <div class="w-1/3">
                    <p class="text-sm">Cantidad</p>
                    <input wire:model="expiration_quantity" type="number" class="w-full my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                </div>
                <div class="w-1/2 ml-4">
                    <p class="text-sm">Tiempo</p>
                    <select wire:model="expiration_type" class="w-full my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                        <option value="1">Día(s)</option>
                        <option value="2">Semana(s)</option>
                        <option value="3">Mes(es)</option>
                    </select>
                </div>
                <div>
                    <span class="text-red-500 text-xs italic">
                        @error('expiration_quantity')
                            {{$message}}
                        @enderror
                    </span>
                </div>
            </div>
            
        </div> --}}

        <div class="w-3/4 my-1 mx-auto" >
            <p class="my-2">Niveles disponibles para la capacitación:</p>
            <div class="border-2 border-neutral-400 p-2 rounded-lg overflow-y-auto" style="height: 22vh">
                @foreach ($levels as $level)
                    <div class="flex my-1">
                        <input wire:model="selectlevels.{{ $level->id }}" value="{{$level->id}}"  class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10 mr-3 my-auto" type="checkbox" name="" id="">
                        <p >{{$level->level}}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <div class="w-3/4 my-3 mx-auto">
        <button wire:click="edittraining" class="bg-neutral-400 hover:bg-neutral-500 p-2 rounded-lg w-full text-white">Actualizar</button>
    </div>

</div>
