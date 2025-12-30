@extends('layouts.admin')

@section('title', 'Modifier un Produit')
@section('page-title', 'Modifier un Produit')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li><a href="{{ route('admin.dashboard') }}" class="hover:text-green-600">Dashboard</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li><a href="{{ route('admin.produits.index') }}" class="hover:text-green-600">Produits</a></li>
            <li><i class="fas fa-chevron-right text-xs"></i></li>
            <li class="text-gray-900 font-medium">Modifier</li>
        </ol>
    </nav>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="p-6 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800">Modifier les informations du produit</h2>
            <p class="text-gray-600 mt-1">Mettez à jour les champs nécessaires</p>
        </div>

        <form action="{{ route('admin.produits.update', $produit->id) }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')

            <!-- Section 1: Informations Générales -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informations Générales</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Désignation Commerciale *</label>
                        <input type="text" name="designation_commerciale"
                               value="{{ old('designation_commerciale', $produit->designation_commerciale) }}"
                               class="w-full px-4 py-2 border rounded-lg @error('designation_commerciale') border-red-500 @enderror" required>
                        @error('designation_commerciale')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">DCI *</label>
                        <input type="text" name="dci" value="{{ old('dci', $produit->dci) }}"
                               class="w-full px-4 py-2 border rounded-lg" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Dosage *</label>
                        <input type="text" name="dosage" value="{{ old('dosage', $produit->dosage) }}"
                               class="w-full px-4 py-2 border rounded-lg" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Forme *</label>
                        <select name="forme" class="w-full px-4 py-2 border rounded-lg" required>
                            @foreach(['Comprimé','Gélule','Sirop','Injectable','Crème','Pommade','Solution','Poudre'] as $forme)
                                <option value="{{ $forme }}" {{ old('forme', $produit->forme) == $forme ? 'selected' : '' }}>
                                    {{ $forme }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Conditionnement *</label>
                        <input type="text" name="conditionnement"
                               value="{{ old('conditionnement', $produit->conditionnement) }}"
                               class="w-full px-4 py-2 border rounded-lg" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie *</label>
                        <select name="category" class="w-full px-4 py-2 border rounded-lg" required>
                            <option value="medicament" {{ old('category', $produit->category) == 'medicament' ? 'selected' : '' }}>Médicament</option>
                            <option value="supplement" {{ old('category', $produit->category) == 'supplement' ? 'selected' : '' }}>Supplément</option>
                            <option value="dispositif" {{ old('category', $produit->category) == 'dispositif' ? 'selected' : '' }}>Dispositif Médical</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Section 2: Fabricant et Titulaire -->
            <div class="pt-6 border-t">
                <h3 class="text-lg font-semibold mb-4">Fabricant et Titulaire</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <input type="text" name="nom_laboratoire" value="{{ old('nom_laboratoire', $produit->nom_laboratoire) }}" class="w-full px-4 py-2 border rounded-lg" required>
                    <input type="text" name="pays_origine" value="{{ old('pays_origine', $produit->pays_origine) }}" class="w-full px-4 py-2 border rounded-lg" required>
                    <input type="text" name="titulaire_amm" value="{{ old('titulaire_amm', $produit->titulaire_amm) }}" class="w-full px-4 py-2 border rounded-lg" required>
                    <input type="text" name="pays_titulaire_amm" value="{{ old('pays_titulaire_amm', $produit->pays_titulaire_amm) }}" class="w-full px-4 py-2 border rounded-lg" required>
                </div>
            </div>

            <!-- Section 3: Enregistrement -->
            <div class="pt-6 border-t">
                <h3 class="text-lg font-semibold mb-4">Enregistrement</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">N° Enregistrement *</label>
                        <input type="number" name="num_enregistrement" value="{{ old('num_enregistrement', $produit->num_enregistrement) }}" class="w-full px-4 py-2 border rounded-lg" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date AMM</label>
                        <input type="date" name="date_amm" value="{{ old('date_amm', $produit->date_amm?->format('Y-m-d')) }}" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date d'Expiration</label>
                        <input type="date" name="date_expiration" value="{{ old('date_expiration', $produit->date_expiration?->format('Y-m-d')) }}" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Statut AMM</label>
                        <select name="statut_amm" class="w-full px-4 py-2 border rounded-lg">
                            <option value="active" {{ old('statut_amm', $produit->statut_amm) == 'active' ? 'selected' : '' }}>Actif</option>
                            <option value="suspendu" {{ old('statut_amm', $produit->statut_amm) == 'suspendu' ? 'selected' : '' }}>Suspendu</option>
                            <option value="retire" {{ old('statut_amm', $produit->statut_amm) == 'retire' ? 'selected' : '' }}>Retiré</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex justify-end space-x-4 pt-6 border-t">
                <a href="{{ route('admin.produits.index') }}" class="px-6 py-2 border rounded-lg">Annuler</a>
                <button class="px-6 py-2 bg-green-600 text-white rounded-lg">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>
@endsection