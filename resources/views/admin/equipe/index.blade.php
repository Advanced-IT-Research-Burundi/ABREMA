@extends('layouts.admin')

@section('title', 'Équipe de Direction')
@section('page-title', 'Équipe de Direction')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Équipe de Direction</h2>
            <p class="text-gray-600 mt-1">Gérer les membres de l'équipe</p>
        </div>
        <a href="{{ route('admin.equipe-directions.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition">
            <i class="fas fa-plus mr-2"></i>
            Ajouter un Membre
        </a>
    </div>
    
    <!-- Grid View -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($equipe as $membre)
            <div class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                <!-- Photo -->
                <div class="h-48 bg-gradient-to-br from-green-50 to-green-100 flex items-center justify-center">
                    @if($membre->photo)
                        <img src="{{ Storage::url($membre->photo) }}" 
                             alt="{{ $membre->nom_prenom }}" 
                             class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                    @else
                        <div class="w-32 h-32 rounded-full bg-green-600 flex items-center justify-center text-white text-4xl font-bold border-4 border-white shadow-lg">
                            {{ strtoupper(substr($membre->nom_prenom, 0, 1)) }}
                        </div>
                    @endif
                </div>
                
                <!-- Content -->
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-1">{{ $membre->nom_prenom }}</h3>
                    <div class="flex items-center text-sm text-gray-600 mb-3">
                        <i class="fas fa-envelope mr-2"></i>
                        <a href="mailto:{{ $membre->email }}" class="hover:text-green-600 transition truncate">
                            {{ $membre->email }}
                        </a>
                    </div>
                    
                    <p class="text-sm text-gray-700 mb-4 line-clamp-3">
                        {{ Str::limit($membre->description, 120) }}
                    </p>
                    
                    <!-- Actions -->
                    <div class="flex items-center justify-end space-x-2 pt-4 border-t border-gray-100">
                        <a href="{{ route('admin.equipe-directions.edit', $membre) }}" 
                           class="inline-flex items-center px-3 py-1.5 text-sm bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition">
                            <i class="fas fa-edit mr-1.5"></i>
                            Modifier
                        </a>
                        <form action="{{ route('admin.equipe-directions.destroy', $membre) }}" 
                              method="POST" 
                              class="inline"
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-flex items-center px-3 py-1.5 text-sm bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition">
                                <i class="fas fa-trash mr-1.5"></i>
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <i class="fas fa-users text-gray-300 text-5xl mb-4"></i>
                    <h3 class="text-lg font-medium text-gray-800 mb-2">Aucun membre</h3>
                    <p class="text-gray-600 mb-6">Commencez par ajouter des membres à l'équipe de direction</p>
                    <a href="{{ route('admin.equipe-directions.create') }}" 
                       class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition">
                        <i class="fas fa-plus mr-2"></i>
                        Ajouter un Premier Membre
                    </a>
                </div>
            </div>
        @endforelse
    </div>
    
    <!-- Pagination -->
    @if($equipe->hasPages())
        <div class="flex justify-center">
            {{ $equipe->links() }}
        </div>
    @endif
</div>
@endsection