@extends('layouts.admin')

@section('title', 'Gestion des Clients')
@section('page-title', 'Clients')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Accueil</a>
    <span>/</span>
    <span>Clients</span>
@endsection

@push('styles')
<style>
/* Réutilisation du même style que la page Actualités */
.actualites-page {
    padding: 20px;
}

.filter-card {
    background: white;
    border-radius: 12px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.filter-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 20px;
}

.filter-group label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #555;
    margin-bottom: 8px;
}

.filter-group .form-control {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 14px;
}

.filter-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.summary-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px;
    margin-bottom: 25px;
}

.summary-card {
    background: white;
    border-radius: 12px;
    padding: 20px;
    display: flex;
    align-items: center;
    gap: 15px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.summary-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    color: white;
}

.summary-value {
    font-size: 28px;
    font-weight: 700;
    color: #2c3e50;
}

.summary-label {
    font-size: 13px;
    color: #7f8c8d;
    margin-top: 2px;
}

.card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    overflow: hidden;
}

.card-header {
    padding: 20px 25px;
    border-bottom: 1px solid #f0f0f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-title {
    font-size: 18px;
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
}

.card-body {
    padding: 25px;
}

.actualites-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 25px;
}

.actualite-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    transition: transform 0.3s, box-shadow 0.3s;
}

.actualite-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

.actualite-image {
    width: 100%;
    height: 200px;
    background-size: cover;
    background-position: center;
    position: relative;
}

.actualite-no-image {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 48px;
    color: rgba(255,255,255,0.5);
}

.actualite-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s;
}

.actualite-card:hover .actualite-overlay {
    opacity: 1;
}

.action-buttons {
    display: flex;
    gap: 10px;
}

.btn-action {
    width: 40px;
    height: 40px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: none;
    cursor: pointer;
    transition: transform 0.2s;
    color: white;
}

.btn-action:hover {
    transform: scale(1.1);
}

.btn-action-info { background: #3498db; }
.btn-action-primary { background: #2ecc71; }
.btn-action-danger { background: #e74c3c; }

.actualite-content {
    padding: 20px;
}

.actualite-title {
    font-size: 18px;
    font-weight: 600;
    color: #2c3e50;
    margin: 0 0 10px 0;
}

.actualite-description {
    font-size: 14px;
    color: #7f8c8d;
    line-height: 1.6;
    margin-bottom: 15px;
}

.pagination-wrapper {
    margin-top: 30px;
    padding-top: 20px;
    border-top: 1px solid #f0f0f0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.pagination-info {
    font-size: 14px;
    color: #7f8c8d;
}
</style>
@endpush

@section('content')
<div class="actualites-page">

    {{-- -------- FILTRE -------- --}}
    <div class="filter-card">
        <form method="GET" action="{{ route('admin.clients.index') }}">
            <div class="filter-grid">

                <div class="filter-group">
                    <label>Recherche</label>
                    <input type="text" name="search" class="form-control"
                           placeholder="Nom, description..."
                           value="{{ request('search') }}">
                </div>

            </div>

            <div class="filter-actions">
                <button class="btn btn-primary">
                    <i class="fas fa-search"></i> Filtrer
                </button>

                <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
                    <i class="fas fa-redo"></i> Réinitialiser
                </a>

                <a href="{{ route('admin.clients.create') }}" class="btn btn-success" style="margin-left:auto;">
                    <i class="fas fa-plus"></i> Nouveau Client
                </a>
            </div>
        </form>
    </div>

    {{-- -------- STATS -------- --}}
    <div class="summary-cards">
        <div class="summary-card">
            <div class="summary-icon" style="background:#3498db;">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <div class="summary-value">{{ $stats['total'] }}</div>
                <div class="summary-label">Total Clients</div>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon" style="background:#2ecc71;">
                <i class="fas fa-calendar-day"></i>
            </div>
            <div>
                <div class="summary-value">{{ $stats['ce_mois'] }}</div>
                <div class="summary-label">Ajoutés ce mois</div>
            </div>
        </div>

        <div class="summary-card">
            <div class="summary-icon" style="background:#f39c12;">
                <i class="fas fa-image"></i>
            </div>
            <div>
                <div class="summary-value">{{ $stats['avec_images'] }}</div>
                <div class="summary-label">Avec image</div>
            </div>
        </div>
    </div>

    {{-- -------- LISTE DES CLIENTS -------- --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des Clients ({{ $clients->total() }})</h3>
        </div>

        <div class="card-body">
            <div class="actualites-grid">

                @forelse($clients as $client)
                    <div class="actualite-card">

                        {{-- IMAGE --}}
                        @if($client->image)
                            <div class="actualite-image"
                                 style="background-image:url('{{ asset('storage/' . $client->image) }}');">
                                <div class="actualite-overlay">
                                    <div class="action-buttons">

                                        <a href="{{ route('admin.clients.edit', $client->id) }}"
                                           class="btn-action btn-action-primary" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form method="POST"
                                              action="{{ route('admin.clients.destroy', $client->id) }}">
                                            @csrf @method('DELETE')
                                            <button class="btn-action btn-action-danger"
                                                onclick="return confirm('Supprimer ce client ?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="actualite-image actualite-no-image">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif

                        {{-- TEXTE --}}
                        <div class="actualite-content">
                            <h3 class="actualite-title">{{ $client->name }}</h3>

                            @if($client->description)
                                <p class="actualite-description">
                                    {{ Str::limit($client->description, 120) }}
                                </p>
                            @endif
                        </div>

                    </div>
                @empty

                    <div class="empty-state-grid">
                        <i class="fas fa-users"></i>
                        <p>Aucun client trouvé</p>
                    </div>

                @endforelse

            </div>

            {{-- PAGINATION --}}
            @if($clients->hasPages())
                <div class="pagination-wrapper">
                    <div class="pagination-info">
                        Affichage {{ $clients->firstItem() }} à {{ $clients->lastItem() }}  
                        sur {{ $clients->total() }} résultats
                    </div>

                    <div>
                        {{ $clients->withQueryString()->links() }}
                    </div>
                </div>
            @endif

        </div>
    </div>

</div>
@endsection
