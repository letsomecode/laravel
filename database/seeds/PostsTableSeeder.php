<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Post::class)->state('published')->times(5)->create();
        factory(\App\Post::class)->times(2)->create();
    }
}

