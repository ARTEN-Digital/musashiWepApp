<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Process extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['process'];

    protected $searchableFields = ['*'];

    public function userprocessstatuses()
    {
        return $this->hasMany(Userprocessstatus::class);
    }

    public function allTrainings()
    {
        return $this->hasMany(Trainings::class);
    }

    public function allActivities()
    {
        return $this->belongsToMany(Activities::class);
    }

    public function areas()
    {
        return $this->belongsToMany(Areas::class);
    }

    public function equipaments()
    {
        return $this->belongsToMany(Equipament::class);
    }
}
