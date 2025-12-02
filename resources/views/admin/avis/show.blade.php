@extends('layouts.admin')

@section('title', 'Détails de l\'Avis Public')

@section('page-title', 'Avis Publics')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.avis-publics.index') }}">Avis Publics</a>
    <i class="fas fa-chevron-right"></i>
    <span>{{ Str::limit($avisPublic->title, 30) }}</span>
@endsection

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h2>Détails de l'Avis Public</h2>
        <p>Informations complètes sur cet avis</p>
    </div>
    <div class="content-header-right">
        <a href="{{ Storage::url($avisPublic->contenu) }}" 
           class="btn btn-success" 
           download>
            <i class="fas fa-download"></i>
            Télécharger
        </a>
        <a href="{{ route('admin.avis-publics.edit', $avisPublic) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i>
            Modifier
        </a>
        <a href="{{ route('admin.avis-publics.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Retour
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card avis-header-card">
            <div class="card-body">
                <div class="avis-icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <h1 class="avis-title">{{ $avisPublic->title }}</h1>
                <div class="avis-meta">
                    <span class="meta-item">
                        <i class="fas fa-calendar"></i>
                        Publié le {{ $avisPublic->created_at->format('d/m/Y') }}
                    </span>
                    @if($avisPublic->user)
                        <span class="meta-item">
                            <i class="fas fa-user"></i>
                            Par {{ $avisPublic->user->name }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Description</h3>
            </div>
            <div class="card-body">
                <div class="description-content">
                    {{ $avisPublic->description }}
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Document Attaché</h3>
            </div>
            <div class="card-body">
                <div class="document-display">
                    <div class="document-icon-large">
                        <i class="fas fa-file-{{ $avisPublic->file_extension == 'pdf' ? 'pdf' : 'alt' }}"></i>
                    </div>
                    <div class="document-info">
                        <h4>{{ basename($avisPublic->contenu) }}</h4>
                        <div class="document-meta">
                            <span class="doc-type">Type: {{ strtoupper($avisPublic->file_extension) }}</span>
                            <span class="doc-size">Taille: {{ $avisPublic->file_size }}</span>
                        </div>
                        <div class="document-actions mt-3">
                            <a href="{{ Storage::url($avisPublic->contenu) }}" 
                               class="btn btn-success" 
                               download>
                                <i class="fas fa-download"></i>
                                Télécharger le document
                            </a>
                            <a href="{{ Storage::url($avisPublic->contenu) }}" 
                               class="btn btn-info" 
                               target="_blank">
                                <i class="fas fa-external-link-alt"></i>
                                Ouvrir dans un nouvel onglet
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        Date de publication
                    </div>
                    <div class="info-value">
                        {{ $avisPublic->created_at->format('d/m/Y à H:i') }}
                    </div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">
                        <i class="fas fa-calendar-check"></i>
                        Dernière modification
                    </div>
                    <div class="info-value">
                        {{ $avisPublic->updated_at->format('d/m/Y à H:i') }}
                    </div>
                </div>
                
                @if($avisPublic->user)
                    <div class="info-row">
                        <div class="info-label">
                            <i class="fas fa-user"></i>
                            Publié par
                        </div>
                        <div class="info-value">
                            {{ $avisPublic->user->name }}
                        </div>
                    </div>
                @endif
                
                <div class="info-row">
                    <div class="info-label">
                        <i class="fas fa-key"></i>
                        ID
                    </div>
                    <div class="info-value">
                        #{{ $avisPublic->id }}
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
                    <a href="{{ route('admin.avis-publics.edit', $avisPublic) }}" 
                       class="action-card action-edit">
                        <div class="action-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="action-content">
                            <h4>Modifier</h4>
                            <p>Mettre à jour cet avis</p>
                        </div>
                    </a>

                    <a href="{{ Storage::url($avisPublic->contenu) }}" 
                       download
                       class="action-card action-download">
                        <div class="action-icon">
                            <i class="fas fa-download"></i>
                        </div>
                        <div class="action-content">
                            <h4>Télécharger</h4>
                            <p>Sauvegarder le document</p>
                        </div>
                    </a>

                    <form action="{{ route('admin.avis-publics.destroy', $avisPublic) }}" 
                          method="POST"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet avis public ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-card action-delete">
                            <div class="action-icon">
                                <i class="fas fa-trash"></i>
                            </div>
                            <div class="action-content">
                                <h4>Supprimer</h4>
                                <p>Retirer cet avis</p>
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
    .avis-header-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        margin-bottom: 24px;
    }
    
    .avis-icon {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 36px;
        margin-bottom: 20px;
    }
    
    .avis-title {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 15px;
        color: white;
    }
    
    .avis-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        opacity: 0.9;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
    }
    
    .description-content {
        font-size: 16px;
        line-height: 1.8;
        color: #4a5568;
        white-space: pre-wrap;
    }
    
    .document-display {
        display: flex;
        gap: 24px;
        align-items: flex-start;
    }
    
    .document-icon-large {
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 48px;
        flex-shrink: 0;
    }
    
    .document-info {
        flex: 1;
    }
    
    .document-info h4 {
        font-size: 18px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 10px;
    }
    
    .document-meta {
        display: flex;
        gap: 15px;
        font-size: 14px;
        color: #718096;
        margin-bottom: 15px;
    }
    
    .doc-type,
    .doc-size {
        padding: 4px 12px;
        background: #f7fafc;
        border-radius: 6px;
        font-weight: 500;
    }
    
    .document-actions {
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
        .document-display {
            flex-direction: column;
        }
        
        .document-actions {
            flex-direction: column;
        }
        
        .document-actions .btn {
            width: 100%;
        }
    }
</style>
@endpush
@endsection