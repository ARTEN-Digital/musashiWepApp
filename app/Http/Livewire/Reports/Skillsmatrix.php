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
use Mail;
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
use App\Models\Userhistory;
 
class Skillsmatrix extends Component
{
    use LivewireAlert;
    use WithFileUploads; 
    use WithPagination;
  
    public $numoperators = 0, $numconcepts= 0;

    public $search, $areafilter, $linefilter, $categoryfilter, $modelfilter;

    public $usersarea = [], $infoarea = null, $processxarea = [];

    //variables para modal de asignación de capacitación
    public $modalassignation = false, $mauser, $matraining, $maidprocess, $madatestart;

    //variables para modal de historial niveles
    public $modallevels = false, $mluser, $mltraining, $mlidprocess, $mlstatusprocess, $mldatel2;

    //variables para modal de checklist
    public $modalchecklist = false, $mcuser, $mctraining, $mcprocess, $mcusercheck, $mcstarevldate, $mcselfirststatus = [], $mcshadowoperators = [], $mcapplicomments = [], $mcselsecondstatus = [], $mcevalcomments = [], $mcrsblefilter, $mcresponsables = [];

    protected $rules = [];
    protected $validationAttributes  = [
        'madatestart' => 'Fecha de asignación',
        'mcstarevldate' => 'Fecha de inicio de entrenamiento',
    ];

    protected $listeners = ['changelevel'];

    public function render(){
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
            $this->numconcepts = count($this->infoarea->processesfilters($this->linefilter, $this->categoryfilter, $this->modelfilter));
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

        Userhistory::create([
            'id_user' => $idUser,
            'id_whomadeaction' => Auth::user()->id,
            'action' => 'Asignación de capacitación.',
            'description' => 'Capacitación: ' . $this->matraining->name,
            'dateaction' => date('Y-m-d H:m'),
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
                        'id_trainer_l1' => Auth::user()->id,
                        'updated_at' => date('Y-m-d H:m'),
                    ]);

                    Userhistory::create([
                        'id_user' => $this->mluser->id,
                        'id_whomadeaction' => Auth::user()->id,
                        'action' => 'Aumento de nivel en capacitacion.',
                        'description' => 'Nivel: ET, Capacitación: ' . $this->mltraining->name,
                        'dateaction' => date('Y-m-d H:m'),
                    ]);
                }
                else{
                    DB::table('user_process_statuses')->where('id', $idprocess)->update([
                        'status' => 'pending',
                        'l1_date' => null,
                        'id_trainer_l1' => null,
                        'l2_date' => null,
                        'id_trainer_l2' => null,
                        'l3_date' => null,
                        'id_trainer_l3' => null,
                        'l4_date' => null,
                        'id_trainer_l4' => null,
                        'updated_at' => date('Y-m-d H:m'),
                    ]);

                    Userhistory::create([
                        'id_user' => $this->mluser->id,
                        'id_whomadeaction' => Auth::user()->id,
                        'action' => 'Baja de nivel en capacitacion.',
                        'description' => 'Sin nivel, Capacitación: ' . $this->mltraining->name,
                        'dateaction' => date('Y-m-d H:m'),
                    ]);
                }

                
                break;

            case 'l2':
                    if ($status == "give") {
                        DB::table('user_process_statuses')->where('id', $idprocess)->update([
                            'status' => 'l2',
                            'l1_date' => date('Y-m-d H:m'),
                            'l2_date' => date('Y-m-d H:m'),
                            'id_trainer_l1' => Auth::user()->id,
                            'id_trainer_l2' => Auth::user()->id,
                            'updated_at' => date('Y-m-d'),
                        ]);

                        Userhistory::create([
                            'id_user' => $this->mluser->id,
                            'id_whomadeaction' => Auth::user()->id,
                            'action' => 'Aumento de nivel en capacitacion.',
                            'description' => 'Nivel: EE, Capacitación: ' . $this->mltraining->name,
                            'dateaction' => date('Y-m-d H:m'),
                        ]);
                    }
                    else{
                        DB::table('user_process_statuses')->where('id', $idprocess)->update([
                            'status' => 'l1',
                            'updated_at' => date('Y-m-d H:m'),
                            'l2_date' => null,
                            'id_trainer_l2' => null,
                            'l3_date' => null,
                            'id_trainer_l3' => null,
                            'l4_date' => null,
                            'id_trainer_l4' => null,
                        ]);

                        Userhistory::create([
                            'id_user' => $this->mluser->id,
                            'id_whomadeaction' => Auth::user()->id,
                            'action' => 'Baja de nivel en capacitacion.',
                            'description' => 'Nivel: ET, Capacitación: ' . $this->mltraining->name,
                            'dateaction' => date('Y-m-d H:m'),
                        ]);
                    }
                    break;

