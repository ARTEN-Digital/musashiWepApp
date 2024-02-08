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

class Usersedit extends Component
{
    use WithFileUploads;
    use WithPagination;
    use LivewireAlert;

    public $iduserselect = null;
    public $name, $lastname, $payroll, $id_position, $email, $phone, $id_area, $id_usertype, $password;
  
    public $profile_photo_path, $old_profile_photo_path;
    public $img = '/imgs/user.png';
    public $imgflag = false;

    public $userstatus; 

    protected $listeners = ['getuser'];

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
    
    public function render(){

        $roles = Usertype::get();
        $positions = Positions::get();
        $areas = Areas::get();

        if($this->iduserselect != null)
        {
            $user = User::where('id', $this->iduserselect)->first();
            $this->name = $user->name;
            $this->lastname = $user->lastname;
            $this->payroll = $user->payroll;
            $this->id_position = $user->id_position;
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->id_area = $user->id_area;
            $this->id_usertype = $user->id_usertype;
            $this->userstatus = $user->active;
            if($this->imgflag == false){
                $this->profile_photo_path = $user->image_profile;
                $this->old_profile_photo_path = $user->image_profile;
            }
        }

        return view('livewire.users.usersedit')->with('roles', $roles)->with('positions', $positions)->with('areas', $areas);
    }

    public function getuser($idUser){
        $this->iduserselect = $idUser;
        $this->imgflag = false;
    }

    public function changeflag(){
        $this->imgflag = true;
    }

    public function edituser(){
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
        ];
        $this->validate();


        if ($this->profile_photo_path == $this->old_profile_photo_path ) {
            $path_doc  =  $this->old_profile_photo_path ;
        }else{
            $path_doc  =  $this->profile_photo_path->storePublicly('profilephotos', 'public');
            $path_doc = $path_doc ;
        }

        // 3 es el id del tipo de usuario lider en la base de datos, si es necesario combiar, hacerlo.
        if($this->id_usertype == 3){
            $isleader = true;
        }

        if (blank($this->password)) {
            $usuario = User::where('id', $this->iduserselect)->update([
                'name' => $this->name,
                'lastname' => $this->lastname,
                'payroll' => $this->payroll,
                'id_position' => $this->id_position,
                'email' => $this->email,
                'phone' => $this->phone,
                'id_area'=> $this->id_area,
                'id_usertype' => $this->id_usertype,
                'id_leader' => 0,
                'is_leader' => $isleader,
                'active' => true,
                'updated_at' => date('Y-m-d H:m:s'),
                'image_profile' => $path_doc,
            ]);
        }else{
            $usuario = User::where('id', $this->iduserselect)->update([
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
                'updated_at' => date('Y-m-d H:m:s'),
                'image_profile' => $path_doc,
            ]);
        }   

        $this->alert('success', 'Usuario actualizado con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);
        
        $this->emitUp('afteredituser');
    }

    function activateuser(){

        try{
            User::where('id', $this->iduserselect)->update([
                'active' => true,
                'updated_at' => date('Y-m-d H:m:s'),
            ]);

            $this->alert('success', 'Activado con éxito!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);

            $this->emitUp('afteredituser');
 
        }catch(\Exception $exception) {
            $this->alert('error', 'No se puede activar.', [
             'position' => 'center',
             'timer' => 3000,
             'toast' => true,
            ]);
        }
    }
    
}
