<?php

namespace Database\Factories;

use App\Models\Chart;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->name;

        return [
            'slug' => Str::slug($title, '_'),
            'title' => $title,
            'subtitle' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'js' => $this->faker->text(),
            'css' => $this->faker->text(),
            'available' => 1,
        ];
    }
}
