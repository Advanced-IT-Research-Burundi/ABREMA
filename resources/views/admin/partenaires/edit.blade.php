@extends('layouts.admin')

@section('title', 'Modifier un partenaire')
@section('page-title', 'Modifier un partenaire')

@section('content')
<div class="max-w-4xl mx-auto">

    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a>
            </li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li>
                <a href="{{ route('admin.partenaires.index') }}" class="hover:text-green-600">
                    Partenaires
                </a>
            </li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li class="text-gray-900 font-medium">Modifier</li>
        </ol>
    </nav>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800">Modifier le partenaire</h2>
            <p class="text-gray-600 mt-1">
                Mettez à jour les informations du partenaire
            </p>
        </div>

        <form action="{{ route('admin.partenaires.update', $partenaire) }}"
              method="POST"
              enctype="multipart/form-data"
              class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Nom -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Nom du partenaire <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    name="nom"
                    value="{{ old('nom', $partenaire->nom) }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500
                    @error('nom') border-red-500 @enderror"
                    required
                >
                @error('nom')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Lien -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Site web <span class="text-red-500">*</span>
                </label>
                <input
                    type="url"
                    name="link"
                    value="{{ old('link', $partenaire->link) }}"
                    placeholder="https://www.example.com"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500
                    @error('link') border-red-500 @enderror"
                    required
                >
                @error('link')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Description <span class="text-red-500">*</span>
                </label>
                <textarea
                    name="description"
                    rows="5"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500
                    @error('description') border-red-500 @enderror"
                    required
                >{{ old('description', $partenaire->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Logo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Logo
                </label>

                @if($partenaire->logo)
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 mb-2">Logo actuel :</p>
                        <img
                            src="{{ Storage::url($partenaire->logo) }}"
                            class="w-full h-48 object-contain rounded-lg border"
                        >
                    </div>
                @endif

                <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col items-center justify-center w-full h-48 border-2
                                  border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                            <p class="text-sm text-gray-500">
                                <span class="font-semibold">Cliquez pour remplacer</span> ou glissez-déposez
                            </p>
                            <p class="text-xs text-gray-500">PNG, JPG, SVG (max 2MB)</p>
                        </div>
                        <input type="file" name="logo" accept="image/*" class="hidden"
                               onchange="previewImage(event)">
                    </label>
                </div>

                <div id="imagePreview" class="mt-4 hidden">
                    <img id="preview" class="w-full h-48 object-contain rounded-lg border">
                </div>

                @error('logo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.partenaires.index') }}"
                   class="px-6 py-2 border rounded-lg">
                    Annuler
                </a>
                <button class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    <i class="fas fa-save mr-2"></i>Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewImage(event) {
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('preview').src = e.target.result;
        document.getElementById('imagePreview').classList.remove('hidden');
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>
@endpush
@endsection
