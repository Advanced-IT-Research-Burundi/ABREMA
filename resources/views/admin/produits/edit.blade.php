@extends('admin.layouts.app')

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
            <h2 class="text-xl font-bold text-gray-800">Modifier le Produit</h2>
            <p class="text-gray-600 mt-1">{{ $produit->designation_commerciale }}</p>
        </div>
        
        <form action="{{ route('admin.produits.update', $produit) }}" method="POST" class="p-6 space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Section 1: Informations Générales -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informations Générales</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Désignation Commerciale -->
                    <div class="md:col-span-2">
                        <label for="designation_commerciale" class="block text-sm font-medium text-gray-700 mb-2">
                            Désignation Commerciale <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="designation_commerciale" 
                            name="designation_commerciale" 
                            value="{{ old('designation_commerciale', $produit->designation_commerciale) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('designation_commerciale') border-red-500 @enderror"
                            required
                        >
                        @error('designation_commerciale')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- DCI -->
                    <div>
                        <label for="dci" class="block text-sm font-medium text-gray-700 mb-2">
                            DCI (Dénomination Commune Internationale) <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="dci" 
                            name="dci" 
                            value="{{ old('dci', $produit->dci) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('dci') border-red-500 @enderror"
                            required
                        >
                        @error('dci')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Dosage -->
                    <div>
                        <label for="dosage" class="block text-sm font-medium text-gray-700 mb-2">
                            Dosage <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="dosage" 
                            name="dosage" 
                            value="{{ old('dosage', $produit->dosage) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('dosage') border-red-500 @enderror"
                            required
                        >
                        @error('dosage')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Forme -->
                    <div>
                        <label for="forme" class="block text-sm font-medium text-gray-700 mb-2">
                            Forme <span class="text-red-500">*</span>
                        </label>
                        <select 
                            id="forme" 
                            name="forme"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('forme') border-red-500 @enderror"
                            required
                        >
                            <option value="">Sélectionner une forme</option>
                            <option value="Comprimé" {{ old('forme', $produit->forme) == 'Comprimé' ? 'selected' : '' }}>Comprimé</option>
                            <option value="Gélule" {{ old('forme', $produit->forme) == 'Gélule' ? 'selected' : '' }}>Gélule</option>
                            <option value="Sirop" {{ old('forme', $produit->forme) == 'Sirop' ? 'selected' : '' }}>Sirop</option>
                            <option value="Injectable" {{ old('forme', $produit->forme) == 'Injectable' ? 'selected' : '' }}>Injectable</option>
                            <option value="Crème" {{ old('forme', $produit->forme) == 'Crème' ? 'selected' : '' }}>Crème</option>
                            <option value="Pommade" {{ old('forme', $produit->forme) == 'Pommade' ? 'selected' : '' }}>Pommade</option>
                            <option value="Solution" {{ old('forme', $produit->forme) == 'Solution' ? 'selected' : '' }}>Solution</option>
                            <option value="Poudre" {{ old('forme', $produit->forme) == 'Poudre' ? 'selected' : '' }}>Poudre</option>
                        </select>
                        @error('forme')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Conditionnement -->
                    <div>
                        <label for="conditionnement" class="block text-sm font-medium text-gray-700 mb-2">
                            Conditionnement <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="conditionnement" 
                            name="conditionnement" 
                            value="{{ old('conditionnement', $produit->conditionnement) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('conditionnement') border-red-500 @enderror"
                            required
                        >
                        @error('conditionnement')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Catégorie -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                            Catégorie <span class="text-red-500">*</span>
                        </label>
                        <select 
                            id="category" 
                            name="category"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('category') border-red-500 @enderror"
                            required
                        >
                            <option value="">Sélectionner une catégorie</option>
                            <option value="medicament" {{ old('category', $produit->category) == 'medicament' ? 'selected' : '' }}>Médicament</option>
                            <option value="supplement" {{ old('category', $produit->category) == 'supplement' ? 'selected' : '' }}>Supplément</option>
                            <option value="dispositif" {{ old('category', $produit->category) == 'dispositif' ? 'selected' : '' }}>Dispositif Médical</option>
                        </select>
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Section 2: Fabricant et Titulaire -->
            <div class="pt-6 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Fabricant et Titulaire</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nom Laboratoire -->
                    <div>
                        <label for="nom_laboratoire" class="block text-sm font-medium text-gray-700 mb-2">
                            Nom du Laboratoire <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="nom_laboratoire" 
                            name="nom_laboratoire" 
                            value="{{ old('nom_laboratoire', $produit->nom_laboratoire) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('nom_laboratoire') border-red-500 @enderror"
                            required
                        >
                        @error('nom_laboratoire')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Pays Origine -->
                    <div>
                        <label for="pays_origine" class="block text-sm font-medium text-gray-700 mb-2">
                            Pays d'Origine <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="pays_origine" 
                            name="pays_origine" 
                            value="{{ old('pays_origine', $produit->pays_origine) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('pays_origine') border-red-500 @enderror"
                            required
                        >
                        @error('pays_origine')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Titulaire AMM -->
                    <div>
                        <label for="titulaire_amm" class="block text-sm font-medium text-gray-700 mb-2">
                            Titulaire AMM <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="titulaire_amm" 
                            name="titulaire_amm" 
                            value="{{ old('titulaire_amm', $produit->titulaire_amm) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('titulaire_amm') border-red-500 @enderror"
                            required
                        >
                        @error('titulaire_amm')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Pays Titulaire AMM -->
                    <div>
                        <label for="pays_titulaire_amm" class="block text-sm font-medium text-gray-700 mb-2">
                            Pays Titulaire AMM <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="pays_titulaire_amm" 
                            name="pays_titulaire_amm" 
                            value="{{ old('pays_titulaire_amm', $produit->pays_titulaire_amm) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('pays_titulaire_amm') border-red-500 @enderror"
                            required
                        >
                        @error('pays_titulaire_amm')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Section 3: Enregistrement -->
            <div class="pt-6 border-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Enregistrement</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Numéro Enregistrement -->
                    <div>
                        <label for="num_enregistrement" class="block text-sm font-medium text-gray-700 mb-2">
                            N° Enregistrement <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="number" 
                            id="num_enregistrement" 
                            name="num_enregistrement" 
                            value="{{ old('num_enregistrement', $produit->num_enregistrement) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('num_enregistrement') border-red-500 @enderror"
                            required
                        >
                        @error('num_enregistrement')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Date AMM -->
                    <div>
                        <label for="date_amm" class="block text-sm font-medium text-gray-700 mb-2">
                            Date AMM
                        </label>
                        <input 
                            type="date" 
                            id="date_amm" 
                            name="date_amm" 
                            value="{{ old('date_amm', $produit->date_amm?->format('Y-m-d')) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('date_amm') border-red-500 @enderror"
                        >
                        @error('date_amm')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Statut AMM -->
                    <div>
                        <label for="statut_amm" class="block text-sm font-medium text-gray-700 mb-2">
                            Statut AMM
                        </label>
                        <select 
                            id="statut_amm" 
                            name="statut_amm"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent @error('statut_amm') border-red-500 @enderror"
                        >
                            <option value="">Sélectionner un statut</option>
                            <option value="active" {{ old('statut_amm', $produit->statut_amm) == 'active' ? 'selected' : '' }}>Actif</option>
                            <option value="suspendu" {{ old('statut_amm', $produit->statut_amm) == 'suspendu' ? 'selected' : '' }}>Suspendu</option>
                            <option value="retire" {{ old('statut_amm', $produit->statut_amm) == 'retire' ? 'selected' : '' }}>Retiré</option>
                        </select>
                        @error('statut_amm')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- Metadata -->
            <div class="pt-6 border-t border-gray-200">
                <div class="bg-gray-50 rounded-lg p-4">
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <span class="text-gray-600">Créé le:</span>
                            <span class="font-medium ml-2">{{ $produit->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Modifié le:</span>
                            <span class="font-medium ml-2">{{ $produit->updated_at->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Actions -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.produits.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition">
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