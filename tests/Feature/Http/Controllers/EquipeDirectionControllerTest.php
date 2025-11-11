<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\EquipeDirection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EquipeDirectionController
 */
final class EquipeDirectionControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $equipeDirections = EquipeDirection::factory()->count(3)->create();

        $response = $this->get(route('equipe-directions.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EquipeDirectionController::class,
            'store',
            \App\Http\Requests\EquipeDirectionStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $nom_prenom = fake()->word();
        $photo = fake()->word();
        $description = fake()->text();
        $email = fake()->safeEmail();

        $response = $this->post(route('equipe-directions.store'), [
            'nom_prenom' => $nom_prenom,
            'photo' => $photo,
            'description' => $description,
            'email' => $email,
        ]);

        $equipeDirections = EquipeDirection::query()
            ->where('nom_prenom', $nom_prenom)
            ->where('photo', $photo)
            ->where('description', $description)
            ->where('email', $email)
            ->get();
        $this->assertCount(1, $equipeDirections);
        $equipeDirection = $equipeDirections->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $equipeDirection = EquipeDirection::factory()->create();

        $response = $this->get(route('equipe-directions.show', $equipeDirection));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\EquipeDirectionController::class,
            'update',
            \App\Http\Requests\EquipeDirectionUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $equipeDirection = EquipeDirection::factory()->create();
        $nom_prenom = fake()->word();
        $photo = fake()->word();
        $description = fake()->text();
        $email = fake()->safeEmail();

        $response = $this->put(route('equipe-directions.update', $equipeDirection), [
            'nom_prenom' => $nom_prenom,
            'photo' => $photo,
            'description' => $description,
            'email' => $email,
        ]);

        $equipeDirection->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($nom_prenom, $equipeDirection->nom_prenom);
        $this->assertEquals($photo, $equipeDirection->photo);
        $this->assertEquals($description, $equipeDirection->description);
        $this->assertEquals($email, $equipeDirection->email);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $equipeDirection = EquipeDirection::factory()->create();

        $response = $this->delete(route('equipe-directions.destroy', $equipeDirection));

        $response->assertNoContent();

        $this->assertSoftDeleted($equipeDirection);
    }
}
