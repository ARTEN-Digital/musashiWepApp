<?php

namespace App\Http\Livewire\Users;

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
use App\Models\Userhistory;

class Users extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;
 
    public $search = '';

    public $modaluserhistory = false, $mhuser, $mharea;

    protected $listeners = ['aftercreateuser', 'afteredituser', 'deleteuser', 'afterimportuser', 'activeuser'];
    
    public function render()
    {
        $users = User::leftJoin('user_types', 'users.id_usertype', 'user_types.id')
            ->leftJoin('positions', 'users.id_position', 'positions.id')
            ->leftJoin('areas', 'users.id_area', 'areas.id')
            ->where('users.name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('users.lastname', 'LIKE', '%' . $this->search . '%')
            ->orWhere('users.payroll', 'LIKE', '%' . $this->search . '%')
            //->where('users.id_usertype', '!=', '5')
            ->select('users.*', 'user_types.name as usertype_name', 'positions.name as positions_name', 'areas.name as area_name')
            ->orderBy('name', 'ASC')
            ->get();

        // $operators = User::leftJoin('user_types', 'users.id_usertype', 'user_types.id')
        //             ->leftJoin('positions', 'users.id_position', 'positions.id')
        //             ->leftJoin('areas', 'users.id_area', 'areas.id')
        //             ->where('users.id_usertype', '5')
        //             ->select('users.*', 'user_types.name as usertype_name', 'positions.name as positions_name', 'areas.name as area_name')
        //             ->get();

        return view('livewire.users.users')->with('users', $users);
    }

    //Actualiza la tabla de usuarios
    public function aftercreateuser(){
        $this->dispatchBrowserEvent('aftercreateuser');
    }

    public function afteredituser(){
        $this->dispatchBrowserEvent('afteredituser');
    }

    public function showedituser($idUser){
        $this->emit('getuser', $idUser);
        $this->dispatchBrowserEvent('showedit');
    }

    public function afterimportuser(){}

    public function deleteuser($idUser){

        try{
            User::where('id', $idUser)->update([
                'active' => false,
                'updated_at' => date('Y-m-d H:m:s'),
            ]);

            Userhistory::create([
                'id_user' => $idUser,
                'id_whomadeaction' => Auth::user()->id,
                'action' => 'Baja de usuario.',
                'description' => '',
                'dateaction' => date('Y-m-d H:m'),
            ]);

            $this->alert('success', 'Desactivado con éxito', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
 
        }catch(\Exception $exception) {
            $this->alert('error', 'No se puede desactivar.', [
             'position' => 'center',
             'timer' => 3000,
             'toast' => true,
            ]);
        }
    }

    public function activeuser($iduser){

        User::where('id', $iduser)->update([
            'active' => true,
            'updated_at' => date('Y-m-d H:m:s'),
        ]);

        Userhistory::create([
            'id_user' => $iduser,
            'id_whomadeaction' => Auth::user()->id,
            'action' => 'Activación de usuario.',
            'description' => '',
            'dateaction' => date('Y-m-d H:m'),
        ]);

        $this->alert('success', 'Activado con éxito', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function scmodalhistory($idUser){
        if($this->modaluserhistory == true){
            $this->modaluserhistory = false;
            $this->reset(['mhuser']);
        }else{
            $this->modaluserhistory = true;
            $this->mhuser = User::where('id', $idUser)->first();
        }
    }

}
