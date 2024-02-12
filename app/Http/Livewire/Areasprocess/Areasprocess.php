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
use App\Models\Process;

class Areasprocess extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;
 
    public $search = '';

    protected $listeners = ['aftercreatearea', 'aftereditarea', 'aftercreateprocess', 'aftereditprocess', 'deleteprocess'];

    public function render()
    {
        $areas = Areas::where('name', 'LIKE', '%' . $this->search . '%')->get();
        return view('livewire.areasprocess.areasprocess')->with('areas', $areas);
    }

    public function aftercreatearea(){
        $this->dispatchBrowserEvent('aftercreatearea');
    }

    public function aftereditarea(){
        $this->dispatchBrowserEvent('aftereditarea');
    }

    public function aftercreateprocess(){
        $this->dispatchBrowserEvent('aftercreateprocess');
    }

    public function aftereditprocess(){
        $this->dispatchBrowserEvent('aftereditprocess');
    }

    public function showeditarea($idArea){
        $this->emit('getarea', $idArea);
        $this->dispatchBrowserEvent('showarea');
    }

    public function screateprocess($idArea, $areaname){
        $this->emit('getareaprocess', $idArea, $areaname);
        $this->dispatchBrowserEvent('showcreateprocess');
    }

    public function showeditprocess($idArea, $areaname, $idProcess){
        $this->emit('getprocess', $idArea, $areaname, $idProcess);
        $this->dispatchBrowserEvent('showeditprocess');
    }

    public function deleteprocess($idProcess){
        DB::table('processes')->where('id',$idProcess)->delete();

        DB::table('areas_process')->where('id_process',$idProcess)->delete();

        DB::table('activities_process')->where('id_process',$idProcess)->delete();

        DB::table('equipament_process')->where('id_process',$idProcess)->delete();

        $this->alert('success', 'Proceso eliminado con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);
    }
}
