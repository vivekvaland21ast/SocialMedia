<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class Profiles extends AuthenticatableUser implements Authenticatable
{
    use HasFactory;
    protected $table = 'profiles';
    protected $fillable = [
        'full_name',
        'username',
        'email',
        'password',
        'profile',
    ];

    protected $hidden = [
        'password',
    ];

    public function posts()
    {
        return $this->hasMany(Posts::class, 'user_id');
    }
}
