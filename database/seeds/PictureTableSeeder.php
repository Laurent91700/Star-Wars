<?php

use Illuminate\Database\Seeder;
use App\Picture;

class PictureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $faker;

    public function __construct(Faker\Generator $faker){
        $this->faker = $faker;
    }

    public function run()
    {
        // remplacer par la function ci-dessus
        //pour récupérer le faker opérationnel dans le script
//        $faker = Faker\factory::create();
        $files = Storage::allFiles();
        foreach($files as $file){
            Storage::delete($file);
        }

        $products = App\Product::all();
        foreach($products as $product){
            //str_random(12) va généré une chaine aleatoire de 12 caracteres
            $uri = str_random(12) . '_370x235.jpg';
            Storage::put(
                $uri,
                // recupere le contenu de l'image
                file_get_contents('http://lorempixel.com/futurama/370/235/')
            );

            Picture::create([
                'uri' => $uri,
                'title' => $this->faker->name,
                'product_id' => $product->id

            ]);
        }
    }
}
