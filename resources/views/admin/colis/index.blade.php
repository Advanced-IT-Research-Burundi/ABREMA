@extends('layouts.admin')

@section('title', 'Gestion des Colis')
@section('page-title', 'Colis Soumis')

@section('content')
<div class="space-y-6">
    <!-- Header with Stats -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Gestion des Colis</h2>
                <p class="text-gray-600 mt-1">Suivez et gérez les demandes de suivi de colis</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-center">
                    <p class="text-3xl font-bold text-gray-800">{{ $totalColis ?? 0 }}</p>
                    <p class="text-xs text-gray-600">Total</p>
                </div>
                <div class="w-px h-12 bg-gray-300"></div>
                <div class="text-center">
                    <p class="text-3xl font-bold text-red-600">{{ $pendingColis ?? 0 }}</p>
                    <p class="text-xs text-gray-600">En attente</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <form method="GET" action="{{ route('admin.colis.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Rechercher</label>
                <div class="relative">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nom, email, téléphone..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Date de début</label>
                <input type="date" name="date_from" value="{{ request('date_from') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Date de fin</label>
                <input type="date" name="date_to" value="{{ request('date_to') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
            </div>
            
            <div class="flex items-end space-x-2">
                <button type="submit" class="flex-1 bg-primary-600 text-white px-4 py-2 rounded-lg hover:bg-primary-700 transition">
                    <i class="fas fa-filter mr-2"></i> Filtrer
                </button>
                <a href="{{ route('admin.colis.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition">
                    <i class="fas fa-redo"></i>
                </a>
            </div>
        </form>
    </div>

    <!-- Colis List -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <input type="checkbox" class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Demandeur</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Contact</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Message</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Fichier</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($colis as $item)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded border-gray-300 text-primary-600 focus:ring-primary-500">
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-semibold">
                                    {{ substr($item->nom_prenom, 0, 1) }}
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $item->nom_prenom }}</p>
                                    <p class="text-xs text-gray-500">ID: #{{ $item->id }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm">
                                <p class="text-gray-900">
                                    <i class="fas fa-envelope text-gray-400 mr-2"></i>
                                    {{ $item->email }}
                                </p>
                                @if($item->phone)
                                <p class="text-gray-600 mt-1">
                                    <i class="fas fa-phone text-gray-400 mr-2"></i>
                                    {{ $item->phone }}
                                </p>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900 line-clamp-2">{{ $item->message ?? 'Aucun message' }}</p>
                        </td>
                        <td class="px-6 py-4">
                            @if($item->pathfile)
                                <a href="{{ Storage::url($item->pathfile) }}" target="_blank" class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200 transition text-xs">
                                    <i class="fas fa-file-pdf mr-2"></i> Voir
                                </a>
                            @else
                                <span class="text-xs text-gray-400">Aucun fichier</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-gray-900">{{ $item->created_at->format('d/m/Y') }}</p>
                            <p class="text-xs text-gray-500">{{ $item->created_at->format('H:i') }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-2">
                                <button onclick="viewColis({{ $item->id }})" class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition" title="Voir">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <a href="mailto:{{ $item->email }}" class="p-2 text-green-600 hover:bg-green-50 rounded-lg transition" title="Répondre">
                                    <i class="fas fa-reply"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.colis.destroy', $item->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce colis?')" class="inline">
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
                                <i class="fas fa-box-open text-6xl text-gray-300 mb-4"></i>
                                <p class="text-gray-500 text-lg">Aucun colis trouvé</p>
                                <p class="text-gray-400 text-sm mt-2">Les demandes de suivi de colis apparaîtront ici</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($colis->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $colis->links() }}
        </div>
        @endif
    </div>
</div>

<!-- View Colis Modal -->
<div id="viewColisModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-xl font-bold text-gray-800">Détails du Colis</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>
        <div id="modalContent" class="p-6">
            <!-- Content will be loaded here -->
        </div>
    </div>
</div>

<script>
function viewColis(id) {
    const modal = document.getElementById('viewColisModal');
    const content = document.getElementById('modalContent');
    
    // Show modal
    modal.classList.remove('hidden');
    
    // Fetch colis data (you'll need to create this route)
    fetch(`/admin/colis/${id}/show`)
        .then(response => response.json())
        .then(data => {
            content.innerHTML = `
                <div class="space-y-6">
                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                                ${data.nom_prenom.charAt(0)}
                            </div>
                            <div class="ml-4">
                                <h4 class="text-xl font-bold text-gray-800">${data.nom_prenom}</h4>
                                <p class="text-sm text-gray-600">Colis #${data.id}</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                            <p class="text-gray-800">${data.email}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-1">Téléphone</label>
                            <p class="text-gray-800">${data.phone || 'Non fourni'}</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-2">Message</label>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-800">${data.message || 'Aucun message'}</p>
                        </div>
                    </div>

                    ${data.pathfile ? `
                        <div>
                            <label class="block text-sm font-medium text-gray-600 mb-2">Fichier Joint</label>
                            <a href="${data.pathfile}" target="_blank" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                                <i class="fas fa-download mr-2"></i> Télécharger le fichier
                            </a>
                        </div>
                    ` : ''}

                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <label class="block text-gray-600 mb-1">Date de soumission</label>
                            <p class="text-gray-800 font-medium">${new Date(data.created_at).toLocaleString('fr-FR')}</p>
                        </div>
                        <div>
                            <label class="block text-gray-600 mb-1">Dernière mise à jour</label>
                            <p class="text-gray-800 font-medium">${new Date(data.updated_at).toLocaleString('fr-FR')}</p>
                        </div>
                    </div>

                    <div class="flex space-x-3">
                        <a href="mailto:${data.email}" class="flex-1 bg-green-600 text-white px-4 py-3 rounded-lg hover:bg-green-700 transition text-center">
                            <i class="fas fa-reply mr-2"></i> Répondre par Email
                        </a>
                        ${data.phone ? `
                            <a href="tel:${data.phone}" class="flex-1 bg-blue-600 text-white px-4 py-3 rounded-lg hover:bg-blue-700 transition text-center">
                                <i class="fas fa-phone mr-2"></i> Appeler
                            </a>
                        ` : ''}
                    </div>
                </div>
            `;
        })
        .catch(error => {
            content.innerHTML = `
                <div class="text-center py-12">
                    <i class="fas fa-exclamation-triangle text-4xl text-red-500 mb-4"></i>
                    <p class="text-red-600">Erreur lors du chargement des données</p>
                </div>
            `;
        });
}

function closeModal() {
    document.getElementById('viewColisModal').classList.add('hidden');
}
</script>
@endsection