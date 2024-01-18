<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipament extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['equipament'];

    protected $searchableFields = ['*'];

    public function processes()
    {
        return $this->belongsToMany(Process::class);
    }
}
