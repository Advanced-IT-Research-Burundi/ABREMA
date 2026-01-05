@extends('layouts.admin')

@section('title', 'Détails du Membre')

@section('page-title', 'Équipe de Direction de l'ABREMA')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.equipe-directions.index') }}">Équipe de Direction de l'ABREMA</a>
    <i class="fas fa-chevron-right"></i>
    <span>{{ $equipeDirection->nom_prenom }}</span>
@endsection

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h2>Détails du Membre</h2>
        <p>Informations complètes sur {{ $equipeDirection->nom_prenom }}</p>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.equipe-directions.edit', $equipeDirection) }}" class="btn btn-warning">
            <i class="fas fa-edit"></i>
            Modifier
        </a>
        <a href="{{ route('admin.equipe-directions.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Retour
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="card member-profile-card">
            <div class="card-body text-center">
                @if($equipeDirection->photo)
                    <img src="{{ Storage::url($equipeDirection->photo) }}" 
                         alt="{{ $equipeDirection->nom_prenom }}" 
                         class="profile-photo">
                @else
                    <div class="profile-photo-placeholder">
                        {{ substr($equipeDirection->nom_prenom, 0, 1) }}
                    </div>
                @endif
                
                <h3 class="member-name">{{ $equipeDirection->nom_prenom }}</h3>
                
                <div class="member-contact">
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:{{ $equipeDirection->email }}">{{ $equipeDirection->email }}</a>
                </div>
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
                        {{ $equipeDirection->created_at->format('d/m/Y à H:i') }}
                    </div>
                </div>
                
                <div class="info-row">
                    <div class="info-label">
                        <i class="fas fa-calendar-check"></i>
                        Modifié le
                    </div>
                    <div class="info-value">
                        {{ $equipeDirection->updated_at->format('d/m/Y à H:i') }}
                    </div>
                </div>
                
                @if($equipeDirection->user)
                    <div class="info-row">
                        <div class="info-label">
                            <i class="fas fa-user"></i>
                            Créé par
                        </div>
                        <div class="info-value">
                            {{ $equipeDirection->user->name }}
                        </div>
                    </div>
                @endif
                
                <div class="info-row">
                    <div class="info-label">
                        <i class="fas fa-key"></i>
                        ID
                    </div>
                    <div class="info-value">
                        #{{ $equipeDirection->id }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Description & Fonction</h3>
            </div>
            <div class="card-body">
                <div class="description-content">
                    {{ $equipeDirection->description }}
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Actions Rapides</h3>
            </div>
            <div class="card-body">
                <div class="quick-actions">
                    <a href="{{ route('admin.equipe-directions.edit', $equipeDirection) }}" 
                       class="action-card action-edit">
                        <div class="action-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="action-content">
                            <h4>Modifier</h4>
                            <p>Mettre à jour les informations</p>
                        </div>
                    </a>

                    <a href="mailto:{{ $equipeDirection->email }}" 
                       class="action-card action-email">
                        <div class="action-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="action-content">
                            <h4>Envoyer un Email</h4>
                            <p>Contacter le membre</p>
                        </div>
                    </a>

                    <form action="{{ route('admin.equipe-directions.destroy', $equipeDirection) }}" 
                          method="POST"
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="action-card action-delete">
                            <div class="action-icon">
                                <i class="fas fa-trash"></i>
                            </div>
                            <div class="action-content">
                                <h4>Supprimer</h4>
                                <p>Retirer de l'équipe</p>
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
    .member-profile-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        margin-bottom: 20px;
    }
    
    .profile-photo {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid rgba(255, 255, 255, 0.3);
        margin-bottom: 20px;
    }
    
    .profile-photo-placeholder {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        color: white;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 60px;
        font-weight: 700;
        border: 5px solid rgba(255, 255, 255, 0.3);
        margin-bottom: 20px;
    }
    
    .member-name {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 15px;
        color: white;
    }
    
    .member-contact {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: rgba(255, 255, 255, 0.15);
        padding: 10px 20px;
        border-radius: 50px;
        margin-top: 15px;
    }
    
    .member-contact a {
        color: white;
        text-decoration: none;
        font-weight: 500;
    }
    
    .member-contact a:hover {
        text-decoration: underline;
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
    
    .action-email:hover {
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
    
    .action-email .action-icon {
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