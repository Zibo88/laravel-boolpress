<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// importo Carbon
use Carbon\Carbon;

// importo il MOdel per poter utilizzare il database
use App\Post;

// importo la class Str per lo slug
use Illuminate\Support\Str;

// importo il model del tabella categories
use App\Category;

// importo il model dei tag
use App\Tag;

// importo la classe Storage per il salvataggio delle immagini provenienti dal form in una cartella in locale
use Illuminate\Support\Facades\Storage;

//importo la classe mail
use Illuminate\Support\Facades\Mail;

//importo l'oggetto mail creato
use App\Mail\NewPostAdminEmail;



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
        $posts = Post::paginate(6);
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
        // accedo a tutti i dati della tabella attraverso il model
        $categories = Category::all();

        // accedo ai dati della tabella tags attraverso il model
        $tags = Tag::all();

        // passo i dati alla view
        $data = [
            'categories' => $categories,
            'tags' => $tags
        ];
        // richiamo la view create per la visualizzazione del form
        return view('admin.posts.create',$data);
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

        // se form_data['image'] ?? settato
        if(isset($form_data['image'])) {
            // salvo il path dell'immagine proveninete dal form attraverso la classe Storage all'interno della cartella post-covers
            $img_path = Storage::put('post-covers', $form_data['image']);
            
            // salvo i dati nel database indicando la colonna e il valore che dovr?? avere nel database
            $form_data['cover'] = $img_path;
        }
       
        // creo nuova riga richiamando il model
        $new_post = new Post();

        // assegno i valori del form al fillable del model 
        $new_post->fill($form_data);
        // dd($new_post);

       
        // eseguo assegnazione dello slug a mano e non con il fillable
        // $new_post->slug = $slug_to_save;

        // rieseguo l'assegnazione utilizzando la funzione
        $new_post->slug = $this->getSlugTitle($new_post->title);

        // salviamo il post
        $new_post->save();

      

        // eseguo il salvaggio dei tag, solo se i dati del form relativi all'array tags sono settati
        if(isset($form_data['tags'])){
            $new_post->tags()->sync($form_data['tags']);
        }

          // invio una mail quando un post viene creato
        // inserendo $new_post come argomento all'interno della nuova istanza cos?? che sia disponibile nella stessa
        Mail::to('webadmin@internal.it')->send(new NewPostAdminEmail($new_post));
        


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
        // creo una nuova istanza di Carbon
        // $now = Carbon::now();
        // dd($now);

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

        // richiamo tutti i dati dalla tabella categories attraverso il suo model
        $categories = Category::all();

        //richiamo il model dei tag per leggere i tag all'interno di edit
        $tags = Tag::all();

        // trasferisco i dati alla view
        $data = [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ];
        // mostra la pagina della view di riferimento
        return view('admin.posts.edit',$data);

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
        // esegui validazioni
        $request->validate($this->getValidation());
        // richiamo tutti i dati del form
        $form_data = $request->all();

        // richiamo il model e definisco l'id del post che vogliamo modificare
        $post_to_update = Post::FindOrFail($id);

        // se form_data['image'] ?? settato(quindi continene una foto), 
        if(isset($form_data['image'])) {
            // Se il post da aggiornare ha una colonna cover associata
            if($post_to_update->cover) {
                // Cancello dal disco l'immagine vecchia
                Storage::delete($post_to_update->cover);
            }
        }

        // eseguo l'upload della nuova img dentro i la cartella post-covers
        $img_path = Storage::put('post-covers', $form_data['image']);

        // assegno a form_data la colonna cover e gli assegno il valore del path
        $form_data['cover'] = $img_path;

        // se il nuovo titolo ?? diverso dal vecchio titolo
        if($form_data['title'] !== $post_to_update->title){
             // compilazione dello slug
            $form_data['slug'] = $this->getSlugTitle($form_data['title']);
        }else{
            // altrimenti sar?? uguale al vecchio titolo
            $form_data['slug'] = $post_to_update->title;
        };

        // eseguo l'update dei dati form??niti dal form
        $post_to_update->update($form_data);

        // se l'utente ha settato, checckato le check box, torna la relazione
        if(isset($form_data['tags'])){
			$post_to_update->tags()->sync($form_data['tags']);
            // altrimenti torna un array vuoto
		}else{
			$post_to_update->tags()->sync([]);
		}


        // eseguo una redirect alla pagina del prodotto creato
        return redirect()->route('admin.posts.show' , ['post' => $post_to_update->id]);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        // richiamo tutti i post tramite il model analizzandoli per id
        $post_to_delete = Post::FindOrFail($id);

        // se il post da cancellare ha una colonna cover popolata
        if($post_to_delete->cover){
            // elimina dallo storage la colonna cover collegata a quel post
            Storage::delete($post_to_delete->cover);
        }
       

        // eseguo la cancellazione della relazione, prima di eliminare il post
        $post_to_delete->tags()->sync([]);


        // eseguo la cancellazione
        $post_to_delete->delete();

        // reindirizzo l'utente alla pagina con tutti i posts
        return redirect()->route('admin.posts.index');
    }

    // la funzione necessita di un argomento, il $title, da cui poi estrapoler?? lo slug
    protected function getSlugTitle($title){
         // per i dati che invece vogliamo aggiungere a mano
        // lo slug necessita della classe Str per essere formattato nel modo corretto
        //modifico lo slug cos?? da averne uno potenzialmente salvabile
        // $new_post->slug = Str::slug($new_post->title , '-');
        $slug_to_save = Str::slug($title, '-');

        // creo uno slug base prima di avviare il ciclo while cos?? da non avere il counter
        $slug_base = $slug_to_save;

        // verifico la presenza dello slug
        $existing_slug = Post::where('slug', '=', $slug_to_save )->first();
        // se trova un post torna l'elemento altrimenti torna null
        // dd($existing_slug);

        // creo il ciclo while per leggere gli slug esistenti, il ciclo andr?? avanti finch?? $existing_slug non sar?? null
        $counter = 1;
        while($existing_slug){
            // creiamo un nuovo slug appendendo allo slug base il numero dato dal counter
            $slug_to_save = $slug_base . '-' . $counter;
            // verifico la presenza dello slug
            $existing_slug = Post::where('slug', '=', $slug_to_save )->first();
            // incremento
            $counter++;
        };

        // il return sar?? lo slug potenialmente salvabile
        return $slug_to_save;
    }

    // funzione per la validazione
    protected function getValidation(){
        return[
		    'title' => 'required | max:255',
			'content' => 'required | max:60000',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'nullable|exists:tags,id',
            'image' => 'image|max:1024|nullable'
		];				

    }
}
