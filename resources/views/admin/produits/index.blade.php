@extends('layouts.admin')

@section('title', 'Produits')
@section('page-title', 'Gestion des Produits')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Liste des Produits</h2>
            <p class="mt-1 text-gray-600">Gérer les médicaments enregistrés</p>
        </div>
        <div class="flex flex-wrap gap-2">
            <a href="{{ route('admin.produits.template') }}" class="inline-flex items-center px-4 py-2 font-medium text-gray-700 transition bg-gray-100 rounded-lg hover:bg-gray-200" title="Télécharger le modèle CSV">
                <i class="mr-2 fas fa-file-download"></i>
                Modèle Import
            </a>
            
            <a href="{{ route('admin.produits.import') }}" class="inline-flex items-center px-4 py-2 font-medium text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">   <i class="mr-2 fas fa-file-import"></i> Importer</a>
            <a href="{{ route('admin.produits.create') }}" class="inline-flex items-center px-4 py-2 font-medium text-white transition bg-green-600 rounded-lg hover:bg-green-700">
                <i class="mr-2 fas fa-plus"></i>
                Ajouter un Produit
            </a>
        </div>
    </div>
    
    <!-- Filters -->
    <div class="p-4 bg-white rounded-lg shadow-sm">
        <form method="GET" action="{{ route('admin.produits.index') }}" class="grid grid-cols-1 gap-4 md:grid-cols-4">
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
                <button type="submit" class="flex-1 px-4 py-2 text-white transition bg-green-600 rounded-lg hover:bg-green-700">
                    <i class="mr-2 fas fa-search"></i>Filtrer
                </button>
                <a href="{{ route('admin.produits.index') }}" class="px-4 py-2 text-gray-700 transition bg-gray-200 rounded-lg hover:bg-gray-300">
                    <i class="fas fa-redo"></i>
                </a>
            </div>
        </form>
    </div>
    
    <!-- Table -->
    <div class="overflow-hidden bg-white rounded-lg shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Désignation
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            DCI
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Forme
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Laboratoire
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            N° Enregistrement
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                            Statut
                        </th>
                        <th class="px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($produits as $produit)
                        <tr class="transition hover:bg-gray-50">
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
                                            <i class="mr-1 fas fa-exclamation-triangle"></i> Expire bientôt
                                        </span>
                                    </div>
                                @endif
                                @if($produit->is_expired)
                                    <div class="mt-1">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-black text-white">
                                            <i class="mr-1 fas fa-skull-crossbones"></i> Expiré
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
                                    <span class="px-3 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">
                                        Actif
                                    </span>
                                @elseif($produit->statut_amm == 'suspendu')
                                    <span class="px-3 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full">
                                        Suspendu
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs font-medium text-gray-800 bg-gray-100 rounded-full">
                                        {{ $produit->statut_amm ?? 'N/A' }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.produits.edit', $produit) }}" 
                                       class="text-blue-600 transition hover:text-blue-800"
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
                                                class="text-red-600 transition hover:text-red-800"
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
                                    <i class="mb-4 text-4xl fas fa-pills"></i>
                                    <p class="text-lg font-medium">Aucun produit trouvé</p>
                                    <p class="mt-2 text-sm">Commencez par ajouter votre premier produit</p>
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

    <!-- Import Modal -->
    <div id="importModal" class="fixed inset-0 z-50 flex items-center justify-center hidden p-4 overflow-auto bg-black bg-opacity-50">
        <div class="w-full max-w-md overflow-hidden bg-white shadow-2xl rounded-xl">
            <div class="flex items-center justify-between p-6 border-b border-gray-100">
                <h3 class="text-xl font-bold text-gray-800">Importer des produits</h3>
                <button onclick="document.getElementById('importModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form action="{{ route('admin.produits.import') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf
                <div class="space-y-4">
                    <p class="text-sm text-gray-600">
                        Sélectionnez un fichier Excel (xlsx, xls) ou CSV. 
                        Utilisez le <a href="{{ route('admin.produits.template') }}" class="text-blue-600 hover:underline">modèle</a> pour assurer la compatibilité.
                    </p>
                    <div class="p-6 text-center transition border-2 border-gray-300 border-dashed rounded-lg hover:border-blue-400" onclick="document.getElementById('importFile').click()">
                        <input type="file" name="file" id="importFile" class="hidden" accept=".xlsx, .xls, .csv" required onchange="updateFileName(this)">
                        <i class="mb-2 text-3xl text-gray-400 fas fa-cloud-upload-alt"></i>
                        <p id="fileNameDisplay" class="text-sm font-medium text-gray-500">Cliquez pour choisir un fichier</p>
                    </div>
                </div>
                <div class="flex gap-3 pt-4 border-t border-gray-100">
                    <button type="button" onclick="document.getElementById('importModal').classList.add('hidden')" class="flex-1 px-4 py-2 text-gray-700 transition border border-gray-300 rounded-lg hover:bg-gray-50">
                        Annuler
                    </button>
                    <button type="submit" class="flex-1 px-4 py-2 text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                        Lancer l'import
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function updateFileName(input) {
        const display = document.getElementById('fileNameDisplay');
        if (input.files && input.files[0]) {
            display.textContent = input.files[0].name;
            display.classList.remove('text-gray-500');
            display.classList.add('text-blue-600');
        } else {
            display.textContent = 'Cliquez pour choisir un fichier';
            display.classList.remove('text-blue-600');
            display.classList.add('text-gray-500');
        }
    }
</script>

@if(session('success'))
    <div class="fixed z-50 flex items-center gap-3 px-6 py-3 text-white bg-green-600 rounded-lg shadow-lg bottom-6 right-6 animate-bounce">
        <i class="fas fa-check-circle"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div class="fixed z-50 flex items-center gap-3 px-6 py-3 text-white bg-red-600 rounded-lg shadow-lg bottom-6 right-6 animate-bounce">
        <i class="fas fa-exclamation-circle"></i>
        <span>{{ session('error') }}</span>
    </div>
@endif
@endsection