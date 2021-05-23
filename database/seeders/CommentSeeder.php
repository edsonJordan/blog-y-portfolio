<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::all();
        $videos = Video::all();
        foreach ($posts as $post) {
            Comment::factory(20)->create([
                'commentable_id'  => $post->id,
                'commentable_type' => Post::class,
            ]); 
        }
        foreach($videos as $video){
            Comment::factory(10)->create([
                'commentable_id'  => $video->id,
                'commentable_type' => Video::class,
            ]);
        }

    }
}
