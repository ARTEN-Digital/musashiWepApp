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

class Userscreate extends Component
{
    use WithFileUploads;
    use WithPagination;
    use LivewireAlert;

    public $name;
    public $apellido_paterno;
    public $apellido_materno, $company;
  
    public $photo, $path_old_photo;
    public $url_drive;
    public $img = '/imgs/user.png',$password, $puesto, $email;
    public $firtTime = true;    
    
    public $accion = '';

    public function render()
    {
        return view('livewire.users.userscreate');
    }
}
