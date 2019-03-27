<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    //
    protected $fillable = ['note_id', 'name'];

    public function notes() 
    {
        return $this->hasMany('App\Note');
    }

}
