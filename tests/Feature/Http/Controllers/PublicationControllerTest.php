<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Publication;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PublicationController
 */
final class PublicationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $publications = Publication::factory()->count(3)->create();

        $response = $this->get(route('publications.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PublicationController::class,
            'store',
            \App\Http\Requests\PublicationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $title = fake()->sentence(4);
        $description = fake()->text();
        $image = fake()->word();
        $user = User::factory()->create();
        $belongsTo = fake()->word();

        $response = $this->post(route('publications.store'), [
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'user_id' => $user->id,
            'belongsTo' => $belongsTo,
        ]);

        $publications = Publication::query()
            ->where('title', $title)
            ->where('description', $description)
            ->where('image', $image)
            ->where('user_id', $user->id)
            ->where('belongsTo', $belongsTo)
            ->get();
        $this->assertCount(1, $publications);
        $publication = $publications->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $publication = Publication::factory()->create();

        $response = $this->get(route('publications.show', $publication));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PublicationController::class,
            'update',
            \App\Http\Requests\PublicationUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $publication = Publication::factory()->create();
        $title = fake()->sentence(4);
        $description = fake()->text();
        $image = fake()->word();
        $user = User::factory()->create();
        $belongsTo = fake()->word();

        $response = $this->put(route('publications.update', $publication), [
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'user_id' => $user->id,
            'belongsTo' => $belongsTo,
        ]);

        $publication->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($title, $publication->title);
        $this->assertEquals($description, $publication->description);
        $this->assertEquals($image, $publication->image);
        $this->assertEquals($user->id, $publication->user_id);
        $this->assertEquals($belongsTo, $publication->belongsTo);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $publication = Publication::factory()->create();

        $response = $this->delete(route('publications.destroy', $publication));

        $response->assertNoContent();

        $this->assertSoftDeleted($publication);
    }
}
