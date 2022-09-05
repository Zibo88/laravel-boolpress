<?php

use Illuminate\Database\Seeder;
// importo la libreria faker
use Faker\Generator as Faker;
// importo il model
use App\Post;
// importo la classe Str
use Illuminate\Support\Str;
 

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 1; $i < 10; $i++){
            // creo una nuova riga
            $new_post = new Post();
            // popolo le righe
            // ucfirst crea la prima parola maiuscola
            $new_post->title = ucfirst($faker->words(rand(2, 7), true)); 
            $new_post->content = $faker->paragraphs(rand(2, 5) , true);
            // utilizzo la classe str per creare un url friendly
            $new_post->slug = Str::slug($new_post->title, '-');
            // salvo le modifiche
            $new_post->save();

        }
    }
}
