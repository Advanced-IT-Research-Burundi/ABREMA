{{-- INDEX VIEW: admin/partenaires/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Partenaires')
@section('page-title', 'Gestion des Partenaires')

@section('styles')
<style>
    .partners-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 20px;
    }

    .partner-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        overflow: hidden;
        transition: all 0.3s;
    }

    .partner-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.12);
    }

    .partner-logo {
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--light);
        padding: 20px;
    }

    .partner-logo img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .partner-info {
        padding: 20px;
    }

    .partner-name {
        font-size: 18px;
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 10px;
    }

    .partner-description {
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
        line-height: 1.5;
        max-height: 60px;
        overflow: hidden;
    }

    .partner-actions {
        display: flex;
        gap: 10px;
        padding-top: 15px;
        border-top: 1px solid var(--border);
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: white;
        border-radius: 10px;
    }

    .empty-state i {
        font-size: 64px;
        color: #ddd;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">Nos partenaires</h2>
        <p style="color: #666; margin-top: 5px;">Gérer les partenaires d'ABREMA</p>
    </div>
    <a href="{{ route('admin.partenaires.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Nouveau partenaire
    </a>
</div>

@if($partenaires->count() > 0)
<div class="partners-grid">
    @foreach($partenaires as $partenaire)
    <div class="partner-card">
        <div class="partner-logo">
            @if($partenaire->logo)
                <img src="{{ Storage::url($partenaire->logo) }}" alt="{{ $partenaire->nom }}">
            @else
                <i class="fas fa-building" style="font-size: 48px; color: #ddd;"></i>
            @endif
        </div>
        <div class="partner-info">
            <div class="partner-name">{{ $partenaire->nom }}</div>
            <div class="partner-description">
                {{ Str::limit($partenaire->description, 100) }}
            </div>
            @if($partenaire->link)
            <a href="{{ $partenaire->link }}" target="_blank" style="color: var(--primary); font-size: 14px;">
                <i class="fas fa-external-link-alt"></i> Visiter le site
            </a>
            @endif
            <div class="partner-actions">
                <a href="{{ route('admin.partenaires.edit', $partenaire) }}" class="btn btn-info btn-sm" style="flex: 1;">
                    <i class="fas fa-edit"></i> Modifier
                </a>
                <form action="{{ route('admin.partenaires.destroy', $partenaire) }}" method="POST" onsubmit="return confirm('Supprimer ce partenaire ?');">
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

@if($partenaires->hasPages())
<div style="margin-top: 30px; display: flex; justify-content: center;">
    {{ $partenaires->links() }}
</div>
@endif

@else
<div class="empty-state">
    <i class="fas fa-handshake"></i>
    <h3 style="margin-bottom: 10px;">Aucun partenaire</h3>
    <p style="color: #666; margin-bottom: 20px;">Commencez par ajouter votre premier partenaire</p>
    <a href="{{ route('admin.partenaires.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Ajouter un partenaire
    </a>
</div>
@endif
@endsection