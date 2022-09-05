<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // eseguo il fillable sul model
    protected $fillable = [
        'title',
        'content',
        'slug'
    ];

}
