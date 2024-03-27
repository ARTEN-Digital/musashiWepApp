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
        'payroll',
        'id_position',
        'email',
        'phone',
        'id_area',
        'id_usertype',
        'password',
        'is_leader',
        'active',
        'created_at',
        'image_profile',
        'id_area',
        'id_usertype',
        'id_leader',
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

    public function processstatuses($idprocess)
    {
        return $this->hasOne(Userprocessstatus::class, 'id_user', 'id')->where('id_process', $idprocess)->first();
    }

    public function area()
    {
        return $this->hasOne(Areas::class, 'id', 'id_area')->latestOfMany();
    }

    public function position()
    {
        return $this->hasOne(Positions::class, 'id', 'id_position')->latestOfMany();
    }

    public function allConcepts()
    {
        return $this->hasMany(Concepts::class);
    }

    public function isSuperAdmin(): bool
    {
        return in_array($this->email, config('auth.super_admins'));
    }

    public function history()
    {
        return $this->hasMany(Userhistory::class, 'id_user');
    }

}
