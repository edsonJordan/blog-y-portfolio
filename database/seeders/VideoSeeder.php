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
        //"https://www.youtube.com/watch?v="
        // 'url' => "https://www.youtube.com/watch?v=".$dato['snippet']['videoId']['thumbnails']['default'],
        $datos = app('youlink')->GetLink();
        foreach ($datos['items'] as $dato) {
            Video::factory(8)->create([
                'tittle'  => $dato['snippet']['title'],
                'description'  => $dato['snippet']['description'],
                'url' => $dato['id']['videoId'],
            ]);
            //,
        }
        //
    }
}
