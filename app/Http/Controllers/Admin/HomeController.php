<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// importo la classe Auth
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Tag;
class HomeController extends Controller
{
    public function index(){
        $post = Post::find(4);
        dd($post);
        // utilizzo la classe Auth così da avere un'istanza per ogni utente registrato
        $user = Auth::user();

        // passo tutto alla view tramite i data
        $data = [
            'user' => $user
        ];
       
        return view ('admin.home', $data);
    }
};
