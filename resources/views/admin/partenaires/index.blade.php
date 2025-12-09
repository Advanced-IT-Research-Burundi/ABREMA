{{-- PARTENAIRES INDEX --}}
@extends('layouts.admin')

@section('title', 'Gestion des Partenaires')
@section('page-title', 'Partenaires')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Nos Partenaires</h2>
        <a href="{{ route('admin.partenaires.create') }}" class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
            <i class="fas fa-plus mr-2"></i> Nouveau Partenaire
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($partenaires as $partenaire)
        <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-lg transition group">
            @if($partenaire->logo)
                <div class="h-32 flex items-center justify-center mb-4 bg-gray-50 rounded-lg p-4">
                    <img src="{{ Storage::url($partenaire->logo) }}" alt="{{ $partenaire->nom }}" class="max-h-full max-w-full object-contain group-hover:scale-110 transition">
                </div>
            @else
                <div class="h-32 flex items-center justify-center mb-4 bg-gradient-to-br from-purple-100 to-purple-200 rounded-lg">
                    <i class="fas fa-handshake text-5xl text-purple-400"></i>
                </div>
            @endif
            
            <h3 class="text-lg font-semibold text-gray-800 mb-2 text-center">{{ $partenaire->nom }}</h3>
            
            @if($partenaire->description)
                <p class="text-sm text-gray-600 text-center mb-4 line-clamp-2">{{ $partenaire->description }}</p>
            @endif

            @if($partenaire->link)
                <a href="{{ $partenaire->link }}" target="_blank" class="block text-center text-xs text-purple-600 hover:text-purple-700 mb-4">
                    <i class="fas fa-external-link-alt mr-1"></i> Visiter le site
                </a>
            @endif

            <div class="flex space-x-2 pt-4 border-t">
                <a href="{{ route('admin.partenaires.edit', $partenaire->id) }}" class="flex-1 px-3 py-2 text-center bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition text-sm">
                    <i class="fas fa-edit"></i>
                </a>
                <form method="POST" action="{{ route('admin.partenaires.destroy', $partenaire->id) }}" onsubmit="return confirm('Supprimer ce partenaire?')" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-3 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition text-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-4 bg-white rounded-xl shadow-sm p-12 text-center">
            <i class="fas fa-handshake text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 mb-4">Aucun partenaire</p>
            <a href="{{ route('admin.partenaires.create') }}" class="inline-flex items-center px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                <i class="fas fa-plus mr-2"></i> Ajouter un partenaire
            </a>
        </div>
        @endforelse
    </div>
</div>
@endsection