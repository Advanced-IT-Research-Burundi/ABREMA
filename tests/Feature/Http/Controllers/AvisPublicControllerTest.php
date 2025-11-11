<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\AvisPublic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AvisPublicController
 */
final class AvisPublicControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $avisPublics = AvisPublic::factory()->count(3)->create();

        $response = $this->get(route('avis-publics.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AvisPublicController::class,
            'store',
            \App\Http\Requests\AvisPublicStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $title = fake()->sentence(4);
        $contenu = fake()->word();
        $description = fake()->text();

        $response = $this->post(route('avis-publics.store'), [
            'title' => $title,
            'contenu' => $contenu,
            'description' => $description,
        ]);

        $avisPublics = AvisPublic::query()
            ->where('title', $title)
            ->where('contenu', $contenu)
            ->where('description', $description)
            ->get();
        $this->assertCount(1, $avisPublics);
        $avisPublic = $avisPublics->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $avisPublic = AvisPublic::factory()->create();

        $response = $this->get(route('avis-publics.show', $avisPublic));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\AvisPublicController::class,
            'update',
            \App\Http\Requests\AvisPublicUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $avisPublic = AvisPublic::factory()->create();
        $title = fake()->sentence(4);
        $contenu = fake()->word();
        $description = fake()->text();

        $response = $this->put(route('avis-publics.update', $avisPublic), [
            'title' => $title,
            'contenu' => $contenu,
            'description' => $description,
        ]);

        $avisPublic->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($title, $avisPublic->title);
        $this->assertEquals($contenu, $avisPublic->contenu);
        $this->assertEquals($description, $avisPublic->description);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $avisPublic = AvisPublic::factory()->create();

        $response = $this->delete(route('avis-publics.destroy', $avisPublic));

        $response->assertNoContent();

        $this->assertSoftDeleted($avisPublic);
    }
}
