<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Partenaire;
use App\Models\User;

class PartenaireFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Partenaire::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->word(),
            'logo' => fake()->word(),
            'description' => fake()->text(),
            'user_id' => User::factory(),
            'belongsTo' => fake()->word(),
        ];
    }
}
