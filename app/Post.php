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

    // definisco il tipo di relazione tra le tabelle, la fk è in post ed appartiene alla tabella gestista dal model Category
    public function category() {
        return $this->belongsTo('App\Category');
    }

}
