<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ImageLabo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ImageLaboController
 */
final class ImageLaboControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $imageLabos = ImageLabo::factory()->count(3)->create();

        $response = $this->get(route('image-labos.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ImageLaboController::class,
            'store',
            \App\Http\Requests\ImageLaboStoreRequest::class
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

        $response = $this->post(route('image-labos.store'), [
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'user_id' => $user->id,
            'belongsTo' => $belongsTo,
        ]);

        $imageLabos = ImageLabo::query()
            ->where('title', $title)
            ->where('description', $description)
            ->where('image', $image)
            ->where('user_id', $user->id)
            ->where('belongsTo', $belongsTo)
            ->get();
        $this->assertCount(1, $imageLabos);
        $imageLabo = $imageLabos->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $imageLabo = ImageLabo::factory()->create();

        $response = $this->get(route('image-labos.show', $imageLabo));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ImageLaboController::class,
            'update',
            \App\Http\Requests\ImageLaboUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $imageLabo = ImageLabo::factory()->create();
        $title = fake()->sentence(4);
        $description = fake()->text();
        $image = fake()->word();
        $user = User::factory()->create();
        $belongsTo = fake()->word();

        $response = $this->put(route('image-labos.update', $imageLabo), [
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'user_id' => $user->id,
            'belongsTo' => $belongsTo,
        ]);

        $imageLabo->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($title, $imageLabo->title);
        $this->assertEquals($description, $imageLabo->description);
        $this->assertEquals($image, $imageLabo->image);
        $this->assertEquals($user->id, $imageLabo->user_id);
        $this->assertEquals($belongsTo, $imageLabo->belongsTo);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $imageLabo = ImageLabo::factory()->create();

        $response = $this->delete(route('image-labos.destroy', $imageLabo));

        $response->assertNoContent();

        $this->assertSoftDeleted($imageLabo);
    }
}
