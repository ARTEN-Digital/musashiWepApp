<?php

namespace App\Http\Livewire\Reports;

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
use App\Models\Categories; 
use App\Models\Lines; 
use App\Models\Models; 
use App\Models\User;  
use App\Models\Userprocessstatus;
use App\Models\Userchecklist;    
use App\Models\Useranswerchecklist;
use App\Models\Trainings;  
use App\Models\Process;  
 
class Skillsmatrix extends Component
{
    use LivewireAlert;
    use WithFileUploads; 
    use WithPagination;

    public $numoperators = 0, $numprocess= 0;

    public $search, $areafilter, $linefilter, $categoryfilter, $modelfilter;

    public $usersarea = [], $infoarea = null, $processxarea = [];

    //variables para modal de asignación de capacitación
    public $modalassignation = false, $mauser, $matraining, $maidprocess, $madatestart;

    //variables para modal de historial niveles
    public $modallevels = false, $mluser, $mltraining, $mlidprocess, $mlstatusprocess, $mldatel2;

    //variables para modal de checklist
    public $modalchecklist = false, $mcuser, $mctraining, $mcprocess, $mcusercheck, $mcstarevldate, $mcselconcepstatus = [], $mcselconcepcomment = [], $mcresponsables = [], $mcrsblefilter;

    protected $rules = [];
    protected $validationAttributes  = [
        'madatestart' => 'Fecha de asignación',
        'mcstarevldate' => 'Fecha de inicio de entrenamiento',
    ];

    protected $listeners = ['changelevel'];

    public function render()
    {
        $areas = Areas::get();
        $lines = Lines::get();
        $categories = Categories::get();
        $models = Models::get();
        
        return view('livewire.reports.skillsmatrix')->with('areas', $areas)->with('lines', $lines)->with('categories', $categories)->with('models', $models);
    } 

    public function getuserarea(){
        if($this->areafilter != ''){
            $this->usersarea = User::where('active', 1)
            ->where('id_area', $this->areafilter)
            ->when($this->search != '', function ($query){
                return $query->where(function ($query) 
                { 
                    $query->orWhere('users.name', 'LIKE', '%' . $this->search . '%')->orWhere('users.lastname', 'LIKE', '%' . $this->search . '%')->orWhere('users.payroll', 'LIKE', '%' . $this->search . '%');
                });
            })->get();

            $this->infoarea = Areas::where('id', $this->areafilter)->first();

            $this->numoperators = count($this->usersarea);
            $this->numprocess = count($this->infoarea->processesfilters($this->linefilter, $this->categoryfilter, $this->modelfilter));
        }
        else{
            $this->usersarea = [];
        }
    }

    public function statusprocessxuser($idUser, $idProcess){
        return Userprocessstatus::where('id_user', $idUser)->where('id_process', $idProcess)->first();
    }

    public function scmodalassignation($idUser, $idProcess){
        if ($this->modalassignation == true) {
            $this->modalassignation = false;
            $this->reset(['madatestart']);
        } else {
            $this->modalassignation = true;
            $this->mauser = User::where('id', $idUser)->first();
            $this->maidprocess = $idProcess;
            $this->matraining = Trainings::where('id_process', $idProcess)->first();
        }
    }

