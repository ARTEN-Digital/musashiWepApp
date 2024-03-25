<div>
    <div class="top-20  left-0 z-50 fixed   max-h-full overflow-y-auto"   wire:loading wire:target="getuserarea, scmodalassignation, trainingassignation, scmodallevel, changelevel, scmodalchecklist, savechecklist" >
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

    <div class="grid grid-cols-12 gap-5" style="height:90vh">
        <div class="col-start-1 col-end-4 bg-white rounded shadow-lg">
            <div class="flex-col lg:flex-row flex py-3 px-4">
                <button class="bg-neutral-200 hover:bg-neutral-300 px-3 py-1 rounded-lg w-fit lg:mr-auto text-neutral-400 flex font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-1">
                        <path fill-rule="evenodd" d="M4.755 10.059a7.5 7.5 0 0 1 12.548-3.364l1.903 1.903h-3.183a.75.75 0 1 0 0 1.5h4.992a.75.75 0 0 0 .75-.75V4.356a.75.75 0 0 0-1.5 0v3.18l-1.9-1.9A9 9 0 0 0 3.306 9.67a.75.75 0 1 0 1.45.388Zm15.408 3.352a.75.75 0 0 0-.919.53 7.5 7.5 0 0 1-12.548 3.364l-1.902-1.903h3.183a.75.75 0 0 0 0-1.5H2.984a.75.75 0 0 0-.75.75v4.992a.75.75 0 0 0 1.5 0v-3.18l1.9 1.9a9 9 0 0 0 15.059-4.035.75.75 0 0 0-.53-.918Z" clip-rule="evenodd" />
                      </svg>
                      
                    Limpiar
                </button>

                {{-- <button class="bg-neutral-400 hover:bg-neutral-500 px-3 py-1 rounded-lg w-fit lg:ml-auto mt-4 lg:mt-0 text-white flex font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-1">
                        <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0 1 12 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 0 1 1.541 1.836v1.044a3 3 0 0 1-.879 2.121l-6.182 6.182a1.5 1.5 0 0 0-.439 1.061v2.927a3 3 0 0 1-1.658 2.684l-1.757.878A.75.75 0 0 1 9.75 21v-5.818a1.5 1.5 0 0 0-.44-1.06L3.13 7.938a3 3 0 0 1-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836Z" clip-rule="evenodd" />
                    </svg>  
                    Filtrar
                </button>--}}
            </div> 
    
            <div class="overflow-y-auto py-3 px-4 text-neutral-400">
                {{-- <div class="w-full my-1 mx-auto">
                    <p class="my-1">Periodo</p>
                    <p class="text-sm">Fecha inicial</p>
                    <input type="date" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-2 px-3 text-gray-700 bg-neutral-400 text-white">
                    <p class="text-sm mt-3">Fecha final</p>
                    <input type="date" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 text-gray-700 bg-neutral-400 text-white">
                </div> --}}

                <div class="w-full my-1 mx-auto">
                    <p class="">Área:</p>
                    <select wire:change="getuserarea" wire:model.defer="areafilter" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 bg-neutral-200 text-neutral-500">
                        <option value="">Seleccionar...</option>
                        @foreach($areas as $area)
                            <option value="{{$area->id}}">{{$area->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full my-1 mx-auto">
                    <p class="">Línea:</p>
                    <select wire:change="getuserarea" @if($areafilter == null) disabled @endif wire:model.defer="linefilter" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 text-gray-700">
                        <option value="">Seleccionar...</option>
                        @foreach($lines as $line)
                            <option value="{{$line->id}}">{{$line->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full my-1 mx-auto">
                    <p class="">Categoría:</p>
                    <select wire:change="getuserarea" @if($areafilter == null) disabled @endif wire:model.defer="categoryfilter" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 text-gray-700">
                        <option value="">Seleccionar...</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full my-1 mx-auto">
                    <p class="">Modelo:</p>
                    <select wire:change="getuserarea" @if($areafilter == null) disabled @endif wire:model.defer="modelfilter" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-2 px-3 text-gray-700">
                        <option value="">Seleccionar...</option>
                        @foreach($models  as $model)
                            <option value="{{$model->id}}">{{$model->name}}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
        </div>

        <div class="col-start-4 col-end-13 p-5 bg-white rounded shadow-lg">
            <p class="text-xl font-bold">Reporte matriz de habilidades</p>
            <div class="flex my-3">
                <input wire:input="getuserarea" type="text" wire:model.defer="search" class="w-5/12 mr-3 my-2 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700" placeholder="Buscar...">

                <div class="flex my-2 ml-auto">
                    <button class="bg-neutral-400 hover:bg-neutral-500 px-3 py-1 rounded-lg w-fit mr-auto text-white flex font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-3">
                            <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                          </svg>
                        Descargar
                    </button>
                </div>
            </div>

            <div class="my-3 flex">
                <div class="flex">
                    <p class="font-semibold mr-2 underline decoration-2">{{$numoperators}}</p>
                    <p class="text-sm">Operadores mostrados</p>
                </div>
                <div class="flex ml-8">
                    <p class="font-semibold mr-2 underline decoration-2">{{$numconcepts}}</p>
                    <p class="text-sm">Operaciones mostradas</p>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full py-2 align-middle">
                        <div class="overflow-hidden border rounded-lg">
                            <table class="min-w-full divide-y text-sm">
                                <thead class="bg-neutral-400 text-white">
                                    <tr>
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Nómina</th>
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Nombre</th>
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Puesto</th>

                                        @if($infoarea != null)
                                            @foreach($infoarea->processesfilters($linefilter, $categoryfilter, $modelfilter) as $pxa)
                                                <th scope="col" class="p-3 w-fit text-xs font-normal text-left rtl:text-right">{{$pxa->number_process . '-' . $pxa->name}}</th>
                                            @endforeach
                                        @endif
                                        
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Total procesos iniciados</th>
                                        <th scope="col" class="p-3 w-fit text-sm font-normal text-left rtl:text-right">Porcentaje</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($usersarea as $up)
                                        <tr>
                                            <td class="p-3">{{$up->payroll}}</td>
                                            <td class="p-3">{{$up->name . ' ' . $up->lastname}}</td>
                                            <td class="p-3">{{$up->position->name}}</td>
                                            @if($infoarea != null)
                                                @php $totalprocess = 0; @endphp
                                                @foreach($infoarea->processesfilters($linefilter, $categoryfilter, $modelfilter) as $pxa)
                                                   
                                                    <td class="p-3">
                                                        @if($this->statusprocessxuser($up->id, $pxa->id) == null)
                                                            <button wire:click="scmodalassignation({{$up->id}}, {{$pxa->id}})" class="bg-neutral-200 hover:bg-neutral-200 text-neutral-400 text-xs px-2 py-1 rounded-lg w-20">
                                                                Sin asignar
                                                            </button>
                                                        @else
                                                            @switch($this->statusprocessxuser($up->id, $pxa->id)->status)
                                                                @case('pending')
                                                                    <button wire:click="scmodallevel({{$up->id}}, {{$pxa->id}})" class="bg-neutral-400 hover:bg-neutral-500 px-3 py-1 rounded-lg w-fit text-white font-semibold">
                                                                        Pendiente
                                                                    </button>
                                                                     @break
                                                                @case('l1')
                                                                    @php $totalprocess++; @endphp
                                                                    <button wire:click="scmodallevel({{$up->id}}, {{$pxa->id}})" class="bg-yellow-500 hover:bg-yellow-500/80 px-3 py-1 rounded-lg w-16 text-white font-semibold">
                                                                        ET
                                                                    </button>
                                                                    @break
                                                                @case('l2')
                                                                    @php $totalprocess++; @endphp
                                                                    <button wire:click="scmodallevel({{$up->id}}, {{$pxa->id}})" class="bg-orangeColor hover:bg-orangeColor/80 px-3 py-1 rounded-lg w-16 text-white font-semibold">
                                                                        EE
                                                                    </button>
                                                                    @break
                                                                @case('l3')
                                                                    @php $totalprocess++; @endphp
                                                                    <button wire:click="scmodallevel({{$up->id}}, {{$pxa->id}})" class="bg-greenColor hover:bg-greenColor/80 px-3 py-1 rounded-lg w-16 text-white font-semibold">
                                                                        H
                                                                    </button>
                                                                    @break
                                                                @case('l4')
                                                                    @php $totalprocess++; @endphp
                                                                    <button wire:click="scmodallevel({{$up->id}}, {{$pxa->id}})" class="bg-blueColor hover:bg-blueColor/80 px-3 py-1 rounded-lg w-16 text-center text-white font-semibold">
                                                                        C
                                                                    </button>
                                                                    @break
                                                                @default
                                                                    
                                                            @endswitch
                                                        @endif
                                                    </td>
                                                @endforeach
                                            @endif
                                            <td class="p-3 font-bold text-base text-center">{{$totalprocess}}</td>
                                            @php $porcentage = ($numconcepts != 0) ? (($totalprocess * 100)/ $numconcepts) : 0; @endphp
                                            <td class="p-3 font-bold text-base text-center @if($porcentage >= 60) text-green-500 @else text-red-500 @endif">{{$porcentage}}%</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="p-3">Número de operadores certificados por proceso</td>
                                        <td></td>
                                        <td></td>
                                        @if($infoarea != null)
                                            @foreach($infoarea->processesfilters($linefilter, $categoryfilter, $modelfilter) as $pxa)
                                                @php $userscertificade = 0; @endphp
                                                @foreach($usersarea as $up)
                                                    @if($this->statusprocessxuser($up->id, $pxa->id) != null) 
                                                        @if($this->statusprocessxuser($up->id, $pxa->id)->status == 'l4' || $this->statusprocessxuser($up->id, $pxa->id)->status == 'l3')
                                                            @php $userscertificade++; @endphp
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @php $porcentageusers = ($numoperators != 0) ? (($userscertificade * 100)/ $numoperators) : 0; @endphp
                                                <td class="p-3">{{$userscertificade}} / <span class="font-semibold @if($porcentageusers >= 60) text-gr  een-500 @else text-red-500 @endif">{{$porcentageusers}}%</span></td>
                                            @endforeach
                                        @endif

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
    <div id="modalchecklist" class="top-20 @if(!$modalchecklist) hidden @endif left-0 z-50 max-h-full overflow-y-auto">
        <div class="flex justify-center h-screen items-center  bg-gray-800 antialiased top-0 opacity-70 left-0  z-30 w-full h-full fixed "></div>
        
        <div class="flex text-gray-500 text:md justify-center h-screen items-center antialiased top-0  left-0  z-40 w-full h-full fixed">
            <div class=" flex flex-col w-11/12 mx-auto rounded-lg shadow-xl overflow-y-auto" style="max-height: 90%;">
                    <div class="flex flex-row justify-between px-6 py-2 bg-white text-white rounded-tl-lg rounded-tr-lg">
                        <h2 class="text-2xl text-gray-500 font-semibold w-full text-center py-2">
                            Checklist de capacitación
                        </h2>
                    
                        <button wire:click="scmodalchecklist(0,0)" class="closebttn">
                            <svg  class="w-6 h-6 text-white"  fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="flex bg-white py-3">
                        @if ($mcuser != null)
                            <div class="w-1/4 px-16">
                                <img src="{{$mcuser->image_profile}}" class="h-32 w-32 object-cover mx-auto shadow-xl rounded-full" alt="">
                            </div>
                            <div class="w-3/4 text-gray-500">
                                <p class="text-lg font-semibold">{{$mcuser->payroll . ' - ' . $mcuser->name . ' ' . $mcuser->lastname}}</p>
                                <p class="text-sm my-1">{{$mcuser->area->name}} - {{$mcuser->position->name}}</p>
                                <p class="text-sm my-1">Proceso: {{$mcprocess->name}}</p>
                                <p class="text-sm my-1">Capacitación: {{$mctraining->name}}</p>
                            </div>
                        @endif
                    </div>

                    <div class="flex bg-white py-3">
                        <div class="w-1/4 my-1">
                            <div class="mx-auto w-3/4">
                                <p class="my-1 text-sm">Fecha de inicio de entrenamiento</p>
                                <input wire:model.defer="mcstarevldate" type="datetime-local" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm border rounded py-1 px-3 text-gray-700 bg-neutral-400 text-white">
                                <div class="text-center">
                                    <span class="text-red-500 text-xs italic">
                                        @error('mcstarevldate')
                                            {{$message}}
                                        @enderror
                                    </span>
                                </div>
                            
                            </div>
                        </div>
                        {{-- <div class="w-1/4 my-1">
                            <div class="mx-auto w-3/4">
                                <p class="my-1 text-sm">Operador sombra:</p>
                                <select class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                                    <option value="">opcion 1</option>
                                    <option value="">opcion 2</option>
                                    <option value="">opcion 3</option>
                                    <option value="">opcion 4</option>
                                </select>
                            </div>
                        </div> --}}
                        <div class="w-1/4 my-1">
                            <div class="mx-auto w-3/4">
                                <p class="my-1 text-sm">Responsable:</p>
                                @if($mctraining != null && $mcuser != null && $mcprocess != null)
                                <select wire:change="getmodalchecklistdata({{$mcuser->id}}, {{$mcprocess->id}})" wire:model.defer="mcrsblefilter" class="w-full mr-3 my-1 border-gray-300 focus:border-primaryColor focus:ring focus:ring-primaryColor rounded-md shadow-sm appearance-none border rounded py-1 px-3 text-gray-700">
                                    <option value="">Seleccionar...</option>
                                        @foreach($mctraining->checklistevaluations->first()->concepts as $cpts)
                                            @if(!in_array($cpts->user, $mcresponsables))
                                                @php array_push($mcresponsables, $cpts->user); @endphp
                                                <option value="{{$cpts->user->id}}">{{$cpts->user->name . ' ' . $cpts->user->lastname}}</option>
                                            @endif
                                        @endforeach
                                </select>
                                @endif
                            </div>
                        </div>
                        <div class="w-1/4 my-1 mx-auto">
                            <p class="my-1 text-sm text-transparent">n</p>
                            <button wire:click="savechecklist" class="w-1/2 ml-auto px-4 py-1 text-white font-semibold text-white  bg-neutral-400 hover:bg-neutral-500 rounded cursor-pointer"> 
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
                                                <th class="p-1 w-12 text-sm font-normal">Tópico</th>
                                                <th class="p-1 w-12 text-sm font-normal">#</th>
                                                <th class="p-1 w-12 text-sm font-normal">Concepto</th>
                                                <th class="p-1 w-12 text-sm font-normal">Entrenamiento cubierto</th>
                                                <th class="p-1 w-12 text-sm font-normal">Evaluador</th>
                                                <th class="p-1 w-12 text-sm font-normal">Operador sombra</th>
                                                <th class="p-1 w-12 text-sm font-normal">Comentarios evaluador</th>
                                                <th class="p-1 w-12 text-sm font-normal">Resultado de evaluación</th>
                                                <th class="p-1 w-12 text-sm font-normal">Responsable</th>
                                                <th class="p-1 w-12 text-sm font-normal">Comentarios responsable</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 text-sm">
                                            @if($mctraining != null)
                                                @foreach ($mctraining->checklistevaluations->first()->conceptsxchklistfilter($mcrsblefilter) as $cpts)
                                                    <tr>
                                                        <td class="py-1 px-3">{{$cpts->topics->name}}</td>
                                                        <td class="py-1 px-3">{{$cpts->number}}</td>
                                                        <td class="py-1 px-3">{{$cpts->concept}}
                                                        </td>
                                                        <td class="py-1 px-3 text-center">
                                                            <input wire:model.defer="mcselfirststatus.{{ $cpts->id }}" class="before:content[''] peer relative h-8 w-8 mx-auto cursor-pointer appearance-none rounded-md border border-neutral-400 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-500 before:opacity-0 before:transition-opacity checked:bg-blue-500  checked:bg-blue-500 checked:before:bg-blue-500 hover:before:opacity-10 my-auto" type="checkbox">
                                                        </td>
                                                        <td class="py-1 px-3">
                                                            @if($mcusercheck != null)
                                                            <p class="text-sm text-neutral-400">
                                                                {{$this->getapplicant($mcusercheck->id, $cpts->id)}}
                                                            </p>
                                                            @endif
                                                        </td>
                                                        <td class="py-1 px-3">
                                                            <input wire:model.defer="mcshadowoperators.{{ $cpts->id }}" type="text" class=" border-gray-300 focus:border-gray-400 focus:ring focus:ring-gray-400 rounded-md shadow-sm border rounded py-1 px-3 text-gray-700 text-sm">
                                                        </td>
                                                        <td class="py-1 px-3"> 
                                                            <textarea wire:model.defer="mcapplicomments.{{ $cpts->id }}" class="border-gray-300 focus:border-gray-400 focus:ring focus:ring-gray-400 rounded-md shadow-sm border rounded py-1 px-3 text-gray-700 text-sm"></textarea>
                                                        </td>
                                                        <td class="py-1 px-3 text-center">
                                                             <select  wire:model.defer="mcselsecondstatus.{{$cpts->id}}" onchange="changestatus2({{ $cpts->id }}, this.value)" id="select_{{ $cpts->id }}" class="border-gray-300 rounded-md shadow-sm border-4 rounded-md text-gray-700 text-sm">
                                                                <option value="null">Sin calificación</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                            </select>
                                                        </td>
                                                        <td class="py-1 px-3 text-center">
                                                            <p class="text-sm text-neutral-400">
                                                                {{$cpts->user->name . ' ' . $cpts->user->lastname}}
                                                            </p>
                                                        </td>
                                                        <td class="py-1 px-3"> 
                                                            <textarea wire:model.defer="mcevalcomments.{{ $cpts->id }}" class="border-gray-300 focus:border-gray-400 focus:ring focus:ring-gray-400 rounded-md shadow-sm border rounded py-1 px-3 text-gray-700 text-sm"></textarea>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
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
    <div id="modalhistorylist" class="top-20 @if(!$modallevels) hidden @endif left-0 z-50 max-h-full overflow-y-auto">
        <div class="flex justify-center h-screen items-center  bg-gray-800 antialiased top-0 opacity-70 left-0  z-30 w-full h-full fixed "></div>
        
        <div class="flex text-gray-500 text:md justify-center h-screen items-center antialiased top-0  left-0  z-40 w-full h-full fixed">
            <div class=" flex flex-col w-7/12 mx-auto rounded-lg shadow-xl overflow-y-auto" style="max-height: 90%;">
                    <div class="flex flex-row justify-between px-6 py-3 bg-white text-white rounded-tl-lg rounded-tr-lg">
                        <button wire:click="scmodallevel(0,0)" class="closebttn">
                            <svg  class="w-6 h-6 text-white"  fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        
                    </div>

                    @if($mluser != null)
                        <div class="flex py-1 bg-white font-semibold px-8">
                            <p class="mr-5">{{$mluser->payroll}}</p>
                            <p>{{$mluser->name . ' ' . $mluser->lastname}}</p>
                        </div>
                    @endif

                    @if($mltraining != null)
                        <div class="flex py-1 text-xl bg-white font-bold px-8">
                            {{$mltraining->name}}
                        </div>
                    @endif


                    <div class="flex flex-col bg-white py-4 px-8">
                        <div class="overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <div class="overflow-hidden border md:rounded-lg">
                                    <table class="min-w-full divide-y text-sm">
                                        <thead class="bg-neutral-400 text-white">
                                            <tr>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-center">Nivel</th>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-left">Fecha de modificación</th>
                                                <th scope="col" class="p-1 w-fit text-sm font-normal text-left">Checklist</th>
                                                {{-- <th scope="col" class="p-1 w-fit text-sm font-normal text-left">Líder</th> --}}
                                                {{-- <th scope="col" class="p-1 w-fit text-sm font-normal text-center">Comentarios</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @if($mltraining != null)
                                                @foreach ($mltraining->allLeves as $lvl)
                                                <tr>
                                                    @switch($lvl->id)
                                                        @case(1)
                                                                <td class="flex p-2">
                                                                    <input onchange="changelvl(this, '{{$mlstatusprocess->id}}', 'l1')" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-neutral-300 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-yellow-500 before:opacity-0 before:transition-opacity checked:bg-yellow-500 checked:bg-yellow-500 checked:before:yellow-500 hover:before:opacity-10 my-auto mx-3" type="checkbox"
                                                                    @if($mlstatusprocess->status == 'l1' || $mlstatusprocess->status == 'l2' || $mlstatusprocess->status == 'l3' || $mlstatusprocess->status == 'l4')
                                                                        checked    
                                                                    @endif>
                                                                    <p class="mx-3">Nivel 1 ET</p>
                                                                </td>
                                                                <td class="p-2">
                                                                    @if($mlstatusprocess->l1_date != null)
                                                                        <input type="datetime-local" class="border-neutral-400 focus:border-neutral-400 text-sm  focus:ring focus:ring-neutral-400  rounded-md shadow-sm appearance-none border rounded p-1" value="{{$mlstatusprocess->l1_date}}" disabled>
                                                                    @else
                                                                        <p class="text-neutral-400 text-sm">NA</p>
                                                                    @endif
                                                                </td>
                                                                <td class="p-2"></td>
                                                                {{-- <td class="p-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                                                                    </svg>
                                                                </td> --}}
                                                            @break
                                                        @case(2)
                                                            <td class="flex p-2">
                                                                <input onchange="changelvl(this, '{{$mlstatusprocess->id}}', 'l2')" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-neutral-300 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-orangeColor before:opacity-0 before:transition-opacity checked:bg-orangeColor checked:orangeColor checked:before:orangeColor hover:before:opacity-10 my-auto mx-3" type="checkbox" @if($mlstatusprocess->status == 'l2' || $mlstatusprocess->status == 'l3' || $mlstatusprocess->status == 'l4')
                                                                checked @endif>
                                                                <p class="mx-3">Nivel 2 EE</p>
                                                            </td>
                                                            <td class="p-2">
                                                                @if($mlstatusprocess->l2_date != null)
                                                                        <input type="datetime-local" class="border-neutral-400 focus:border-neutral-400 text-sm  focus:ring focus:ring-neutral-400  rounded-md shadow-sm appearance-none border rounded p-1" value="{{$mlstatusprocess->l2_date}}" disabled>
                                                                    @else
                                                                        <p class="text-neutral-400 text-sm">NA</p>
                                                                    @endif
                                                            </td>
                                                            <td class="p-2">
                                                                @if($mlstatusprocess->status == 'l1' || $mlstatusprocess->status == 'l2' || $mlstatusprocess->status == 'l3' || $mlstatusprocess->status == 'l4')
                                                                <button wire:click="scmodalchecklist({{$mluser->id}}, {{$mlidprocess}})" class="bg-blue-500 hover:bg-red-blue/80 px-3 py-1 rounded-lg w-fit text-white font-semibold">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                                        <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                                                                        <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375Zm9.586 4.594a.75.75 0 0 0-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 0 0-1.06 1.06l1.5 1.5a.75.75 0 0 0 1.116-.062l3-3.75Z" clip-rule="evenodd" />
                                                                      </svg>
                                                                                        
                                                                </button>
                                                                @endif
                                                            </td>
                                                            {{-- <td class="p-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                                                                </svg>
                                                            </td> --}}
                                                            @break
                                                        @case(3)
                                                                <td class="flex p-2">
                                                                    <input onchange="changelvl(this, '{{$mlstatusprocess->id}}', 'l3')" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-neutral-300 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-greenColor before:opacity-0 before:transition-opacity checked:bg-greenColor checked:greenColor checked:before:greenColor hover:before:opacity-10 my-auto mx-3" type="checkbox" @if($mlstatusprocess->status == 'l3' || $mlstatusprocess->status == 'l4')
                                                                    checked @endif>
                                                                    <p class="mx-3">Nivel 3 H</p>
                                                                </td>
                                                                <td class="p-2">
                                                                    @if($mlstatusprocess->l3_date != null)
                                                                        <input type="datetime-local" class="border-neutral-400 focus:border-neutral-400 text-sm  focus:ring focus:ring-neutral-400  rounded-md shadow-sm appearance-none border rounded p-1" value="{{$mlstatusprocess->l3_date}}" disabled>
                                                                    @else
                                                                        <p class="text-neutral-400 text-sm">NA</p>
                                                                    @endif
                                                                </td>
                                                                <td class="p-2"></td>
                                                                {{-- <td class="p-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                                                                    </svg>
                                                                </td> --}}
                                                            @break
                                                        @case(4)
                                                            <td class="flex p-2">
                                                                <input onchange="changelvl(this, '{{$mlstatusprocess->id}}', 'l4')" class="before:content[''] peer relative h-5 w-5 mx-3 cursor-pointer appearance-none rounded-md border border-neutral-300 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blueColor before:opacity-0 before:transition-opacity checked:bg-blueColor checked:blueColor checked:before:blueColor hover:before:opacity-10 my-auto" type="checkbox" @if($mlstatusprocess->status == 'l4') checked @endif>
                                                                <p class="mx-3">Nivel 4 C</p>
                                                            </td>
                                                            <td class="p-2">
                                                                @if($mlstatusprocess->l4_date != null)
                                                                    <input type="datetime-local" class="border-neutral-400 focus:border-neutral-400 text-sm  focus:ring focus:ring-neutral-400  rounded-md shadow-sm appearance-none border rounded p-1" value="{{$mlstatusprocess->l4_date}}" disabled>
                                                                @else
                                                                     <p class="text-neutral-400 text-sm">NA</p>
                                                                @endif
                                                            </td>
                                                            <td class="p-2"></td>
                                                            {{-- <td class="p-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mx-auto">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                                                                </svg>
                                                            </td> --}}
                                                            @break
                                                    @endswitch
                                                </tr>
                                                @endforeach
                                            @endif
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
    <div id="modaldatetraining" class="top-20 @if(!$modalassignation) hidden @endif left-0 z-50 max-h-full overflow-y-auto">
        <div class="flex justify-center h-screen items-center  bg-gray-800 antialiased top-0 opacity-70 left-0  z-30 w-full h-full fixed "></div>
        
        <div class="flex text-gray-500 text:md justify-center h-screen items-center antialiased top-0  left-0  z-40 w-full h-full fixed">
            <div class=" flex flex-col w-5/12 mx-auto rounded-lg shadow-xl overflow-y-auto" style="max-height: 90%;">
                    <div class="flex flex-row justify-between px-6 py-3 bg-white text-white rounded-tl-lg rounded-tr-lg">
                        <button wire:click="scmodalassignation(0,0)" class="closebttn">
                            <svg  class="w-6 h-6 text-white"  fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    @if($mauser != null)
                        <div class="flex bg-white px-8">
                            <p class="mr-5">{{$mauser->payroll}}</p>
                            <p>{{$mauser->name . ' ' . $mauser->lastname}}</p>
                        </div>
                    @endif
                    @if($matraining != null)
                        <div class="flex py-3 bg-white font-bold px-8">
                            <p class="text-center w-full">Capacitación #{{$matraining->id}} - {{$matraining->name}}</p>
                        </div>
                    @else
                        <div class="flex py-3 bg-white font-bold px-8">
                            <p class="text-center w-full text-red-500 animate-pulse">Proceso sin capacitacion a asignar</p>
                        </div>
                    @endif
                    <div class="flex flex-col py-2 bg-white px-8">
                        @if($matraining != null)
                            <p class="text-center w-full my-2">Fecha prevista de capacitación:</p>

                            <input wire:model.defer="madatestart" type="datetime-local" class="w-1/2 mx-auto border-neutral-400 focus:border-neutral-400 focus:ring focus:ring-neutral-400  rounded-md shadow-sm appearance-none border rounded p-1">
                            <div class="text-center">
                                <span class="text-red-500 text-xs italic">
                                    @error('madatestart')
                                        {{$message}}
                                    @enderror
                                </span>
                            </div>
                        
                            <button wire:click="trainingassignation({{$mauser->id}})" class="w-fit mx-auto px-4 py-1 my-5 text-white font-semibold text-white  bg-neutral-400 hover:bg-neutral-500 rounded cursor-pointer"> 
                                Guardar 
                            </button>
                        @endif
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
        
        function changestatus2(idinput, status){
                var select = document.getElementById('select_' + idinput);
                switch (status) {
                    case '2':
                        select.classList.remove('border-gray-300');
                        select.classList.add('border-green-500');
                        select.classList.remove('border-red-500');
                        break;
                
                    case '1':
                        select.classList.remove('border-gray-300');
                        select.classList.add('border-red-500');
                        select.classList.remove('border-green-500');
                        break;
                    
                    case 'null':
                        select.classList.add('border-gray-300');
                        select.classList.remove('border-red-500');
                        select.classList.remove('border-green-500');
                        break;
                }
            }
    </script>
    @push('js')
        <script>
            function changelvl(checkbox, idprocess, lvl){
                var msg = '';
                var status = '';

                if(checkbox.checked){
                    msg = '¿Seguro que deseas otorgar este nivel?';
                    status = 'give';
                }
                else{
                    msg = '¿Seguro que deseas quitar este nivel?';
                    status = 'eliminate';
                }
            
                Swal.fire({
                    title: msg,  
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3088d9',
                    cancelButtonColor: '#EF4444',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.Livewire.emit('changelevel', idprocess, lvl, status);
                    }
                    else{
                        checkbox.checked = false;
                    }
                })
            }
                
            
        </script>
    @endpush

    {{-- <tr>
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
    </tr> --}}
