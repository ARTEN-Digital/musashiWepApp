<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trainings extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'id_process', 'id_expirations'];

    protected $searchableFields = ['*'];

    public function process()
    {
        return $this->belongsTo(Process::class);
    }

    public function expirations()
    {
        return $this->belongsTo(Expirations::class);
    }

    public function allLeves()
    {
        return $this->belongsToMany(Leves::class);
    }

    public function checklistevaluations()
    {
        return $this->belongsToMany(Checklistevaluation::class);
    }
}
