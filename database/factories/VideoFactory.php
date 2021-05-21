<?php
namespace Database\Factories;
//require 'vendor/autoload.php';
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

//use Provider
class VideoFactory extends Factory
{
    private $url = "https://www.googleapis.com/youtube/v3/videos";
    private $api = "AIzaSyBplDOjfmXig5zMZmawAsC3j8BKqf6N9zc";
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
        $data = app('youlink')->youtubeChannelUri();
       
        return [
            'name'  => $this->faker->unique()->sentence(),
            'description'  => $this->faker->text(250),
            'url' => $data,
            'status'    =>$this->faker->randomElement([1,2]),
            'user_id'       => User::all()->random()->id
        ];
    }
}
