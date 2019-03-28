<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    //
    protected $fillable = ['note_id', 'name'];

    public function note()
    {
        return $this->hasMany('App\Note');
    }

}
