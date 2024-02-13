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
use App\Models\Trainings as training;
use App\Models\Checklistevaluation;

class Trainingschecklist extends Component
{
    use LivewireAlert;
    use WithFileUploads;                                                                            
    use WithPagination;

    public $idTraining, $trainingname;

    public $idchkselect;

    protected $listeners = [];
    public function render()
    {
        $actualtraining = training::where('id', $this->idTraining)->first();
        
        if($actualtraining->checklistevaluations->first() == null){
            $newcheck = Checklistevaluation::insertGetId([
                'name' => 'checklist_' . $this->idTraining,
                'created_at' => date('Y-m-d H:m'),
            ]);

            DB::table('checklistevaluation_trainings')->insert([
                'id_trainings' => $this->idTraining,
                'id_checklistevaluation' => $newcheck,
            ]);

            $this->idchkselect = $newcheck;
        }
        else{
            $this->idchkselect = $actualtraining->checklistevaluations->first()->id;
        }

        $this->trainingname = $actualtraining->name;
        
        return view('livewire.trainings.trainingschecklist');
    }
}
