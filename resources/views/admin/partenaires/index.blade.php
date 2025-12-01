@extends('layouts.admin')

@section('title', 'Partenaires')

@section('page-title', 'Partenaires')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <span>Partenaires</span>
@endsection

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h2>Nos Partenaires</h2>
        <p>Gérez les partenaires de l'ABREMA</p>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.partenaires.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Ajouter un Partenaire
        </a>
    </div>
</div>

<div class="partners-stats mb-4">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-handshake"></i>
        </div>
        <div class="stat-content">
            <div class="stat-value">{{ $partenaires->total() }}</div>
            <div class="stat-label">Total Partenaires</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($partenaires->count() > 0)
            <div class="partners-grid">
                @foreach($partenaires as $partenaire)
                    <div class="partner-card">
                        <div class="partner-logo-container">
                            <img src="{{ Storage::url($partenaire->logo) }}" 
                                 alt="{{ $partenaire->nom }}" 
                                 class="partner-logo">
                        </div>
                        <div class="partner-info">
                            <h3 class="partner-name">{{ $partenaire->nom }}</h3>
                            <p class="partner-description">
                                {{ Str::limit($partenaire->description, 100) }}
                            </p>
                            <div class="partner-meta">
                                <span class="partner-date">
                                    <i class="fas fa-calendar"></i>
                                    {{ $partenaire->created_at->format('d/m/Y') }}
                                </span>
                            </div>
                        </div>
                        <div class="partner-actions">
                            <a href="{{ route('admin.partenaires.show', $partenaire) }}" 
                               class="btn btn-sm btn-info" 
                               title="Voir">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.partenaires.edit', $partenaire) }}" 
                               class="btn btn-sm btn-warning" 
                               title="Modifier">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.partenaires.destroy', $partenaire) }}" 
                                  method="POST" 
                                  class="d-inline"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?');">
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

            @if($partenaires->hasPages())
                <div class="pagination-wrapper">
                    {{ $partenaires->links() }}
                </div>
            @endif
        @else
            <div class="empty-state">
                <i class="fas fa-handshake fa-4x text-muted mb-3"></i>
                <h3>Aucun partenaire</h3>
                <p class="text-muted">Commencez par ajouter votre premier partenaire.</p>
                <a href="{{ route('admin.partenaires.create') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-plus"></i>
                    Ajouter le premier partenaire
                </a>
            </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    .partners-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }
    
    .stat-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
    
    .partners-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 24px;
    }
    
    .partner-card {
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        padding: 24px;
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }
    
    .partner-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        border-color: #155224;
    }
    
    .partner-logo-container {
        width: 100%;
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f7fafc;
        border-radius: 8px;
        overflow: hidden;
    }
    
    .partner-logo {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        padding: 10px;
    }
    
    .partner-info {
        flex: 1;
    }
    
    .partner-name {
        font-size: 18px;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 8px;
    }
    
    .partner-description {
        font-size: 14px;
        color: #718096;
        line-height: 1.6;
        margin-bottom: 12px;
    }
    
    .partner-meta {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .partner-date {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: #a0aec0;
    }
    
    .partner-actions {
        display: flex;
        gap: 8px;
        padding-top: 16px;
        border-top: 1px solid #e2e8f0;
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
        .partners-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush
@endsection