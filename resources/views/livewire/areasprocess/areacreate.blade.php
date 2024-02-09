<div>
    
    <div class="flex">
        @if($idArea == null)
            <p class="text-2xl font-bold mb-3 my-2">Crear área</p>
        @else
            <p class="text-2xl font-bold mb-3 my-2">Editar área</p>
        @endif
        <button onclick="closecreatearea()" class="closebttn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    


    <div class="w-3/4 my-1 mx-auto">
        <p class="">Nombre del área:</p>
        <input wire:model="name" type="text" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 text-gray-700">
        <div>
            <span class="text-red-500 text-xs italic">
                @error('name')
                    {{$message}}
                @enderror
            </span>
        </div>
    </div>

    <div class="w-3/4 my-3 mx-auto">
        @if($idArea == null)
            <button wire:click="createarea" class="bg-neutral-400 hover:bg-neutral-500 p-2 rounded-lg w-full text-white">Guardar</button>
        @else
            <button wire:click="editarea" class="bg-neutral-400 hover:bg-neutral-500 p-2 rounded-lg w-full text-white">Actualizar</button>
        @endif
        
    </div>

</div>
