<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //

    protected $fillable = ['name'];

    public function note()
    {
        return $this->hasMany('App\Note');
    }
}
