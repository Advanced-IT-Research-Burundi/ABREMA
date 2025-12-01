@extends('layouts.admin')

@section('title', 'Avis Publics')

@section('page-title', 'Avis Publics')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <span>Avis Publics</span>
@endsection

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h2>Avis Publics</h2>
        <p>Gérez les avis publics et communications officielles de l'ABREMA</p>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.avis-publics.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Publier un Avis
        </a>
    </div>
</div>

<div class="avis-stats mb-4">
    <div class="stat-card">
        <div class="stat-icon">
            <i class="fas fa-bullhorn"></i>
        </div>
        <div class="stat-content">
            <div class="stat-value">{{ $avisPublics->total() }}</div>
            <div class="stat-label">Total Avis Publics</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if($avisPublics->count() > 0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Fichier</th>
                            <th>Date de publication</th>
                            <th>Publié par</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($avisPublics as $avis)
                            <tr>
                                <td>
                                    <div class="avis-title">
                                        <i class="fas fa-file-alt"></i>
                                        <strong>{{ $avis->title }}</strong>
                                    </div>
                                </td>
                                <td>
                                    <div class="text-truncate" style="max-width: 300px;">
                                        {{ Str::limit($avis->description, 80) }}
                                    </div>
                                </td>
                                <td>
                                    <span class="file-badge file-{{ $avis->file_extension }}">
                                        <i class="fas fa-file-{{ $avis->file_extension == 'pdf' ? 'pdf' : 'alt' }}"></i>
                                        {{ strtoupper($avis->file_extension) }}
                                    </span>
                                </td>
                                <td>{{ $avis->created_at->format('d/m/Y') }}</td>
                                <td>
                                    @if($avis->user)
                                        <span class="user-badge">
                                            <i class="fas fa-user"></i>
                                            {{ $avis->user->name }}
                                        </span>
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('admin.avis-publics.show', $avis) }}" 
                                           class="btn btn-sm btn-info" 
                                           title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ Storage::url($avis->contenu) }}" 
                                           class="btn btn-sm btn-success" 
                                           title="Télécharger"
                                           download>
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="{{ route('admin.avis-publics.edit', $avis) }}" 
                                           class="btn btn-sm btn-warning" 
                                           title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.avis-publics.destroy', $avis) }}" 
                                              method="POST" 
                                              class="d-inline"
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet avis public ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    title="Supprimer">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($avisPublics->hasPages())
                <div class="pagination-wrapper">
                    {{ $avisPublics->links() }}
                </div>
            @endif
        @else
            <div class="empty-state">
                <i class="fas fa-bullhorn fa-4x text-muted mb-3"></i>
                <h3>Aucun avis public</h3>
                <p class="text-muted">Commencez par publier votre premier avis public.</p>
                <a href="{{ route('admin.avis-publics.create') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-plus"></i>
                    Publier le premier avis
                </a>
            </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    .avis-stats {
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
    
    .stat-secondary {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
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
    
    .avis-title {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .avis-title i {
        color: #667eea;
        font-size: 18px;
    }
    
    .file-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .file-pdf {
        background: #fee2e2;
        color: #dc2626;
    }
    
    .file-doc,
    .file-docx {
        background: #dbeafe;
        color: #2563eb;
    }
    
    .file-xls,
    .file-xlsx {
        background: #d1fae5;
        color: #059669;
    }
    
    .file-txt {
        background: #f3f4f6;
        color: #6b7280;
    }
    
    .user-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 13px;
        color: #4a5568;
    }
    
    .user-badge i {
        color: #667eea;
    }
    
    .action-buttons {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }
    
    .btn-success {
        background: #10b981;
        color: white;
    }
    
    .btn-success:hover {
        background: #059669;
    }
    
    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
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
</style>
@endpush
@endsection