@extends('layouts.admin')

@section('title', 'Nouveau Texte Réglementaire')
@section('page-title', 'Nouveau Texte Réglementaire')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li><a href="{{ route('admin.texte-reglementaires.index') }}" class="hover:text-green-600">Textes Réglementaires</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li class="text-gray-900 font-medium">Nouveau</li>
        </ol>
    </nav>
    
    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800">Ajouter un Texte Réglementaire</h2>
            <p class="text-gray-600 mt-1">Téléchargez un document officiel ou une loi</p>
        </div>
        
        <form action="{{ route('admin.texte-reglementaires.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            
            <!-- Titre -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Titre du Document <span class="text-red-500">*</span>
                </label>
                <input 
                    type="text" 
                    id="title" 
                    name="title" 
                    value="{{ old('title') }}"
                    placeholder="Ex: Décret N°100/2024 sur la régulation des médicaments"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('title') border-red-500 @enderror"
                    required
                >
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Fichier PDF -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Document PDF
                </label>
                <div class="mt-2">
                    <div class="flex items-center justify-center w-full">
                        <label for="pathfile" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="fas fa-file-pdf text-5xl text-red-400 mb-4"></i>
                                <p class="mb-2 text-sm text-gray-500">
                                    <span class="font-semibold">Cliquez pour télécharger</span> le document PDF
                                </p>
                                <p class="text-xs text-gray-500">Fichier PDF uniquement (MAX. 10MB)</p>
                                <p class="text-xs text-gray-500 mt-1">Documents officiels, décrets, lois, arrêtés</p>
                            </div>
                            <input 
                                id="pathfile" 
                                name="pathfile" 
                                type="file" 
                                accept=".pdf,application/pdf"
                                class="hidden" 
                                onchange="previewFile(event)"
                            />
                        </label>
                    </div>
                    
                    <!-- File Preview -->
                    <div id="filePreview" class="mt-4 hidden">
                        <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-file-pdf text-red-600 text-xl"></i>
                                    </div>
                                    <div>
                                        <p id="fileName" class="text-sm font-medium text-gray-900"></p>
                                        <p id="fileSize" class="text-xs text-gray-500"></p>
                                    </div>
                                </div>
                                <button 
                                    type="button" 
                                    onclick="removeFile()"
                                    class="text-red-600 hover:text-red-800 transition"
                                >
                                    <i class="fas fa-times text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @error('pathfile')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Informations Complémentaires -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                <div class="flex items-start">
                    <i class="fas fa-exclamation-triangle text-yellow-600 mt-1 mr-3"></i>
                    <div class="flex-1">
                        <h4 class="text-sm font-semibold text-yellow-800 mb-1">Important</h4>
                        <ul class="text-sm text-yellow-700 space-y-1 list-disc list-inside">
                            <li>Assurez-vous que le document est dans un format PDF lisible</li>
                            <li>Vérifiez que le titre est clair et précis</li>
                            <li>Les documents seront accessibles publiquement</li>
                            <li>Taille maximale: 10 MB par fichier</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Métadonnées suggérées -->
            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                <h4 class="text-sm font-semibold text-gray-800 mb-3">
                    <i class="fas fa-lightbulb text-yellow-500 mr-2"></i>
                    Conseils de nommage
                </h4>
                <div class="text-sm text-gray-700 space-y-2">
                    <p>Pour un meilleur référencement, incluez dans le titre :</p>
                    <ul class="list-disc list-inside ml-4 space-y-1 text-gray-600">
                        <li>Le type de document (Décret, Loi, Arrêté, Circulaire)</li>
                        <li>Le numéro de référence officiel</li>
                        <li>L'année de publication</li>
                        <li>L'objet principal du texte</li>
                    </ul>
                    <p class="text-xs text-gray-500 mt-3">
                        <strong>Exemple:</strong> "Décret N°100/234/2024 portant organisation du système pharmaceutique au Burundi"
                    </p>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.texte-reglementaires.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Annuler
                </a>
                <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition">
                    <i class="fas fa-upload mr-2"></i>Télécharger
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function previewFile(event) {
    const input = event.target;
    const previewContainer = document.getElementById('filePreview');
    const fileNameEl = document.getElementById('fileName');
    const fileSizeEl = document.getElementById('fileSize');
    
    if (input.files && input.files[0]) {
        const file = input.files[0];
        
        // Format file size
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        let size = file.size;
        let i = 0;
        while (size >= 1024 && i < sizes.length - 1) {
            size /= 1024;
            i++;
        }
        
        fileNameEl.textContent = file.name;
        fileSizeEl.textContent = `${size.toFixed(2)} ${sizes[i]}`;
        previewContainer.classList.remove('hidden');
    }
}

function removeFile() {
    document.getElementById('pathfile').value = '';
    document.getElementById('filePreview').classList.add('hidden');
}
</script>
@endpush
@endsection