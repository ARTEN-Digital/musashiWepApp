<div>
    <div class="flex" style="height:90vh">
        <div class="w-full p-5 bg-white rounded shadow-lg">
            <p class="text-xl font-bold">Asignación de capacitaciones</p>
            <div class="flex my-3">
                <div class="flex flex-col w-1/4">
                    <label class="w-full">Líder</label>
                    <select class="w-full my-2 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 text-gray-700">
                        <option value="">Hector Azua</option>
                        <option value="">Jhon Quistiano</option>
                        <option value="">Fernanda Bueno</option>
                    </select>
                </div>
                <div class="flex flex-col w-1/4 mx-5">
                    <label class="w-full">Área</label>
                    <select class="w-full my-2 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 text-gray-700">
                        <option value="">Área 1</option>
                        <option value="">Área 2</option>
                        <option value="">Área 3</option>
                    </select>
                </div>
            </div>

            <div class="my-3 flex">
                <div class="flex">
                    <p class="font-semibold mr-2 underline decoration-2">30</p>
                    <p class="text-sm">Operadores mostrados</p>
                </div>
                <div class="flex ml-8">
                    <p class="font-semibold mr-2 underline decoration-2">5</p>
                    <p class="text-sm">Capacitaciones mostradas</p>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="overflow-hidden border md:rounded-lg">
                            <table class="min-w-full divide-y text-sm">
                                <thead class="bg-neutral-400 text-white">
                                    <tr>
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Nómina</th>
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Nombre</th>
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Puesto</th>
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Rol</th>

                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Proc 1</th>
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Proc 2</th>
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Proc 3</th>
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Proc 4</th>
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Proc 5</th>
                                        
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Total procesos</th>
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Porcentaje</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr>
                                        <td class="p-3">13431</td>
                                        <td class="p-3">Hilario Ojeda</td>
                                        <td class="p-3">Líder</td>
                                        <td class="p-3">Operador</td>
                                        <td class="p-3">
                                            <button onclick="showmchecklist()" class="bg-blueColor hover:bg-blueColor/80 px-3 py-1 rounded-lg w-16 text-center text-white font-semibold">
                                                C
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button onclick="showmhistory()" class="bg-yellow-500 hover:bg-yellow-500/80 px-3 py-1 rounded-lg w-16 text-white font-semibold">
                                                ET
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button class="bg-orangeColor hover:bg-orangeColor/80 px-3 py-1 rounded-lg w-16 text-white font-semibold">
                                                EE
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button class="bg-greenColor hover:bg-greenColor/80 px-3 py-1 rounded-lg w-16 text-white font-semibold">
                                                H
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button class="bg-red-500 hover:bg-red-500/80 px-3 py-1 rounded-lg w-fit text-white font-semibold">
                                                Expirado
                                            </button>
                                        </td>
                                        <td class="p-3 font-bold text-base text-center">5</td>
                                        <td class="p-3 font-bold text-base text-center text-red-500">20%</td>
                                    </tr>

                                    <tr>
                                        <td class="p-3">13431</td>
                                        <td class="p-3">Hilario Ojeda</td>
                                        <td class="p-3">Líder</td>
                                        <td class="p-3">Operador</td>
                                        <td class="p-3">
                                            <button class="bg-blueColor hover:bg-blueColor/80 px-3 py-1 rounded-lg w-16 text-center text-white font-semibold">
                                                C
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button onclick="showmdatetraining()" class="bg-neutral-400 hover:bg-neutral-500 px-3 py-1 rounded-lg w-fit text-white font-semibold">
                                                Pendiente
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button class="bg-neutral-200 hover:bg-neutral-200 text-neutral-500 text-xs px-2 py-1 rounded-lg w-fit">
                                                Sin asignar
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button class="bg-neutral-200 hover:bg-neutral-200 text-neutral-500 text-xs px-2 py-1 rounded-lg w-fit">
                                                Sin asignar
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button onclick="showmdatetrainingexpired()" class="bg-red-500 hover:bg-red-500/80 px-3 py-1 rounded-lg w-fit text-white font-semibold">
                                                Expirado
                                            </button>
                                        </td>
                                        <td class="p-3 font-bold text-base text-center">5</td>
                                        <td class="p-3 font-bold text-base text-center text-green-500">60%</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="p-3">13431</td>
                                        <td class="p-3">Hilario Ojeda</td>
                                        <td class="p-3">Líder</td>
                                        <td class="p-3">Operador</td>
                                        <td class="p-3">
                                            <button class="bg-blueColor hover:bg-blueColor/80 px-3 py-1 rounded-lg w-16 text-center text-white font-semibold">
                                                C
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button class="bg-yellow-500 hover:bg-yellow-500/80 px-3 py-1 rounded-lg w-16 text-white font-semibold">
                                                ET
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button class="bg-orangeColor hover:bg-orangeColor/80 px-3 py-1 rounded-lg w-16 text-white font-semibold">
                                                EE
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button class="bg-greenColor hover:bg-greenColor/80 px-3 py-1 rounded-lg w-16 text-white font-semibold">
                                                H
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button class="bg-red-500 hover:bg-red-500/80 px-3 py-1 rounded-lg w-fit text-white font-semibold">
                                                Expirado
                                            </button>
                                        </td>
                                        <td class="p-3 font-bold text-base text-center">5</td>
                                        <td class="p-3 font-bold text-base text-center text-red-500">20%</td>
                                    </tr>

                                    <tr>
                                        <td class="p-3">13431</td>
                                        <td class="p-3">Hilario Ojeda</td>
                                        <td class="p-3">Líder</td>
                                        <td class="p-3">Operador</td>
                                        <td class="p-3">
                                            <button class="bg-blueColor hover:bg-blueColor/80 px-3 py-1 rounded-lg w-16 text-center text-white font-semibold">
                                                C
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button class="bg-neutral-400 hover:bg-neutral-500 px-3 py-1 rounded-lg w-fit text-white font-semibold">
                                                Pendiente
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button class="bg-neutral-200 hover:bg-neutral-200 text-neutral-500 text-xs px-2 py-1 rounded-lg w-fit">
                                                Sin asignar
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button class="bg-neutral-200 hover:bg-neutral-200 text-neutral-500 text-xs px-2 py-1 rounded-lg w-fit">
                                                Sin asignar
                                            </button>
                                        </td>
                                        <td class="p-3">
                                            <button class="bg-red-500 hover:bg-red-500/80 px-3 py-1 rounded-lg w-fit text-white font-semibold">
                                                Expirado
                                            </button>
                                        </td>
                                        <td class="p-3 font-bold text-base text-center">5</td>
                                        <td class="p-3 font-bold text-base text-center text-green-500">60%</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>

    <!--modal checklist de capacitación-->
    <div id="modalchecklist" class="top-20 hidden left-0 z-50 max-h-full overflow-y-auto">
        <div class="flex justify-center h-screen items-center  bg-gray-800 antialiased top-0 opacity-70 left-0  z-30 w-full h-full fixed "></div>
        
        <div class="flex text-gray-500 text:md justify-center h-screen items-center antialiased top-0  left-0  z-40 w-full h-full fixed">
            <div class=" flex flex-col w-11/12 mx-auto rounded-lg shadow-xl overflow-y-auto" style="max-height: 90%;">
                    <div class="flex flex-row justify-between px-6 py-2 bg-white text-white rounded-tl-lg rounded-tr-lg">
                        <h2 class="text-2xl text-gray-500 font-semibold w-full text-center py-2">
                            Checklist de capacitación
                        </h2>
                    
                        <svg onclick="closemchecklist()" class="w-6 h-6 cursor-pointer text-gray-500  hover:stroke-2"  fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>

                    <div class="flex bg-white py-3">
                        <div class="w-1/4 px-16">
                            <img src="/imgs/user.png" class="h-32 w-32 mx-auto shadow-xl rounded-full" alt="">
                        </div>
                        <div class="w-3/4 text-gray-500">
                            <p class="text-lg font-semibold">343117 - Hilario Ojeda</p>
                            <p class="text-sm my-1">Ball Joint - Ensamble</p>
                            <p class="text-sm my-1">Modelo: 123456</p>
                            <p class="text-sm my-1">Línea: Línea 360</p>
                        </div>
                    </div>

                    <div class="flex bg-white py-3">
                        <div class="w-1/4 my-1">
                            <div class="mx-auto w-3/4">
                                <p class="my-1 text-sm">Fecha de inicio de entrenamiento</p>
                                <input type="date" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700 bg-neutral-400 text-white">
                            </div>
                        </div>
                        <div class="w-1/4 my-1">
                            <div class="mx-auto w-3/4">
                                <p class="my-1 text-sm">Operador sombra:</p>
                                <select class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                                    <option value="">opcion 1</option>
                                    <option value="">opcion 2</option>
                                    <option value="">opcion 3</option>
                                    <option value="">opcion 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-1/4 my-1">
                            <div class="mx-auto w-3/4">
                                <p class="my-1 text-sm">Responsable:</p>
                                <select class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                                    <option value="">opcion 1</option>
                                    <option value="">opcion 2</option>
                                    <option value="">opcion 3</option>
                                    <option value="">opcion 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-1/4 my-1 mx-auto">
                            <p class="my-1 text-sm text-transparent">n</p>
                            <button class="w-1/2 ml-auto px-4 py-1 text-white font-semibold text-white  bg-neutral-400 hover:bg-neutral-500 rounded cursor-pointer"> 
                                Guardar 
                            </button>
                        </div>
                    </div>

                    <div class="flex flex-col bg-white px-8">
                        <p>Checklist</p>
                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="overflow-hidden border md:rounded-lg">
                                    <table class="min-w-full divide-y text-sm">
                                        <thead class="bg-neutral-400 text-white">
                                            <tr>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-left rtl:text-right">Tópicos</th>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-left rtl:text-right">#</th>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-left rtl:text-right">Conceptos</th>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-left rtl:text-right">Entrenamiento cubierto</th>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-left rtl:text-right">Evaluación</th>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-left rtl:text-right">Resultado</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="p-1">Entrenamiento</td>
                                                <td class="p-1">9.9</td>
                                                <td class="p-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus id quam fuga tempora quos. Ab.
                                                </td>
                                                <td class="p-5">
                                                    <input  class="before:content[''] peer relative h-6 w-6 mx-auto cursor-pointer appearance-none rounded-md border border-neutral-400 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-neutral-400 before:opacity-0 before:transition-opacity checked:bg-neutral-400 checked:bg-neutral-400 checked:before:bg-neutral-400 hover:before:opacity-10 my-auto" type="checkbox" name="" id=""></td>
                                                <td class="p-1">
                                                    <input type="text" class="w-1/2 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                                <td class="p-1">
                                                    <input type="text" class="w-3/4 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-1">Entrenamiento</td>
                                                <td class="p-1">9.9</td>
                                                <td class="p-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus id quam fuga tempora quos. Ab.
                                                </td>
                                                <td class="p-5">
                                                    <input  class="before:content[''] peer relative h-6 w-6 mx-auto cursor-pointer appearance-none rounded-md border border-neutral-400 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-neutral-400 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-neutral-400 checked:before:bg-neutral-400 hover:before:opacity-10 my-auto" type="checkbox" name="" id=""></td>
                                                <td class="p-1">
                                                    <input type="text" class="w-1/2 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                                <td class="p-1">
                                                    <input type="text" class="w-3/4 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-1">Entrenamiento</td>
                                                <td class="p-1">9.9</td>
                                                <td class="p-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus id quam fuga tempora quos. Ab.
                                                </td>
                                                <td class="p-5">
                                                    <input  class="before:content[''] peer relative h-6 w-6 mx-auto cursor-pointer appearance-none rounded-md border border-neutral-400 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-neutral-400 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-neutral-400 checked:before:bg-neutral-400 hover:before:opacity-10 my-auto" type="checkbox" name="" id=""></td>
                                                <td class="p-1">
                                                    <input type="text" class="w-1/2 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                                <td class="p-1">
                                                    <input type="text" class="w-3/4 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-1">Entrenamiento</td>
                                                <td class="p-1">9.9</td>
                                                <td class="p-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus id quam fuga tempora quos. Ab.
                                                </td>
                                                <td class="p-5">
                                                    <input  class="before:content[''] peer relative h-6 w-6 mx-auto cursor-pointer appearance-none rounded-md border border-neutral-400 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-neutral-400 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-neutral-400 checked:before:bg-neutral-400 hover:before:opacity-10 my-auto" type="checkbox" name="" id=""></td>
                                                <td class="p-1">
                                                    <input type="text" class="w-1/2 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                                <td class="p-1">
                                                    <input type="text" class="w-3/4 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-1">Entrenamiento</td>
                                                <td class="p-1">9.9</td>
                                                <td class="p-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus id quam fuga tempora quos. Ab.
                                                </td>
                                                <td class="p-5">
                                                    <input  class="before:content[''] peer relative h-6 w-6 mx-auto cursor-pointer appearance-none rounded-md border border-neutral-400 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-neutral-400 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-neutral-400 checked:before:bg-neutral-400 hover:before:opacity-10 my-auto" type="checkbox" name="" id=""></td>
                                                <td class="p-1">
                                                    <input type="text" class="w-1/2 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                                <td class="p-1">
                                                    <input type="text" class="w-3/4 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-1">Entrenamiento</td>
                                                <td class="p-1">9.9</td>
                                                <td class="p-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus id quam fuga tempora quos. Ab.
                                                </td>
                                                <td class="p-5">
                                                    <input  class="before:content[''] peer relative h-6 w-6 mx-auto cursor-pointer appearance-none rounded-md border border-neutral-400 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-neutral-400 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-neutral-400 checked:before:bg-neutral-400 hover:before:opacity-10 my-auto" type="checkbox" name="" id=""></td>
                                                <td class="p-1">
                                                    <input type="text" class="w-1/2 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                                <td class="p-1">
                                                    <input type="text" class="w-3/4 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-1">Entrenamiento</td>
                                                <td class="p-1">9.9</td>
                                                <td class="p-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus id quam fuga tempora quos. Ab.
                                                </td>
                                                <td class="p-5">
                                                    <input  class="before:content[''] peer relative h-6 w-6 mx-auto cursor-pointer appearance-none rounded-md border border-neutral-400 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-neutral-400 before:opacity-0 before:transition-opacity checked:border-gray-900 checked:bg-neutral-400 checked:before:bg-neutral-400 hover:before:opacity-10 my-auto" type="checkbox" name="" id=""></td>
                                                <td class="p-1">
                                                    <input type="text" class="w-1/2 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                                <td class="p-1">
                                                    <input type="text" class="w-3/4 mx-auto my-1 border-neutral-400 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700">
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!--modal de historial-->
    <div id="modalhistorylist" class="top-20 hidden left-0 z-50 max-h-full overflow-y-auto">
        <div class="flex justify-center h-screen items-center  bg-gray-800 antialiased top-0 opacity-70 left-0  z-30 w-full h-full fixed "></div>
        
        <div class="flex text-gray-500 text:md justify-center h-screen items-center antialiased top-0  left-0  z-40 w-full h-full fixed">
            <div class=" flex flex-col w-7/12 mx-auto rounded-lg shadow-xl overflow-y-auto" style="max-height: 90%;">
                    <div class="flex flex-row justify-between px-6 py-3 bg-white text-white rounded-tl-lg rounded-tr-lg">
                        <svg onclick="closemmhistory()" class="w-6 h-6 cursor-pointer text-gray-500 ml-auto  hover:stroke-2"  fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>

                    <div class="flex py-1 bg-white text-sm font-semibold px-8">
                        <p class="mr-5">343117</p>
                        <p>Hilario Ojeda</p>
                    </div>

                    <div class="flex py-1 bg-white font-bold px-8">
                        <p>Ensamble de Ball Joint</p>
                    </div>

                    <div class="flex flex-col bg-white px-8">
                        <p class="text-sm text-right">Historial</p>
                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="overflow-hidden border md:rounded-lg">
                                    <table class="min-w-full divide-y text-sm">
                                        <thead class="bg-neutral-400 text-white">
                                            <tr>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-left">Nivel</th>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-left">Fecha de modificación</th>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-left">Rol</th>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-left">Líder</th>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-left"></th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="flex p-2">
                                                    <input  class="before:content[''] peer relative h-5 w-5 mx-auto cursor-pointer appearance-none rounded-md border border-neutral-300 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-yellow-500 before:opacity-0 before:transition-opacity checked:bg-yellow-500 checked:bg-yellow-500 checked:before:yellow-500 hover:before:opacity-10 my-auto mx-3" type="checkbox" name="" id="" checked>
                                                    <p class="mx-3">Nivel 1 ET</p>
                                                </td>
                                                <td class="p-2">
                                                    <input type="datetime-local" class="border-neutral-400 focus:border-neutral-400 text-sm  focus:ring focus:ring-neutral-400  rounded-md shadow-sm appearance-none border rounded p-1">
                                                </td>
                                                <td class="p-2">
                                                    Capacitador
                                                </td>
                                                <td class="p-2">
                                                    Mayte del Angel
                                                </td>
                                                <td class="p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                                                    </svg>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="flex p-2">
                                                    <input  class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-neutral-300 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-orangeColor before:opacity-0 before:transition-opacity checked:bg-orangeColor checked:orangeColor checked:before:orangeColor hover:before:opacity-10 my-auto mx-3" type="checkbox" name="" id="" checked>
                                                    <p class="mx-3">Nivel 2 EE</p>
                                                </td>
                                                <td class="p-2">
                                                    <input type="datetime-local" class="border-neutral-400 focus:border-neutral-400 text-sm  focus:ring focus:ring-neutral-400  rounded-md shadow-sm appearance-none border rounded p-1">
                                                </td>
                                                <td class="p-2">
                                                    Capacitador
                                                </td>
                                                <td class="p-2">
                                                    Mayte del Angel
                                                </td>
                                                <td class="p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                                                    </svg>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="flex p-2">
                                                    <input  class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-neutral-300 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-greenColor before:opacity-0 before:transition-opacity checked:bg-greenColor checked:greenColor checked:before:greenColor hover:before:opacity-10 my-auto mx-3" type="checkbox" name="" id="" checked>
                                                    <p class="mx-3">Nivel 3 H</p>
                                                </td>
                                                <td class="p-2">
                                                    <input type="datetime-local" class="border-neutral-400 focus:border-neutral-400 text-sm  focus:ring focus:ring-neutral-400  rounded-md shadow-sm appearance-none border rounded p-1">
                                                </td>
                                                <td class="p-2">
                                                    Capacitador
                                                </td>
                                                <td class="p-2">
                                                    Mayte del Angel
                                                </td>
                                                <td class="p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                                                    </svg>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="flex p-2">
                                                    <input  class="before:content[''] peer relative h-5 w-5 mx-3 cursor-pointer appearance-none rounded-md border border-neutral-300 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blueColor before:opacity-0 before:transition-opacity checked:bg-blueColor checked:blueColor checked:before:blueColor hover:before:opacity-10 my-auto" type="checkbox" name="" id="" checked>
                                                    <p class="mx-3">Nivel 4 C</p>
                                                </td>
                                                <td class="p-2">
                                                    <input type="datetime-local" class="border-neutral-400 focus:border-neutral-400 text-sm  focus:ring focus:ring-neutral-400  rounded-md shadow-sm appearance-none border rounded p-1">
                                                </td>
                                                <td class="p-2">
                                                    Capacitador
                                                </td>
                                                <td class="p-2">
                                                    Mayte del Angel
                                                </td>
                                                <td class="p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                                                    </svg>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    {{-- modal de  fecha de capacitación--}}
    <div id="modaldatetraining" class="top-20 hidden left-0 z-50 max-h-full overflow-y-auto">
        <div class="flex justify-center h-screen items-center  bg-gray-800 antialiased top-0 opacity-70 left-0  z-30 w-full h-full fixed "></div>
        
        <div class="flex text-gray-500 text:md justify-center h-screen items-center antialiased top-0  left-0  z-40 w-full h-full fixed">
            <div class=" flex flex-col w-5/12 mx-auto rounded-lg shadow-xl overflow-y-auto" style="max-height: 90%;">
                    <div class="flex flex-row justify-between px-6 py-3 bg-white text-white rounded-tl-lg rounded-tr-lg">
                        <svg onclick="closemdatetraining()" class="w-6 h-6 cursor-pointer text-gray-500 ml-auto  hover:stroke-2"  fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>

                    <div class="flex bg-white px-8">
                        <p class="mr-5">343117</p>
                        <p>Hilario Ojeda</p>
                    </div>

                    <div class="flex py-5 bg-white font-bold px-8">
                        <p class="text-center w-full">Ensamble de Ball Joint</p>
                    </div>

                    <div class="flex flex-col py-2 bg-white px-8">
                        <p class="text-center w-full my-4">Fecha prevista de capacitación</p>

                        <input type="datetime-local" class="w-1/2 mx-auto border-neutral-400 focus:border-neutral-400 focus:ring focus:ring-neutral-400  rounded-md shadow-sm appearance-none border rounded p-1">

                        <button class="w-fit mx-auto px-4 py-1 my-5 text-white font-semibold text-white  bg-neutral-400 hover:bg-neutral-500 rounded cursor-pointer"> 
                            Guardar 
                        </button>
                    </div>
                    
            </div>
        </div>
    </div>

    <div id="modaldatetrainingexpired" class="top-20 hidden left-0 z-50 max-h-full overflow-y-auto">
        <div class="flex justify-center h-screen items-center  bg-gray-800 antialiased top-0 opacity-70 left-0  z-30 w-full h-full fixed "></div>
        
        <div class="flex text-gray-500 text:md justify-center h-screen items-center antialiased top-0  left-0  z-40 w-full h-full fixed">
            <div class=" flex flex-col w-5/12 mx-auto rounded-lg shadow-xl overflow-y-auto" style="max-height: 90%;">
                    <div class="flex flex-row justify-between px-6 py-3 bg-white text-white rounded-tl-lg rounded-tr-lg">
                        <svg onclick="closemdatetrainingexpired()" class="w-6 h-6 cursor-pointer text-gray-500 ml-auto  hover:stroke-2"  fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </div>

                    <div class="flex bg-white px-8">
                        <p class="mr-5">343117</p>
                        <p>Hilario Ojeda</p>
                    </div>

                    <div class="flex flex-col py-2 bg-white font-bold px-8">
                        <p class="w-fit mx-auto p-2 my-3 rounded-lg text-white bg-red-500">Expirado</p>
                        <p class="text-center w-full">Ensamble de Ball Joint</p>
                    </div>

                    <div class="flex flex-col py-2 bg-white px-8">
                        <p class="text-center w-full my-4">Fecha prevista de capacitación</p>

                        <input type="datetime-local" class="w-1/2 mx-auto border-neutral-400 focus:border-neutral-400 focus:ring focus:ring-neutral-400  rounded-md shadow-sm appearance-none border rounded p-1">

                        <button class="w-fit mx-auto px-4 py-1 my-5 text-white font-semibold text-white  bg-neutral-400 hover:bg-neutral-500 rounded cursor-pointer"> 
                            Guardar 
                        </button>
                    </div>
                    
            </div>
        </div>
    </div>

</div>

<script>
        function showmchecklist(){
            document.getElementById('modalchecklist').classList.remove('hidden');
        }

        function closemchecklist(){
            document.getElementById('modalchecklist').classList.add('hidden');
        }

        function showmhistory(){
            document.getElementById('modalhistorylist').classList.remove('hidden');
        }

        function closemmhistory(){
            document.getElementById('modalhistorylist').classList.add('hidden');
        }

        function showmdatetraining(){
            document.getElementById('modaldatetraining').classList.remove('hidden');
        }

        function closemdatetraining(){
            document.getElementById('modaldatetraining').classList.add('hidden');
        }

        function showmdatetrainingexpired(){
            document.getElementById('modaldatetrainingexpired').classList.remove('hidden');
        }

        function closemdatetrainingexpired(){
            document.getElementById('modaldatetrainingexpired').classList.add('hidden');
        }
</script>
@push('js')
    <script>

    </script>
@endpush