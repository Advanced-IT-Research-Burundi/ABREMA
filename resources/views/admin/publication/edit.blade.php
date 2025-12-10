@extends('layouts.admin')

@section('title', 'Modifier la Publication')
@section('page-title', 'Modifier la Publication')

@section('content')
<div class="max-w-4xl mx-auto">

    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li><a href="{{ route('admin.publications.index') }}" class="hover:text-green-600">Publications</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li class="text-gray-900 font-medium">Modifier</li>
        </ol>
    </nav>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800">Modifier la Publication</h2>
            <p class="text-gray-600 mt-1">Modifiez les champs nécessaires</p>
        </div>

        <form action="{{ route('admin.publications.update', $publication->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Titre -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Titre *</label>
                <input 
                    type="text" name="title"
                    value="{{ old('title', $publication->title) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 @error('title') border-red-500 @enderror"
                    required
                >
                @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea 
                    name="description" rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 @error('description') border-red-500 @enderror"
                >{{ old('description', $publication->description) }}</textarea>
                @error('description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>

                @if ($publication->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $publication->image) }}" class="w-32 rounded shadow">
                    </div>
                @endif

                <input 
                    type="file" name="image" accept="image/*"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 @error('image') border-red-500 @enderror"
                >
                @error('image') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.publications.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Annuler
                </a>
                <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition">
                    <i class="fas fa-save mr-2"></i>Modifier
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
