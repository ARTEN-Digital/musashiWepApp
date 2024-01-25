<?php

namespace App\Livewire\Users;

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
use App\Models\Areas;
use App\Models\Positions;
use App\Models\Usertype;

class Userscreate extends Component
{
    use WithFileUploads;
    use WithPagination;
    use LivewireAlert;

    public $name, $payroll, $id_position, $email, $phone, $id_area, $id_usertype, $password;
  
    public $photo, $path_old_photo;
    public $url_drive;
    public $img = '/imgs/user.png';

    public $firtTime = true;    
    
    public $accion = '';

    public function render()
    {
        $roles = Usertype::get();
        $positions = Positions::get();
        $areas = Areas::get();

        $this->alert('success', 'Usuario creado con exito.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
           ]);
        return view(livewire.users.userscreate)->with('roles', $roles)->with('positions', $positions)->with('areas', $areas);
    }

    public function saveuser()
    {
        $this->alert('success', 'Usuario creado con exito.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
           ]);
    }
}