    public function trainingassignation($idUser){
        $this->rules +=[
            'madatestart' => 'required',
        ];
        $this->validate();

        DB::table('user_process_statuses')->insert([
            'status' => 'pending',
            'id_user' => $idUser,
            'id_process' => $this->maidprocess,
            'created_at' => $this->madatestart,
        ]);

        $this->reset(['madatestart', 'modalassignation']);

        $this->alert('success', 'Capacitación asignada con éxito.', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => true,
           ]);
    }

    public function scmodallevel($idUser, $idProcess){
        if ($this->modallevels == true) {
            $this->modallevels = false;
        } else {
            $this->modallevels = true;
            $this->mluser = User::where('id', $idUser)->first();
            $this->mlidprocess = $idProcess;
            $this->mltraining = Trainings::where('id_process', $idProcess)->first();
            $this->mlstatusprocess = $this->statusprocessxuser($idUser, $idProcess);
        }
    }

    public function changelevel($idprocess, $level, $status){
        // dd($status);
        switch ($level) {
            case 'l1':
                if ($status == "give") {
                    DB::table('user_process_statuses')->where('id', $idprocess)->update([
                        'status' => 'l1',
                        'l1_date' => date('Y-m-d H:m'),
                        'updated_at' => date('Y-m-d H:m'),
                    ]);
                }
                else{
                    DB::table('user_process_statuses')->where('id', $idprocess)->update([
                        'status' => 'pending',
                        'l1_date' => null,
                        'l2_date' => null,
                        'l3_date' => null,
                        'l4_date' => null,
                        'updated_at' => date('Y-m-d H:m'),
                    ]);
                }
                break;

            case 'l2':
                    if ($status == "give") {
                        DB::table('user_process_statuses')->where('id', $idprocess)->update([
                            'status' => 'l2',
                            'l2_date' => date('Y-m-d H:m'),
                            'updated_at' => date('Y-m-d'),
                        ]);
                    }
                    else{
                        DB::table('user_process_statuses')->where('id', $idprocess)->update([
                            'status' => 'l1',
                            'updated_at' => date('Y-m-d H:m'),
                            'l2_date' => null,
                            'l3_date' => null,
                            'l4_date' => null,
                        ]);
                    }
                    break;

            case 'l3':
                    if ($status == "give") {
                        DB::table('user_process_statuses')->where('id', $idprocess)->update([
                            'status' => 'l3',
                            'l3_date' => date('Y-m-d H:m'),
                            'updated_at' => date('Y-m-d H:m'),
                        ]);
                    }
                    else{
                        DB::table('user_process_statuses')->where('id', $idprocess)->update([
                            'status' => 'l2',
                            'l3_date' => null,
                            'l4_date' => null,
                            'updated_at' => date('Y-m-d H:m'),
                        ]);
                    }
                    break;
            case 'l4':
                    if ($status == "give") {
                        DB::table('user_process_statuses')->where('id', $idprocess)->update([
                            'status' => 'l4',
                            'l4_date' => date('Y-m-d H:m'),
                            'updated_at' => date('Y-m-d H:m'),
                        ]);
                    }
                    else{
                        DB::table('user_process_statuses')->where('id', $idprocess)->update([
                            'status' => 'l3',
                            'l4_date' => null,
                            'updated_at' => date('Y-m-d H:m'),
                        ]);
                    }
                    break;
        }
        
        $this->mlstatusprocess = $this->statusprocessxuser($this->mluser->id, $this->mlidprocess);

        $this->alert('success', 'Nivel de capacitación actualizado con éxito.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
           ]);

    }

    public function scmodalchecklist($idUser, $idProcess){
        if ($this->modalchecklist == true) {
            $this->modalchecklist = false;
            $this->modallevels = true;
            $this->reset(['mcuser', 'mctraining', 'mcprocess', 'mcusercheck', 'mcstarevldate', 'mcselconcepstatus', 'mcselconcepcomment', 'mcresponsables', 'mcrsblefilter']);
        } else {
            $this->modalchecklist = true;
            $this->modallevels = false;            
            $this->mcuser = User::where('id', $idUser)->first();
            $this->mcprocess = Process::where('id', $idProcess)->first();

           $this->getmodalchecklistdata($idUser, $idProcess);

        }
    }

    public function savechecklist(){
        $this->rules +=[
            'mcstarevldate' => 'required',
        ];
        $this->validate();

        //dd($this->mcusercheck);

        $usercheckid = '';
        if($this->mcusercheck != null){
            DB::table('user_checklist')->where('id', $this->mcusercheck->id)->update([
                'datestarteval' => $this->mcstarevldate,
                'updated_at' => date('Y-m-d H:m'),
            ]);
            $usercheckid = $this->mcusercheck->id;
        }
        else{
            $usercheckid = DB::table('user_checklist')->insertGetId([
                'id_user' => $this->mcuser->id,
                'id_checklist' => $this->mctraining->checklistevaluations->first()->id,
                'datestarteval' => $this->mcstarevldate,
                'created_at' => date('Y-m-d H:m'),
            ]);
        }


        $numprocess = (count($this->mctraining->checklistevaluations->first()->concepts));
        $numanswers = 0;
        foreach ($this->mcselconcepstatus as $key => $value) {
           
            $auxstatus = ($value != false) ? $auxstatus = '1' && $numanswers++ : $auxstatus = null;

            $auxusercheck = Useranswerchecklist::where('id_user_checklist', $usercheckid)->where('id_concept', $key)->first();
            if($auxusercheck != null){
                DB::table('user_answers_checklist')->where('id_user_checklist', $usercheckid)->where('id_concept', $key)->update([
                    'status' => $auxstatus,
                    'id_evaluator' => Auth::user()->id,
                    'datefirsteval' => date('Y-m-d H:m'),
                    'updated_at' => date('Y-m-d H:m'),
                ]);
            }
            else{
                DB::table('user_answers_checklist')->insert([
                    'status' => $auxstatus,
                    'id_user_checklist' => $usercheckid,
                    'id_concept' => $key,
                    'id_evaluator' => Auth::user()->id,
                    'datefirsteval' => date('Y-m-d H:m'),
                    'created_at' => date('Y-m-d H:m'),
                ]);
            }
        }

        foreach ($this->mcselconcepcomment as $key => $value) {
                $aux = Useranswerchecklist::where('id_user_checklist', $usercheckid)->where('id_concept', $key)->first();
                if($aux != null){
                    DB::table('user_answers_checklist')->where('id_user_checklist', $usercheckid)->where('id_concept', $key)->update([
                        'comment' => $value,
                        'updated_at' => date('Y-m-d H:m'),
                    ]);
                }
                else{
                    DB::table('user_answers_checklist')->insert([
                        'comment' => $value,
                        'id_user_checklist' => $usercheckid,
                        'id_concept' => $key,
                        'created_at' => date('Y-m-d H:m'),
                    ]);
                }
        }

        if($numanswers == $numprocess){
            DB::table('user_process_statuses')->where('id_user', $this->mcuser->id)->where('id_process', $this->mcprocess->id)->update([
                'status' => 'l2',
                'l2_date' => date('Y-m-d H:m'),
                'updated_at' => date('Y-m-d'),
            ]);
        }
        else{
            DB::table('user_process_statuses')->where('id_user', $this->mcuser->id)->where('id_process', $this->mcprocess->id)->update([
                'status' => 'l1',
                'l1_date' => date('Y-m-d H:m'),
                'updated_at' => date('Y-m-d H:m'),
            ]);
        }

        $this->getmodalchecklistdata($this->mcuser->id, $this->mcprocess->id);

        $this->alert('success', 'Evaluación realizada con éxito.', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
           ]);
    }

    public function getshadowoperator($iduserchecklist, $id_concept){

        $operator = User::leftJoin('user_answers_checklist', 'users.id', 'user_answers_checklist.id_evaluator')->where('user_answers_checklist.id_user_checklist', $iduserchecklist)->where('user_answers_checklist.id_concept', $id_concept)->select('users.*')->first();

        $aux = ($operator != null) ? $operator->name . ' ' . $operator->lastname : '';
        return $aux;
    }

    public function getmodalchecklistdata($idUser, $idProcess){
        
        $this->mctraining = Trainings::where('id_process', $idProcess)->first();
        $this->mcusercheck = Userchecklist::where('id_user', $idUser)->where('id_checklist', $this->mctraining->checklistevaluations->first()->id,)->first();
        $this->mcstarevldate = ($this->mcusercheck != null) ? $this->mcusercheck->datestarteval : date('Y-m-d');

        if($this->mcusercheck != null){
            $useranswers = Useranswerchecklist::where('id_user_checklist', $this->mcusercheck->id)->get();
            foreach ($useranswers as $ua) {
                if($ua->status != null)
                    $this->mcselconcepstatus[$ua->id_concept] = true;

                if($ua->comment != null)
                    $this->mcselconcepcomment[$ua->id_concept] = $ua->comment;
            }
        }
    }

}