<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Searchable;

class Leaderuser extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'id_leader',
        'id_user',
        'status'

    ];

    protected $searchableFields = ['*'];

    protected $table = 'leader_users';

}
