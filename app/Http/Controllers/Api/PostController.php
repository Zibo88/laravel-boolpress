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
    // dd($posts);
    // passo i dati
    $data = [
        'success' => true,
        'results' => $posts
    ];
    // dd($data);

    // chiedo che i dati siano passati in formato json
    return response()->json($data);

   }
}
