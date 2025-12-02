@extends('layouts.admin')

@section('title', 'Modifier un Partenaire')

@section('page-title', 'Partenaires')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.partenaires.index') }}">Partenaires</a>
    <i class="fas fa-chevron-right"></i>
    <span>Modifier</span>
@endsection

@section('content')
    <div class="content-header">
        <div class="content-header-left">
            <h2>Modifier un Partenaire</h2>
            <p>Modifiez les informations du partenaire</p>
        </div>
        <div class="content-header-right">
            <a href="{{ route('admin.partenaires.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i>
                Retour
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.partenaires.update', $partenaire) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nom" class="form-label required">
                                Nom du Partenaire
                            </label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom"
                                name="nom" value="{{ old('nom', $partenaire->nom) }}"
                                placeholder="Ex: Organisation Mondiale de la Santé" required>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nom" class="form-label required">
                                Lien site web du Partenaire
                            </label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="link"
                                name="link" value="{{ old('link') }}" placeholder="Ex: https://www.who.int" required>
                            @error('link')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="logo" class="form-label">
                                Logo du Partenaire
                            </label>

                            <div class="current-logo mb-3">
                                <p class="text-muted mb-2">Logo actuel:</p>
                                <div class="current-logo-container">
                                    <img src="{{ Storage::url($partenaire->logo) }}" alt="{{ $partenaire->nom }}">
                                </div>
                            </div>

                            <div class="custom-file-upload">
                                <input type="file" class="form-control-file @error('logo') is-invalid @enderror"
                                    id="logo" name="logo" accept="image/*" onchange="previewLogo(event)">
                                <label for="logo" class="file-upload-label">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                    <span>Choisir un nouveau logo</span>
                                </label>
                            </div>
                            @error('logo')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Format accepté: JPG, PNG, SVG, GIF. Taille maximale: 2MB. Laissez vide pour conserver le
                                logo actuel.
                            </small>

                            <div id="logoPreview" class="mt-3" style="display: none;">
                                <p class="text-muted mb-2">Nouvel aperçu:</p>
                                <div class="logo-preview-container">
                                    <img id="preview" src="" alt="Aperçu du logo">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label required">
                                Description
                            </label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                rows="5" placeholder="Décrivez le partenaire et sa collaboration avec l'ABREMA..." required>{{ old('description', $partenaire->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Décrivez le rôle du partenaire et sa contribution
                            </small>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                Mettre à jour
                            </button>
                            <a href="{{ route('admin.partenaires.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i>
                                Annuler
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
                            <p>{{ $partenaire->created_at->format('d/m/Y à H:i') }}</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-clock"></i>
                        <div>
                            <strong>Modifié le</strong>
                            <p>{{ $partenaire->updated_at->format('d/m/Y à H:i') }}</p>
                        </div>
                    </div>
                    @if ($partenaire->user)
                        <div class="info-item">
                            <i class="fas fa-user"></i>
                            <div>
                                <strong>Créé par</strong>
                                <p>{{ $partenaire->user->name }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h3>Zone de Danger</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-3">
                        La suppression de ce partenaire est irréversible. Toutes ses informations seront définitivement
                        perdues.
                    </p>
                    <form action="{{ route('admin.partenaires.destroy', $partenaire) }}" method="POST"
                        onsubmit="return confirm('Êtes-vous absolument sûr de vouloir supprimer ce partenaire ? Cette action est irréversible.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-block">
                            <i class="fas fa-trash"></i>
                            Supprimer ce partenaire
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function previewLogo(event) {
                const file = event.target.files[0];
                const preview = document.getElementById('preview');
                const previewContainer = document.getElementById('logoPreview');
                const label = event.target.nextElementSibling;

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        previewContainer.style.display = 'block';
                        label.querySelector('span').textContent = file.name;
                    }
                    reader.readAsDataURL(file);
                }
            }
        </script>
    @endpush

    @push('styles')
        <style>
            .required::after {
                content: " *";
                color: #e74c3c;
            }

            .current-logo-container {
                width: 100%;
                max-width: 300px;
                height: 150px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #f7fafc;
                border-radius: 8px;
                padding: 20px;
                border: 2px solid #e2e8f0;
            }

            .current-logo-container img {
                max-width: 100%;
                max-height: 100%;
                object-fit: contain;
            }

            .custom-file-upload {
                position: relative;
                margin-bottom: 10px;
            }

            .custom-file-upload input[type="file"] {
                position: absolute;
                opacity: 0;
                width: 0;
                height: 0;
            }

            .file-upload-label {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 12px 20px;
                background: #f8f9fa;
                border: 2px dashed #dee2e6;
                border-radius: 8px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .file-upload-label:hover {
                background: #e9ecef;
                border-color: #adb5bd;
            }

            .file-upload-label i {
                font-size: 24px;
                color: #6c757d;
            }

            .logo-preview-container {
                width: 100%;
                height: 200px;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #f7fafc;
                border-radius: 8px;
                padding: 20px;
                border: 2px solid #e2e8f0;
            }

            .logo-preview-container img {
                max-width: 100%;
                max-height: 100%;
                object-fit: contain;
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
