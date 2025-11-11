<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Produit;

class ProduitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produit::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'designation_commerciale' => fake()->word(),
            'dci' => fake()->word(),
            'dosage' => fake()->word(),
            'forme' => fake()->word(),
            'conditionnement' => fake()->word(),
            'category' => fake()->word(),
            'nom_laboratoire' => fake()->word(),
            'pays_origine' => fake()->word(),
            'titulaire_amm' => fake()->word(),
            'pays_titulaire_amm' => fake()->word(),
            'num_enregistrement' => fake()->numberBetween(-10000, 10000),
            'date_amm' => fake()->date(),
            'statut_amm' => fake()->word(),
        ];
    }
}
