@extends('layouts.admin')

@section('title', 'Nouvelle Actualité')
@section('page-title', 'Nouvelle Actualité')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li><a href="{{ route('admin.actualites.index') }}" class="hover:text-green-600">Actualités</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li class="text-gray-900 font-medium">Nouveau</li>
        </ol>
    </nav>
    
    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800">Créer une Actualité</h2>
            <p class="text-gray-600 mt-1">Partagez les dernières nouvelles avec votre audience</p>
        </div>
        
        <form action="{{ route('admin.actualites.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            
            <!-- Titre -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Titre <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="{{ old('title') }}"
                    placeholder="Ex: Nouvelle réglementation sur les médicaments"
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
                    placeholder="Décrivez l'actualité en détail..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('description') border-red-500 @enderror"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="text-sm text-gray-500 mt-2">
                    <i class="fas fa-info-circle mr-1"></i>
                    Vous pouvez utiliser du texte enrichi pour formater votre contenu
                </p>
            </div>
            
            <!-- Image -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                    Image
                </label>
                <div class="mt-2">
                    <div class="flex items-center justify-center w-full">
                        <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                                <p class="mb-2 text-sm text-gray-500">
                                    <span class="font-semibold">Cliquez pour télécharger</span> ou glissez-déposez
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
                    
                    <!-- Image Preview -->
                    <div id="imagePreview" class="mt-4 hidden">
                        <div class="relative">
                            <img id="preview" src="" alt="Preview" class="w-full h-64 object-cover rounded-lg">
                            <button 
                                type="button" 
                                onclick="removeImage()"
                                class="absolute top-2 right-2 bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transition"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.actualites.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Annuler
                </a>
                <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition">
                    <i class="fas fa-save mr-2"></i>Publier
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('imagePreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
        };
        
        reader.readAsDataURL(input.files[0]);
    }
}

function removeImage() {
    document.getElementById('image').value = '';
    document.getElementById('imagePreview').classList.add('hidden');
}
</script>
@endpush
@endsection