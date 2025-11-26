@extends('admin.layouts.app')

@section('title', 'Détails du Colis')
@section('page-title', 'Détails du Colis #' . $colis->id)

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.colis.index') }}">Colis</a>
    <i class="fas fa-chevron-right"></i>
    <span>Colis #{{ $colis->id }}</span>
@endsection

@push('styles')
<style>
    .detail-container {
        max-width: 1100px;
        margin: 0 auto;
    }

    .status-header {
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
    }

    .status-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .status-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .status-icon.pending {
        background: rgba(243,156,18,0.1);
        color: var(--warning-color);
    }

    .status-icon.processed {
        background: rgba(46,204,113,0.1);
        color: var(--success-color);
    }

    .status-content h2 {
        font-size: 24px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 5px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .status-badge.pending {
        background: rgba(243,156,18,0.1);
        color: var(--warning-color);
        border: 1px solid var(--warning-color);
    }

    .status-badge.processed {
        background: rgba(46,204,113,0.1);
        color: var(--success-color);
        border: 1px solid var(--success-color);
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-bottom: 25px;
    }

    .info-section {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .info-section-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid var(--border-color);
    }

    .info-section-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: rgba(46,204,113,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 18px;
    }

    .info-section-title {
        font-size: 16px;
        font-weight: 600;
        color: var(--text-dark);
    }

    .info-row {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 15px;
    }

    .info-row:last-child {
        margin-bottom: 0;
    }

    .info-icon {
        width: 35px;
        height: 35px;
        border-radius: 8px;
        background: var(--light-bg);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        flex-shrink: 0;
    }

    .info-content {
        flex: 1;
    }

    .info-label {
        font-size: 12px;
        color: var(--text-light);
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }

    .info-value {
        font-size: 15px;
        color: var(--text-dark);
        font-weight: 500;
        word-break: break-word;
    }

    .info-value a {
        color: var(--primary-color);
        text-decoration: none;
    }

    .info-value a:hover {
        text-decoration: underline;
    }

    .message-section {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 25px;
    }

    .message-content {
        background: var(--light-bg);
        border-left: 4px solid var(--primary-color);
        padding: 20px;
        border-radius: 8px;
        line-height: 1.8;
        color: var(--text-dark);
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    .file-section {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 25px;
    }

    .file-preview {
        background: linear-gradient(135deg, rgba(46,204,113,0.05) 0%, rgba(39,174,96,0.05) 100%);
        border: 2px dashed rgba(46,204,113,0.3);
        border-radius: 12px;
        padding: 40px;
        text-align: center;
    }

    .file-icon-large {
        width: 80px;
        height: 80px;
        background: var(--primary-color);
        border-radius: 16px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 40px;
        margin-bottom: 20px;
    }

    .file-name {
        font-size: 16px;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 8px;
    }

    .file-meta {
        font-size: 13px;
        color: var(--text-light);
        margin-bottom: 20px;
    }

    .file-actions {
        display: flex;
        gap: 10px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .timeline-section {
        background: white;
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 25px;
    }

    .timeline {
        position: relative;
        padding-left: 35px;
        margin-top: 20px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 12px;
        top: 0;
        bottom: 0;
        width: 3px;
        background: linear-gradient(180deg, var(--primary-color) 0%, rgba(46,204,113,0.2) 100%);
        border-radius: 3px;
    }

    .timeline-item {
        position: relative;
        padding-bottom: 25px;
    }

    .timeline-item:last-child {
        padding-bottom: 0;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -28px;
        top: 8px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: white;
        border: 3px solid var(--primary-color);
        box-shadow: 0 0 0 4px white, 0 0 0 6px rgba(46,204,113,0.2);
        z-index: 1;
    }

    .timeline-date {
        font-size: 12px;
        color: var(--text-light);
        font-weight: 600;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .timeline-content {
        background: var(--light-bg);
        padding: 12px 15px;
        border-radius: 8px;
        font-size: 14px;
        color: var(--text-dark);
    }

    .timeline-content strong {
        color: var(--primary-color);
    }

    .action-bar {
        background: white;
        border-radius: 12px;
        padding: 20px 25px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .no-data {
        text-align: center;
        padding: 30px;
        color: var(--text-light);
        font-style: italic;
    }

    @media print {
        .action-bar,
        .header,
        .sidebar {
            display: none !important;
        }

        .detail-container {
            max-width: 100%;
        }
    }
</style>
@endpush

@section('content')
<div class="detail-container">
    <!-- En-tête de statut -->
    <div class="status-header">
        <div class="status-info">
            <div class="status-icon {{ $colis->user_id ? 'processed' : 'pending' }}">
                <i class="fas {{ $colis->user_id ? 'fa-check-circle' : 'fa-clock' }}"></i>
            </div>
            <div class="status-content">
                <h2>Colis #{{ $colis->id }}</h2>
                <span class="status-badge {{ $colis->user_id ? 'processed' : 'pending' }}">
                    <i class="fas {{ $colis->user_id ? 'fa-check' : 'fa-hourglass-half' }}"></i>
                    {{ $colis->user_id ? 'Traité' : 'En attente de traitement' }}
                </span>
            </div>
        </div>
        <div style="display: flex; gap: 10px;">
            <a href="{{ route('admin.colis.edit', $colis->id) }}" class="btn btn-primary btn-sm">
                <i class="fas fa-edit"></i> Modifier
            </a>
        </div>
    </div>

    <!-- Grille d'informations -->
    <div class="detail-grid">
        <!-- Informations du destinataire -->
        <div class="info-section">
            <div class="info-section-header">
                <div class="info-section-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="info-section-title">Destinataire</div>
            </div>

            <div class="info-row">
                <div class="info-icon">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="info-content">
                    <div class="info-label">Nom Complet</div>
                    <div class="info-value">{{ $colis->nom_prenom }}</div>
                </div>
            </div>

            <div class="info-row">
                <div class="info-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="info-content">
                    <div class="info-label">Email</div>
                    <div class="info-value">
                        <a href="mailto:{{ $colis->email }}">{{ $colis->email }}</a>
                    </div>
                </div>
            </div>

            @if($colis->phone)
            <div class="info-row">
                <div class="info-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="info-content">
                    <div class="info-label">Téléphone</div>
                    <div class="info-value">
                        <a href="tel:{{ $colis->phone }}">{{ $colis->phone }}</a>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Informations système -->
        <div class="info-section">
            <div class="info-section-header">
                <div class="info-section-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="info-section-title">Informations</div>
            </div>

            <div class="info-row">
                <div class="info-icon">
                    <i class="fas fa-calendar-plus"></i>
                </div>
                <div class="info-content">
                    <div class="info-label">Date de Création</div>
                    <div class="info-value">{{ $colis->created_at->format('d/m/Y à H:i') }}</div>
                </div>
            </div>

            @if($colis->updated_at != $colis->created_at)
            <div class="info-row">
                <div class="info-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <div class="info-content">
                    <div class="info-label">Dernière Modification</div>
                    <div class="info-value">{{ $colis->updated_at->format('d/m/Y à H:i') }}</div>
                </div>
            </div>
            @endif

            @if($colis->user_id && isset($colis->user))
            <div class="info-row">
                <div class="info-icon">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="info-content">
                    <div class="info-label">Responsable</div>
                    <div class="info-value">{{ $colis->user->name }}</div>
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Section Message -->
    @if($colis->message)
    <div class="message-section">
        <div class="info-section-header">
            <div class="info-section-icon">
                <i class="fas fa-comment-alt"></i>
            </div>
            <div class="info-section-title">Message / Description</div>
        </div>
        <div class="message-content">{{ $colis->message }}</div>
    </div>
    @endif

    <!-- Section Fichier -->
    @if($colis->pathfile)
    <div class="file-section">
        <div class="info-section-header">
            <div class="info-section-icon">
                <i class="fas fa-paperclip"></i>
            </div>
            <div class="info-section-title">Fichier Joint</div>
        </div>
        <div class="file-preview">
            <div class="file-icon-large">
                @php
                    $extension = pathinfo($colis->pathfile, PATHINFO_EXTENSION);
                @endphp
                @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                    <i class="fas fa-file-image"></i>
                @elseif($extension === 'pdf')
                    <i class="fas fa-file-pdf"></i>
                @elseif(in_array($extension, ['doc', 'docx']))
                    <i class="fas fa-file-word"></i>
                @else
                    <i class="fas fa-file"></i>
                @endif
            </div>
            <div class="file-name">{{ basename($colis->pathfile) }}</div>
            <div class="file-meta">
                <i class="fas fa-file"></i> Document joint
            </div>
            <div class="file-actions">
                <a href="{{ asset('storage/' . $colis->pathfile) }}" 
                   target="_blank" 
                   class="btn btn-primary">
                    <i class="fas fa-eye"></i> Prévisualiser
                </a>
                <a href="{{ asset('storage/' . $colis->pathfile) }}" 
                   download 
                   class="btn btn-secondary">
                    <i class="fas fa-download"></i> Télécharger
                </a>
            </div>
        </div>
    </div>
    @endif

    <!-- Timeline -->
    <div class="timeline-section">
        <div class="info-section-header">
            <div class="info-section-icon">
                <i class="fas fa-history"></i>
            </div>
            <div class="info-section-title">Historique</div>
        </div>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-date">
                    <i class="fas fa-clock"></i>
                    {{ $colis->created_at->format('d/m/Y à H:i') }}
                </div>
                <div class="timeline-content">
                    <strong>Colis créé</strong> - Le colis a été enregistré dans le système
                </div>
            </div>

            @if($colis->updated_at != $colis->created_at)
            <div class="timeline-item">
                <div class="timeline-date">
                    <i class="fas fa-clock"></i>
                    {{ $colis->updated_at->format('d/m/Y à H:i') }}
                </div>
                <div class="timeline-content">
                    <strong>Mise à jour</strong> - Les informations du colis ont été modifiées
                </div>
            </div>
            @endif

            @if($colis->user_id && isset($colis->user))
            <div class="timeline-item">
                <div class="timeline-date">
                    <i class="fas fa-clock"></i>
                    {{ $colis->updated_at->format('d/m/Y à H:i') }}
                </div>
                <div class="timeline-content">
                    <strong>Colis traité</strong> - Assigné à {{ $colis->user->name }}
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Barre d'actions -->
    <div class="action-bar">
        <a href="{{ route('admin.colis.edit', $colis->id) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Modifier
        </a>
        <a href="{{ route('admin.colis.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Retour à la Liste
        </a>
        <button onclick="window.print()" class="btn btn-secondary">
            <i class="fas fa-print"></i> Imprimer
        </button>
        <form action="{{ route('admin.colis.destroy', $colis->id) }}" 
              method="POST" 
              style="display: inline;"
              onsubmit="return confirm('⚠️ Attention ! Voulez-vous vraiment supprimer ce colis ?\n\nCette action est irréversible.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-trash"></i> Supprimer
            </button>
        </form>
    </div>
</div>
@endsection