@extends('layouts.admin')

@section('title', 'Colis')
@section('page-title', 'Liste des Colis soumis')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Colis soumis</h2>
            <p class="text-gray-600 mt-1">Tous les colis envoyés par les utilisateurs</p>
        </div>
    </div>
    
    <!-- Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom et Prénom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Téléphone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fichier</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($colis as $c)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $c->nom_prenom }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $c->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $c->phone ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ Str::limit($c->message, 50) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">
                                @if($c->pathfile)
                                    <a href="{{ asset('storage/'.$c->pathfile) }}" class="text-blue-600 hover:underline" target="_blank">Voir</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $c->user?->name ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $c->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-12 text-center text-gray-400">
                                Aucun colis soumis pour le moment.
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
@endsection
