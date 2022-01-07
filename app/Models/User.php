<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role',
        'email',
        'password',
        'company_name',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function offers(){
        return $this->hasMany(Offer::class);
    }
    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function accommodations(){
        return $this->hasMany(Accommodation::class);
    }
    public function showAvatar()
    {
        return $this->avatar == null ? asset('img/images/user.png') : asset('storage/avatars/' . $this->avatar);
    }
    public function isAdmin()
    {
        return $this->role == 'Admin';
    }
    public function hasRole($role)
    {
        return $this->role == $role;
    }
    public function hasRoleOrIsAdmin($role)
    {
        return $this->isAdmin() || $this->hasRole($role);
    }
}
