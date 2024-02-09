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

class Processcreate extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;

    public $idArea, $areaname;

    public $name_process, $number_process, $id_activitie, $equipament = [];

    protected $listeners = ['getareaprocess'];

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
        return view('livewire.areasprocess.processcreate')->with('activities', $activities)->with('equipament', $equipament);
    }

    public function getareaprocess($idArea, $areaname){
        $this->idArea = $idArea;
        $this->areaname  =  $areaname;
    }
}
