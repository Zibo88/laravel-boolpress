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
        // validazione 
		$request->validate ($this->getValidation());				

        // leggo i dati provenienti dal form
        $form_data = $request->all();
        // dd($form_data);

        // creo nuova riga richiamando il model
        $new_post = new Post();

        // assegno i valori del form al fillable del model (in questo caso inseriamo titolo e contenuto)
        $new_post->fill($form_data);
        // dd($new_post);

       
        // eseguo assegnazione dello slug a mano e non con il fillable
        // $new_post->slug = $slug_to_save;

        // rieseguo l'assegnazione utilizzando la funzione
        $new_post->slug = $this->getSlugTitle($new_post->title);

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
        $post = Post::findOrFail($id);

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
        // richiamo il model per selezionare il post che stiamo modificando in base all'id
        $post = Post::FindOrFail($id);

        // trasferisco i dati alla view
        $data = [
            'post' => $post
        ];
        // mostra la pagina della view di riferimento
        return view('admin.posts.edit' , $data);

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

    // la funzione necessita di un argomento, il $title, da cui poi estrapolerà lo slug
    protected function getSlugTitle($title){
         // per i dati che invece vogliamo aggiungere a mano
        // lo slug necessita della classe Str per essere formattato nel modo corretto
        //modifico lo slug così da averne uno potenzialmente salvabile
        // $new_post->slug = Str::slug($new_post->title , '-');
        $slug_to_save = Str::slug($title, '-');

        // creo uno slug base prima di avviare il ciclo while così da non avere il counter
        $slug_base = $slug_to_save;

        // verifico la presenza dello slug
        $existing_slug = Post::where('slug', '=', $slug_to_save )->first();
        // se trova un post torna l'elemento altrimenti torna null
        // dd($existing_slug);

        // creo il ciclo while per leggere gli slug esistenti, il ciclo andrà avanti finchè $existing_slug non sarà null
        $counter = 1;
        while($existing_slug){
            // creiamo un nuovo slug appendendo allo slug base il numero dato dal counter
            $slug_to_save = $slug_base . '-' . $counter;
            // verifico la presenza dello slug
            $existing_slug = Post::where('slug', '=', $slug_to_save )->first();
            // incremento
            $counter++;
        };

        // il return sarà lo slug potenialmente salvabile
        return $slug_to_save;
    }

    // funzione per la validazione
    protected function getValidation(){
        return[
		    'title' => 'required | max:255',
			'content' => 'required | max:60000'
		];				

    }
}
