<?php

use Illuminate\Database\Seeder;
// importo il model
use App\Category;
// importo la classe Str per lo slug
use Illuminate\Support\Str;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // definisco le categorie
        $categories = [
			'Antipasti',
			'Primi',
			'Secondi',
			'Dessert',
		];

        // per ogni elemento presente in categories stampa una nuova riga
        foreach ($categories as $category_name) {
            
            // ad ogni iterazione crea una nuova istanza di Category()
            $new_category = new Category();

            // popolo le colonne della tabella categories
            $new_category->name = $category_name;

            // uso la classe STR per compilare lo slug
            $new_category->slug = Str::slug($category_name, '-');

            // salvo
            $new_category->save();
            

        }
    }
}
