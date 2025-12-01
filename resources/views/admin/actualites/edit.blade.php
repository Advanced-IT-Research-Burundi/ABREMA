@extends('layouts.admin')

@section('title', 'Modifier une Actualité')
@section('page-title', 'Modifier l’Actualité')

@section('breadcrumb') <a href="{{ route('admin.dashboard') }}">Accueil</a> <span>/</span> <a href="{{ route('admin.actualites.index') }}">Actualités</a> <span>/</span> <span>Modifier</span>
@endsection

@section('content')

<div class="form-page">
    <form action="{{ route('admin.actualites.update', $actualite) }}" method="POST" enctype="multipart/form-data" class="product-form">
        @csrf
        @method('PUT')

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
                                value="{{ old('title', $actualite->title) }}"
                                placeholder="Titre de l’actualité" required>
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
                                placeholder="Contenu de l’actualité..." required>{{ old('description', $actualite->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>

            <!-- Bloc Image -->
            <div class="card form-card">
                <div class="card-header">
                    <div class="card-header-icon">
                        <i class="fas fa-image"></i>
                    </div>
                    <h3 class="card-title">Image de l'Actualité</h3>
                </div>

                <div class="card-body">

                    <!-- Image actuelle -->
                    @if($actualite->image)
                        <div class="current-image-box">
                            <p><strong>Image actuelle :</strong></p>
                            <img src="{{ asset('storage/' . $actualite->image) }}" 
                                 class="current-image-preview" alt="Image actuelle">
                        </div>
                        <hr>
                    @endif

                    <!-- Nouvelle image -->
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-upload"></i>
                            Nouvelle Image (optionnel)
                        </label>
                        <input type="file" name="image"
                               class="form-control @error('image') is-invalid @enderror">
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

            <div class="card sticky-card">
                <div class="card-header">
                    <h3 class="card-title">Actions</h3>
                </div>

                <div class="card-body">
                    <div class="action-buttons-vertical">

                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-save"></i>
                            Mettre à jour
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
