@extends('layouts.admin')

@section('title', 'Modifier Texte Réglementaire')
@section('page-title', 'Modifier Texte Réglementaire')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li><a href="{{ route('admin.texte.index') }}" class="hover:text-green-600">Textes</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li class="text-gray-900 font-medium">Modifier</li>
        </ol>
    </nav>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800">Informations du Texte</h2>
            <p class="text-gray-600 mt-1">Modifiez les champs nécessaires</p>
        </div>

        <form action="{{ route('admin.texte.update', $texteReglementaire) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informations Générales</h3>
                <div class="grid grid-cols-1 gap-6">

                    <!-- Titre -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                            Titre <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title', $texteReglementaire->title) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('title') border-red-500 @enderror"
                            required
                        >
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fichier -->
                    <div>
                        <label for="pathfile" class="block text-sm font-medium text-gray-700 mb-2">
                            Fichier
                        </label>
                        <input
                            type="file"
                            id="pathfile"
                            name="pathfile"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('pathfile') border-red-500 @enderror"
                        >
                        @if($texteReglementaire->pathfile)
                            <p class="mt-1 text-sm text-gray-500">
                                Fichier actuel: 
                                <a href="{{ asset('storage/' . $texteReglementaire->pathfile) }}" target="_blank" class="text-blue-600 hover:underline">Voir</a>
                            </p>
                        @endif
                        @error('pathfile')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Auteur -->
                    <div>
                        <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">
                            Auteur
                        </label>
                        <select id="user_id" name="user_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('user_id') border-red-500 @enderror">
                            <option value="">Sélectionner un auteur</option>
                            @foreach(App\Models\User::all() as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $texteReglementaire->user_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.texte.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
                    Annuler
                </a>
                <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition">
                    <i class="fas fa-save mr-2"></i>Mettre à jour
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
