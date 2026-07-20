<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\PointEntree;
use App\Models\User;

class PointEntreeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PointEntree::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(4),
            'nom' => fake()->word(),
            'user_id' => User::factory(),
            'belongsTo' => fake()->word(),
        ];
    }
}
