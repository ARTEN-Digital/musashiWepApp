<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use DB;
use Session;
use Auth; 
use DateTime;
use DateInterval;
use DatePeriod;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
use Illuminate\Support\Facades\Crypt;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash; 
use RealRashid\SweetAlert\Facades\Alert; 
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\User;
use App\Models\Areas;
use App\Models\Positions;
use App\Models\Usertype;
use Illuminate\Validation\Rules\Password;

class Importusers extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;

    public $archivedata;

    public $totalusers, $usersduplicated = [], $usernew = [];

    protected $listeners = ['removeuserduplicated', 'removeusernew'];

    public function render()
    {
        return view('livewire.users.importusers');
    }

    //onChange='showimportdiv2()'
    public function uploadcvs(){
        if($this->archivedata){
            $array = []; 
            if (($h = fopen("{$this->archivedata->getRealPath()}", "r")) !== false){
                while (($data = fgetcsv($h)) !== false){
                    $array[] = $data;       
                }
                fclose($h);
            }
            $this->totalusers = count($array);

            foreach($array as $line){
                //[0] = payroll, [1] = lastname, [2] = name, [3] = puesto,  [4] = area
                $user = User::where('payroll', $line[0])->first();
                if($user != null){
                    $aux = [];
                    $aux = [$line[0], $line[1], $line[2], $line[3], $line[4], $user->id];
                    array_push($this->usersduplicated, $aux);
                }
                else{
                    $aux2 = [];
                    $aux2 = [$line[0], $line[1], $line[2], $line[3], $line[4]];
                    array_push($this->usernew, $aux2);
                }
            }
        }
        $this->reset(['archivedata']);
        $this->dispatchBrowserEvent('showstep2');
    }

    public function removeuserduplicated($idinarray){
        unset($this->usersduplicated[$idinarray]);
        $this->dispatchBrowserEvent('showstep2');
    }

    public function removeusernew($idinarray){
        unset($this->usernew[$idinarray]);
        $this->dispatchBrowserEvent('showstep2');
    }

    public function uploadusers(){

        foreach ($this->usersduplicated as $key => $ud) {
            User::where('id', $ud[5])->update([
                'lastname' => $ud[1],
                'name' => $ud[2],
                'active' => 1,
            ]);
        }

        foreach ($this->usernew as $key => $un) {
            User::insert([
                'lastname' => $un[1],
                'name' => $un[2],
                'payroll' => $un[0],
                'id_position' => 1,
                'email' => '',
                'phone' => '',
                'id_area'=> 1,
                'id_usertype' => 5,
                'id_leader' => 0,
                'password' => Hash::make('passwords'),
                'is_leader' => false,
                'image_profile' => '',
                'active' => 1,
                'created_at' => date('Y-m-d'),
            ]);
        }

        $this->dispatchBrowserEvent('closeimport');

        $this->reset(['archivedata', 'totalusers', 'usersduplicated', 'usernew']);
        $this->alert('success', 'Registros creados/actualizados con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);

        $this->emitUp('afterimportuser');  
    }

}
