<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{    
    public function users() 
    {
        return $this->belongsToMany('App\User');
    }

    public function folders() 
    {
        return $this->belongsToMany('App\Folder');
    }

    public function subjects() 
    {
        return $this->hasMany('App\Subject');
    }
}
