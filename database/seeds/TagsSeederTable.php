<?php

use Illuminate\Database\Seeder;
// importo il model
use App\Tag;

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

        
    }
}
