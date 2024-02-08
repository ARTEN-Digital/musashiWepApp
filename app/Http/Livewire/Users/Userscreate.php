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

class Userscreate extends Component
{
    use WithFileUploads;
    use WithPagination;
    use LivewireAlert;

    public $name, $lastname, $payroll, $id_position, $email, $phone, $id_area, $id_usertype, $password;
  
    public $photo, $old_profile_photo_path;
    public $img = '/imgs/user.png';

    public $firtTime = true;    
    
    public $accion = '';

    protected $rules = [];
    protected $validationAttributes  = [
        'name' => 'Nombre(s)',
        'lastname' => 'Apellido(s)',
        'payroll' => 'Nómina', 
        'id_position' => 'Posición', 
        'email' => 'Email', 
        'phone' => 'Télefono',
        'id_area'=> 'Área',
        'id_usertype' => 'Tipo de usuario',
        'password' => 'Contraseña',

    ];

    public function render()
    {
        $roles = Usertype::get();
        $positions = Positions::get();
        $areas = Areas::get();

        return view('livewire.users.userscreate')->with('roles', $roles)->with('positions', $positions)->with('areas', $areas);
    }

    public function saveuser(){

        $isleader = false;
        $this->rules +=[

            'name' => 'required|max:255',
            'lastname' =>'required|max:255',
            'payroll' => 'required|max:255',
            'id_position' => 'required',
            'email' => 'required',
            'phone' => 'required|max:10',
            'id_area'=> 'required',
            'id_usertype' => 'required',
            'password' => ['required', Password::min(8)->mixedCase()->numbers()],
        ];
        $this->validate();


        if(!blank($this->photo)){
            $path_doc  =  $this->photo->storePublicly('profilephotos', 'public');
            $path_doc = $path_doc ;
        }else{
       
            $path_doc = '' ;
        }

        // 3 es el id del tipo de usuario lider en la base de datos, si es necesario combiar, hacerlo.
        if($this->id_usertype == 3){
            $isleader = true;
        }

        $usuario = User::create([
            'name' => $this->name,
            'lastname' => $this->lastname,
            'payroll' => $this->payroll,
            'id_position' => $this->id_position,
            'email' => $this->email,
            'phone' => $this->phone,
            'id_area'=> $this->id_area,
            'id_usertype' => $this->id_usertype,
            'id_leader' => 0,
            'password' => Hash::make($this->password),
            'is_leader' => $isleader,
            'active' => true,
            'created_at' => date('d-m-Y H:m'),
            'image_profile' => $path_doc,
        ]);

        $this->alert('success', 'Usuario creado con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);

        $this->reset(['name', 'lastname', 'payroll', 'id_position', 'id_area', 'password', 'email' ,'phone', 'id_usertype', 'photo']);

        //emit a controlador "Users"
       $this->emitUp('aftercreateuser');
    }
}
