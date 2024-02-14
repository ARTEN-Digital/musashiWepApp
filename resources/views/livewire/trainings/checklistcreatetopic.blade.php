<div>
    
    <div class="flex">
        @if($idconcept == null)
            <p class="text-2xl font-bold mb-3 my-2">Crear concepto</p>
        @else
            <p class="text-2xl font-bold mb-3 my-2">Editar concepto</p>
        @endif
        <button onclick="closecreatetopics()" class="closebttn">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>


    <div class="">
        <div class="w-3/4 my-1 mx-auto">
            <p class="">Concepto:</p>
            <textarea wire:model="concept" type="text" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700" cols="30" rows="5"></textarea>
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('concept')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-1 mx-auto">
            <p class="">Número de concepto:</p>
            <input wire:model="number_concept" type="text" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('number_concept')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-1 mx-auto">
            <p class="">Tópico:</p>
            <select wire:model="id_topic" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                <option value="">Seleccionar</option>
                @foreach ($topics as $topic)
                    <option value="{{$topic->id}}">{{$topic->name}}</option>
                @endforeach
            </select>
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('id_topic')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-1 mx-auto">
            <p class="">Responsable:</p>
            <select wire:model="id_user" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                <option value="">Seleccionar</option>
                @foreach ($trainers as $trainer)
                    <option value="{{$trainer->id}}">{{$trainer->name . ' ' . $trainer->lastname}}</option>
                @endforeach
            </select>
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('id_user')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>

    </div>
    <div class="w-3/4 my-3 mx-auto">
        @if($idconcept == null)
            <button wire:click="createconcept" class="bg-neutral-400 hover:bg-neutral-500 p-2 rounded-lg w-full text-white">Guardar</button>
        @else
            <button wire:click="editconcept" class="bg-neutral-400 hover:bg-neutral-500 p-2 rounded-lg w-full text-white">Guardar</button>  
        @endif
    </div>

</div>
