{{-- PARTENAIRES INDEX --}}
@extends('layouts.admin')

@section('title', 'Gestion des Partenaires')
@section('page-title', 'Partenaires')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h2 class="text-2xl font-bold text-gray-800">Nos Partenaires</h2>
        <a href="{{ route('admin.partenaires.create') }}" class="px-6 py-3 text-white transition bg-purple-600 rounded-lg hover:bg-purple-700">
            <i class="mr-2 fas fa-plus"></i> Nouveau Partenaire
        </a>
    </div>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
        @forelse($partenaires as $partenaire)
        <div class="p-6 transition bg-white shadow-sm rounded-xl hover:shadow-lg group">
            @if($partenaire->logo)
                <div class="flex items-center justify-center h-32 p-4 mb-4 rounded-lg bg-gray-50">
                    <img src="{{ asset("uploads/".$partenaire->logo) }}" alt="{{ $partenaire->nom }}" class="object-contain max-w-full max-h-full transition group-hover:scale-110">
                </div>
            @else
                <div class="flex items-center justify-center h-32 mb-4 rounded-lg bg-gradient-to-br from-purple-100 to-purple-200">
                    <i class="text-5xl text-purple-400 fas fa-handshake"></i>
                </div>
            @endif
            
            <h3 class="mb-2 text-lg font-semibold text-center text-gray-800">{{ $partenaire->nom }}</h3>
            
            @if($partenaire->description)
                <p class="mb-4 text-sm text-center text-gray-600 line-clamp-2">{{ $partenaire->description }}</p>
            @endif

            @if($partenaire->link)
                <a href="{{ $partenaire->link }}" target="_blank" class="block mb-4 text-xs text-center text-purple-600 hover:text-purple-700">
                    <i class="mr-1 fas fa-external-link-alt"></i> Visiter le site
                </a>
            @endif

            <div class="flex pt-4 space-x-2 border-t">
                <a href="{{ route('admin.partenaires.edit', $partenaire->id) }}" class="flex-1 px-3 py-2 text-sm text-center text-green-600 transition rounded-lg bg-green-50 hover:bg-green-100">
                    <i class="fas fa-edit"></i>
                </a>
                <form method="POST" action="{{ route('admin.partenaires.destroy', $partenaire->id) }}" onsubmit="return confirm('Supprimer ce partenaire?')" class="flex-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full px-3 py-2 text-sm text-red-600 transition rounded-lg bg-red-50 hover:bg-red-100">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
        @empty
        <div class="col-span-4 p-12 text-center bg-white shadow-sm rounded-xl">
            <i class="mb-4 text-6xl text-gray-300 fas fa-handshake"></i>
            <p class="mb-4 text-gray-500">Aucun partenaire</p>
            <a href="{{ route('admin.partenaires.create') }}" class="inline-flex items-center px-6 py-3 text-white bg-purple-600 rounded-lg hover:bg-purple-700">
                <i class="mr-2 fas fa-plus"></i> Ajouter un partenaire
            </a>
        </div>
        @endforelse
    </div>
</div>
@endsection