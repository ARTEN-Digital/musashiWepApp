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
    public function render()
    {
        return view('livewire.users.importusers');
    }

    public function uploadcvs()
    {

    }
    // public function csvLoad(Request $request){

    

    //     $file = $request->file('csv');
    
    //     // The nested array to hold all the arrays
    //     $array = []; 
    
    //     // Open the file for reading
    //     if (($h = fopen("{$file}", "r")) !== FALSE) 
    //     {
    //         while (($data = fgetcsv($h)) !== FALSE) 
    //         {
    //             $array[] = $data;       
    //         }
    //         fclose($h);
    //     }
    //     //dd($array);
    
      
    //         //dd("hola entre");
    //         $i=1;
    //         foreach($array as $line){
                
    //             if($i!=1){
                    
    //                         if(!blank($line[0])){
    //                             //dd($line);
    //                             $existusuario=DB::table('users')->where('q_number',$line[0])->first();
    //                             //dd($existusuario);
    //                             if(blank($existusuario)){
                                    
    //                                $num=DB::table('users')->insertGetId([
    //                                     'q_number'=>$line[0],
    //                                     'name'=>$line[1],
    //                                     'position'=>$line[2],
    //                                     'employe_group'=>$line[3],
    //                                     'short_des_org_unit'=>$line[4],
    //                                     'emailrecovery' => $line[5],
    //                                 ]);
    //                                 //dd($num);
    //                             }else{
    //                                 if(!blank($line[1])){
    //                                     DB::table('users')->where('q_number',$line[0])->update([
    //                                         'name'=>$line[1],
    //                                     ]);
    //                                 }
    //                                 if(!blank($line[2])){
    //                                     DB::table('users')->where('q_number',$line[0])->update([
    //                                         'position'=>$line[2],
    //                                     ]);
    //                                 }
    //                                 if(!blank($line[3])){
    //                                     DB::table('users')->where('q_number',$line[0])->update([
    //                                         'employe_group'=>$line[3],
    //                                     ]);
    //                                 }
    //                                 if(!blank($line[4])){
    //                                     DB::table('users')->where('q_number',$line[0])->update([
    //                                         'short_des_org_unit'=>$line[4],
    //                                     ]);
    //                                 }
    //                                 if(!blank($line[5])){
    //                                     DB::table('users')->where('q_number',$line[0])->update([
    //                                         'emailrecovery'=>$line[5],
    //                                     ]);
    //                                 }
    //                             }
    //                         }
    //                     }
    //         $i++;
    //         }
        
    //     return redirect('/panel/users');
    
    // }
}
