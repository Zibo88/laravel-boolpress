<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// importo il model che contiene i dati del db
use App\Post;

class PostController extends Controller
{
   public function index(){

    // chiedo al model di mostrare 6 elementi per pagina
    $posts = Post::paginate(6);

    // passo i dati
    $data = [
        'success' => true,
        'results' => $posts
    ];
    // dd($data);

    // chiedo che i dati siano passati in formato json
    return response()->json($data);

   }

//    passo come argomento alla funzione $slug che fungerà da chiave univoca
   public function show($slug){
        dd($slug);
   }
}
