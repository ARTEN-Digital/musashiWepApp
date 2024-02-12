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
use App\Models\Trainings as training;

class Trainings extends Component
{
    use LivewireAlert;
    use WithFileUploads;                                                                            
    use WithPagination;

    public $search = '';

    protected $listeners = ['aftercreatetraining', 'afteredittraining', 'deletetraining'];

    public function render()
    {
        $trainings = training::leftJoin('users', 'trainings.id_responsable', 'users.id')->where('trainings.active', true)->where('trainings.name', 'LIKE', '%' . $this->search . '%')->selectRaw('trainings.*, CONCAT(users.name, " ", users.lastname) as respon')->get();
        return view('livewire.trainings.trainings')->with('trainings', $trainings);
    }

    public function aftercreatetraining(){
        $this->dispatchBrowserEvent('aftercreatetraining');
    }

    public function afteredittraining(){
        $this->dispatchBrowserEvent('showedittraining');
    }                                   

    public function showedittraining($idTraining){
        $this->emit('gettraining', $idTraining);
        $this->dispatchBrowserEvent('showedittraining');
    }

    public function deletetraining($idTraining){
        DB::table('trainings')->where('id',$idTraining)->update([
            'active' => false,
        ]);

        $this->alert('success', 'Capacitación eliminada con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);
    }

}
