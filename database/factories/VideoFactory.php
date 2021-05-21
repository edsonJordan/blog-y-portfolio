<?php
namespace Database\Factories;
//require 'vendor/autoload.php';
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

//use Provider
class VideoFactory extends Factory
{
    private $api_key = "AIzaSyBplDOjfmXig5zMZmawAsC3j8BKqf6N9zc";
    private $chanel = "UCKE0n8MjLe4GftpkUEkcmRw";

    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      //$this->Provider->Youtube->youtubeUri()
     /*  $url = \Faker\Factory::create();
      $url->addProvider(new \Faker\Provider\Youtube($url)); */

            $data = app('youlink')->GetLink();
      /*   $video = Http::get("https://www.googleapis.com/youtube/v3/search?key="
         . $this->api_key . "&channelId=" 
         . $this->chanel . "&part=snippet,id&order=date&maxResults=5");
            $videos = $video->json(); */
            /* foreach ($videos['items'] as $item){
                $item['id']['videoId'];
                $videos['items'][0]['id']['videoId']
            } */
        return [
            'name'  => $this->faker->unique()->sentence(),
            'description'  => $this->faker->text(250),
            'url' => $data,
            'status'    =>$this->faker->randomElement([1,2]),
            'user_id'       => User::all()->random()->id
        ];
    }
}
