<div>
    
    <div class="flex">
        <p class="text-2xl font-bold mb-3 my-2">Actualizar capacitación</p>
        <button onclick="closeedittrainings()" class="bg-neutral-400 hover:bg-neutral-500 p-1 rounded-lg w-fit ml-auto my-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>


    <div class="overflow-y-auto" style="height: 66vh">
        <div class="w-3/4 my-5 mx-auto flex">
            <a href="/trainingschecklist" class="w-fit mx-auto my-2 py-2 text-center px-3 bg-neutral-400 hover:bg-neutral-500 text-white rounded-lg flex cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>                           
                Checklist de evaluación
            </a>
        </div>
        <div class="w-3/4 my-1 mx-auto">
            <p class="">Nombre de la capacitación:</p>
            <input type="text" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
        </div>
        <div class="w-3/4 my-1 mx-auto">
            <p class="">Proceso:</p>
            <select class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                <option value="">opcion 1</option>
                <option value="">opcion 2</option>
                <option value="">opcion 3</option>
                <option value="">opcion 4</option>
            </select>
        </div>
        <div class="w-3/4 my-1 mx-auto">
            <p class="">Responsable:</p>
            <select class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                <option value="">opcion 1</option>
                <option value="">opcion 2</option>
                <option value="">opcion 3</option>
                <option value="">opcion 4</option>
            </select>
        </div>
        <div class="w-3/4 my-1 mx-auto">
            <p class="">Periodo de validéz:</p>
            <select class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                <option value="">opcion 1</option>
                <option value="">opcion 2</option>
                <option value="">opcion 3</option>
                <option value="">opcion 4</option>
            </select>
        </div>

        <div class="w-3/4 my-1 mx-auto" >
            <p class="my-2">Niveles disponibles para la capacitación:</p>
            <div class="border-2 border-neutral-400 p-2 rounded-lg overflow-y-auto" style="height: 22vh">
                <div class="flex my-1">
                    <input  class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10 mr-3 my-auto" type="checkbox" name="" id="">
                    <p >Nivel 1 ET</p>
                </div>
                <div class="flex my-1">
                    <input  class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10 mr-3 my-auto" type="checkbox" name="" id="">
                    <p >Nivel 2 EE</p>
                </div>
                <div class="flex my-1">
                    <input  class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10 mr-3 my-auto" type="checkbox" name="" id="">
                    <p >Nivel 3 H</p>
                </div>
                <div class="flex my-1">
                    <input  class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-gray-900 checked:before:bg-gray-900 hover:before:opacity-10 mr-3 my-auto" type="checkbox" name="" id="">
                    <p >Nivel 4 C</p>
                </div>
            </div>
        </div>

    </div>
    <div class="w-3/4 my-3 mx-auto">
        <button class="bg-neutral-400 hover:bg-neutral-500 p-2 rounded-lg w-full text-white">Actualizar</button>
    </div>

</div>
