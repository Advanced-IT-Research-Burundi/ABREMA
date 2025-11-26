@extends('layouts.admin')

@section('title', 'Détails du Colis')
@section('page-title', 'Détails du Colis')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.colis.index') }}">Colis</a>
    <i class="fas fa-chevron-right"></i>
    <span>Colis #{{ $colis->id }}</span>
@endsection

@push('styles')
<style>
    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .info-card {
        background: var(--light-bg);
        padding: 20px;
        border-radius: 10px;
        border-left: 4px solid var(--primary-color);
    }

    .info-label {
        font-size: 12px;
        color: var(--text-light);
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
    }

    .info-value {
        font-size: 16px;
        color: var(--text-dark);
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .info-value i {
        color: var(--primary-color);
        font-size: 18px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .status-pending {
        background: rgba(243, 156, 18, 0.1);
        color: var(--warning-color);
        border: 1px solid var(--warning-color);
    }

    .status-processed {
        background: rgba(46, 204, 113, 0.1);
        color: var(--success-color);
        border: 1px solid var(--success-color);
    }

    .message-box {
        background: white;
        padding: 25px;
        border-radius: 10px;
        border: 1px solid var(--border-color);
        margin-bottom: 20px;
    }

    .message-header {
        font-size: 14px;
        color: var(--text-light);
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .message-content {
        font-size: 15px;
        line-height: 1.8;
        color: var(--text-dark);
        white-space: pre-wrap;
    }

    .file-preview {
        background: var(--light-bg);
        padding: 20px;
        border-radius: 10px;
        border: 2px dashed var(--border-color);
        text-align: center;
    }

    .file-icon {
        font-size: 48px;
        color: var(--primary-color);
        margin-bottom: 15px;
    }

    .file-info {
        color: var(--text-dark);
        font-weight: 600;
        margin-bottom: 10px;
    }

    .action-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
    }

    .timeline {
        position: relative;
        padding-left: 30px;
        margin-top: 20px;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 8px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: var(--border-color);
    }

    .timeline-item {
        position: relative;
        padding-bottom: 20px;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        left: -26px;
        top: 5px;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: var(--primary-color);
        border: 3px solid white;
        box-shadow: 0 0 0 2px var(--primary-color);
    }

    .timeline-date {
        font-size: 13px;
        color: var(--text-light);
        margin-bottom: 5px;
    }

    .timeline-content {
        font-size: 14px;
        color: var(--text-dark);
    }
</style>
@endpush

@section('content')
<div style="max-width: 1000px;">
    <!-- Carte principale d'informations -->
    <div class="card" style="margin-bottom: 20px;">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-box"></i> Colis #{{ $colis->id }}
            </h3>
            <div>
                @if($colis->user_id)
                    <span class="status-badge status-processed">
                        <i class="fas fa-check-circle"></i>
                        Traité
                    </span>
                @else
                    <span class="status-badge status-pending">
                        <i class="fas fa-clock"></i>
                        En attente
                    </span>
                @endif
            </div>
        </div>
        <div class="card-body">
            <!-- Informations principales -->
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-label">Nom et Prénom</div>
                    <div class="info-value">
                        <i class="fas fa-user"></i>
                        {{ $colis->nom_prenom }}
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-label">Téléphone</div>
                    <div class="info-value">
                        <i class="fas fa-phone"></i>
                        {{ $colis->phone }}
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-label">Email</div>
                    <div class="info-value">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:{{ $colis->email }}" style="color: var(--primary-color); text-decoration: none;">
                            {{ $colis->email }}
                        </a>
                    </div>
                </div>

                <div class="info-card">
                    <div class="info-label">Date de création</div>
                    <div class="info-value">
                        <i class="fas fa-calendar"></i>
                        {{ $colis->created_at->format('d/m/Y à H:i') }}
                    </div>
                </div>
            </div>

            <!-- Message -->
            <div class="message-box">
                <div class="message-header">
                    <i class="fas fa-comment-alt"></i>
                    Message / Description
                </div>
                <div class="message-content">{{ $colis->message }}</div>
            </div>

            <!-- Fichier joint -->
            @if($colis->pathfile)
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">
                    <h4 style="font-size: 16px; margin: 0;">
                        <i class="fas fa-paperclip"></i> Fichier Joint
                    </h4>
                </div>
                <div class="card-body">
                    <div class="file-preview">
                        <div class="file-icon">
                            @php
                                $extension = pathinfo($colis->pathfile, PATHINFO_EXTENSION);
                            @endphp
                            @if(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                <i class="fas fa-file-image"></i>
                            @elseif(in_array($extension, ['pdf']))
                                <i class="fas fa-file-pdf"></i>
                            @elseif(in_array($extension, ['doc', 'docx']))
                                <i class="fas fa-file-word"></i>
                            @else
                                <i class="fas fa-file"></i>
                            @endif
                        </div>
                        <div class="file-info">{{ basename($colis->pathfile) }}</div>
                        <a href="{{ asset('storage/' . $colis->pathfile) }}" 
                           target="_blank" 
                           class="btn btn-primary">
                            <i class="fas fa-download"></i>
                            Télécharger le fichier
                        </a>
                    </div>
                </div>
            </div>
            @endif

            <!-- Utilisateur responsable -->
            @if($colis->user_id)
            <div class="card" style="margin-bottom: 20px;">
                <div class="card-header">
                    <h4 style="font-size: 16px; margin: 0;">
                        <i class="fas fa-user-tie"></i> Utilisateur Responsable
                    </h4>
                </div>
                <div class="card-body">
                    <div class="info-card" style="border-color: var(--info-color);">
                        <div class="info-label">Assigné à</div>
                        <div class="info-value">
                            <i class="fas fa-user-check"></i>
                            {{ $colis->user->name ?? 'Utilisateur inconnu' }}
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Timeline -->
            <div class="card">
                <div class="card-header">
                    <h4 style="font-size: 16px; margin: 0;">
                        <i class="fas fa-history"></i> Historique
                    </h4>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-date">{{ $colis->created_at->format('d/m/Y à H:i') }}</div>
                            <div class="timeline-content">
                                <strong>Colis créé</strong> - Le colis a été enregistré dans le système
                            </div>
                        </div>
                        @if($colis->updated_at != $colis->created_at)
                        <div class="timeline-item">
                            <div class="timeline-date">{{ $colis->updated_at->format('d/m/Y à H:i') }}</div>
                            <div class="timeline-content">
                                <strong>Dernière modification</strong> - Les informations du colis ont été mises à jour
                            </div>
                        </div>
                        @endif
                        @if($colis->user_id)
                        <div class="timeline-item">
                            <div class="timeline-date">{{ $colis->updated_at->format('d/m/Y à H:i') }}</div>
                            <div class="timeline-content">
                                <strong>Colis traité</strong> - Assigné à {{ $colis->user->name ?? 'un utilisateur' }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Boutons d'action -->
            <div class="action-buttons">
                <a href="{{ route('admin.colis.edit', $colis->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i>
                    Modifier
                </a>
                <a href="{{ route('admin.colis.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Retour à la liste
                </a>
                <button onclick="window.print()" class="btn btn-secondary">
                    <i class="fas fa-print"></i>
                    Imprimer
                </button>
                <form action="{{ route('admin.colis.destroy', $colis->id) }}" 
                      method="POST" 
                      style="display: inline;"
                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce colis ? Cette action est irréversible.');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection