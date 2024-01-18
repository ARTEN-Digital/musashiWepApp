<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Userprocessstatus extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['status', 'user_id', 'process_id'];

    protected $searchableFields = ['*'];

    protected $table = 'user_process_statuses';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function process()
    {
        return $this->belongsTo(Process::class);
    }
}
