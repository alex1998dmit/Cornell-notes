<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{

    // protected $fillable = ['isOpen', 'leftColumn', 'rightColumn', 'botterColumn', 'theme', 'subject_id'];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function folder()
    {
        return $this->belongsToMany('App\Folder');
    }

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }
}
