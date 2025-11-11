<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Colis;

class ColisFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Colis::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nom_prenom' => fake()->word(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->safeEmail(),
            'pathfile' => fake()->word(),
            'message' => fake()->text(),
        ];
    }
}
