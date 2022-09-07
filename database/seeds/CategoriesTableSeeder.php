<?php

use Illuminate\Database\Seeder;
// importo il model
use App\Category;

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
        foreach ($categories as $category) {
            
            // ad ogni iterazione crea una nuova istanza di Category()
            $new_category = new Category();
        }
    }
}
