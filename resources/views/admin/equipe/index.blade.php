@extends('layouts.admin')

@section('title', 'Équipe de Direction')

@section('page-title', 'Équipe de Direction')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <span>Équipe de Direction</span>
@endsection

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h2>Liste des Membres</h2>
        <p>Gérez les membres de l'équipe de direction de l'ABREMA</p>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.equipe-directions.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Ajouter un Membre
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Nom & Prénom</th>
                        <th>Email</th>
                        <th>Description</th>
                        <th>Date d'ajout</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($membres as $membre)
                        <tr>
                            <td>
                                @if($membre->photo)
                                    <img src="{{ Storage::url($membre->photo) }}" 
                                         alt="{{ $membre->nom_prenom }}" 
                                         class="table-avatar">
                                @else
                                    <div class="table-avatar-placeholder">
                                        {{ substr($membre->nom_prenom, 0, 1) }}
                                    </div>
                                @endif
                            </td>
                            <td>
                                <strong>{{ $membre->nom_prenom }}</strong>
                            </td>
                            <td>{{ $membre->email }}</td>
                            <td>
                                <div class="text-truncate" style="max-width: 300px;">
                                    {{ Str::limit($membre->description, 80) }}
                                </div>
                            </td>
                            <td>{{ $membre->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.equipe-directions.show', $membre) }}" 
                                       class="btn btn-sm btn-info" 
                                       title="Voir">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.equipe-directions.edit', $membre) }}" 
                                       class="btn btn-sm btn-warning" 
                                       title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.equipe-directions.destroy', $membre) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?');">
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
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="fas fa-users fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Aucun membre de l'équipe pour le moment.</p>
                                <a href="{{ route('admin.equipe-directions.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                    Ajouter le premier membre
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($membres->hasPages())
            <div class="pagination-wrapper">
                {{ $membres->links() }}
            </div>
        @endif
    </div>
</div>

@push('styles')
<style>
    .table-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .table-avatar-placeholder {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 20px;
    }
    
    .action-buttons {
        display: flex;
        gap: 8px;
    }
    
    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
@endpush
@endsection