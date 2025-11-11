<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Coli;
use App\Models\Colis;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ColisController
 */
final class ColisControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $colis = Colis::factory()->count(3)->create();

        $response = $this->get(route('colis.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ColisController::class,
            'store',
            \App\Http\Requests\ColisStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $nom_prenom = fake()->word();
        $phone = fake()->phoneNumber();
        $email = fake()->safeEmail();
        $pathfile = fake()->word();
        $message = fake()->text();

        $response = $this->post(route('colis.store'), [
            'nom_prenom' => $nom_prenom,
            'phone' => $phone,
            'email' => $email,
            'pathfile' => $pathfile,
            'message' => $message,
        ]);

        $colis = Coli::query()
            ->where('nom_prenom', $nom_prenom)
            ->where('phone', $phone)
            ->where('email', $email)
            ->where('pathfile', $pathfile)
            ->where('message', $message)
            ->get();
        $this->assertCount(1, $colis);
        $coli = $colis->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $coli = Colis::factory()->create();

        $response = $this->get(route('colis.show', $coli));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ColisController::class,
            'update',
            \App\Http\Requests\ColisUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $coli = Colis::factory()->create();
        $nom_prenom = fake()->word();
        $phone = fake()->phoneNumber();
        $email = fake()->safeEmail();
        $pathfile = fake()->word();
        $message = fake()->text();

        $response = $this->put(route('colis.update', $coli), [
            'nom_prenom' => $nom_prenom,
            'phone' => $phone,
            'email' => $email,
            'pathfile' => $pathfile,
            'message' => $message,
        ]);

        $coli->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($nom_prenom, $coli->nom_prenom);
        $this->assertEquals($phone, $coli->phone);
        $this->assertEquals($email, $coli->email);
        $this->assertEquals($pathfile, $coli->pathfile);
        $this->assertEquals($message, $coli->message);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $coli = Colis::factory()->create();
        $coli = Coli::factory()->create();

        $response = $this->delete(route('colis.destroy', $coli));

        $response->assertNoContent();

        $this->assertSoftDeleted($coli);
    }
}
