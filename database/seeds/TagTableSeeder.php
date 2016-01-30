<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Tag::class, 15)->create()->each(function($tag){
            var_dump($tag->id);
        });
    }
}
