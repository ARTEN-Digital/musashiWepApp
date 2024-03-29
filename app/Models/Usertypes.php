<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usertypes extends Model
{
    use HasFactory;

    use Searchable;

    protected $fillable = ['user_type'];

    protected $searchableFields = ['*'];

    protected $table = 'user_types';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
