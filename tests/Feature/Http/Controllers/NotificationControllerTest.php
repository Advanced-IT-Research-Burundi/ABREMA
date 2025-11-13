<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\NotificationController
 */
final class NotificationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $notifications = Notification::factory()->count(3)->create();

        $response = $this->get(route('notifications.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NotificationController::class,
            'store',
            \App\Http\Requests\NotificationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves(): void
    {
        $title = fake()->sentence(4);
        $contenu = fake()->word();
        $description = fake()->text();
        $user = User::factory()->create();
        $belongsTo = fake()->word();

        $response = $this->post(route('notifications.store'), [
            'title' => $title,
            'contenu' => $contenu,
            'description' => $description,
            'user_id' => $user->id,
            'belongsTo' => $belongsTo,
        ]);

        $notifications = Notification::query()
            ->where('title', $title)
            ->where('contenu', $contenu)
            ->where('description', $description)
            ->where('user_id', $user->id)
            ->where('belongsTo', $belongsTo)
            ->get();
        $this->assertCount(1, $notifications);
        $notification = $notifications->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $notification = Notification::factory()->create();

        $response = $this->get(route('notifications.show', $notification));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\NotificationController::class,
            'update',
            \App\Http\Requests\NotificationUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $notification = Notification::factory()->create();
        $title = fake()->sentence(4);
        $contenu = fake()->word();
        $description = fake()->text();
        $user = User::factory()->create();
        $belongsTo = fake()->word();

        $response = $this->put(route('notifications.update', $notification), [
            'title' => $title,
            'contenu' => $contenu,
            'description' => $description,
            'user_id' => $user->id,
            'belongsTo' => $belongsTo,
        ]);

        $notification->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($title, $notification->title);
        $this->assertEquals($contenu, $notification->contenu);
        $this->assertEquals($description, $notification->description);
        $this->assertEquals($user->id, $notification->user_id);
        $this->assertEquals($belongsTo, $notification->belongsTo);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $notification = Notification::factory()->create();

        $response = $this->delete(route('notifications.destroy', $notification));

        $response->assertNoContent();

        $this->assertSoftDeleted($notification);
    }
}
