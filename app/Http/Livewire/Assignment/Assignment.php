<?php

namespace App\Http\Livewire\Assignment;

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

class Assignment extends Component
{
    use WithFileUploads;
    use WithPagination;
    use LivewireAlert;

    public function render()
    {
        $leaders = Users::where('is_leader', true)->get();
        $areas = Areas::get();

        return view('livewire.assignment.assignment')->with('leaders', $leaders)->with('areas', $areas);
    }
}
