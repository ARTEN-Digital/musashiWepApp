<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Process extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'number_process'];

    protected $searchableFields = ['*'];

    public function userprocessstatuses()
    {
        return $this->hasMany(Userprocessstatus::class);
    }

    public function line(){
        return $this->belongsToMany(Lines::class, 'process_lines', 'id_process', 'id_line');
    }

    public function category(){
        return $this->belongsToMany(Categories::class, 'process_categories', 'id_process', 'id_category');
    }

    public function models(){
        return $this->belongsToMany(Models::class, 'process_models', 'id_process', 'id_model');
    }

    public function training(){
        return $this->hasOne(Trainings::class, 'id_process', 'id')->latestOfMany();
    }



}
