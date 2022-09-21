<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeadController extends Controller
{   
    // inserisco una funzione store() all'interno del controller, il nome è dato dal fatto che salva una nuova riga nel database
    public function store(){
        dd('crea nuovo leed');
    }

}
