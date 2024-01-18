<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usertype extends Model
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
