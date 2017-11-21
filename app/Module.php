<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable=['name','start_date','end_date','priority','project_id'];
    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
