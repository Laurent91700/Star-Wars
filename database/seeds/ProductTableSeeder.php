<?php

use Illuminate\Database\Seeder;
use App\Tag;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

//    protected $tag;
//    public function __construct(Tag $tag)
//    {
//        $this->tag = $tag;
//    }

    public function run()
    {
        //
        // factory(App\Product::class, 15)->create();
       /* factory(App\Product::class, 15)->create()->each(function($product){
            var_dump($product->id);
        });*/

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
        // $max = $this->tag->count();
        // équivcalent à :
        $max= Tag::count();
        // $tags = $this->tag->lists('id');
        // équivalent à:
        $tags =  Tag::lists('id');
        factory(App\Product::class, 15)->create()
            ->each(function($product)use($max, $tags, $shuffle)
        {
            $product->tags()->attach($shuffle($tags,rand(1, $max-1)));
        });
    }


}
