@extends('layouts.admin')

@section('title', 'Colis Soumis')
@section('page-title', 'Gestion des Colis')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Colis Soumis</h2>
            <p class="text-gray-600 mt-1">Gérer les demandes de colis des visiteurs</p>
        </div>
        <div class="flex items-center space-x-3">
            <span class="px-4 py-2 bg-red-100 text-red-800 rounded-lg font-medium">
                <i class="fas fa-box mr-2"></i>{{ $colis->total() }} demandes
            </span>
        </div>
    </div>
    
    <!-- Filters -->
    <div class="bg-white rounded-lg shadow-sm p-4">
        <form method="GET" action="{{ route('admin.colis.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="md:col-span-2">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Rechercher par nom, email ou téléphone..." 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                >
            </div>
            <div>
                <input 
                    type="date" 
                    name="date" 
                    value="{{ request('date') }}"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                >
            </div>
            <div class="flex gap-2">
                <button type="submit" class="flex-1 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition">
                    <i class="fas fa-search mr-2"></i>Filtrer
                </button>
                <a href="{{ route('admin.colis.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition">
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
                            <input type="checkbox" class="rounded border-gray-300">
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Demandeur
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Contact
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Message
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Document
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($colis as $item)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="rounded border-gray-300">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-700 font-bold flex-shrink-0">
                                        {{ strtoupper(substr($item->nom_prenom, 0, 1)) }}
                                    </div>
                                    <div class="ml-3">
                                        <div class="text-sm font-medium text-gray-900">{{ $item->nom_prenom }}</div>
                                        <div class="text-xs text-gray-500">ID: #{{ $item->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    <i class="fas fa-envelope text-gray-400 mr-2"></i>{{ $item->email }}
                                </div>
                                @if($item->phone)
                                    <div class="text-sm text-gray-500 mt-1">
                                        <i class="fas fa-phone text-gray-400 mr-2"></i>{{ $item->phone }}
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($item->message)
                                    <div class="text-sm text-gray-700 max-w-xs truncate" title="{{ $item->message }}">
                                        {{ Str::limit($item->message, 50) }}
                                    </div>
                                @else
                                    <span class="text-gray-400 text-sm italic">Aucun message</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($item->pathfile)
                                    <a href="{{ Storage::url($item->pathfile) }}" 
                                       target="_blank"
                                       class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition text-sm">
                                        <i class="fas fa-file-download mr-2"></i>
                                        Télécharger
                                    </a>
                                @else
                                    <span class="text-gray-400 text-sm italic">Aucun fichier</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                <div>{{ $item->created_at->format('d/m/Y') }}</div>
                                <div class="text-xs text-gray-500">{{ $item->created_at->format('H:i') }}</div>
                            </td>
                            <td class="px-6 py-4 text-right text-sm">
                                <div class="flex items-center justify-end space-x-2">
                                    <button 
                                        onclick="showColis({{ $item->id }})"
                                        class="text-blue-600 hover:text-blue-800 transition"
                                        title="Voir détails">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <a href="mailto:{{ $item->email }}" 
                                       class="text-green-600 hover:text-green-800 transition"
                                       title="Envoyer un email">
                                        <i class="fas fa-envelope"></i>
                                    </a>
                                    <form action="{{ route('admin.colis.destroy', $item) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
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
                                    <i class="fas fa-box-open text-4xl mb-4"></i>
                                    <p class="text-lg font-medium">Aucune demande de colis</p>
                                    <p class="text-sm mt-2">Les demandes soumises par les visiteurs apparaîtront ici</p>
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

<!-- Modal pour voir les détails -->
<div id="colisModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Détails de la Demande</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div id="colisDetails" class="p-6">
            <!-- Content will be loaded here -->
        </div>
    </div>
</div>

@push('scripts')
<script>
function showColis(id) {
    // This would typically fetch from server
    document.getElementById('colisModal').classList.remove('hidden');
    document.getElementById('colisDetails').innerHTML = '<div class="text-center py-8"><i class="fas fa-spinner fa-spin text-3xl text-gray-400"></i></div>';
    
    // Simulate loading - replace with actual AJAX call
    setTimeout(() => {
        fetch(`/admin/colis/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('colisDetails').innerHTML = `
                    <div class="space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm font-medium text-gray-600">Nom Prénom</label>
                                <p class="text-gray-900 mt-1">${data.nom_prenom}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600">Email</label>
                                <p class="text-gray-900 mt-1">${data.email}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600">Téléphone</label>
                                <p class="text-gray-900 mt-1">${data.phone || 'Non renseigné'}</p>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-600">Date de soumission</label>
                                <p class="text-gray-900 mt-1">${data.created_at}</p>
                            </div>
                        </div>
                        <div>
                            <label class="text-sm font-medium text-gray-600">Message</label>
                            <p class="text-gray-900 mt-1 whitespace-pre-wrap">${data.message || 'Aucun message'}</p>
                        </div>
                        ${data.pathfile ? `
                        <div>
                            <label class="text-sm font-medium text-gray-600">Document joint</label>
                            <a href="${data.pathfile}" target="_blank" class="inline-flex items-center mt-2 px-4 py-2 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition">
                                <i class="fas fa-file-download mr-2"></i>
                                Télécharger le document
                            </a>
                        </div>
                        ` : ''}
                    </div>
                `;
            });
    }, 500);
}

function closeModal() {
    document.getElementById('colisModal').classList.add('hidden');
}

// Close modal on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});
</script>
@endpush
@endsection