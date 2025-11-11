<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Produit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProduitController
 */
final class ProduitControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $produits = Produit::factory()->count(3)->create();

        $response = $this->get(route('produits.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProduitController::class,
            'store',
            \App\Http\Requests\ProduitStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $designation_commerciale = fake()->word();
        $dci = fake()->word();
        $dosage = fake()->word();
        $forme = fake()->word();
        $conditionnement = fake()->word();
        $category = fake()->word();
        $nom_laboratoire = fake()->word();
        $pays_origine = fake()->word();
        $titulaire_amm = fake()->word();
        $pays_titulaire_amm = fake()->word();
        $num_enregistrement = fake()->numberBetween(-10000, 10000);
        $date_amm = Carbon::parse(fake()->date());
        $statut_amm = fake()->word();

        $response = $this->post(route('produits.store'), [
            'designation_commerciale' => $designation_commerciale,
            'dci' => $dci,
            'dosage' => $dosage,
            'forme' => $forme,
            'conditionnement' => $conditionnement,
            'category' => $category,
            'nom_laboratoire' => $nom_laboratoire,
            'pays_origine' => $pays_origine,
            'titulaire_amm' => $titulaire_amm,
            'pays_titulaire_amm' => $pays_titulaire_amm,
            'num_enregistrement' => $num_enregistrement,
            'date_amm' => $date_amm->toDateString(),
            'statut_amm' => $statut_amm,
        ]);

        $produits = Produit::query()
            ->where('designation_commerciale', $designation_commerciale)
            ->where('dci', $dci)
            ->where('dosage', $dosage)
            ->where('forme', $forme)
            ->where('conditionnement', $conditionnement)
            ->where('category', $category)
            ->where('nom_laboratoire', $nom_laboratoire)
            ->where('pays_origine', $pays_origine)
            ->where('titulaire_amm', $titulaire_amm)
            ->where('pays_titulaire_amm', $pays_titulaire_amm)
            ->where('num_enregistrement', $num_enregistrement)
            ->where('date_amm', $date_amm)
            ->where('statut_amm', $statut_amm)
            ->get();
        $this->assertCount(1, $produits);
        $produit = $produits->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $produit = Produit::factory()->create();

        $response = $this->get(route('produits.show', $produit));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProduitController::class,
            'update',
            \App\Http\Requests\ProduitUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $produit = Produit::factory()->create();
        $designation_commerciale = fake()->word();
        $dci = fake()->word();
        $dosage = fake()->word();
        $forme = fake()->word();
        $conditionnement = fake()->word();
        $category = fake()->word();
        $nom_laboratoire = fake()->word();
        $pays_origine = fake()->word();
        $titulaire_amm = fake()->word();
        $pays_titulaire_amm = fake()->word();
        $num_enregistrement = fake()->numberBetween(-10000, 10000);
        $date_amm = Carbon::parse(fake()->date());
        $statut_amm = fake()->word();

        $response = $this->put(route('produits.update', $produit), [
            'designation_commerciale' => $designation_commerciale,
            'dci' => $dci,
            'dosage' => $dosage,
            'forme' => $forme,
            'conditionnement' => $conditionnement,
            'category' => $category,
            'nom_laboratoire' => $nom_laboratoire,
            'pays_origine' => $pays_origine,
            'titulaire_amm' => $titulaire_amm,
            'pays_titulaire_amm' => $pays_titulaire_amm,
            'num_enregistrement' => $num_enregistrement,
            'date_amm' => $date_amm->toDateString(),
            'statut_amm' => $statut_amm,
        ]);

        $produit->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($designation_commerciale, $produit->designation_commerciale);
        $this->assertEquals($dci, $produit->dci);
        $this->assertEquals($dosage, $produit->dosage);
        $this->assertEquals($forme, $produit->forme);
        $this->assertEquals($conditionnement, $produit->conditionnement);
        $this->assertEquals($category, $produit->category);
        $this->assertEquals($nom_laboratoire, $produit->nom_laboratoire);
        $this->assertEquals($pays_origine, $produit->pays_origine);
        $this->assertEquals($titulaire_amm, $produit->titulaire_amm);
        $this->assertEquals($pays_titulaire_amm, $produit->pays_titulaire_amm);
        $this->assertEquals($num_enregistrement, $produit->num_enregistrement);
        $this->assertEquals($date_amm, $produit->date_amm);
        $this->assertEquals($statut_amm, $produit->statut_amm);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $produit = Produit::factory()->create();

        $response = $this->delete(route('produits.destroy', $produit));

        $response->assertNoContent();

        $this->assertSoftDeleted($produit);
    }
}
