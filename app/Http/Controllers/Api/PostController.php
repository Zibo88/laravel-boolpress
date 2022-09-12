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
    $post = Post::all();
    dd($post);
    
       
   }
}
