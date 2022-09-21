<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// importo il model
use App\Lead;
// importo la classe validator per la validazione
use Illuminate\Support\Facades\Validator;
// importo la Facades Mail
use Illuminate\Support\Facades\Mail;
// importo la classe mail creata per inviare la mail all'utente
use App\Mail\ContactThankyouEmail;

class LeadController extends Controller
{   
    // inserisco una funzione store() all'interno del controller, il nome è dato dal fatto che salva una nuova riga nel database
    // per leggere i dati provenienti dal form inserisco Request $request in store(), dato che la chiamata è eseguita con metodo post posso vedere i risultati solo tramite postman
    public function store(Request $request){
    //    richiamo tutti i dati
       $data = $request->all();

        // utilizzo la classe validator assegnado come primo parametro idati provenienti dal dal form che sono racchiusi in $data e com secondo argomento le regole di validazione
        $validator = Validator::make($data, [
            'name' => 'required | max:255',
            'email' => 'required | max:255',
            'message' => 'required | max:60000',
        ]);

        // Nel caso in cui la validazione fallisca
        if($validator->fails()) {
            // ritornerà un file json in cui success => false, 
            return response()->json([
                'success' => false,
                // errors sarà un array con tutti gli errori
                'errors' => $validator->errors()
            ]);
        }

    //    assegno una nuova istanza di Lead a $new_lead
       $new_lead = new Lead();
        // eseguo il mass-assigment
       $new_lead->fill($data);
        // salvo
       $new_lead->save();

        // invio la mail all'utente, l'indirizzo a cui inviare la mail lo troviamo dentro $data nella chiave email. Inviamo quindi un'istanza della classe ContactThankyouEmail che mostrerà la sua view 
        Mail::to($data['email'])->send(new ContactThankyouEmail());

        // chiedo alla funzione di ritornare succes -> true se la chiamata è andata a buon fine
       return response()->json([
           'success' => true
       ]);
        
       
    }

}
