<div>
    
    <div class="flex">
        <p class="text-2xl font-bold mb-3 my-2">Editar proceso</p>
        <button onclick="closeeditprocess()" class="closebttn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>


    <div class="">
        <div class="w-3/4 flex my-2 mx-auto">
            <p class="text-sm text-neutral-400 my-auto mr-3">Área seleccionada:</p>
            <p class="text-xl">{{$areaname}}</p>
        </div>
        <div class="w-3/4 my-1 mx-auto">
            <p class="">Nombre del proceso:</p>
            <input wire:model.defer="name_process" type="text" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('name_process')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-1 mx-auto">
            <p class="">Número de proceso:</p>
            <input wire:model.defer="number_process" type="number" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('number_process')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-1 mx-auto">
            <p class="">Actividad:</p>
            <select wire:model.defer="id_activity" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                <option value="">Seleccionar</option>
                @foreach ($activities as $activity)
                    <option value="{{$activity->id}}">{{$activity->name}}</option>
                @endforeach
            </select>
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('id_activitie')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>

        <div class="w-3/4 my-1 mx-auto" >
            <p class="my-2">Equipo:</p>
            <div class="border-2 border-neutral-400 p-2 rounded-lg overflow-y-auto" style="height: 24vh">
                @foreach ($equipament as $equip)
                
                    <div class="flex my-1">
                        <input wire:model.defer="equipamentp.{{ $equip->id }}" value="{{$equip->id}}" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10 mr-3 my-auto" type="checkbox" name="" id="">
                        <p>{{$equip->name}}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <div class="w-3/4 my-3 mx-auto">
        <button wire:click="editprocess" class="bg-neutral-400 hover:bg-neutral-500 p-2 rounded-lg w-full text-white">Actualizar</button>
    </div>

</div>
