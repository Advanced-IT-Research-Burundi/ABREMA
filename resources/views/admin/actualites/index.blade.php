@extends('layouts.admin')

@section('title', 'Gestion des Actualités')
@section('page-title', 'Actualités')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Accueil</a>
    <span>/</span>
    <span>Actualités</span>
@endsection

@push('styles')
<style>
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

.actualite-meta {
    display: flex;
    gap: 15px;
    font-size: 12px;
    color: #7f8c8d;
    margin-bottom: 12px;
}

.actualite-meta span {
    display: flex;
    align-items: center;
    gap: 5px;
}

.actualite-title {
    font-size: 18px;
    font-weight: 600;
    color: #2c3e50;
    margin: 0 0 10px 0;
    line-height: 1.4;
}

.actualite-description {
    font-size: 14px;
    color: #7f8c8d;
    line-height: 1.6;
    margin-bottom: 15px;
}

.actualite-footer {
    padding-top: 15px;
    border-top: 1px solid #f0f0f0;
}

.empty-state-grid {
    grid-column: 1 / -1;
    text-align: center;
    padding: 60px 20px;
    color: #95a5a6;
}

.empty-state-grid i {
    font-size: 64px;
    margin-bottom: 20px;
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

.btn {
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s;
}

.btn-primary {
    background: #3498db;
    color: white;
}

.btn-primary:hover {
    background: #2980b9;
}

.btn-success {
    background: #2ecc71;
    color: white;
}

.btn-success:hover {
    background: #27ae60;
}

.btn-secondary {
    background: #95a5a6;
    color: white;
}

.btn-secondary:hover {
    background: #7f8c8d;
}

.btn-sm {
    padding: 8px 16px;
    font-size: 13px;
}
</style>
@endpush

@section('content')
<div class="actualites-page">

    <!-- Filter Section -->
    <div class="filter-card">
        <form action="{{ route('admin.actualites.index') }}" method="GET" class="filter-form">
            <div class="filter-grid">
                <div class="filter-group">
                    <label>Recherche</label>
                    <input type="text" name="search" class="form-control"
                           placeholder="Titre, description..."
                           value="{{ request('search') }}">
                </div>

                <div class="filter-group">
                    <label>Auteur</label>
                    <select name="user_id" class="form-control">
                        <option value="">Tous les auteurs</option>
                        @foreach(($users ?? []) as $user)
                            <option value="{{ $user->id }}"
                                    {{ request('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="filter-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                </div>
            </div>

            <div class="filter-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Filtrer
                </button>

                <a href="{{ route('admin.actualites.index') }}" class="btn btn-secondary">
                    <i class="fas fa-redo"></i> Réinitialiser
                </a>

                <a href="{{ route('admin.actualites.create') }}" class="btn btn-success" style="margin-left: auto;">
                    <i class="fas fa-plus"></i> Nouvelle Actualité
                </a>
            </div>
        </form>
    </div>

    <!-- Stats Summary -->
    <div class="summary-cards">
        <div class="summary-card">
            <div class="summary-icon" style="background: #3498DB;">
                <i class="fas fa-newspaper"></i>
            </div>
            <div class="summary-content">
                <div class="summary-value">{{ $actualites->total() }}</div>
                <div class="summary-label">Total Actualités</div>
            </div>
        </div>
        <div class="summary-card">
            <div class="summary-icon" style="background: #2ECC71;">
                <i class="fas fa-calendar-day"></i>
            </div>
            <div class="summary-content">
                <div class="summary-value">{{ $stats['ce_mois'] ?? 0 }}</div>
                <div class="summary-label">Ce mois</div>
            </div>
        </div>
        <div class="summary-card">
            <div class="summary-icon" style="background: #9B59B6;">
                <i class="fas fa-user-edit"></i>
            </div>
            <div class="summary-content">
                <div class="summary-value">{{ $stats['auteurs'] ?? 0 }}</div>
                <div class="summary-label">Auteurs actifs</div>
            </div>
        </div>
        <div class="summary-card">
            <div class="summary-icon" style="background: #F39C12;">
                <i class="fas fa-images"></i>
            </div>
            <div class="summary-content">
                <div class="summary-value">{{ $stats['avec_images'] ?? 0 }}</div>
                <div class="summary-label">Avec images</div>
            </div>
        </div>
    </div>

    <!-- Actualites Grid -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Liste des Actualités ({{ $actualites->total() }})</h3>
        </div>

        <div class="card-body">
            <div class="actualites-grid">

                @forelse($actualites as $actualite)
                    <div class="actualite-card">

                        {{-- IMAGE --}}
                        @if($actualite->image)
                            <div class="actualite-image"
                                 style="background-image: url('{{ asset('storage/' . $actualite->image) }}');">
                                <div class="actualite-overlay">
                                    <div class="action-buttons">

                                        <a href="{{ route('admin.actualites.show', $actualite->id) }}"
                                           class="btn-action btn-action-info" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a href="{{ route('admin.actualites.edit', $actualite->id) }}"
                                           class="btn-action btn-action-primary" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <form action="{{ route('admin.actualites.destroy', $actualite->id) }}" 
                                              method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-action-danger"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="actualite-image actualite-no-image">
                                <i class="fas fa-newspaper"></i>
                            </div>
                        @endif

                        {{-- CONTENT --}}
                        <div class="actualite-content">
                            <div class="actualite-meta">
                                <span>
                                    <i class="fas fa-calendar"></i>
                                    {{ $actualite->created_at->format('d/m/Y') }}
                                </span>

                                @if($actualite->user)
                                    <span>
                                        <i class="fas fa-user"></i>
                                        {{ $actualite->user->name }}
                                    </span>
                                @endif
                            </div>

                            <h3 class="actualite-title">{{ $actualite->title }}</h3>

                            @if($actualite->description)
                                <p class="actualite-description">
                                    {{ Str::limit($actualite->description, 120) }}
                                </p>
                            @endif

                            {{-- <div class="actualite-footer">
                                <a href="{{ route('admin.actualites.show', $actualite->id) }}"
                                   class="btn btn-sm btn-primary">
                                    Lire la suite <i class="fas fa-arrow-right"></i>
                                </a>
                            </div> --}}
                        </div>
                    </div>

                @empty
                    <div class="empty-state-grid">
                        <i class="fas fa-newspaper"></i>
                        <p>Aucune actualité trouvée</p>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            @if($actualites->hasPages())
                <div class="pagination-wrapper">
                    <div class="pagination-info">
                        Affichage {{ $actualites->firstItem() }} à {{ $actualites->lastItem() }}
                        sur {{ $actualites->total() }} résultats
                    </div>
                    <div class="pagination-links">
                        {{ $actualites->withQueryString()->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection