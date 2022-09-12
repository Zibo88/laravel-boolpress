<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// importo il model che contiene i dati del db
use App\Post;

class PostController extends Controller
{
   public function index(){

    // richiamo con il model tutti i post
    $posts = Post::all();
   
    // passo i dati
    $data = [
        'results' => $posts
    ];

    
       
   }
}
