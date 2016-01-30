<?php

use Illuminate\Database\Seeder;
use App\Tag;

class ProductTableSeeder extends Seeder
{

    public function run()
    {
        $shuffle = function($tags, $num)
        {
            $s=[];
            while($num>0)
            {
                $s[] = $tags[$num];
                $num--;
            }
            return $s;
        };
        $max= Tag::count();
        $tags =  Tag::lists('id');
        factory(App\Product::class, 15)->create()
            ->each(function($product)use($max, $tags, $shuffle)
        {
            $product->tags()->attach($shuffle($tags,rand(1, $max-1)));
        });
    }


}
