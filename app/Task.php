<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable=['name','status','module_id','user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function module(){
        return $this->belongsTo(Module::class);
    }
}
