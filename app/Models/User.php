<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'lastname',
        'password',
        'usertype_id',
        'positions_id',
        'areas_id',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'payroll', 'image_profile', 'is_leader'];

    protected $casts = [
        'is_leader' => 'boolean',
        'active' => 'boolean',
    ];

    public function usertype()
    {
        return $this->belongsTo(Usertype::class);
    }

    public function userprocessstatuses()
    {
        return $this->hasMany(Userprocessstatus::class);
    }

    public function area()
    {
        return $this->belongsTo(Areas::class, 'areas_id');
    }

    public function positions()
    {
        return $this->belongsTo(Positions::class);
    }

    public function allConcepts()
    {
        return $this->hasMany(Concepts::class);
    }

    public function isSuperAdmin(): bool
    {
        return in_array($this->email, config('auth.super_admins'));
    }
}
