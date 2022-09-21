<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// importo il model
use App\Lead;

class LeadController extends Controller
{   
    // inserisco una funzione store() all'interno del controller, il nome è dato dal fatto che salva una nuova riga nel database
    // per leggere i dati provenienti dal form inserisco Request $request in store(), dato che la chiamata è eseguita con metodo post posso vedere i risultati solo tramite postman
    public function store(Request $request){
    //    richiamo tutti i dati
        $data = $request->all();
        // dd($data);
        // assegno a $new_lead una nuova istanza di Lead
        $new_lead = new Lead();

    }

}
