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
use App\Models\Process;
use App\Models\Activities;
use App\Models\Equipament;

class Processedit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;

    public $idArea, $areaname, $idProcess;

    public $name_process, $number_process, $id_activity, $equipamentp = [];

    protected $listeners = ['getprocess'];

    protected $rules = [];
    protected $validationAttributes  = [
        'name_process' => 'Nombre',
        'number_process' => 'Número de proceso',
        'id_activitie' => 'Actividad',
    ];

    public function render()
    {
        $activities = Activities::get();
        $equipament = Equipament::get();

        $process = Process::where('id', $this->idProcess)->first();
        if($process != null){
            $this->equipamentp = [];
            $this->name_process = $process->name;
            $this->number_process = $process->number_process;
            $this->id_activity = $process->allActivities->first()['id'];
            foreach ($process->equipaments as $equip) {
                $this->equipamentp[$equip->id] = $equip->id;
            }
        }

        return view('livewire.areasprocess.processedit')->with('activities', $activities)->with('equipament', $equipament);
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
            'id_activity' => 'required',
        ];
        $this->validate();

        DB::table('processes')->where('id',$this->idProcess)->update([
            'name' => $this->name_process,
            'number_process' => $this->number_process,
            'updated_at' => date('Y-m-d H:m'),
        ]);

        DB::table('activities_process')->where('id_process',$this->idProcess)->delete();
        DB::table('activities_process')->insert([
            'id_process' => $this->idProcess,
            'id_activities' => $this->id_activity,
        ]);


        DB::table('equipament_process')->where('id_process',$this->idProcess)->delete();
        foreach ($this->equipamentp as $equip) {
            if($equip != false){
                DB::table('equipament_process')->insert([
                    'id_process' => $this->idProcess,
                    'id_equipament' => $equip,
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
