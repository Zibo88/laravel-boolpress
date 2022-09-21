<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    // assegno alle colonne il fillable per permettere poi il mass-assignment
    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}
