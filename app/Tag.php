<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // definisco la relazione tra i due model
    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}
