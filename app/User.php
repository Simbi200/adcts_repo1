<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $table = 'users';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'password', 'username',
        'email_verified_at','first_name', 'last_name', 'email',
        'password', 'dob', 'sex', 'joined_on',
        'profile_pic', 'image', 'position', 'username', 'bio', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function phones()
    {
        return $this->hasMany('App\Phone');
    }

    public function emails()
    {
        return $this->hasMany('App\Email');
    }

    public function education()
    {
        return $this->belongsToMany('App\Education');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function tasks()
    {
        return $this->hasMany('App\Task');
    }



}
