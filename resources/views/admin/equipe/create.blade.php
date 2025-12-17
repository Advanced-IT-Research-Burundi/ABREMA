@extends('layouts.admin')

@section('title', 'Nouveau membre de la direction')
@section('page-title', 'Nouveau membre de la direction')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li><a href="{{ route('admin.equipe-directions.index') }}" class="hover:text-green-600">Équipe de direction</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li class="text-gray-900 font-medium">Nouveau</li>
        </ol>
    </nav>

    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800">Ajouter un membre</h2>
            <p class="text-gray-600 mt-1">Renseignez les informations du membre de la direction</p>
        </div>

        <form action="{{ route('admin.equipe-directions.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <!-- Nom & Prénom -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nom & Prénom <span class="text-red-500">*</span></label>
                <input type="text" name="nom_prenom" value="{{ old('nom_prenom') }}" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 @error('nom_prenom') border-red-500 @enderror">
                @error('nom_prenom')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 @error('email') border-red-500 @enderror">
                @error('email')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Fonction -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Fonction / Description <span class="text-red-500">*</span></label>
                <textarea name="description" rows="4" required
                          class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Photo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Photo</label>
                <input type="file" name="photo" accept="image/*"
                       class="w-full px-4 py-2 border rounded-lg">
                <p class="text-xs text-gray-500 mt-1">JPG, PNG – Max 5MB</p>
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.equipe-directions.index') }}" class="px-6 py-2 border rounded-lg">Annuler</a>
                <button class="px-6 py-2 bg-green-600 text-white rounded-lg">
                    <i class="fas fa-save mr-2"></i>Enregistrer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection