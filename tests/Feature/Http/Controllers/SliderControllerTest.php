<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SliderController
 */
final class SliderControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $sliders = Slider::factory()->count(3)->create();

        $response = $this->get(route('sliders.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SliderController::class,
            'store',
            \App\Http\Requests\SliderStoreRequest::class
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

        $response = $this->post(route('sliders.store'), [
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'user_id' => $user->id,
            'belongsTo' => $belongsTo,
        ]);

        $sliders = Slider::query()
            ->where('title', $title)
            ->where('description', $description)
            ->where('image', $image)
            ->where('user_id', $user->id)
            ->where('belongsTo', $belongsTo)
            ->get();
        $this->assertCount(1, $sliders);
        $slider = $sliders->first();

        $response->assertCreated();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $slider = Slider::factory()->create();

        $response = $this->get(route('sliders.show', $slider));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SliderController::class,
            'update',
            \App\Http\Requests\SliderUpdateRequest::class
        );
    }

    #[Test]
    public function update_behaves_as_expected(): void
    {
        $slider = Slider::factory()->create();
        $title = fake()->sentence(4);
        $description = fake()->text();
        $image = fake()->word();
        $user = User::factory()->create();
        $belongsTo = fake()->word();

        $response = $this->put(route('sliders.update', $slider), [
            'title' => $title,
            'description' => $description,
            'image' => $image,
            'user_id' => $user->id,
            'belongsTo' => $belongsTo,
        ]);

        $slider->refresh();

        $response->assertOk();
        $response->assertJsonStructure([]);

        $this->assertEquals($title, $slider->title);
        $this->assertEquals($description, $slider->description);
        $this->assertEquals($image, $slider->image);
        $this->assertEquals($user->id, $slider->user_id);
        $this->assertEquals($belongsTo, $slider->belongsTo);
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $slider = Slider::factory()->create();

        $response = $this->delete(route('sliders.destroy', $slider));

        $response->assertNoContent();

        $this->assertSoftDeleted($slider);
    }
}
