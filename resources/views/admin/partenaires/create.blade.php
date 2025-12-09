@extends('layouts.admin')

@section('title', 'Nouveau Partenaire')
@section('page-title', 'Nouveau Partenaire')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li><a href="{{ route('admin.partenaires.index') }}" class="hover:text-green-600">Partenaires</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li class="text-gray-900 font-medium">Nouveau</li>
        </ol>
    </nav>
    
    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800">Ajouter un Partenaire</h2>
            <p class="text-gray-600 mt-1">Remplissez les informations du partenaire</p>
        </div>
        
        <form action="{{ route('admin.partenaires.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            
            <!-- Nom -->
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">
                    Nom du Partenaire <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="nom" 
                    name="nom" 
                    value="{{ old('nom') }}"
                    placeholder="Ex: Organisation Mondiale de la Santé"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('nom') border-red-500 @enderror"
                    required
                >
                @error('nom')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Logo -->
            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">
                    Logo
                </label>
                <div class="mt-2">
                    <div class="flex items-center justify-center w-full">
                        <label for="logo" class="flex flex-col items-center justify-center w-full h-48 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fas fa-image text-4xl text-gray-400 mb-4"></i>
                                <p class="mb-2 text-sm text-gray-500">
                                    <span class="font-semibold">Télécharger le logo</span>
                                </p>
                                <p class="text-xs text-gray-500">PNG, JPG ou SVG (MAX. 2MB)</p>
                                <p class="text-xs text-gray-500 mt-1">Recommandé: 300x300px sur fond transparent</p>
                            </div>
                            <input 
                                id="logo" 
                                name="logo" 
                                type="file" 
                                accept="image/*"
                                class="hidden" 
                                onchange="previewLogo(event)"
                            />
                        </label>
                    </div>
                    
                    <!-- Logo Preview -->
                    <div id="logoPreview" class="mt-4 hidden">
                        <div class="relative inline-block">
                            <img id="preview" src="" alt="Preview" class="h-32 w-32 object-contain border border-gray-200 rounded-lg p-2 bg-white">
                            <button 
                                type="button" 
                                onclick="removeLogo()"
                                class="absolute -top-2 -right-2 bg-red-500 text-white p-1.5 rounded-full hover:bg-red-600 transition"
                            >
                                <i class="fas fa-times text-xs"></i>
                            </button>
                        </div>
                    </div>
                </div>
                @error('logo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Lien -->
            <div>
                <label for="link" class="block text-sm font-medium text-gray-700 mb-2">
                    Lien Web
                </label>
                <input 
                    type="url" 
                    id="link" 
                    name="link" 
                    value="{{ old('link') }}"
                    placeholder="https://www.example.com"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('link') border-red-500 @enderror"
                >
                @error('link')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="text-sm text-gray-500 mt-2">
                    <i class="fas fa-info-circle mr-1"></i>
                    URL complète du site web du partenaire
                </p>
            </div>
            
            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                    Description
                </label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="5"
                    placeholder="Description du partenariat, domaines de collaboration..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('description') border-red-500 @enderror"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.partenaires.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Annuler
                </a>
                <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition">
                    <i class="fas fa-save mr-2"></i>Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewLogo(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    const previewContainer = document.getElementById('logoPreview');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            preview.src = e.target.result;
            previewContainer.classList.remove('hidden');
        };
        
        reader.readAsDataURL(input.files[0]);
    }
}

function removeLogo() {
    document.getElementById('logo').value = '';
    document.getElementById('logoPreview').classList.add('hidden');
}
</script>
@endpush
@endsection