<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::slug($this->faker->name, '_'),
            'subtitle' => $this->faker->sentence(3),
            'content' => $this->faker->randomHtml(),
            'icon' => $this->faker->image(null, 80, 80),
        ];
    }
}
