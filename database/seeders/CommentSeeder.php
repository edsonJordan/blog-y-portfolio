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
            Comment::factory(2)->create([
                'commentable_id'  => $post->id,
                'commentable_type' => Post::class,
                'user_id'       => User::all()->random()->id
            ]); 
        }
        foreach($videos as $video){
            Comment::factory(4)->create([
                'commentable_id'  => $video->id,
                'commentable_type' => Video::class,
                'user_id'       => User::all()->random()->id
            ]);
        }

    }
}
