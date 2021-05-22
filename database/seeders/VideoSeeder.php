<?php

namespace Database\Seeders;

use App\Models\Video;
use Database\Factories\VideoFactory;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos = app('youlink')->GetLink();
        foreach ($datos['items'] as $dato) {
            Video::factory(4)->create([
                'url' => "https://www.youtube.com/watch?v=".$dato['id']['videoId'],
            ]);
            //,
        }
        //
    }
}
