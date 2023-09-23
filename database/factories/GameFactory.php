<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statusIds = Status::pluck('id');
        $categoryIds = Category::pluck('id');

        return 
        [
            "name" => $this->faker->words(3, true),
            "steamgrid_id" => $this->faker->randomNumber(4),
            "icon_url" => "ico",
            "status_id" => $statusIds->random(),
            "category_id" => $categoryIds->random(),
        ];
    }
}
