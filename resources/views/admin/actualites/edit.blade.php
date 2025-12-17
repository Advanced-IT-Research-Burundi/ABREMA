@extends('layouts.admin')

@section('title', 'Modifier une Actualité')
@section('page-title', 'Modifier une Actualité')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li><a href="{{ route('admin.actualites.index') }}" class="hover:text-green-600">Actualités</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li class="text-gray-900 font-medium">Modifier</li>
        </ol>
    </nav>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800">Modifier l’actualité</h2>
            <p class="text-gray-600 mt-1">Mettez à jour les informations de l’actualité</p>
        </div>

        <form action="{{ route('admin.actualites.update', $actualite->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Titre -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Titre <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="{{ old('title', $actualite->title) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('title') border-red-500 @enderror"
                    required
                >
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Description
                </label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="6"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('description') border-red-500 @enderror"
                >{{ old('description', $actualite->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>

                @if($actualite->image)
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 mb-2">Image actuelle :</p>
                        <img src="{{ asset('storage/' . $actualite->image) }}" class="w-full h-64 object-cover rounded-lg">
                    </div>
                @endif

                <div class="flex items-center justify-center w-full">
                    <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                            <p class="mb-2 text-sm text-gray-500">
                                <span class="font-semibold">Cliquez pour remplacer</span> ou glissez-déposez
                            </p>
                            <p class="text-xs text-gray-500">PNG, JPG ou JPEG (MAX. 5MB)</p>
                        </div>
                        <input 
                            id="image" 
                            name="image" 
                            type="file" 
                            accept="image/*"
                            class="hidden" 
                            onchange="previewImage(event)"
                        />
                    </label>
                </div>

                <!-- Nouvelle image preview -->
                <div id="imagePreview" class="mt-4 hidden">
                    <img id="preview" class="w-full h-64 object-cover rounded-lg">
                </div>

                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.actualites.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg">Annuler</a>
                <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
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