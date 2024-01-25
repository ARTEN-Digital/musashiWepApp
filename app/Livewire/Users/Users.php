<?php

namespace App\Livewire\Users;

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
use Livewire\Attributes\On;

class Users extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;
 
    public $search = '';

    #[On('renderagainusers')] 
    
    public function render()
    {
        $users = User::leftJoin('user_types', 'users.id_usertype', 'user_types.id')
                    ->leftJoin('positions', 'users.id_position', 'positions.id')
                    ->leftJoin('areas', 'users.id_area', 'areas.id')
                    //->where('users.id_usertype', '!=', '5')
                    ->select('users.*', 'user_types.name as usertype_name', 'positions.name as positions_name', 'areas.name as area_name')
                    ->get();

        // $operators = User::leftJoin('user_types', 'users.id_usertype', 'user_types.id')
        //             ->leftJoin('positions', 'users.id_position', 'positions.id')
        //             ->leftJoin('areas', 'users.id_area', 'areas.id')
        //             ->where('users.id_usertype', '5')
        //             ->select('users.*', 'user_types.name as usertype_name', 'positions.name as positions_name', 'areas.name as area_name')
        //             ->get();

        return view('livewire.users.users')->with('users', $users);//->with('operators', $operators);
    }


    public function renderagainusers(){
dd('entra');
    }

}
