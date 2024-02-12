<div>
    
    <div class="flex">
        <p class="text-2xl font-bold mb-3 my-2">Crear capacitación</p>
        <button onclick="closecreatetrainings()" class="closebttn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>


    <div class="">
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
        <div class="w-3/4 my-2 mx-auto">
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
            
        </div>

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
        <button wire:click="createtraining" class="bg-neutral-400 hover:bg-neutral-500 p-2 rounded-lg w-full text-white">Guardar</button>
    </div>

</div>
