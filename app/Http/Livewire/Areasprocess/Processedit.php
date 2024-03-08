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


class Processedit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;

    public $idArea, $areaname, $idProcess;

    public $name_process, $number_process, $id_line, $id_category, $models_select = [];

    protected $listeners = ['getprocess'];

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

        $process = Process::where('id', $this->idProcess)->first();
        if($process != null){
            $this->equipamentp = [];
            $this->name_process = $process->name;
            $this->number_process = $process->number_process;
            $this->id_line = $process->line->first()['id'];
            $this->id_category = $process->category->first()['id'];
            foreach ($process->models as $md) {
                $this->models_select[$md->id] = $md->id;
            }
        }

        return view('livewire.areasprocess.processedit')->with('lines', $lines)->with('categories', $categories)->with('models', $models);
    }

    public function getprocess($idArea, $areaname, $idProcess){

        $this->idArea = $idArea;
        $this->areaname  =  $areaname;
        $this->idProcess  =  $idProcess;
    }

    public function editprocess(){
        $this->rules +=[
            'name_process' => 'required|max:255',
            'number_process' => 'required',
        ];
        $this->validate();

        DB::table('processes')->where('id',$this->idProcess)->update([
            'name' => $this->name_process,
            'number_process' => $this->number_process,
            'updated_at' => date('Y-m-d H:m'),
        ]);


        DB::table('area_processes')->where('id_process',$this->idProcess)->delete();
        DB::table('area_processes')->insert([
            'id_process' => $this->idProcess,
            'id_area' => $this->idArea,
        ]);

        DB::table('process_lines')->where('id_process',$this->idProcess)->delete();
        DB::table('process_lines')->insert([
            'id_process' => $this->idProcess,
            'id_line' => $this->id_line,
        ]);

        DB::table('process_categories')->where('id_process',$this->idProcess)->delete();
        DB::table('process_categories')->insert([
            'id_process' => $this->idProcess,
            'id_category' => $this->id_category,
        ]);


        DB::table('process_models')->where('id_process',$this->idProcess)->delete();
        foreach ($this->models_select as $mdl) {
            if($mdl != false){
                DB::table('process_models')->insert([
                    'id_process' => $this->idProcess,
                    'id_model' => $mdl,
                ]);
            }
        }
        
        $this->alert('success', 'Proceso actualizado con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);
        
        $this->emitUp('aftereditprocess');

    }
}