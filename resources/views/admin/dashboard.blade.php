@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Tableau de Bord')

@section('content')
<div class="space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Produits -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Produits</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['produits'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-pills text-blue-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.produits.index') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                    Voir tout <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        
        <!-- Actualités -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Actualités</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['actualites'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-newspaper text-green-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.actualites.index') }}" class="text-sm text-green-600 hover:text-green-700 font-medium">
                    Voir tout <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        
        <!-- Colis -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Colis en Attente</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['colis'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-box text-red-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.colis.index') }}" class="text-sm text-red-600 hover:text-red-700 font-medium">
                    Voir tout <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
        
        <!-- Partenaires -->
        <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Partenaires</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['partenaires'] ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-handshake text-purple-600 text-xl"></i>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('admin.partenaires.index') }}" class="text-sm text-purple-600 hover:text-purple-700 font-medium">
                    Voir tout <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Activities -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Activités Récentes</h3>
            <div class="space-y-4">
                @forelse($recentActivities ?? [] as $activity)
                    <div class="flex items-start space-x-3 pb-4 border-b last:border-0">
                        <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas {{ $activity->icon }} text-gray-600"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-800">{{ $activity->description }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $activity->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-8">Aucune activité récente</p>
                @endforelse
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Actions Rapides</h3>
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.produits.create') }}" class="p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-green-500 hover:bg-green-50 transition text-center">
                    <i class="fas fa-plus-circle text-3xl text-gray-400 mb-2"></i>
                    <p class="text-sm font-medium text-gray-700">Nouveau Produit</p>
                </a>
                
                <a href="{{ route('admin.actualites.create') }}" class="p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-green-500 hover:bg-green-50 transition text-center">
                    <i class="fas fa-newspaper text-3xl text-gray-400 mb-2"></i>
                    <p class="text-sm font-medium text-gray-700">Nouvelle Actualité</p>
                </a>
                
                <a href="{{ route('admin.publications.create') }}" class="p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-green-500 hover:bg-green-50 transition text-center">
                    <i class="fas fa-book text-3xl text-gray-400 mb-2"></i>
                    <p class="text-sm font-medium text-gray-700">Nouvelle Publication</p>
                </a>
                
                <a href="{{ route('admin.partenaires.create') }}" class="p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-green-500 hover:bg-green-50 transition text-center">
                    <i class="fas fa-handshake text-3xl text-gray-400 mb-2"></i>
                    <p class="text-sm font-medium text-gray-700">Nouveau Partenaire</p>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Latest Items -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Latest Products -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Derniers Produits</h3>
                <a href="{{ route('admin.produits.index') }}" class="text-sm text-green-600 hover:text-green-700">Voir tout</a>
            </div>
            <div class="space-y-3">
                @forelse($latestProducts ?? [] as $product)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex-1">
                            <p class="font-medium text-gray-800 text-sm">{{ $product->designation_commerciale }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $product->dci }}</p>
                        </div>
                        <span class="px-3 py-1 text-xs font-medium rounded-full {{ $product->statut_amm == 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $product->statut_amm ?? 'N/A' }}
                        </span>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-8">Aucun produit disponible</p>
                @endforelse
            </div>
        </div>
        
        <!-- Latest News -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Dernières Actualités</h3>
                <a href="{{ route('admin.actualites.index') }}" class="text-sm text-green-600 hover:text-green-700">Voir tout</a>
            </div>
            <div class="space-y-3">
                @forelse($latestNews ?? [] as $news)
                    <div class="flex items-start space-x-3 p-3 bg-gray-50 rounded-lg">
                        @if($news->image)
                            <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-16 h-16 object-cover rounded">
                        @else
                            <div class="w-16 h-16 bg-gray-200 rounded flex items-center justify-center">
                                <i class="fas fa-image text-gray-400"></i>
                            </div>
                        @endif
                        <div class="flex-1 min-w-0">
                            <p class="font-medium text-gray-800 text-sm truncate">{{ $news->title }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $news->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-8">Aucune actualité disponible</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection