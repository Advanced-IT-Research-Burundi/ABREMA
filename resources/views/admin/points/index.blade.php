@extends('layouts.admin')

@section('title', 'Points d\'Entrée')

@section('page-title', 'Points d\'Entrée')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <span>Points d'Entrée</span>
@endsection

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h2>Points d'Entrée</h2>
        <p>Gérez les différents points d'entrée des médicaments au Burundi</p>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.point-entrees.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Ajouter un Point d'Entrée
        </a>
    </div>
</div>

<div class="points-stats mb-4">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-map-marker-alt"></i>
        </div>
        <div class="stat-content">
            <div class="stat-value">{{ $pointEntrees->total() }}</div>
            <div class="stat-label">Total Points d'Entrée</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($pointEntrees->count() > 0)
            <div class="points-grid">
                @foreach($pointEntrees as $point)
                    <div class="point-card">
                        <div class="point-image-container">
                            @if($point->image)
                                <img src="{{ Storage::url($point->image) }}" 
                                     alt="{{ $point->nom }}" 
                                     class="point-image">
                            @else
                                <div class="point-image-placeholder">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                            @endif
                        </div>
                        <div class="point-info">
                            <div class="point-badge">
                                <i class="fas fa-map-pin"></i>
                                Point d'Entrée
                            </div>
                            <h3 class="point-name">{{ $point->nom }}</h3>
                            <p class="point-title">{{ $point->title }}</p>
                            <div class="point-meta">
                                <span class="point-date">
                                    <i class="fas fa-calendar"></i>
                                    {{ $point->created_at->format('d/m/Y') }}
                                </span>
                                @if($point->user)
                                    <span class="point-user">
                                        <i class="fas fa-user"></i>
                                        {{ $point->user->name }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="point-actions">
                            <a href="{{ route('admin.point-entrees.show', $point) }}" 
                               class="btn btn-sm btn-info" 
                               title="Voir">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.point-entrees.edit', $point) }}" 
                               class="btn btn-sm btn-warning" 
                               title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.point-entrees.destroy', $point) }}" 
                                  method="POST" 
                                  class="d-inline"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce point d\'entrée ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-sm btn-danger" 
                                        title="Supprimer">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($pointEntrees->hasPages())
                <div class="pagination-wrapper">
                    {{ $pointEntrees->links() }}
                </div>
            @endif
        @else
            <div class="empty-state">
                <i class="fas fa-map-marker-alt fa-4x text-muted mb-3"></i>
                <h3>Aucun point d'entrée</h3>
                <p class="text-muted">Commencez par ajouter votre premier point d'entrée.</p>
            </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    .points-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }
    
    .stat-card {
        background: linear-gradient(135deg, #3b7a3c 0%, #3b7a3c 100%);
        border-radius: 12px;
        padding: 24px;
        display: flex;
        align-items: center;
        gap: 20px;
        color: white;
    }
    
    .stat-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }
    
    .stat-value {
        font-size: 32px;
        font-weight: 700;
        line-height: 1;
        margin-bottom: 5px;
    }
    
    .stat-label {
        font-size: 14px;
        opacity: 0.9;
    }
    
    .points-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 24px;
    }
    
    .point-card {
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
    }
    
    .point-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        border-color: #667eea;
    }
    
    .point-image-container {
        width: 100%;
        height: 200px;
        overflow: hidden;
        background: #f7fafc;
        position: relative;
    }
    
    .point-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .point-image-placeholder {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #3b7a3c 0%, #3b7a3c 100%);
        color: white;
        font-size: 64px;
    }
    
    .point-info {
        padding: 20px;
        flex: 1;
    }
    
    .point-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        background: #eff6ff;
        color: #2563eb;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 12px;
    }
    
    .point-name {
        font-size: 20px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 8px;
    }
    
    .point-title {
        font-size: 14px;
        color: #718096;
        margin-bottom: 12px;
    }
    
    .point-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        font-size: 13px;
        color: #a0aec0;
    }
    
    .point-date,
    .point-user {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    .point-actions {
        display: flex;
        gap: 8px;
        padding: 16px 20px;
        border-top: 1px solid #e2e8f0;
        background: #f7fafc;
    }
    
    .empty-state {
        text-align: center;
        padding: 60px 20px;
    }
    
    .empty-state h3 {
        font-size: 24px;
        color: #2d3748;
        margin-bottom: 10px;
    }
    
    @media (max-width: 768px) {
        .points-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush
@endsection