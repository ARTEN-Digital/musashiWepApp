<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Searchable;

class Userhistory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['id_user', 'id_whomadeaction', 'action', 'description', 'dateaction'];

    protected $searchableFields = ['*'];

    protected $table = 'user_history';
    public $timestamps = false;

    public function whomade()
    {
        return $this->hasOne(User::class, 'id', 'id_whomadeaction')->latestOfMany();
    }

}
