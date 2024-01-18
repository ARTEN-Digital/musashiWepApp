<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Areas extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['area'];

    protected $searchableFields = ['*'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function processes()
    {
        return $this->belongsToMany(Process::class);
    }
}
