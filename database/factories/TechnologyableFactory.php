<?php

namespace Database\Factories;

use App\Models\Technologyable;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Factories\Factory;

class TechnologyableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Technologyable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      
        return [
            'technology_id' => Technology::all()->random()->id
        ];
    }
}
