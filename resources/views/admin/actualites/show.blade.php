@extends('layouts.admin')

@section('title', $actualite->title)
@section('page-title', 'Détail de l\'Actualité')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Accueil</a>
    <span>/</span>
    <a href="{{ route('admin.actualites.index') }}">Actualités</a>
    <span>/</span>
    <span>{{ Str::limit($actualite->title, 30) }}</span>
@endsection

@push('styles')
<style>
/* PAGE STRUCTURE */
.details-container {
    max-width: 1100px;
    margin: 0 auto;
}

.card {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    overflow: hidden;
    margin-bottom: 25px;
}

/* HEADER */
.details-header {
    padding: 30px;
    background: linear-gradient(135deg, #2d7034, #24825e);
    color: #fff;
}

.details-title {
    font-size: 28px;
    margin-bottom: 12px;
    font-weight: 700;
}

.details-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    font-size: 14px;
    opacity: .95;
}

.details-meta i {
    margin-right: 6px;
}

/* IMAGE */
.details-image {
    width: 100%;
    height: 380px;
    background-size: cover;
    background-position: center;
}

.details-no-image {
    background: #f3f3f3;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #bbb;
    font-size: 80px;
}

/* SECTIONS */
.section {
    padding: 30px;
    border-bottom: 1px solid #f2f2f2;
}

.section:last-child {
    border-bottom: none;
}

.section-title {
    font-size: 18px;
    font-weight: 700;
    color: #333;
    margin-bottom: 15px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.section-title i {
    color: #6a7bff;
}

.section-text {
    color: #555;
    line-height: 1.7;
    font-size: 15px;
}

.empty-section {
    text-align: center;
    padding: 40px 10px;
    color: #999;
}

.empty-section i {
    font-size: 48px;
    margin-bottom: 10px;
    opacity: 0.5;
}

/* GRID INFO */
.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit,minmax(220px,1fr));
    gap: 20px;
}

.info-box {
    background: #f9fafc;
    padding: 18px;
    border-radius: 8px;
    border-left: 3px solid #6a7bff;
}

.info-label {
    font-size: 12px;
    text-transform: uppercase;
    color: #7d8da1;
    font-weight: 600;
}

.info-value {
    font-size: 15px;
    font-weight: 600;
    color: #2c3e50;
}

/* ACTIONS */
.actions {
    display: flex;
    justify-content: space-between;
    padding: 25px 30px;
    background: #fafafa;
    border-top: 1px solid #eee;
}

.actions .btn {
    padding: 10px 20px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
}
</style>
@endpush

@section('content')
<div class="details-container">

    <div class="card">

        {{-- HEADER --}}
        <div class="details-header">
            <h1 class="details-title">{{ $actualite->title }}</h1>

            <div class="details-meta">
                <span><i class="fas fa-calendar"></i>{{ $actualite->created_at->format('d/m/Y à H:i') }}</span>

                @if($actualite->user)
                    <span><i class="fas fa-user"></i>{{ $actualite->user->name }}</span>
                @endif

                @if($actualite->updated_at != $actualite->created_at)
                    <span><i class="fas fa-edit"></i>Modifié le {{ $actualite->updated_at->format('d/m/Y') }}</span>
                @endif
            </div>
        </div>

        {{-- IMAGE --}}
        @if($actualite->image)
            <div class="details-image"
                 style="background-image: url('{{ asset('storage/' . $actualite->image) }}');">
            </div>
        @else
            <div class="details-image details-no-image">
                <i class="fas fa-image"></i>
            </div>
        @endif

        {{-- DESCRIPTION --}}
        <div class="section">
            <h2 class="section-title"><i class="fas fa-align-left"></i> Description</h2>

            @if ($actualite->description)
                <p class="section-text">{{ $actualite->description }}</p>
            @else
                <div class="empty-section">
                    <i class="fas fa-file-alt"></i>
                    <p>Aucune description disponible.</p>
                </div>
            @endif
        </div>

        {{-- INFORMATIONS --}}
        <div class="section">
            <h2 class="section-title"><i class="fas fa-info-circle"></i> Informations</h2>

            <div class="info-grid">
                <div class="info-box">
                    <div class="info-label">ID</div>
                    <div class="info-value">#{{ $actualite->id }}</div>
                </div>

                <div class="info-box">
                    <div class="info-label">Création</div>
                    <div class="info-value">{{ $actualite->created_at->format('d/m/Y H:i') }}</div>
                </div>

                <div class="info-box">
                    <div class="info-label">Modification</div>
                    <div class="info-value">{{ $actualite->updated_at->format('d/m/Y H:i') }}</div>
                </div>

                @if($actualite->user)
                    <div class="info-box">
                        <div class="info-label">Auteur</div>
                        <div class="info-value">{{ $actualite->user->name }}</div>
                    </div>
                @endif
            </div>
        </div>

        {{-- ACTIONS --}}
        <div class="actions">

            <a href="{{ route('admin.actualites.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Retour
            </a>

            <div style="display: flex; gap: 10px;">
                <a href="{{ route('admin.actualites.edit', $actualite->id) }}" class="btn btn-success">
                    <i class="fas fa-edit"></i> Modifier
                </a>

                <form action="{{ route('admin.actualites.destroy', $actualite->id) }}" method="POST"
                      onsubmit="return confirm('Voulez-vous vraiment supprimer cette actualité ?')">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">
                        <i class="fas fa-trash"></i> Supprimer
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>
@endsection
