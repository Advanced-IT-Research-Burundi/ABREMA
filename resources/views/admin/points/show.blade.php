@extends('layouts.admin')

@section('title', 'Détails du Point d\'Entrée')

@section('page-title', 'Points d\'Entrée')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.point-entrees.index') }}">Points d'Entrée</a>
    <i class="fas fa-chevron-right"></i>
    <span>{{ $pointEntree->nom }}</span>
@endsection

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h2>Détails du Point d'Entrée</h2>
        <p>Informations complètes sur ce point d'entrée</p>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.point-entrees.edit', $pointEntree) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i>
            Modifier
        </a>
        <a href="{{ route('admin.point-entrees.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Retour
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card point-header-card">
            @if($pointEntree->image)
                <div class="point-hero-image">
                    <img src="{{ Storage::url($pointEntree->image) }}" 
                         alt="{{ $pointEntree->nom }}">
                    <div class="hero-overlay">
                        <div class="hero-content">
                            <div class="point-badge-large">
                                <i class="fas fa-map-marker-alt"></i>
                                Point d'Entrée
                            </div>
                            <h1>{{ $pointEntree->nom }}</h1>
                            <p>{{ $pointEntree->title }}</p>
                        </div>
                    </div>
                </div>
            @else
                <div class="point-hero-placeholder">
                    <i class="fas fa-map-marker-alt"></i>
                    <h1>{{ $pointEntree->nom }}</h1>
                    <p>{{ $pointEntree->title }}</p>
                </div>
            @endif
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Informations Détaillées</h3>
            </div>
            <div class="card-body">
                <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label">
                            <i class="fas fa-map-marker-alt"></i>
                            Nom du Point
                        </div>
                        <div class="detail-value">{{ $pointEntree->nom }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">
                            <i class="fas fa-info-circle"></i>
                            Description
                        </div>
                        <div class="detail-value">{{ $pointEntree->title }}</div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">
                            <i class="fas fa-calendar"></i>
                            Date d'ajout
                        </div>
                        <div class="detail-value">{{ $pointEntree->created_at->format('d/m/Y à H:i') }}</div>
                    </div>
                    
                    @if($pointEntree->user)
                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-user"></i>
                                Ajouté par
                            </div>
                            <div class="detail-value">{{ $pointEntree->user->name }}</div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        @if($pointEntree->image)
            <div class="card">
                <div class="card-header">
                    <h3>Image du Point d'Entrée</h3>
                </div>
                <div class="card-body">
                    <div class="full-image-container">
                        <img src="{{ Storage::url($pointEntree->image) }}" 
                             alt="{{ $pointEntree->nom }}"
                             class="full-image">
                    </div>
                    <div class="image-actions mt-3">
                        <a href="{{ Storage::url($pointEntree->image) }}" 
                           class="btn btn-success" 
                           download="{{ $pointEntree->nom }}.jpg">
                            <i class="fas fa-download"></i>
                            Télécharger l'image
                        </a>
                        <a href="{{ Storage::url($pointEntree->image) }}" 
                           class="btn btn-info" 
                           target="_blank">
                            <i class="fas fa-external-link-alt"></i>
                            Voir en plein écran
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Informations Système</h3>
            </div>
            <div class="card-body">
                <div class="info-row">
                    <div class="info-label">
                        <i class="fas fa-calendar-plus"></i>
                        Créé le
                    </div>
                    <div class="info-value">
                        {{ $pointEntree->created_at->format('d/m/Y à H:i') }}
                    </div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">
                        <i class="fas fa-calendar-check"></i>
                        Modifié le
                    </div>
                    <div class="info-value">
                        {{ $pointEntree->updated_at->format('d/m/Y à H:i') }}
                    </div>
                </div>
                
                @if($pointEntree->user)
                    <div class="info-row">
                        <div class="info-label">
                            <i class="fas fa-user"></i>
                            Créé par
                        </div>
                        <div class="info-value">
                            {{ $pointEntree->user->name }}
                        </div>
                    </div>
                @endif
                
                <div class="info-row">
                    <div class="info-label">
                        <i class="fas fa-key"></i>
                        ID
                    </div>
                    <div class="info-value">
                        #{{ $pointEntree->id }}
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Actions Rapides</h3>
            </div>
            <div class="card-body">
                <div class="quick-actions">
                    <a href="{{ route('admin.point-entrees.edit', $pointEntree) }}" 
                       class="action-card action-edit">
                        <div class="action-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="action-content">
                            <h4>Modifier</h4>
                            <p>Mettre à jour ce point</p>
                        </div>
                    </a>

                    @if($pointEntree->image)
                        <a href="{{ Storage::url($pointEntree->image) }}" 
                           download="{{ $pointEntree->nom }}.jpg"
                           class="action-card action-download">
                            <div class="action-icon">
                                <i class="fas fa-download"></i>
                            </div>
                            <div class="action-content">
                                <h4>Télécharger</h4>
                                <p>Sauvegarder l'image</p>
                            </div>
                        </a>
                    @endif

                    <form action="{{ route('admin.point-entrees.destroy', $pointEntree) }}" 
                          method="POST"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce point d\'entrée ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-card action-delete">
                            <div class="action-icon">
                                <i class="fas fa-trash"></i>
                            </div>
                            <div class="action-content">
                                <h4>Supprimer</h4>
                                <p>Retirer ce point</p>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .point-header-card {
        overflow: hidden;
        margin-bottom: 24px;
        border: none;
    }
    
    .point-hero-image {
        position: relative;
        width: 100%;
        height: 400px;
        overflow: hidden;
    }
    
    .point-hero-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.3), rgba(102, 126, 234, 0.8));
        display: flex;
        align-items: flex-end;
        padding: 40px;
    }
    
    .hero-content {
        color: white;
    }
    
    .point-badge-large {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 15px;
    }
    
    .hero-content h1 {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 10px;
        color: white;
    }
    
    .hero-content p {
        font-size: 18px;
        opacity: 0.95;
    }
    
    .point-hero-placeholder {
        background: linear-gradient(135deg, #3b7a3c 0%, #3b7a3c 100%);
        color: white;
        padding: 60px 40px;
        text-align: center;
    }
    
    .point-hero-placeholder i {
        font-size: 80px;
        margin-bottom: 20px;
        opacity: 0.8;
    }
    
    .point-hero-placeholder h1 {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 10px;
        color: white;
    }
    
    .point-hero-placeholder p {
        font-size: 18px;
        opacity: 0.9;
    }
    
    .detail-grid {
        display: grid;
        gap: 20px;
    }
    
    .detail-item {
        padding: 20px;
        background: #f7fafc;
        border-radius: 8px;
        border-left: 4px solid #3b7a3c;
    }
    
    .detail-label {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        font-weight: 600;
        color: #718096;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .detail-label i {
        color: #3b7a3c;
    }
    
    .detail-value {
        font-size: 16px;
        font-weight: 600;
        color: #2d3748;
    }
    
    .full-image-container {
        width: 100%;
        border-radius: 8px;
        overflow: hidden;
        border: 2px solid #e2e8f0;
    }
    
    .full-image {
        width: 100%;
        height: auto;
        display: block;
    }
    
    .image-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 15px 0;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .info-row:last-child {
        border-bottom: none;
    }
    
    .info-label {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #718096;
        font-weight: 500;
        font-size: 14px;
    }
    
    .info-label i {
        color: #667eea;
    }
    
    .info-value {
        color: #2d3748;
        font-weight: 600;
        text-align: right;
    }
    
    .quick-actions {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    
    .action-card {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 16px;
        background: #f7fafc;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
        cursor: pointer;
        width: 100%;
    }
    
    .action-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .action-edit:hover {
        border-color: #fbbf24;
        background: #fffbeb;
    }
    
    .action-download:hover {
        border-color: #3b82f6;
        background: #eff6ff;
    }
    
    .action-delete {
        border: 2px solid #e2e8f0;
        background: #f7fafc;
    }
    
    .action-delete:hover {
        border-color: #ef4444;
        background: #fef2f2;
    }
    
    .action-icon {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        flex-shrink: 0;
    }
    
    .action-edit .action-icon {
        background: #fef3c7;
        color: #f59e0b;
    }
    
    .action-download .action-icon {
        background: #dbeafe;
        color: #3b82f6;
    }
    
    .action-delete .action-icon {
        background: #fee2e2;
        color: #ef4444;
    }
    
    .action-icon i {
        font-size: 20px;
    }
    
    .action-content h4 {
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 3px;
        color: #2d3748;
    }
    
    .action-content p {
        font-size: 12px;
        color: #718096;
        margin: 0;
    }
    
    @media (max-width: 768px) {
        .hero-content h1 {
            font-size: 24px;
        }
        
        .hero-content p {
            font-size: 14px;
        }
        
        .image-actions {
            flex-direction: column;
        }
        
        .image-actions .btn {
            width: 100%;
        }
    }
</style>
@endpush
@endsection