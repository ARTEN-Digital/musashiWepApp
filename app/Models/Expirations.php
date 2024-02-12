<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expirations extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['expiration', 'expiration_in_days'];

    protected $searchableFields = ['*'];

    public function trainings()
    {
        return $this->hasOne(Trainings::class);
    }
}
