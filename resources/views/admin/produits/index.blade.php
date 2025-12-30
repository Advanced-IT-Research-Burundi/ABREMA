@extends('layouts.admin')

@section('title', 'Produits')
@section('page-title', 'Gestion des Produits')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Liste des Produits</h2>
            <p class="text-gray-600 mt-1">Gérer les médicaments enregistrés</p>
        </div>
        <a href="{{ route('admin.produits.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition">
            <i class="fas fa-plus mr-2"></i>
            Ajouter un Produit
        </a>
    </div>
    
    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm p-4">
        <form method="GET" action="{{ route('admin.produits.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Rechercher..." 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                >
            </div>
            <div>
                <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <option value="">Toutes les catégories</option>
                    <option value="medicament" {{ request('category') == 'medicament' ? 'selected' : '' }}>Médicament</option>
                    <option value="supplement" {{ request('category') == 'supplement' ? 'selected' : '' }}>Supplément</option>
                    <option value="dispositif" {{ request('category') == 'dispositif' ? 'selected' : '' }}>Dispositif</option>
                </select>
            </div>
            <div>
                <select name="statut" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    <option value="">Tous les statuts</option>
                    <option value="active" {{ request('statut') == 'active' ? 'selected' : '' }}>Actif</option>
                    <option value="suspendu" {{ request('statut') == 'suspendu' ? 'selected' : '' }}>Suspendu</option>
                    <option value="retire" {{ request('statut') == 'retire' ? 'selected' : '' }}>Retiré</option>
                </select>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="flex-1 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition">
                    <i class="fas fa-search mr-2"></i>Filtrer
                </button>
                <a href="{{ route('admin.produits.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition">
                    <i class="fas fa-redo"></i>
                </a>
            </div>
        </form>
    </div>
    
    <!-- Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Désignation
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            DCI
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Forme
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Laboratoire
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            N° Enregistrement
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Statut
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($produits as $produit)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $produit->designation_commerciale }}</div>
                                <div class="text-sm text-gray-500">{{ $produit->dosage }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $produit->dci }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $produit->forme }}
                                @if($produit->is_near_expiration)
                                    <div class="mt-1">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                            <i class="fas fa-exclamation-triangle mr-1"></i> Expire bientôt
                                        </span>
                                    </div>
                                @endif
                                @if($produit->is_expired)
                                    <div class="mt-1">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-black text-white">
                                            <i class="fas fa-skull-crossbones mr-1"></i> Expiré
                                        </span>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $produit->nom_laboratoire }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                {{ $produit->num_enregistrement }}
                            </td>
                            <td class="px-6 py-4">
                                @if($produit->statut_amm == 'active')
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                        Actif
                                    </span>
                                @elseif($produit->statut_amm == 'suspendu')
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                        Suspendu
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">
                                        {{ $produit->statut_amm ?? 'N/A' }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right text-sm">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.produits.edit', $produit) }}" 
                                       class="text-blue-600 hover:text-blue-800 transition"
                                       title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.produits.destroy', $produit) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-800 transition"
                                                title="Supprimer">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center">
                                <div class="text-gray-400">
                                    <i class="fas fa-pills text-4xl mb-4"></i>
                                    <p class="text-lg font-medium">Aucun produit trouvé</p>
                                    <p class="text-sm mt-2">Commencez par ajouter votre premier produit</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($produits->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $produits->links() }}
            </div>
        @endif
    </div>
</div>
@endsection