<div>
    <div class="top-20  left-0 z-50 fixed   max-h-full overflow-y-auto"   wire:loading wire:target="createprocess">
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
        <p class="text-2xl font-bold mb-3 my-2">Crear Operación</p>
        <button onclick="closecreateprocess()" class="closebttn">
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
            <p class="">Nombre de la operación:</p>
            <input wire:model="name_process" type="text" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('name_process')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        <div class="w-3/4 my-1 mx-auto">
            <p class="">Número de operación:</p>
            <input wire:model="number_process" type="number" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('number_process')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>
        
        <div class="w-3/4 my-1 mx-auto">
            <p class="">Línea:</p>
            <select wire:model="id_line" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                <option value="">Seleccionar</option>
                @foreach ($lines as $line)
                    <option value="{{$line->id}}">{{$line->name}}</option>
                @endforeach
            </select>
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('id_line')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>

        <div class="w-3/4 my-1 mx-auto">
            <p class="">Categoría:</p>
            <select wire:model="id_category" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                <option value="">Seleccionar</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <div>
                <span class="text-red-500 text-xs italic">
                    @error('id_category')
                        {{$message}}
                    @enderror
                </span>
            </div>
        </div>

        <div class="w-3/4 my-1 mx-auto" >
            <p cla|ss="my-2">Modelos:</p>
            <div class="border-2 border-neutral-400 p-2 rounded-lg overflow-y-auto" style="height: 24vh">
                @foreach ($models as $model)
                
                    <div class="flex my-1">
                        <input wire:model="models_select.{{ $model->id }}" value="{{$model->id}}" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10 mr-3 my-auto" type="checkbox" name="" id="">
                        <p>{{$model->name}}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <div class="w-3/4 my-3 mx-auto">
        <button wire:click="createprocess" class="bg-neutral-400 hover:bg-neutral-500 p-2 rounded-lg w-full text-white">Guardar</button>
    </div>

</div>