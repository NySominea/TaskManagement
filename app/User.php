<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','nickname','gender','image'
    ];

    public function setPasswordAttribute($pass){
        $this->attributes['password']=Hash::make($pass);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function leader_projects(){
        return $this->hasMany(Project::class);
    }

    public function projects(){
        return $this->belongsToMany(Project::class)->orderBy('name','asc');
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }


}
