<?php
namespace Database\Factories;
require 'vendor/autoload.php';
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\Youtube;
//use Provider
use Illuminate\Support\Str;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
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
