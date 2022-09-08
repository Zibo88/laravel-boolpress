<?php

use Illuminate\Database\Seeder;
// importo il model
use App\Tag;

// importo la classe str
use Illuminate\Support\Str;


class TagsSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // i tags nel database saranno 4
        $tags = [
            'Vegetario',
            'Piatto Freddo',
            'Vegano',
            'Gluten Free',
        ];

        // avvio ciclo foreach per leggere il contenuto dei tags
        foreach ($tags as $tag) {
            
            // ad ogni iterazione creo un nuova istanza del model tag
            $new_tag = new Tag();

            // popolo le righe della tabella
            $new_tag->name = $tag;

            // utilizzo la classe str per creare lo slug
            $new_tag->slug = Str::slug( $new_tag->name, '-');

            // salvo
            $new_tag->save();
        }

        
    }
}
