<?php

namespace App\Http\Livewire\Trainings;

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
use App\Models\User;
use App\Models\Process;
use App\Models\Expirations;
use App\Models\Leves;
use App\Models\Trainings as trainings;

class Trainingsedit extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;

    public $idTraining;

    public $name, $id_process, $id_responsable, $expiration_quantity = 1, $expiration_type = 1, $selectlevels = [];

    protected $listeners = ['gettraining'];

    protected $rules = [];
    protected $validationAttributes  = [
        'name' => 'Nombre',
        'id_process' => 'Proceso',
        'id_responsable' => 'Responsable',
        'expiration_quantity' => 'la cantidad del periodo de validez',
        'expiration_type' => 'el tiempo del periodo de validez',
    ];

    public function render()
    {
        $trainers = User::where('active', true)->where('id_usertype', 2)->get();
        $processes = Process::get();
        $levels = Leves::get();

        return view('livewire.trainings.trainingsedit')->with('trainers', $trainers)->with('processes', $processes)->with('levels', $levels);
    }

    public function gettraining($idTraining){

        $this->reset(['name', 'id_process', 'id_responsable', 'expiration_quantity', 'expiration_type', 'selectlevels']);
        $this->idTraining = $idTraining;

        $training = trainings::where('id', $idTraining)->first();
        if($training != null){
            $this->selectlevels = [];
            $this->name = $training->name;
            $this->id_process = $training->id_process;
            $this->id_responsable = $training->id_responsable;
            $this->expiration_quantity = $training->expiration_in_days;
            foreach ($training->allLeves as $level) {
                $this->selectlevels[$level->id] = $level->id;
            }
        }
        
    }

    public function edittraining(){
        $this->rules +=[
            'name' => 'required|max:255',
            'id_process' => 'required',
            'id_responsable' => 'required',
            //'expiration_quantity' => 'required',
            //'expiration_type' => 'required',
        ];
        $this->validate();

        $auxdays = 0;
        // switch($this->expiration_type){
        //     case '1':
        //         $auxdays = $this->expiration_quantity;
        //         break;
        //     case '2':
        //         $auxdays = ($this->expiration_quantity * 7);
        //         break;
        //     case '3':
        //         $auxdays = ($this->expiration_quantity * 31);
        //         break;
        // }

        DB::table('trainings')->where('id', $this->idTraining)->update([
            'name' => $this->name,
            'id_process' => $this->id_process,
            'id_responsable' => $this->id_responsable,
            'expiration_in_days' => $auxdays,
            'active' => true,
            'updated_at' => date('Y-m-d H:m'),
        ]);

        DB::table('leves_trainings')->where('id_trainings', $this->idTraining)->delete();
        foreach ($this->selectlevels as $level) {
            if($level != false){
                DB::table('leves_trainings')->insert([
                    'id_trainings' => $this->idTraining,
                    'id_leves' => $level,
                ]);
            }
        }
        
        $this->alert('success', 'Capacitación actualizada con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);
        
        $this->emitUp('afteredittraining');

    }
}
