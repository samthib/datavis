<?php

namespace Database\Factories;

use App\Models\Design;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Design::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'active' => 1,
            'title' => $this->faker->name,
            'subtitle' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(7),
            'hero' =>$this->faker->imageUrl(640, 480, 'animals', true),
            'logo' =>$this->faker->imageUrl(640, 480, 'animals', true),
            'color' => $this->faker->hexColor(),
        ];
    }
}
