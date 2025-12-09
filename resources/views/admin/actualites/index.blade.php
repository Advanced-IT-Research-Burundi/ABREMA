{{-- INDEX --}}
@extends('layouts.admin')

@section('title', 'Gestion des Actualités')
@section('page-title', 'Actualités')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Actualités</h2>
            <p class="text-gray-600 mt-1">Gérez les actualités et annonces</p>
        </div>
        <a href="{{ route('admin.actualites.create') }}" class="mt-4 md:mt-0 inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition shadow-sm">
            <i class="fas fa-plus mr-2"></i> Nouvelle Actualité
        </a>
    </div>

    <!-- Search -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <form method="GET" action="{{ route('admin.actualites.index') }}" class="flex gap-4">
            <div class="flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher une actualité..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
            </div>
            <button type="submit" class="px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

    <!-- Actualités Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($actualites as $actualite)
        <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition group">
            @if($actualite->image)
                <img src="{{ Storage::url($actualite->image) }}" alt="{{ $actualite->title }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300">
            @else
                <div class="w-full h-48 bg-gradient-to-br from-green-100 to-green-200 flex items-center justify-center">
                    <i class="fas fa-newspaper text-6xl text-green-400"></i>
                </div>
            @endif
            
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">{{ $actualite->title }}</h3>
                <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $actualite->description }}</p>
                
                <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                    <span>
                        <i class="far fa-calendar mr-1"></i>
                        {{ $actualite->created_at->format('d/m/Y') }}
                    </span>
                    <span>
                        <i class="far fa-user mr-1"></i>
                        {{ $actualite->user->name ?? 'Admin' }}
                    </span>
                </div>

                <div class="flex items-center space-x-2 pt-4 border-t border-gray-200">
                    <a href="{{ route('admin.actualites.show', $actualite->id) }}" class="flex-1 px-3 py-2 text-center bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition text-sm">
                        <i class="fas fa-eye mr-1"></i> Voir
                    </a>
                    <a href="{{ route('admin.actualites.edit', $actualite->id) }}" class="flex-1 px-3 py-2 text-center bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition text-sm">
                        <i class="fas fa-edit mr-1"></i> Modifier
                    </a>
                    <form method="POST" action="{{ route('admin.actualites.destroy', $actualite->id) }}" onsubmit="return confirm('Êtes-vous sûr?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3">
            <div class="bg-white rounded-xl shadow-sm p-12 text-center">
                <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
                <p class="text-gray-500 text-lg mb-4">Aucune actualité trouvée</p>
                <a href="{{ route('admin.actualites.create') }}" class="inline-flex items-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                    <i class="fas fa-plus mr-2"></i> Créer une actualité
                </a>
            </div>
        </div>
        @endforelse
    </div>

    @if($actualites->hasPages())
    <div class="bg-white rounded-xl shadow-sm p-6">
        {{ $actualites->links() }}
    </div>
    @endif
</div>
@endsection