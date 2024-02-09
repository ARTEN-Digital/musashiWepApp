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
use App\Models\Areas;


class Areacreate extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;

    public $idArea = null;

    public $name;

    protected $listeners = ['getarea'];

    protected $rules = [];
    protected $validationAttributes  = [
        'name' => 'Nombre',
    ];
    public function render()
    {
        return view('livewire.areasprocess.areacreate');
    }

    public function getarea($idArea){
        $this->idArea = $idArea;
        $area = Areas::where('id', $this->idArea)->first();
        $this->name  =  $area->name;
    }

    public function createarea(){
        $this->rules +=[
            'name' => 'required|max:255',
        ];
        $this->validate();

        Areas::insert([
            'name' => $this->name,
            'created_at' => date('Y-m-d H:m'),
        ]);

        $this->alert('success', 'Área creada con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);

        $this->reset(['name']);

        $this->emitUp('aftercreatearea');
    }

    public function editarea(){
        $this->rules +=[
            'name' => 'required|max:255',
        ];
        $this->validate();

        Areas::where('id', $this->idArea)->update([
            'name' => $this->name,
            'updated_at' => date('Y-m-d H:m'),
        ]);

        $this->alert('success', 'Área actulizada con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);

        $this->emitUp('aftereditarea');
    }
}
