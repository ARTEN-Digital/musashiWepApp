<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Leves extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['level'];

    protected $searchableFields = ['*'];

    public function allTrainings()
    {
        return $this->belongsToMany(Trainings::class);
    }
}
