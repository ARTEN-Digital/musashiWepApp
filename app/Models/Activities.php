<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activities extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['activity'];

    protected $searchableFields = ['*'];

    public function processes()
    {
        return $this->belongsToMany(Process::class);
    }
}
