{{-- ÉQUIPE DIRECTION INDEX: admin/equipe-directions/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Équipe & Direction')
@section('page-title', 'Gestion de l\'Équipe')

@section('styles')
<style>
    .team-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 25px;
    }

    .team-card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        transition: all 0.3s;
    }

    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.12);
    }

    .team-photo {
        height: 250px;
        background: var(--light);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .team-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .team-info {
        padding: 20px;
    }

    .team-name {
        font-size: 20px;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 8px;
    }

    .team-email {
        color: var(--primary);
        font-size: 14px;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .team-description {
        font-size: 14px;
        color: #666;
        line-height: 1.6;
        margin-bottom: 15px;
    }

    .team-actions {
        display: flex;
        gap: 10px;
        padding-top: 15px;
        border-top: 1px solid var(--border);
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">Équipe & Direction</h2>
        <p style="color: #666; margin-top: 5px;">Gérer les membres de l'équipe</p>
    </div>
    <a href="{{ route('admin.equipe-directions.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nouveau membre
    </a>
</div>

@if($equipeDirections->count() > 0)
<div class="team-grid">
    @foreach($equipeDirections as $membre)
    <div class="team-card">
        <div class="team-photo">
            @if($membre->photo)
                <img src="{{ Storage::url($membre->photo) }}" alt="{{ $membre->nom_prenom }}">
            @else
                <i class="fas fa-user-tie" style="font-size: 80px; color: #ccc;"></i>
            @endif
        </div>
        <div class="team-info">
            <div class="team-name">{{ $membre->nom_prenom }}</div>
            <div class="team-email">
                <i class="fas fa-envelope"></i>
                {{ $membre->email }}
            </div>
            <div class="team-description">
                {{ Str::limit($membre->description, 120) }}
            </div>
            <div class="team-actions">
                <a href="{{ route('admin.equipe-directions.edit', $membre) }}" class="btn btn-info btn-sm" style="flex: 1;">
                    <i class="fas fa-edit"></i> Modifier
                </a>
                <form action="{{ route('admin.equipe-directions.destroy', $membre) }}" method="POST" onsubmit="return confirm('Supprimer ce membre ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="empty-state" style="text-align: center; padding: 60px; background: white; border-radius: 10px;">
    <i class="fas fa-user-tie" style="font-size: 64px; color: #ddd; margin-bottom: 20px;"></i>
    <h3>Aucun membre</h3>
    <p style="color: #666; margin: 10px 0 20px;">Ajoutez le premier membre de l'équipe</p>
    <a href="{{ route('admin.equipe-directions.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Ajouter un membre
    </a>
</div>
@endif
@endsection