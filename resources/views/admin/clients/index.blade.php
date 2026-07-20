@extends('layouts.admin')

@section('title', 'Clients')
@section('page-title', 'Gestion des Clients')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Liste des Clients</h2>
            <p class="text-gray-600 mt-1">Gérer les organisations clientes</p>
        </div>
        <a href="{{ route('admin.clients.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition">
            <i class="fas fa-plus mr-2"></i>
            Ajouter un Client
        </a>
    </div>
    
    <!-- Search -->
    <div class="bg-white rounded-lg shadow-sm p-4">
        <form method="GET" action="{{ route('admin.clients.index') }}" class="flex gap-4">
            <div class="flex-1">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}"
                    placeholder="Rechercher un client..." 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                >
            </div>
            <button type="submit" class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition">
                <i class="fas fa-search mr-2"></i>Rechercher
            </button>
        </form>
    </div>
    
    <!-- Grid View -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse($clients as $client)
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition overflow-hidden">
                <!-- Logo -->
                {{-- <div class="h-40 bg-gradient-to-br from-gray-50 to-gray-100 flex items-center justify-center p-6">
                    @if($client->image)
                        <img src="{{ Storage::url($client->image) }}" 
                             alt="{{ $client->name }}" 
                             class="max-h-full max-w-full object-contain">
                    @else
                        <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                            <i class="fas fa-building text-gray-400 text-3xl"></i>
                        </div>
                    @endif
                </div> --}}
                
                <!-- Content -->
                <div class="p-4">
                    <h3 class="text-lg font-bold text-gray-800 mb-2 truncate" title="{{ $client->name }}">
                        {{ $client->name }}
                    </h3>
                    
                    @if($client->description)
                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                            {{ $client->description }}
                        </p>
                    @else
                        <p class="text-sm text-gray-400 italic mb-4">Aucune description</p>
                    @endif
                    
                    <!-- Actions -->
                    <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.clients.edit', $client) }}" 
                           class="text-blue-600 hover:text-blue-800 transition text-sm font-medium">
                            <i class="fas fa-edit mr-1"></i> Modifier
                        </a>
                        <form action="{{ route('admin.clients.destroy', $client) }}" 
                              method="POST" 
                              class="inline"
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-600 hover:text-red-800 transition text-sm font-medium">
                                <i class="fas fa-trash mr-1"></i> Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <i class="fas fa-building text-gray-300 text-5xl mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-800 mb-2">Aucun client</h3>
                    <p class="text-gray-600 mb-6">Commencez par ajouter votre premier client</p>
                    <a href="{{ route('admin.clients.create') }}" 
                       class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition">
                        <i class="fas fa-plus mr-2"></i>
                        Ajouter un Premier Client
                    </a>
                </div>
            </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    @if($clients->hasPages())
        <div class="flex justify-center">
            {{ $clients->links() }}
        </div>
    @endif
</div>
@endsection