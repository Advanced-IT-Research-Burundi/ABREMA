@extends('layouts.admin')

@section('title', 'Modifier un Texte Réglementaire')
@section('page-title', 'Modifier Texte Réglementaire')

@section('content')
<div class="max-w-4xl mx-auto">

    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li><a href="{{ route('admin.texte.index') }}" class="hover:text-green-600">Textes Réglementaires</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li class="text-gray-900 font-medium">Modifier</li>
        </ol>
    </nav>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-xl font-bold text-gray-800">Modifier le texte</h2>
            <p class="text-gray-600 mt-1">Modifiez les champs nécessaires ci-dessous</p>
        </div>

        <form action="{{ route('admin.texte.update', $texteReglementaire) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Titre du texte *</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title" 
                    value="{{ old('title', $texteReglementaire->title) }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 @error('title') border-red-500 @enderror"
                    placeholder="Entrez le titre du texte"
                    required
                >
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="pathfile" class="block text-sm font-semibold text-gray-700 mb-2">Fichier (PDF, DOC, DOCX)</label>
                
                @if($texteReglementaire->pathfile)
                    <div class="mb-4 p-4 bg-gray-50 rounded-lg flex items-center justify-between border border-gray-200">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-file-pdf text-red-500 text-2xl"></i>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Fichier actuel</p>
                                <p class="text-xs text-gray-500">{{ basename($texteReglementaire->pathfile) }}</p>
                            </div>
                        </div>
                        <a href="{{ asset('storage/' . $texteReglementaire->pathfile) }}" target="_blank" class="text-green-600 hover:text-green-700 text-sm font-medium">
                            Visualiser
                        </a>
                    </div>
                @endif

                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-green-400 transition">
                    <div class="space-y-1 text-center">
                        <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3"></i>
                        <div class="flex text-sm text-gray-600">
                            <label for="pathfile" class="relative cursor-pointer bg-white rounded-md font-medium text-green-600 hover:text-green-500">
                                <span>{{ $texteReglementaire->pathfile ? 'Remplacer le fichier' : 'Télécharger un fichier' }}</span>
                                <input id="pathfile" name="pathfile" type="file" class="sr-only">
                            </label>
                        </div>
                        <p class="text-xs text-gray-500">PDF, DOC, DOCX jusqu'à 10MB</p>
                    </div>
                </div>
                <p id="file-name" class="mt-2 text-sm text-gray-600 italic"></p>
                @error('pathfile')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.texte.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Annuler
                </a>
                <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition">
                    Mettre à jour
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('pathfile').addEventListener('change', function(e) {
        const fileName = e.target.files[0]?.name;
        if (fileName) {
            document.getElementById('file-name').textContent = 'Fichier sélectionné : ' + fileName;
        }
    });
</script>
@endsection
