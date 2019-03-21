<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    //
    public function notes() 
    {
        return $this->hasMany('App\Note');
    }

}
