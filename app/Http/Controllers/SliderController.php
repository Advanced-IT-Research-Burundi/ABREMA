<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderStoreRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Http\Resources\SliderCollection;
use App\Http\Resources\SliderResource;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SliderController extends Controller
{
    public function index(Request $request): Response
    {
        $sliders = Slider::all();

        return new SliderCollection($sliders);
    }

    public function store(SliderStoreRequest $request): Response
    {
        $slider = Slider::create($request->validated());

        return new SliderResource($slider);
    }

    public function show(Request $request, Slider $slider): Response
    {
        return new SliderResource($slider);
    }

    public function update(SliderUpdateRequest $request, Slider $slider): Response
    {
        $slider->update($request->validated());

        return new SliderResource($slider);
    }

    public function destroy(Request $request, Slider $slider): Response
    {
        $slider->delete();

        return response()->noContent();
    }
}
