{{-- TEXTES RÉGLEMENTAIRES INDEX --}}
@extends('layouts.admin')

@section('title', 'Textes Réglementaires')
@section('page-title', 'Textes Réglementaires')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Textes Réglementaires</h2>
        <a href="{{ route('admin.textes.create') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
            <i class="fas fa-plus mr-2"></i> Nouveau Texte
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Titre</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Fichier</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Date</th>
                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($textes as $texte)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-gavel text-indigo-600"></i>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">{{ $texte->title }}</p>
                                <p class="text-xs text-gray-500">Ajouté par {{ $texte->user->name ?? 'Admin' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        @if($texte->pathfile)
                            <a href="{{ Storage::url($texte->pathfile) }}" target="_blank" class="inline-flex items-center px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg hover:bg-indigo-200 transition text-sm">
                                <i class="fas fa-file-pdf mr-2"></i> Télécharger
                            </a>
                        @else
                            <span class="text-sm text-gray-400">Aucun fichier</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        {{ $texte->created_at->format('d/m/Y') }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.textes.edit', $texte->id) }}" class="p-2 text-green-600 hover:bg-green-50 rounded-lg">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form method="POST" action="{{ route('admin.textes.destroy', $texte->id) }}" onsubmit="return confirm('Supprimer ce texte?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-12 text-center">
                        <i class="fas fa-gavel text-6xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 mb-4">Aucun texte réglementaire</p>
                        <a href="{{ route('admin.textes.create') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            <i class="fas fa-plus mr-2"></i> Ajouter un texte
                        </a>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
