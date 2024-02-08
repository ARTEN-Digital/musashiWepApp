<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use DB;
use Session;
use Auth;
use Mail;
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
use App\Models\Leaderuser;
use Illuminate\Validation\Rules\Password;

class Assignmentusers extends Component
{
    use WithFileUploads;
    use WithPagination;
    use LivewireAlert;

    public $leaderfilteradmin = '', $leaderfilter = '', $areafilter = '';

    protected $listeners = ['assigment', 'assigmentagain', 'unassigment'];

    public function render(){
        $leaders = User::where('is_leader', true)->get();
        $areas = Areas::get();

        if(Auth::user()->is_leader){
            $this->leaderfilteradmin = Auth::user()->id;
        }

        $usersassigment = User::leftJoin('user_types', 'users.id_usertype', 'user_types.id')
            ->leftJoin('positions', 'users.id_position', 'positions.id')
            ->leftJoin('areas', 'users.id_area', 'areas.id')
            ->leftJoin('leader_users', 'users.id', 'leader_users.id_user')
            ->where('leader_users.id_leader', $this->leaderfilteradmin)
            ->where('users.active', true)
            ->select('users.*', 'user_types.name as usertype_name', 'positions.name as positions_name', 'areas.name as area_name', 'leader_users.id_leader as liderpet', 'leader_users.status as statusleader')
            ->get();

        $userstoassigmentfree = User::leftJoin('areas', 'users.id_area', 'areas.id')
            ->leftJoin('leader_users', 'users.id', 'leader_users.id_user')
            ->select('users.*', 'areas.name as area_name', 'leader_users.id_leader as liderpet', 'leader_users.status as statusleader')
            ->where('users.is_leader', false)
            ->where('users.active', true)
            ->when($this->leaderfilteradmin != '', function ($query){
                return $query->where('users.id_leader', '!=', $this->leaderfilteradmin);
            })
            ->when($this->leaderfilter != '', function ($query){
                return $query->where('leader_users.id_leader', $this->leaderfilter);
            })
            ->when($this->areafilter != '', function ($query){
                return $query->where('areas.id', $this->areafilter);
            })
            ->get();

        return view('livewire.users.assignmentusers')->with('leaders', $leaders)->with('areas', $areas)->with('usersassigment', $usersassigment)->with('userstoassigmentfree', $userstoassigmentfree);
    }

