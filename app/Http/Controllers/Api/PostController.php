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
    //    controllo se leggo lo slug dall'url
        // dd($slug);

        // ricerco attraverso il Model tutti i post che hanno 'slug' uguale alla variabile passata come argomento
        // per permettere una join tra i post e itags e le categorie utilizziamo ->with(['']), così che ogni post abbia la sua categoria e i suoi post
        $post = Post::where('slug', '=', $slug)->with(['tags', 'category'])->first();
        
        // passo i dati a $data
        $data = [
            'success' => true,
            'post' => $post
        ];

        // espongo i dati in formto json
        return response()->json($data);
   }
}
