<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;
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
        $name = $this->faker->unique()->sentence();
        return [
            'name'  => $name,
            'slug'  => Str::slug($name),
            'extract'=> $this->faker->text(250),
            'status'    =>$this->faker->randomElement([0,1]),
            'user_id'       => User::all()->random()->id
        ];
    }
}
