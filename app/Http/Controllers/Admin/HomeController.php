<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// importo la classe Auth
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        // utilizzo la classe Auth così da avere un'istanza per ogni utente registrato
        $user = Auth::user();

        // passo tutto alla view tramite i data
        $data = [
            'user' => $user
        ];
       
        return view ('admin.home', $data);
    }
};
