<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Searchable;

class Userchecklist extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'user_checklist';

    protected $fillable = ['id_user', 'id_checklist', 'datestarteval'];

    protected $searchableFields = ['*'];

    public function checklistevaluations()
    {
        return $this->belongsToMany(Checklistevaluation::class, 'checklistevaluation_trainings', 'id_trainings', 'id_checklistevaluation');
    }
}
