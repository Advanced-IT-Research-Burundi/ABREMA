@extends('layouts.admin')

@section('title', 'Gestion des Médicaments')
@section('page-title', 'Médicaments Enregistrés')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Médicaments</h2>
            <p class="text-gray-600 mt-1">Gérez le registre des médicaments enregistrés</p>
        </div>
        <a href="{{ route('admin.produits.create') }}" class="mt-4 md:mt-0 inline-flex items-center px-6 py-3 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition shadow-sm">
            <i class="fas fa-plus mr-2"></i> Nouveau Médicament
        </a>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-green-500">
            <p class="text-sm text-gray-600">Actifs</p>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['active'] ?? 0 }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-yellow-500">
            <p class="text-sm text-gray-600">En Attente</p>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['pending'] ?? 0 }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-blue-500">
            <p class="text-sm text-gray-600">Ce Mois</p>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['this_month'] ?? 0 }}</p>
        </div>
        <div class="bg-white rounded-lg shadow-sm p-4 border-l-4 border-purple-500">
            <p class="text-sm text-gray-600">Total</p>
            <p class="text-2xl font-bold text-gray-800">{{ $stats['total'] ?? 0 }}</p>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <form method="GET" action="{{ route('admin.produits.index') }}" class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Rechercher</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Nom, DCI, laboratoire..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    <option value="">Toutes</option>
                    <option value="antibiotique" {{ request('category') == 'antibiotique' ? 'selected' : '' }}>Antibiotique</option>
                    <option value="antipaludeen" {{ request('category') == 'antipaludeen' ? 'selected' : '' }}>Antipaludéen</option>
                    <option value="analgesique" {{ request('category') == 'analgesique' ? 'selected' : '' }}>Analgésique</option>
                    <option value="autre" {{ request('category') == 'autre' ? 'selected' : '' }}>Autre</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Statut AMM</label>
                <select name="statut_amm" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    <option value="">Tous</option>
                    <option value="active" {{ request('statut_amm') == 'active' ? 'selected' : '' }}>Actif</option>
                    <option value="pending" {{ request('statut_amm') == 'pending' ? 'selected' : '' }}>En attente</option>
                    <option value="suspended" {{ request('statut_amm') == 'suspended' ? 'selected' : '' }}>Suspendu</option>
                </select>
            </div>
            
            <div class="flex items-end space-x-2">
                <button type="submit" class="flex-1 bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition">
                    <i class="fas fa-filter mr-2"></i> Filtrer
                </button>
                <a href="{{ route('admin.produits.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    <i class="fas fa-redo"></i>
                </a>
            </div>
        </form>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">N° Enreg.</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Désignation</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">DCI</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Forme/Dosage</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Laboratoire</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Statut</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($produits as $produit)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-xs font-medium">
                                #{{ $produit->num_enregistrement }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm font-medium text-gray-900">{{ $produit->designation_commerciale }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $produit->category }}</p>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900">{{ $produit->dci }}</td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">{{ $produit->forme }}</p>
                            <p class="text-xs text-gray-500">{{ $produit->dosage }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">{{ $produit->nom_laboratoire }}</p>
                            <p class="text-xs text-gray-500">{{ $produit->pays_origine }}</p>
                        </td>
                        <td class="px-6 py-4">
                            @if($produit->statut_amm == 'active')
                                <span class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                    <i class="fas fa-check-circle mr-1"></i> Actif
                                </span>
                            @elseif($produit->statut_amm == 'pending')
                                <span class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-medium">
                                    <i class="fas fa-clock mr-1"></i> En attente
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-medium">
                                    <i class="fas fa-pause-circle mr-1"></i> Suspendu
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('admin.produits.show', $produit->id) }}" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.produits.edit', $produit->id) }}" class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.produits.destroy', $produit->id) }}" onsubmit="return confirm('Êtes-vous sûr?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12">
                            <div class="text-center">
                                <i class="fas fa-pills text-6xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500 text-lg">Aucun médicament trouvé</p>
                                <a href="{{ route('admin.produits.create') }}" class="inline-block mt-4 text-primary-600 hover:text-primary-700">
                                    <i class="fas fa-plus mr-2"></i> Ajouter un médicament
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($produits->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $produits->links() }}
        </div>
        @endif
    </div>
</div>
@endsection