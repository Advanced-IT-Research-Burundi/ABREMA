@extends('layouts.admin')

@section('title', 'Détails du Partenaire')

@section('page-title', 'Partenaires')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.partenaires.index') }}">Partenaires</a>
    <i class="fas fa-chevron-right"></i>
    <span>{{ $partenaire->nom }}</span>
@endsection

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h2>Détails du Partenaire</h2>
        <p>Informations complètes sur {{ $partenaire->nom }}</p>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.partenaires.edit', $partenaire) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i>
            Modifier
        </a>
        <a href="{{ route('admin.partenaires.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Retour
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card partner-profile-card">
            <div class="card-body text-center">
                <div class="partner-logo-display">
                    <img src="{{ Storage::url($partenaire->logo) }}" 
                         alt="{{ $partenaire->nom }}" 
                         class="partner-logo-large">
                </div>
                
                <h3 class="partner-title">{{ $partenaire->nom }}</h3>
            </div>
        </div>

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
                        {{ $partenaire->created_at->format('d/m/Y à H:i') }}
                    </div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">
                        <i class="fas fa-calendar-check"></i>
                        Modifié le
                    </div>
                    <div class="info-value">
                        {{ $partenaire->updated_at->format('d/m/Y à H:i') }}
                    </div>
                </div>
                
                @if($partenaire->user)
                    <div class="info-row">
                        <div class="info-label">
                            <i class="fas fa-user"></i>
                            Créé par
                        </div>
                        <div class="info-value">
                            {{ $partenaire->user->name }}
                        </div>
                    </div>
                @endif
                
                <div class="info-row">
                    <div class="info-label">
                        <i class="fas fa-key"></i>
                        ID
                    </div>
                    <div class="info-value">
                        #{{ $partenaire->id }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Description & Collaboration</h3>
            </div>
            <div class="card-body">
                <div class="description-content">
                    {{ $partenaire->description }}
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Logo en différentes tailles</h3>
            </div>
            <div class="card-body">
                <div class="logo-sizes-display">
                    <div class="logo-size-item">
                        <div class="logo-size-label">Grande taille</div>
                        <div class="logo-size-preview logo-large">
                            <img src="{{ Storage::url($partenaire->logo) }}" alt="{{ $partenaire->nom }}">
                        </div>
                    </div>
                    <div class="logo-size-item">
                        <div class="logo-size-label">Moyenne taille</div>
                        <div class="logo-size-preview logo-medium">
                            <img src="{{ Storage::url($partenaire->logo) }}" alt="{{ $partenaire->nom }}">
                        </div>
                    </div>
                    <div class="logo-size-item">
                        <div class="logo-size-label">Petite taille</div>
                        <div class="logo-size-preview logo-small">
                            <img src="{{ Storage::url($partenaire->logo) }}" alt="{{ $partenaire->nom }}">
                        </div>
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
                    <a href="{{ route('admin.partenaires.edit', $partenaire) }}" 
                       class="action-card action-edit">
                        <div class="action-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="action-content">
                            <h4>Modifier</h4>
                            <p>Mettre à jour les informations</p>
                        </div>
                    </a>

                    <a href="{{ Storage::url($partenaire->logo) }}" 
                       download="{{ $partenaire->nom }}.png"
                       class="action-card action-download">
                        <div class="action-icon">
                            <i class="fas fa-download"></i>
                        </div>
                        <div class="action-content">
                            <h4>Télécharger le logo</h4>
                            <p>Sauvegarder localement</p>
                        </div>
                    </a>

                    <form action="{{ route('admin.partenaires.destroy', $partenaire) }}" 
                          method="POST"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce partenaire ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-card action-delete">
                            <div class="action-icon">
                                <i class="fas fa-trash"></i>
                            </div>
                            <div class="action-content">
                                <h4>Supprimer</h4>
                                <p>Retirer ce partenaire</p>
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
    .partner-profile-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        margin-bottom: 20px;
    }
    
    .partner-logo-display {
        width: 100%;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
    }
    
    .partner-logo-large {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    
    .partner-title {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 10px;
        color: white;
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
    }
    
    .info-label i {
        color: #667eea;
    }
    
    .info-value {
        color: #2d3748;
        font-weight: 600;
    }
    
    .description-content {
        font-size: 16px;
        line-height: 1.8;
        color: #4a5568;
        white-space: pre-wrap;
    }
    
    .logo-sizes-display {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 24px;
    }
    
    .logo-size-item {
        text-align: center;
    }
    
    .logo-size-label {
        font-size: 14px;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 12px;
    }
    
    .logo-size-preview {
        background: #f7fafc;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
    }
    
    .logo-large {
        height: 150px;
    }
    
    .logo-medium {
        height: 100px;
    }
    
    .logo-small {
        height: 60px;
    }
    
    .logo-size-preview img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    
    .quick-actions {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }
    
    .action-card {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
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
        width: 50px;
        height: 50px;
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
        font-size: 22px;
    }
    
    .action-content h4 {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
        color: #2d3748;
    }
    
    .action-content p {
        font-size: 13px;
        color: #718096;
        margin: 0;
    }
</style>
@endpush
@endsection