            case 'l3':
                    if ($status == "give") {
                        DB::table('user_process_statuses')->where('id', $idprocess)->update([
                            'status' => 'l3',
                            'l1_date' => date('Y-m-d H:m'),
                            'l2_date' => date('Y-m-d H:m'),
                            'l3_date' => date('Y-m-d H:m'),
                            'id_trainer_l1' => Auth::user()->id,
                            'id_trainer_l2' => Auth::user()->id,
                            'id_trainer_l3' => Auth::user()->id,
                            'updated_at' => date('Y-m-d H:m'),
                        ]);

                        Userhistory::create([
                            'id_user' => $this->mluser->id,
                            'id_whomadeaction' => Auth::user()->id,
                            'action' => 'Aumento de nivel en capacitacion.',
                            'description' => 'Nivel: H, Capacitación: ' . $this->mltraining->name,
                            'dateaction' => date('Y-m-d H:m'),
                        ]);
                    }
                    else{
                        DB::table('user_process_statuses')->where('id', $idprocess)->update([
                            'status' => 'l2',
                            'l3_date' => null,
                            'id_trainer_l3' => null,    
                            'l4_date' => null,
                            'id_trainer_l4' => null,
                            'updated_at' => date('Y-m-d H:m'),
                        ]);
                        Userhistory::create([
                            'id_user' => $this->mluser->id,
                            'id_whomadeaction' => Auth::user()->id,
                            'action' => 'Baja de nivel en capacitacion.',
                            'description' => 'Nivel: EE, Capacitación: ' . $this->mltraining->name,
                            'dateaction' => date('Y-m-d H:m'),
                        ]);
                    }
                    break;
            case 'l4':
                    if ($status == "give") {
                        DB::table('user_process_statuses')->where('id', $idprocess)->update([
                            'status' => 'l4',
                            'l1_date' => date('Y-m-d H:m'),
                            'l2_date' => date('Y-m-d H:m'),
                            'l3_date' => date('Y-m-d H:m'),
                            'l4_date' => date('Y-m-d H:m'),
                            'id_trainer_l1' => Auth::user()->id,
                            'id_trainer_l2' => Auth::user()->id,
                            'id_trainer_l3' => Auth::user()->id,
                            'id_trainer_l4' => Auth::user()->id,
                            'updated_at' => date('Y-m-d H:m'),
                        ]);

                        Userhistory::create([
                            'id_user' => $this->mluser->id,
                            'id_whomadeaction' => Auth::user()->id,
                            'action' => 'Aumento de nivel en capacitacion.',
                            'description' => 'Nivel: C, Capacitación: ' . $this->mltraining->name,
                            'dateaction' => date('Y-m-d H:m'),
                        ]);
                    }
                    else{
                        DB::table('user_process_statuses')->where('id', $idprocess)->update([
                            'status' => 'l3',
                            'l4_date' => null,
                            'id_trainer_l4' => null,
                            'updated_at' => date('Y-m-d H:m'),
                        ]);

                        Userhistory::create([
                            'id_user' => $this->mluser->id,
                            'id_whomadeaction' => Auth::user()->id,
                            'action' => 'Baja de nivel en capacitacion.',
                            'description' => 'Nivel: H, Capacitación: ' . $this->mltraining->name,
                            'dateaction' => date('Y-m-d H:m'),
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
            $this->reset(['mcuser', 'mctraining', 'mcprocess', 'mcusercheck', 'mcstarevldate', 'mcselfirststatus', 'mcevalcomments', 'mcresponsables', 'mcrsblefilter']);
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

        $numconcepts = (count($this->mctraining->checklistevaluations->first()->concepts));
        $numfirstanswers = 0;
        $numsecondanswers = 0;

        foreach ($this->mcselfirststatus as $key => $value){
            $auxusercheck = Useranswerchecklist::where('id_user_checklist', $usercheckid)->where('id_concept', $key)->first();
            if($value != false){
                $auxstatus = '1';
                $numfirstanswers++;
                $secondstatus = null;
                if($auxusercheck != null && $auxusercheck->secondstatus == 1)
                    $this->mcselsecondstatus[$key] = 'null';
            }else{
                $auxstatus = null;
                $secondstatus = $auxusercheck->secondstatus;
            }
            if($auxusercheck != null){
                DB::table('user_answers_checklist')->where('id_user_checklist', $usercheckid)->where('id_concept', $key)->update([
                    'firststatus' => $auxstatus,
                    'secondstatus' => $secondstatus, 
                    'id_applicant' => Auth::user()->id,
                    'datefirsteval' => date('Y-m-d H:m'),
                    'updated_at' => date('Y-m-d H:m'),
                ]);
            }
            else{
                DB::table('user_answers_checklist')->insert([
                    'firststatus' => $auxstatus,
                    'id_user_checklist' => $usercheckid,
                    'id_concept' => $key,
                    'id_applicant' => Auth::user()->id,
                    'datefirsteval' => date('Y-m-d H:m'),
                    'created_at' => date('Y-m-d H:m'),
                ]);
            }
        }

        foreach ($this->mcshadowoperators as $key => $value){
            $auxusercheck = Useranswerchecklist::where('id_user_checklist', $usercheckid)->where('id_concept', $key)->first();
            if($auxusercheck != null){
                DB::table('user_answers_checklist')->where('id_user_checklist', $usercheckid)->where('id_concept', $key)->update([
                    'shadowoperator' => $value,
                    'updated_at' => date('Y-m-d H:m'),
                ]);
            }
            else{
                DB::table('user_answers_checklist')->insert([
                    'shadowoperator' => $value,
                    'id_user_checklist' => $usercheckid,
                    'id_concept' => $key,
                    'created_at' => date('Y-m-d H:m'),
                ]);
            }
        }

        foreach ($this->mcapplicomments as $key => $value){
            $auxusercheck = Useranswerchecklist::where('id_user_checklist', $usercheckid)->where('id_concept', $key)->first();
            if($auxusercheck != null){
                DB::table('user_answers_checklist')->where('id_user_checklist', $usercheckid)->where('id_concept', $key)->update([
                    'applicantcomment' => $value,
                    'updated_at' => date('Y-m-d H:m'),
                ]);
            }
            else{
                DB::table('user_answers_checklist')->insert([
                    'applicantcomment' => $value,
                    'id_user_checklist' => $usercheckid,
                    'id_concept' => $key,
                    'created_at' => date('Y-m-d H:m'),
                ]);
            }
        }


        foreach ($this->mcselsecondstatus as $key => $value){
            $auxusercheck = Useranswerchecklist::where('id_user_checklist', $usercheckid)->where('id_concept', $key)->first();
            $firstmailstatus = null;
            switch ($value) {
                case '1':
                    $firststatus = null;
                    $numfirstanswers--;
                    $numsecondanswers--;
                    $firstmailstatus = null;
                    
                    if($auxusercheck != null){
                        $mailuser = $this->mcuser;
                        $mailprocess = $this->mcprocess;
                        $mailarea = Areas::where('id', $this->areafilter)->first();
                        $mailsubject = 'Concepto de evaluacíon no aprovado.';
                        $email = User::where('id', $auxusercheck->id_applicant)->first()->email;

                        Mail::send('emails.rejectevaluation',['mailprocess' => $mailprocess, 'mailarea' => $mailarea, 'mailuser' => $mailuser, 'email' => $email], function($msj) use($email,  $mailsubject, $mailprocess, $mailarea, $mailuser){
                            $msj->subject($mailsubject);
                            $msj->to($email);
                        });
                    }

                    break;
                case '2':
                    $firststatus = $auxusercheck->firststatus;
                    $firstmailstatus = 'send';
                    $numsecondanswers++;
                    break;
                case 'null':
                    $value = null;
                    $firststatus = $auxusercheck->firststatus;
                    break;
                case null:
                        $firststatus = $auxusercheck->firststatus;
                    break;
            }
            if($auxusercheck != null){
                DB::table('user_answers_checklist')->where('id_user_checklist', $usercheckid)->where('id_concept', $key)->update([
                    'firststatus' => $firststatus,
                    'secondstatus' => $value,
                    'id_evaluator' => Auth::user()->id,
                    'datesecondeval' => date('Y-m-d H:m'),
                    'firststatusmail' => $firstmailstatus,
                    'updated_at' => date('Y-m-d H:m'),
                ]);
            }
            else{
                DB::table('user_answers_checklist')->insert([
                    'firststatus' => $firststatus,
                    'secondstatus' => $value,
                    'id_user_checklist' => $usercheckid,
                    'id_concept' => $key,
                    'id_evaluator' => Auth::user()->id,
                    'datesecondeval' => date('Y-m-d H:m'),
                    'firststatusmail' => $firstmailstatus,
                    'created_at' => date('Y-m-d H:m'),
                ]);
            }
        }

        foreach ($this->mcevalcomments as $key => $value){
            $auxusercheck = Useranswerchecklist::where('id_user_checklist', $usercheckid)->where('id_concept', $key)->first();
            if($auxusercheck != null){
                DB::table('user_answers_checklist')->where('id_user_checklist', $usercheckid)->where('id_concept', $key)->update([
                    'evaluatorcomment' => $value,
                    'updated_at' => date('Y-m-d H:m'),
                ]);
            }
            else{
                DB::table('user_answers_checklist')->insert([
                    'evaluatorcomment' => $value,
                    'id_user_checklist' => $usercheckid,
                    'id_concept' => $key,
                    'created_at' => date('Y-m-d H:m'),
                ]);
            }
        }

        if($numfirstanswers == $numconcepts){
            DB::table('user_process_statuses')->where('id_user', $this->mcuser->id)->where('id_process', $this->mcprocess->id)->update([
                'status' => 'l2',
                'l2_date' => date('Y-m-d H:m'),
                'updated_at' => date('Y-m-d'),
            ]);

            Userhistory::create([
                'id_user' => $this->mcuser->id,
                'id_whomadeaction' => Auth::user()->id,
                'action' => 'Aumento de nivel en capacitacion.',
                'description' => 'Nivel: EE, Capacitación: ' . $this->mctraining->name,
                'dateaction' => date('Y-m-d H:m'),
            ]);

            foreach($this->mctraining->checklistevaluations->first()->concepts as $data){
                $auxuseranswer = Useranswerchecklist::where('id_user_checklist', $usercheckid)->where('id_concept', $data->id)->first();

                if($auxuseranswer->firststatusmail == null){
                    $mailuser = $this->mcuser;
                    $mailprocess = $this->mcprocess;
                    $mailarea = Areas::where('id', $this->areafilter)->first();
                    $mailsubject = 'Nueva evaluación para revisar.';
                    $email = $data->user->email;
                    
                    Mail::send('emails.newchecktraining',['mailprocess' => $mailprocess, 'mailarea' => $mailarea, 'mailuser' => $mailuser, 'email' => $email], function($msj) use($email,  $mailsubject, $mailprocess, $mailarea, $mailuser){
                        $msj->subject($mailsubject);
                        $msj->to($email);
                        });
                    
                    DB::table('user_answers_checklist')->where('id_user_checklist', $usercheckid)->where
                    ('id_concept', $data->id)->update([
                        'firststatusmail' => 'send',
                    ]);
                }
            
            } 

        }
        else{
            DB::table('user_process_statuses')->where('id_user', $this->mcuser->id)->where('id_process', $this->mcprocess->id)->update([
                'status' => 'l1',
                'l1_date' => date('Y-m-d H:m'),
                'updated_at' => date('Y-m-d H:m'),
            ]);

            Userhistory::create([
                'id_user' => $this->mcuser->id,
                'id_whomadeaction' => Auth::user()->id,
                'action' => 'Baja de nivel en capacitacion.',
                'description' => 'Nivel: ET, Capacitación: ' . $this->mctraining->name,
                'dateaction' => date('Y-m-d H:m'),
            ]);
        }

        if($numsecondanswers == $numconcepts){
            DB::table('user_process_statuses')->where('id_user', $this->mcuser->id)->where('id_process', $this->mcprocess->id)->update([
                'status' => 'l3',
                'l3_date' => date('Y-m-d H:m'),
                'updated_at' => date('Y-m-d'),
            ]);

            Userhistory::create([
                'id_user' => $this->mcuser->id,
                'id_whomadeaction' => Auth::user()->id,
                'action' => 'Aumento de nivel en capacitacion.',
                'description' => 'Nivel: H, Capacitación: ' . $this->mctraining->name,
                'dateaction' => date('Y-m-d H:m'),
            ]);
        }

        $this->getmodalchecklistdata($this->mcuser->id, $this->mcprocess->id);

        $this->alert('success', 'Evaluación realizada con éxito.', [
            'position' => 'center',
            'timer' => 3000, 
            'toast' => true,
           ]);
    }

    public function getapplicant($iduserchecklist, $id_concept){

        $operator = User::leftJoin('user_answers_checklist', 'users.id', 'user_answers_checklist.id_applicant')->where('user_answers_checklist.id_user_checklist', $iduserchecklist)->where('user_answers_checklist.id_concept', $id_concept)->select('users.*')->first();

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
                if($ua->firststatus != null){
                    $this->mcselfirststatus[$ua->id_concept] = true;
                }else{
                    $this->mcselfirststatus[$ua->id_concept] = false;
                }

                if($ua->shadowoperator != null)
                    $this->mcshadowoperators[$ua->id_concept] = $ua->shadowoperator;
                    
                if($ua->applicantcomment != null)
                    $this->mcapplicomments[$ua->id_concept] = $ua->applicantcomment;
                
                $this->mcselsecondstatus[$ua->id_concept] = $ua->secondstatus;

                if($ua->evaluatorcomment != null)
                    $this->mcevalcomments[$ua->id_concept] = $ua->evaluatorcomment;
            }
        }

    }

}