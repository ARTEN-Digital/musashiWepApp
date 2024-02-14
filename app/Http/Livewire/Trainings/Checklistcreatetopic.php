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
use App\Models\Topics;
use App\Models\Concepts;

class Checklistcreatetopic extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;

    public $idchecklist, $idconcept = null;
    public $concept, $number_concept, $id_topic, $id_user;

    protected $listeners = ['getconceptcreate', 'getconceptedit'];

    protected $rules = [];
    protected $validationAttributes  = [
        'concept' => 'Concepto',
        'number_concept' => 'Número de concepto',
        'id_topic' => 'Tópico',
        'id_user' => 'Responsable',
    ];

    public function render()
    {
        $trainers = User::where('active', true)->where('id_usertype', 2)->get();
        $topics = Topics::get();

        return view('livewire.trainings.checklistcreatetopic')->with('topics', $topics)->with('trainers', $trainers);
    }

    public function getconceptcreate($idchecklist){
        $this->reset(['idchecklist', 'idconcept', 'concept', 'number_concept', 'id_topic', 'id_user']);
        $this->idchecklist = $idchecklist;
    }

    public function getconceptedit($idconcept, $idchecklist){
        $this->idchecklist = $idchecklist;
        $this->idconcept = $idconcept;

        $concept = Concepts::where('id', $this->idconcept)->first();
        $this->concept = $concept->concept;
        $this->number_concept = $concept->number;
        $this->id_topic = $concept->id_topics;
        $this->id_user = $concept->id_user;
    }

    public function createconcept(){
        $this->rules +=[
            'concept' => 'required|max:255',
            'number_concept' => 'required|max:255',
            'id_topic' => 'required',
            'id_user' => 'required',
        ];
        $this->validate();

        $newconcept = Concepts::insertGetId([
            'concept' => $this->concept,
            'number' => $this->number_concept,
            'id_topics' => $this->id_topic,
            'id_user' => $this->id_user,
            'created_at' => date('Y-m-d H:m'),
        ]);

        DB::table('checklistevaluation_concepts')->insert([
            'id_checklistevaluation' => $this->idchecklist,
            'id_concepts' => $newconcept,
        ]);

        $this->alert('success', 'Concepto creado con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);

        $this->reset(['concept', 'number_concept', 'id_topic', 'id_user']);

        $this->emitUp('aftercreateeditConcept');
    }

    public function editconcept(){
        $this->rules +=[
            'concept' => 'required|max:255',
            'number_concept' => 'required|max:255',
            'id_topic' => 'required',
            'id_user' => 'required',
        ];
        $this->validate();

        Concepts::where('id', $this->idconcept)->update([
            'concept' => $this->concept,
            'number' => $this->number_concept,
            'id_topics' => $this->id_topic,
            'id_user' => $this->id_user,
            'updated_at' => date('Y-m-d H:m'),
        ]);

        DB::table('checklistevaluation_concepts')->where('id_concepts', $this->idconcept)->where('id_checklistevaluation', $this->idchecklist)->delete();

        DB::table('checklistevaluation_concepts')->insert([
            'id_checklistevaluation' => $this->idchecklist,
            'id_concepts' =>  $this->idconcept,
        ]);

        $this->alert('success', 'Concepto actualizado con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);

        $this->emitUp('aftercreateeditConcept');
    }

}
