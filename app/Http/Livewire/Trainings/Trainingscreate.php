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

class Trainingscreate extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;


    public $name, $id_process, $id_responsable, $expiration_quantity = 1, $expiration_type = 1, $selectlevels = [];

    protected $listeners = [];

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
        return view('livewire.trainings.trainingscreate')->with('trainers', $trainers)->with('processes', $processes)->with('levels', $levels);
    }

    public function createtraining(){
        $this->rules +=[
            'name' => 'required|max:255',
            'id_process' => 'required',
            'id_responsable' => 'required',
            'expiration_quantity' => 'required',
            'expiration_type' => 'required',
        ];
        $this->validate();

        $auxdays = 0;
        switch($this->expiration_type){
            case '1':
                $auxdays = $this->expiration_quantity;
                break;
            case '2':
                $auxdays = ($this->expiration_quantity * 7);
                break;
            case '3':
                $auxdays = ($this->expiration_quantity * 31);
                break;
        }

        $newtraining = DB::table('trainings')->insertGetId([
            'name' => $this->name,
            'id_process' => $this->id_process,
            'id_responsable' => $this->id_responsable,
            'expiration_in_days' => $auxdays,
            'active' => true,
            'created_at' => date('Y-m-d H:m'),
        ]);

        foreach ($this->selectlevels as $level) {
            if($level != false){
                DB::table('leves_trainings')->insert([
                    'id_trainings' => $newtraining,
                    'id_leves' => $level,
                ]);
            }
        }

        $this->reset(['name', 'id_process', 'id_responsable', 'expiration_quantity', 'expiration_type', 'selectlevels']);
        
        $this->alert('success', 'Capacitación creada con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);
        
        $this->emitUp('aftercreatetraining');

    }
}
