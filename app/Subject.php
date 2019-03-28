<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //

    protected $fillable = ['name', 'user_id'];

    public function note()
    {
        return $this->hasMany('App\Note');
    }

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
}
