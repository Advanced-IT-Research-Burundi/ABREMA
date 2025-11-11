<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Partenaire;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PartenaireController
 */
final class PartenaireControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $partenaires = Partenaire::factory()->count(3)->create();

        $response = $this->get(route('partenaires.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PartenaireController::class,
            'store',
            \App\Http\Requests\PartenaireStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $nom = fake()->word();
        $logo = fake()->word();
        $description = fake()->text();

        $response = $this->post(route('partenaires.store'), [
            'nom' => $nom,
            'logo' => $logo,
            'description' => $description,
        ]);

        $partenaires = Partenaire::query()
            ->where('nom', $nom)
            ->where('logo', $logo)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $partenaires);
        $partenaire = $partenaires->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $partenaire = Partenaire::factory()->create();

        $response = $this->get(route('partenaires.show', $partenaire));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PartenaireController::class,
            'update',
            \App\Http\Requests\PartenaireUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $partenaire = Partenaire::factory()->create();
        $nom = fake()->word();
        $logo = fake()->word();
        $description = fake()->text();

        $response = $this->put(route('partenaires.update', $partenaire), [
            'nom' => $nom,
            'logo' => $logo,
            'description' => $description,
        ]);

        $partenaire->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($nom, $partenaire->nom);
        $this->assertEquals($logo, $partenaire->logo);
        $this->assertEquals($description, $partenaire->description);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $partenaire = Partenaire::factory()->create();

        $response = $this->delete(route('partenaires.destroy', $partenaire));

        $response->assertNoContent();

        $this->assertSoftDeleted($partenaire);
    }
}