    public function assigment($iduser){
        if($this->leaderfilteradmin != ''){

            User::where('id', $iduser)->update([
                'id_leader' => $this->leaderfilteradmin,
            ]);

            // estatus de la pertenencia de usurios
            // 1 => pertenece
            // 2 => peticion
            // 3 => rechazado
            Leaderuser::insert([
                'id_leader' => $this->leaderfilteradmin,
                'id_user' => $iduser,
                'status' => 1,
                'created_at' => date('Y-m-d'),
            ]);
            
            $this->alert('success', 'Usuario asignado correctamente.', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
               ]);
        }
        else{
            $this->alert('error', 'Selecciona un líder primero.', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
               ]);
        }
        
    }

    public function assigmentagain($iduser){
        if($this->leaderfilteradmin != ''){

            // estatus de la pertenencia de usurios
            // 1 => pertenece
            // 2 => peticion
            // 3 => rechazado
            Leaderuser::insert([
                'id_leader' => $this->leaderfilteradmin,
                'id_user' => $iduser,
                'status' => 2,
                'created_at' => date('Y-m-d'),
            ]);

            Leaderuser::where('id_user', $iduser)->update([
                'status' => 2,
                'updated_at' => date('Y-m-d'),
            ]);
            
            $this->alert('success', 'Petición de asignación de usuario correcta.', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
               ]);
            
            $liderpet = Leaderuser::leftJoin('users', 'leader_users.id_leader', 'users.id')
            ->where('leader_users.id_user', $iduser)->where('leader_users.id_leader', '!=', $this->leaderfilteradmin)
            ->select('users.*')
            ->first();
            $subject = 'Petición de asignación de usuario';
            $email = $liderpet->email;
            Mail::send('emails.assigmentpetition',['liderpet' => $liderpet], function($msj) use($email,  $subject, $liderpet){
                   $msj->subject($subject);
                   $msj->to($email);
                });
            
        }
        else{
            $this->alert('error', 'Selecciona un líder primero.', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
               ]);
        }
        
    }

    public function unassigment($iduser){

        Leaderuser::where('id_user', $iduser)->delete();
        User::where('id', $iduser)->update([
            'id_leader' => 0,
        ]);

        $this->alert('success', 'Usuario desasignado corrextamente.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
           ]);
    }

    public function transfer($iduser){
        Leaderuser::where('id_user', $iduser)->where('id_leader', $this->leaderfilteradmin)->delete();

        Leaderuser::where('id_user', $iduser)->update([
            'status' => 1,
        ]);

        $newleader = Leaderuser::leftJoin('users', 'leader_users.id_leader', 'users.id')
        ->where('leader_users.id_user', $iduser)
        ->select('users.*')
        ->first();

        User::where('id', $iduser)->update([
            'id_leader' => $newleader->id,
        ]);

        $this->alert('success', 'Usuario tranferido correctamente.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
           ]);

        $liderpet = User::where('id', $newleader->id)->first();
        $subject = 'Solicitud de asignación de usuario aceptada';
        $email = $liderpet->email;
        Mail::send('emails.assigmentpetitionaccept',['liderpet' => $liderpet], function($msj) use($email,  $subject, $liderpet){
            $msj->subject($subject);
            $msj->to($email);
        });
    }

    public function rejecttransfer($iduser){
        $notlider = Leaderuser::leftJoin('users', 'leader_users.id_leader', 'users.id')
        ->where('leader_users.id_user', $iduser)->where('leader_users.id_leader', '!=', $this->leaderfilteradmin)
        ->select('users.*')
        ->first();

        Leaderuser::where('id_user', $iduser)->where('id_leader', $notlider->id)->delete();

        Leaderuser::where('id_user', $iduser)->where('leader_users.id_leader', $this->leaderfilteradmin)->update([
            'status' => 1,
        ]);


        $this->alert('success', 'Petición rechazada correctamente.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
           ]);

        $subject = 'Solicitud de asignación de usuario rechazada';
        $userreject = User::where('id', $iduser)->first();
        $email = $notlider->email;
        Mail::send('emails.assigmentpetitionreject',['notlider' => $notlider, 'userreject' => $userreject], function($msj) use($email,  $subject, $notlider, $userreject){
            $msj->subject($subject);
            $msj->to($email);
        });
    }

    public function resendtransfer($iduser){
        
        $liderpet = Leaderuser::leftJoin('users', 'leader_users.id_leader', 'users.id')
        ->where('leader_users.id_user', $iduser)->where('leader_users.id_leader', '!=', $this->leaderfilteradmin)
        ->select('users.*')
        ->first();
        $subject = 'Petición de asignación de usuario';
        $email = $liderpet->email;
        Mail::send('emails.assigmentpetition',['liderpet' => $liderpet], function($msj) use($email,  $subject, $liderpet){
               $msj->subject($subject);
               $msj->to($email);
            });

        $this->alert('success', 'Petición de asignación de usuario reenviada correctamente.', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
               ]);
    }

    public function canceltransfer($iduser){
        $actualider = Leaderuser::leftJoin('users', 'leader_users.id_leader', 'users.id')
        ->where('leader_users.id_user', $iduser)->where('leader_users.id_leader', '!=', $this->leaderfilteradmin)
        ->select('users.*')
        ->first();

        Leaderuser::where('id_user', $iduser)->where('id_leader', $this->leaderfilteradmin)->delete();

        Leaderuser::where('id_user', $iduser)->where('leader_users.id_leader', $actualider->id)->update([
            'status' => 1,
        ]);


        $this->alert('success', 'Petición cancelada correctamente.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
           ]);
    }

    public function getusername($iduser){
        $user = User::where('id', $iduser)->first();
        $name = $user->name . ' ' . $user->lastname;
        return $name;
    }

    public function getusernamepet($iduser){
        $user = Leaderuser::leftJoin('users', 'leader_users.id_leader', 'users.id')
        ->where('leader_users.id_user', $iduser)->where('leader_users.id_leader', '!=', $this->leaderfilteradmin)
        ->select('users.*')
        ->first();
        $name = $user->name . ' ' . $user->lastname;
        return $name;
    }
}