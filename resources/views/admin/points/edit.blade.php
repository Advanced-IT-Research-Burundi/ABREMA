@extends('layouts.admin')

@section('title', 'Modifier un Point d’Entrée')

@section('page-title', 'Points d’Entrée')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.point-entrees.index') }}">Points d’Entrée</a>
    <i class="fas fa-chevron-right"></i>
    <span>Modifier</span>
@endsection

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h2>Modifier un Point d’Entrée</h2>
        <p>Modifiez les informations du point d’entrée</p>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.point-entrees.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Retour
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.point-entrees.update', $pointEntree) }}" 
                      method="POST">
                    @csrf
                    @method('PUT')

                    {{-- TITLE --}}
                    <div class="form-group">
                        <label for="title" class="form-label required">
                            Titre
                        </label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title', $pointEntree->title) }}"
                               placeholder="Ex: Poste Frontière de Gatumba"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- NOM --}}
                    <div class="form-group">
                        <label for="nom" class="form-label required">
                            Nom
                        </label>
                        <input type="text" 
                               class="form-control @error('nom') is-invalid @enderror" 
                               id="nom" 
                               name="nom" 
                               value="{{ old('nom', $pointEntree->nom) }}"
                               placeholder="Ex: Gatumba"
                               required>
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- ACTIONS --}}
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Mettre à jour
                        </button>
                        <a href="{{ route('admin.point-entrees.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i>
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ASIDE --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h3>Informations</h3>
            </div>
            <div class="card-body">
                <div class="info-item">
                    <i class="fas fa-calendar"></i>
                    <div>
                        <strong>Créé le</strong>
                        <p>{{ $pointEntree->created_at->format('d/m/Y à H:i') }}</p>
                    </div>
                </div>

                <div class="info-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <strong>Modifié le</strong>
                        <p>{{ $pointEntree->updated_at->format('d/m/Y à H:i') }}</p>
                    </div>
                </div>

                @if($pointEntree->user)
                <div class="info-item">
                    <i class="fas fa-user"></i>
                    <div>
                        <strong>Créé par</strong>
                        <p>{{ $pointEntree->user->name }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .required::after {
        content: " *";
        color: #e74c3c;
    }
    
    .info-item {
        display: flex;
        gap: 15px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 15px;
    }
    
    .info-item i {
        font-size: 20px;
        color: #667eea;
        flex-shrink: 0;
        margin-top: 3px;
    }
    
    .info-item strong {
        display: block;
        font-size: 13px;
        color: #4a5568;
        margin-bottom: 5px;
    }
    
    .info-item p {
        font-size: 14px;
        color: #2d3748;
        margin: 0;
    }
    
    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #e2e8f0;
    }
</style>
@endpush

@endsection
