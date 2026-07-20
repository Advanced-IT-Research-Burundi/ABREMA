<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\TexteReglementaire;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TexteReglementaireController
 */
final class TexteReglementaireControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $texteReglementaires = TexteReglementaire::factory()->count(3)->create();

        $response = $this->get(route('texte-reglementaires.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TexteReglementaireController::class,
            'store',
            \App\Http\Requests\TexteReglementaireStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $title = fake()->sentence(4);
        $pathfile = fake()->word();
        $user = User::factory()->create();
        $belongsTo = fake()->word();

        $response = $this->post(route('texte-reglementaires.store'), [
            'title' => $title,
            'pathfile' => $pathfile,
            'user_id' => $user->id,
            'belongsTo' => $belongsTo,
        ]);

        $texteReglementaires = TexteReglementaire::query()
            ->where('title', $title)
            ->where('pathfile', $pathfile)
            ->where('user_id', $user->id)
            ->where('belongsTo', $belongsTo)
            ->get();
        $this->assertCount(1, $texteReglementaires);
        $texteReglementaire = $texteReglementaires->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $texteReglementaire = TexteReglementaire::factory()->create();

        $response = $this->get(route('texte-reglementaires.show', $texteReglementaire));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TexteReglementaireController::class,
            'update',
            \App\Http\Requests\TexteReglementaireUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $texteReglementaire = TexteReglementaire::factory()->create();
        $title = fake()->sentence(4);
        $pathfile = fake()->word();
        $user = User::factory()->create();
        $belongsTo = fake()->word();

        $response = $this->put(route('texte-reglementaires.update', $texteReglementaire), [
            'title' => $title,
            'pathfile' => $pathfile,
            'user_id' => $user->id,
            'belongsTo' => $belongsTo,
        ]);

        $texteReglementaire->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($title, $texteReglementaire->title);
        $this->assertEquals($pathfile, $texteReglementaire->pathfile);
        $this->assertEquals($user->id, $texteReglementaire->user_id);
        $this->assertEquals($belongsTo, $texteReglementaire->belongsTo);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $texteReglementaire = TexteReglementaire::factory()->create();

        $response = $this->delete(route('texte-reglementaires.destroy', $texteReglementaire));

        $response->assertNoContent();

        $this->assertSoftDeleted($texteReglementaire);
    }
}
