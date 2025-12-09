{{-- ÉQUIPE DIRECTION INDEX --}}
@extends('layouts.admin')

@section('title', 'Équipe Direction')
@section('page-title', 'Équipe Direction')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-800">Équipe de Direction</h2>
        <a href="{{ route('admin.equipe-directions.create') }}" class="px-6 py-3 bg-teal-600 text-white rounded-lg hover:bg-teal-700 transition">
            <i class="fas fa-plus mr-2"></i> Ajouter un Membre
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($equipe as $membre)
        <div class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition">
            @if($membre->photo)
                <img src="{{ Storage::url($membre->photo) }}" alt="{{ $membre->nom_prenom }}" class="w-full h-64 object-cover">
            @else
                <div class="w-full h-64 bg-gradient-to-br from-teal-100 to-teal-200 flex items-center justify-center">
                    <i class="fas fa-user text-6xl text-teal-400"></i>
                </div>
            @endif
            
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $membre->nom_prenom }}</h3>
                <p class="text-sm text-teal-600 mb-3">
                    <i class="fas fa-envelope mr-2"></i>{{ $membre->email }}
                </p>
                <p class="text-sm text-gray-600 mb-4 line-clamp-3">{{ $membre->description }}</p>
                
                <div class="flex space-x-2 pt-4 border-t">
                    <a href="{{ route('admin.equipe-directions.edit', $membre->id) }}" class="flex-1 px-3 py-2 text-center bg-green-50 text-green-600 rounded-lg hover:bg-green-100 transition text-sm">
                        <i class="fas fa-edit mr-1"></i> Modifier
                    </a>
                    <form method="POST" action="{{ route('admin.equipe-directions.destroy', $membre->id) }}" onsubmit="return confirm('Supprimer ce membre?')" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full px-3 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition text-sm">
                            <i class="fas fa-trash mr-1"></i> Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 bg-white rounded-xl shadow-sm p-12 text-center">
            <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
            <p class="text-gray-500 mb-4">Aucun membre dans l'équipe</p>
            <a href="{{ route('admin.equipe-directions.create') }}" class="inline-flex items-center px-6 py-3 bg-teal-600 text-white rounded-lg hover:bg-teal-700">
                <i class="fas fa-plus mr-2"></i> Ajouter un membre
            </a>
        </div>
        @endforelse
    </div>
</div>
@endsection