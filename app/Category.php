<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // definiscola relazione, ogni category ha più post 
    public function post() {
        return $this->hasMany('App\Post');
    }
}
