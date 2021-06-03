<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use App\Models\Technology;
use App\Models\Technologyable;
use App\Models\Video;
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
        $posts = Post::factory(100)->create();
        $technologies = Technology::factory(20)->create();

        foreach ($posts as $post) {
            Image::factory(1)->create([
                'imageable_id'  => $post->id,
                'imageable_type' => Post::class
            ]);

            Technologyable::factory(1)->create([
                'technologyable_id'  => Post::all()->random()->id,
                'technologyable_type' => Post::class
            ]);
               
        }
        foreach($technologies as $technology){
            Technologyable::factory(1)->create([
                'technologyable_id'  => Video::all()->random()->id,
                'technologyable_type' => Video::class
            ]);
        }
    }
}
