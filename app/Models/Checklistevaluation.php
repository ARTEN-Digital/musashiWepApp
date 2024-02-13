<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checklistevaluation extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name'];

    protected $searchableFields = ['*'];

    protected $table = 'checklist_evaluations';

    public function allTrainings()
    {
        return $this->belongsToMany(Trainings::class);
    }
    
    public function concepts()
    {
        return $this->belongsToMany(Concepts::class, 'checklistevaluation_concepts', 'id_checklistevaluation', 'id_concepts');
    }
}
