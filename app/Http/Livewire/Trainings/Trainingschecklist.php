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
use App\Models\Concepts;

class Trainingschecklist extends Component
{
    use LivewireAlert;
    use WithFileUploads;                                                                            
    use WithPagination;

    public $idTraining, $trainingname;

    public $idchkselect, $allconcepts = [], $search;

    public $modalconcepts = false, $msconceptselect = [];

    protected $listeners = ['aftercreateeditConcept', 'deleteconcept'];

    public function render()
    {

        $actualtraining = training::where('id', $this->idTraining)->first();

        if(count($actualtraining->checklistevaluations) == 0){
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
        $actualtraining1 = training::where('id', $this->idTraining)->first();
        $concepts = $actualtraining1->checklistevaluations->first()->concepts;

        return view('livewire.trainings.trainingschecklist')->with('concepts', $concepts);
    }

    public function showcreateConcept(){
        $this->emit('getconceptcreate', $this->idchkselect);
        $this->dispatchBrowserEvent('showcreateC');
    }

    public function showeditConcept($idconcept){
        $this->emit('getconceptedit', $idconcept, $this->idchkselect);
        $this->dispatchBrowserEvent('showcreateC');
    }

    public function aftercreateeditConcept(){
        $this->dispatchBrowserEvent('showcreateC');
    }

    public function deleteconcept($idconcept){
        Concepts::where('id',$idconcept)->delete();

        $this->alert('success', 'Concepto eliminado con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);
    }

    public function scmodalconcepts(){
        if ($this->modalconcepts == true) {
            $this->modalconcepts = false;
        } else {
            $this->modalconcepts = true;
            $this->getconcepts();
        }
    }

    public function getconcepts(){
        $this->allconcepts = Concepts::when($this->search != '', function ($query){
            $query->orWhere('concepts.concept', 'LIKE', '%' . $this->search . '%')->orWhere('concepts.number', 'LIKE', '%' . $this->search . '%')->orWhere('topics.name', 'LIKE', '%' . $this->search . '%');
        })->orderBy('id', 'ASC')->get();
    }

    public function addconceptstochecklist(){
        //dd($this->msconceptselect);
        foreach ($this->msconceptselect as $key => $value) {
            if($value == true){
                DB::table('checklistevaluation_concepts')->insert([
                    'id_checklistevaluation' => $this->idchkselect,
                    'id_concepts' => $key,
                ]);
            }
        }

        $this->modalconcepts = false;

        $this->alert('success', 'Concepto actualizado con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);
    }
}
