<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use App\Models\Technology;
use App\Models\Technologyable;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(20)->create();
        $technologies = Technology::factory(10)->create();
        foreach ($posts as $post) {
            Image::factory(1)->create([
                'imageable_id'  => $post->id,
                'imageable_type' => Post::class
            ]);
            Technologyable::factory(1)->create([
                'technologyable_id'  => $post->id,
                'technologyable_type' => Post::class
            ]);
               
        }
        foreach($technologies as $technology){
            Technologyable::factory(1)->create([
                'technologyable_id'  => $technology->id,
                'technologyable_type' => Technology::class
            ]);
        }
    }
}
