<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\EquipeDirection;
use App\Models\User;

class EquipeDirectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EquipeDirection::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nom_prenom' => fake()->word(),
            'photo' => fake()->word(),
            'description' => fake()->text(),
            'email' => fake()->safeEmail(),
            'user_id' => User::factory(),
            'belongsTo' => fake()->word(),
        ];
    }
}
