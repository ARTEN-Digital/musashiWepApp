<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Searchable;

class Useranswerchecklist extends Model
{
    use HasFactory;
    use Searchable;
    protected $table = 'user_answers_checklist';

    protected $fillable = ['status', 'id_user_checklist', 'id_concept', 'id_applicant', 'shadowoperator', 'applicantcomment', 'datefirsteval', 'secondstatus', 'id_evaluator', 'evaluatorcomment', 'datesecondeval', 'firststatusmail'];

    protected $searchableFields = ['*'];
}
