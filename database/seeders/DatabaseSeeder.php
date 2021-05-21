<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Technology;
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
    {   Storage::delete('posts');
        Storage::makeDirectory('posts');
        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Technology::factory(8)->create();
        $this->call(PostSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
