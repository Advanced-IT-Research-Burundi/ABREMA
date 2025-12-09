@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Tableau de Bord')

@section('content')
    <div class="space-y-6">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Produits -->
            <div
                class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-100 text-sm font-medium mb-1">Médicaments</p>
                        <p class="text-4xl font-bold">{{ $stats['produits'] ?? 0 }}</p>
                        <p class="text-blue-100 text-xs mt-2">
                            <i class="fas fa-arrow-up mr-1"></i>
                            +{{ $stats['produits_month'] ?? 0 }} ce mois
                        </p>
                    </div>
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <i class="fas fa-pills text-3xl"></i>
                    </div>
                </div>
            </div>

            <!-- Actualités -->
            <div
                class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-100 text-sm font-medium mb-1">Actualités</p>
                        <p class="text-4xl font-bold">{{ $stats['actualites'] ?? 0 }}</p>
                        <p class="text-green-100 text-xs mt-2">
                            <i class="fas fa-arrow-up mr-1"></i>
                            +{{ $stats['actualites_month'] ?? 0 }} ce mois
                        </p>
                    </div>
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <i class="fas fa-newspaper text-3xl"></i>
                    </div>
                </div>
            </div>

            <!-- Colis en Attente -->
            <div
                class="bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-red-100 text-sm font-medium mb-1">Colis en Attente</p>
                        <p class="text-4xl font-bold">{{ $stats['colis'] ?? 0 }}</p>
                        <p class="text-red-100 text-xs mt-2">
                            <i class="fas fa-clock mr-1"></i>
                            À traiter
                        </p>
                    </div>
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <i class="fas fa-box text-3xl"></i>
                    </div>
                </div>
            </div>

            <!-- Partenaires -->
            <div
                class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-purple-100 text-sm font-medium mb-1">Partenaires</p>
                        <p class="text-4xl font-bold">{{ $stats['partenaires'] ?? 0 }}</p>
                        <p class="text-purple-100 text-xs mt-2">
                            <i class="fas fa-check-circle mr-1"></i>
                            Actifs
                        </p>
                    </div>
                    <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                        <i class="fas fa-handshake text-3xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Stats Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Publications -->
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Publications</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $stats['publications'] ?? 0 }}</p>
                    </div>
                    <i class="fas fa-book text-3xl text-yellow-500"></i>
                </div>
            </div>

            <!-- Textes Réglementaires -->
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-indigo-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Textes Réglementaires</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $stats['textes'] ?? 0 }}</p>
                    </div>
                    <i class="fas fa-gavel text-3xl text-indigo-500"></i>
                </div>
            </div>

            <!-- Équipe Direction -->
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-teal-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600 font-medium">Équipe Direction</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $stats['equipe'] ?? 0 }}</p>
                    </div>
                    <i class="fas fa-users text-3xl text-teal-500"></i>
                </div>
            </div>
        </div>

        <!-- Charts and Activity Row -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Monthly Statistics Chart -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-6">Statistiques Mensuelles</h3>
                <div class="h-64">
                    <canvas id="monthlyChart"></canvas>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Actions Rapides</h3>
                <div class="space-y-3">
                    <a href="{{ route('admin.produits.create') }}"
                        class="block p-4 bg-gradient-to-r from-blue-50 to-blue-100 rounded-lg hover:from-blue-100 hover:to-blue-200 transition group">
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                                <i class="fas fa-plus text-white"></i>
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-700">Nouveau Médicament</span>
                        </div>
                    </a>

                    <a href="{{ route('admin.actualites.create') }}"
                        class="block p-4 bg-gradient-to-r from-green-50 to-green-100 rounded-lg hover:from-green-100 hover:to-green-200 transition group">
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                                <i class="fas fa-newspaper text-white"></i>
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-700">Nouvelle Actualité</span>
                        </div>
                    </a>

                    <a href="{{ route('admin.publications.create') }}"
                        class="block p-4 bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-lg hover:from-yellow-100 hover:to-yellow-200 transition group">
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                                <i class="fas fa-book text-white"></i>
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-700">Nouvelle Publication</span>
                        </div>
                    </a>

                    <a href="{{ route('admin.colis.index') }}"
                        class="block p-4 bg-gradient-to-r from-red-50 to-red-100 rounded-lg hover:from-red-100 hover:to-red-200 transition group">
                        <div class="flex items-center">
                            <div
                                class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center group-hover:scale-110 transition">
                                <i class="fas fa-box text-white"></i>
                            </div>
                            <div class="ml-3 flex-1 flex items-center justify-between">
                                <span class="text-sm font-medium text-gray-700">Gérer les Colis</span>
                                @if ($stats['colis'] > 0)
                                    <span
                                        class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ $stats['colis'] }}</span>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activity and Latest Items -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Activities -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Activités Récentes</h3>
                    <span class="text-xs text-gray-500">Dernières 24h</span>
                </div>
                <div class="space-y-4">
                    @forelse($recentActivities ?? [] as $activity)
                        <div class="flex items-start space-x-4 pb-4 border-b last:border-0">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-primary-100 to-primary-200 rounded-full flex items-center justify-center flex-shrink-0">
                                <i class="fas {{ $activity->icon }} text-primary-600"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-800">{{ $activity->description }}</p>
                                <p class="text-xs text-gray-500 mt-1">
                                    <i class="far fa-clock mr-1"></i>
                                    {{ $activity->created_at->diffForHumans() }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <i class="fas fa-inbox text-4xl text-gray-300 mb-3"></i>
                            <p class="text-gray-500">Aucune activité récente</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Latest Products -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Derniers Médicaments</h3>
                    <a href="{{ route('admin.produits.index') }}"
                        class="text-sm text-primary-600 hover:text-primary-700 font-medium">
                        Voir tout <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>
                <div class="space-y-3">
                    @forelse($latestProducts ?? [] as $product)
                        <div
                            class="flex items-center justify-between p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                            <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-800 text-sm truncate">
                                    {{ $product->designation_commerciale }}</p>
                                <p class="text-xs text-gray-500 mt-1">{{ $product->dci }}</p>
                            </div>
                            <span
                                class="ml-3 px-3 py-1 text-xs font-medium rounded-full {{ $product->statut_amm == 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-800' }}">
                                {{ $product->statut_amm ?? 'N/A' }}
                            </span>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <i class="fas fa-pills text-4xl text-gray-300 mb-3"></i>
                            <p class="text-gray-500">Aucun médicament disponible</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Latest News -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-800">Dernières Actualités</h3>
                <a href="{{ route('admin.actualites.index') }}"
                    class="text-sm text-primary-600 hover:text-primary-700 font-medium">
                    Voir tout <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($latestNews ?? [] as $news)
                    <div class="group border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition">
                        @if ($news->image)
                            <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}"
                                class="w-full h-40 object-cover">
                        @else
                            <div
                                class="w-full h-40 bg-gradient-to-br from-primary-100 to-primary-200 flex items-center justify-center">
                                <i class="fas fa-image text-4xl text-primary-400"></i>
                            </div>
                        @endif
                        <div class="p-4">
                            <h4
                                class="font-medium text-gray-800 text-sm group-hover:text-primary-600 transition line-clamp-2">
                                {{ $news->title }}</h4>
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="far fa-calendar mr-1"></i>
                                {{ $news->created_at->format('d/m/Y') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <i class="fas fa-newspaper text-4xl text-gray-300 mb-3"></i>
                        <p class="text-gray-500">Aucune actualité disponible</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Monthly Statistics Chart
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
                datasets: [{
                        label: 'Médicaments',
                        data: @json($chartData['produits'] ?? [12, 19, 15, 25, 22, 30, 28, 35, 32, 40, 38, 45]),
                        borderColor: 'rgb(59, 130, 246)',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.4
                    },
                    {
                        label: 'Actualités',
                        data: @json($chartData['actualites'] ?? [5, 8, 6, 12, 10, 15, 13, 18, 16, 20, 19, 23]),
                        borderColor: 'rgb(34, 197, 94)',
                        backgroundColor: 'rgba(34, 197, 94, 0.1)',
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
