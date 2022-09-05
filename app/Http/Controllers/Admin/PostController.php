<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// importo il MOdel per poter utilizzare il database
use App\Post;

// importo la class Str per lo slug
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // richiamo il Model e gli chiedo tutto il database
        $posts = Post::all();
        // controllo 
        // dd($posts)
        // invio i dati alla view admin.posts.index
        $data = [
            'posts' => $posts
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // richiamo la view create per la visualizzazione del form
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // leggo i dati provenienti dal form
        $form_data = $request->all();
        // dd($form_data);

        // creo nuova riga richiamando il model
        $new_post = new Post();

        // assegno i valori del form al fillable del model (in questo caso inseriamo titolo e contenuto)
        $new_post->fill($form_data);
        // dd($new_post);

        // per i dati che invece vogliamo aggiungere a mano
        // lo slug necessita della classe Str per essere formattato nel modo corretto
        //modifico lo slug così da averne uno potenzialmente salvabile
        // $new_post->slug = Str::slug($new_post->title , '-');
        $slug_to_save = Str::slug($new_post->title , '-');


        // salviamo il post
        $new_post->save();


        // reindirizzo l'utente verso il post appena creato avvelendomi dell'id
        return redirect()->route('admin.posts.show', ['post' => $new_post->id]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // richiamo il model ed eseguo la ricerca per id
        $post = Post::find($id);

        // passo i dati alla show
        $data =[
            'post' => $post
        ];

        // eseguo il return per mostrare il singolo prodotto
        return view ('admin.posts.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
