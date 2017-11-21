<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Project extends Model
{
    protected $fillable=['name','description','start_date','end_date','user_id'];

    public function manager(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function users(){
        return $this->belongsToMany(User::class)->orderBy('name','asc');
    }
    public  function modules(){
        return $this->hasMany(Module::class);
    }

}
