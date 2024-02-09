<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Concepts extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['concept', 'id_topics', 'id_user'];

    protected $searchableFields = ['*'];

    public function topics()
    {
        return $this->belongsTo(Topics::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
