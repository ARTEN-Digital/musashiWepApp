<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Concepts extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['concept', 'number', 'id_topics', 'id_user'];

    protected $searchableFields = ['*'];

    public function topics()
    {
        return $this->hasOne(Topics::class, 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
}
