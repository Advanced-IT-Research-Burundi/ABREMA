@extends('layouts.admin')

@section('title', 'Nouvelle Actualité')
@section('page-title', 'Créer une Nouvelle Actualité')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Accueil</a>
    <span>/</span>
    <a href="{{ route('admin.actualites.index') }}">Actualités</a>
    <span>/</span>
    <span>Nouvelle</span>
@endsection

@section('content')
<div class="form-page">
    <form action="{{ route('admin.actualites.store') }}" method="POST" enctype="multipart/form-data" class="product-form">
        @csrf
        
        <div class="form-layout">
            <!-- Main Form -->
            <div class="form-main">

                <!-- Informations Générales -->
                <div class="card form-card">
                    <div class="card-header">
                        <div class="card-header-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <h3 class="card-title">Informations Générales</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-grid">
                            
                            <div class="form-group span-2">
                                <label class="form-label required">
                                    <i class="fas fa-font"></i>
                                    Titre de l'Actualité
                                </label>
                                <input type="text" name="title"
                                       class="form-control @error('title') is-invalid @enderror"
                                       value="{{ old('title') }}"
                                       placeholder="Ex : Lancement d'un nouveau service" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group span-2">
                                <label class="form-label required">
                                    <i class="fas fa-align-left"></i>
                                    Contenu de l'Actualité
                                </label>
                                <textarea name="description" rows="3"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Contenu de l’actualité..."
                                    required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Image -->
                <div class="card form-card">
                    <div class="card-header">
                        <div class="card-header-icon">
                            <i class="fas fa-image"></i>
                        </div>
                        <h3 class="card-title">Image de l'Actualité</h3>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-label required">
                                <i class="fas fa-upload"></i>
                                Image Principale
                            </label>
                            <input type="file" name="image"
                                   class="form-control @error('image') is-invalid @enderror"
                                   required>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text">Formats acceptés : JPG, PNG, WebP (max 2MB).</small>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="form-sidebar">

                <!-- Actions -->
                <div class="card sticky-card">
                    <div class="card-header">
                        <h3 class="card-title">Actions</h3>
                    </div>

                    <div class="card-body">
                        <div class="action-buttons-vertical">
                            <button type="submit" class="btn btn-success btn-block">
                                <i class="fas fa-save"></i>
                                Publier l’Actualité
                            </button>

                            <a href="{{ route('admin.actualites.index') }}" class="btn btn-secondary btn-block">
                                <i class="fas fa-times"></i>
                                Annuler
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>
</div>
@endsection
