<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Userprocessstatus extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['status', 'id_user', 'id_process', 'l1_date', 'id_trainer_l1', 'l2_date', 'id_trainer_l2', 'l3_date', 'id_trainer_l3', 'l4_date', 'id_trainer_l4'];

    protected $searchableFields = ['*'];

    protected $table = 'user_process_statuses';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function process()
    {
        return $this->belongsTo(Process::class);
    }

    public function trainerl1(){
        return $this->hasOne(User::class, 'id', 'id_trainer_l1')->latestOfMany();
    }

    public function trainerl2(){
        return $this->hasOne(User::class, 'id', 'id_trainer_l2')->latestOfMany();
    }

    public function trainerl3(){
        return $this->hasOne(User::class, 'id', 'id_trainer_l3')->latestOfMany();
    }

    public function trainerl4(){
        return $this->hasOne(User::class, 'id', 'id_trainer_l4')->latestOfMany();
    }
}
