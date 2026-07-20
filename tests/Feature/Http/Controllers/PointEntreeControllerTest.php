<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\PointEntree;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PointEntreeController
 */
final class PointEntreeControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $pointEntrees = PointEntree::factory()->count(3)->create();

        $response = $this->get(route('point-entrees.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PointEntreeController::class,
            'store',
            \App\Http\Requests\PointEntreeStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $title = fake()->sentence(4);
        $nom = fake()->word();
        $user = User::factory()->create();
        $belongsTo = fake()->word();

        $response = $this->post(route('point-entrees.store'), [
            'title' => $title,
            'nom' => $nom,
            'user_id' => $user->id,
            'belongsTo' => $belongsTo,
        ]);

        $pointEntrees = PointEntree::query()
            ->where('title', $title)
            ->where('nom', $nom)
            ->where('user_id', $user->id)
            ->where('belongsTo', $belongsTo)
            ->get();
        $this->assertCount(1, $pointEntrees);
        $pointEntree = $pointEntrees->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $pointEntree = PointEntree::factory()->create();

        $response = $this->get(route('point-entrees.show', $pointEntree));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PointEntreeController::class,
            'update',
            \App\Http\Requests\PointEntreeUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $pointEntree = PointEntree::factory()->create();
        $title = fake()->sentence(4);
        $nom = fake()->word();
        $user = User::factory()->create();
        $belongsTo = fake()->word();

        $response = $this->put(route('point-entrees.update', $pointEntree), [
            'title' => $title,
            'nom' => $nom,
            'user_id' => $user->id,
            'belongsTo' => $belongsTo,
        ]);

        $pointEntree->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($title, $pointEntree->title);
        $this->assertEquals($nom, $pointEntree->nom);
        $this->assertEquals($user->id, $pointEntree->user_id);
        $this->assertEquals($belongsTo, $pointEntree->belongsTo);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $pointEntree = PointEntree::factory()->create();

        $response = $this->delete(route('point-entrees.destroy', $pointEntree));

        $response->assertNoContent();

        $this->assertSoftDeleted($pointEntree);
    }
}
