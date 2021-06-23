<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Technology;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        //Technology::factory(8)->create();
        //Video::factory(10)->create();
        $this->call(VideoSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(CommentSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
