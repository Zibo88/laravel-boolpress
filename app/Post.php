<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // eseguo il fillable sul model
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'slug',
        
    ];

    // definisco il tipo di relazione tra le tabelle, la fk è in post ed appartiene alla tabella gestista dal model Category
    public function category() {
        return $this->belongsTo('App\Category');
        // è possibile definire quale sia la foreignKey dando un secondo argomento
        // return $this->belongsTo('App\Category', 'category_id');
    }

    // definisco la relazione con il model tag
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

}
