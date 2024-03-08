<?php

namespace App\Http\Livewire\Areasprocess;

use Livewire\Component;
use DB;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Auth;
use App\Models\Lines;
use App\Models\Categories;
use App\Models\Models;
use App\Models\Process;

class Processcreate extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;

    public $idArea, $areaname;

    public $name_process, $number_process, $id_line, $id_category, $models_select = [];

    protected $listeners = ['getareaprocess'];

    protected $rules = [];
    protected $validationAttributes  = [
        'name_process' => 'Nombre',
        'number_process' => 'Número de proceso',
        'id_line' => 'Línea',
        'id_category' => 'Categoría',
        'models_select' => 'Modelo',
    ];

    public function render()
    {
        $lines = Lines::get();
        $categories = Categories::get();
        $models = Models::get();

        return view('livewire.areasprocess.processcreate')->with('lines', $lines)->with('categories', $categories)->with('models', $models);
    }

    public function getareaprocess($idArea, $areaname){
        $this->idArea = $idArea;
        $this->areaname  =  $areaname;
    }

    public function createprocess(){
        $this->rules +=[
            'name_process' => 'required|max:255',
            'number_process' => 'required',
        ];
        $this->validate();

        $newprocess = DB::table('processes')->insertGetId([
            'name' => $this->name_process,
            'number_process' => $this->number_process,
            'created_at' => date('Y-m-d H:m'),
        ]);

        DB::table('area_processes')->insert([
            'id_process' => $newprocess,
            'id_area' => $this->idArea,
        ]);

        DB::table('process_lines')->insert([
            'id_process' => $newprocess,
            'id_line' => $this->id_line,
        ]);

        DB::table('process_categories')->insert([
            'id_process' => $newprocess,
            'id_category' => $this->id_category,
        ]);

        foreach ($this->models_select as $mdl) {
            if($mdl != false){
                DB::table('process_models')->insert([
                    'id_process' => $newprocess,
                    'id_model' => $mdl,
                ]);
            }
        }

        $this->reset(['name_process', 'number_process', 'id_line', 'id_category','models_select']);
        
        $this->alert('success', 'Operación creada con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);
        
        $this->emitUp('aftercreateprocess');

    }
}