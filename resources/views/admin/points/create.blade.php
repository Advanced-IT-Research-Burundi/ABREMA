@extends('layouts.admin')

@section('title', 'Ajouter un Point d\'Entrée')

@section('page-title', 'Points d\'Entrée')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.point-entrees.index') }}">Points d'entrée</a>
    <i class="fas fa-chevron-right"></i>
    <span>Ajouter un Point</span>
@endsection

@section('content')
    <div class="content-header">
        <div class="content-header-left">
            <h2>Ajouter un Point d'Entrée</h2>
            <p>Remplissez le formulaire pour ajouter un nouveau point d'entrée</p>
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
                    <form action="{{ route('admin.point-entrees.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="nom" class="form-label required">
                                Nom du Point d'Entrée
                            </label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom"
                                name="nom" value="{{ old('nom') }}"
                                placeholder="Ex: Aéroport International de Bujumbura" required>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title" class="form-label required">
                                Titre / Description
                            </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                name="title" value="{{ old('title') }}" placeholder="Ex: Principal point d'entrée aérien"
                                required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Donnez une description courte de ce point d'entrée
                            </small>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                Enregistrer
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

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3>Conseils</h3>
                </div>
                <div class="card-body">
                    <div class="info-box">
                        <i class="fas fa-text-width"></i>
                        <div>
                            <h4>Nom précis</h4>
                            <p>Utilisez le nom officiel complet du point d'entrée.</p>
                        </div>
                    </div>
                    <div class="info-box">
                        <i class="fas fa-info-circle"></i>
                        <div>
                            <h4>Description claire</h4>
                            <p>Indiquez le type (aéroport, frontière terrestre, port, etc.).</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3>Types de Points d'entrée</h3>
                </div>
                <div class="card-body">
                    <ul class="types-list">
                        <li><i class="fas fa-plane"></i> Aéroports</li>
                        <li><i class="fas fa-road"></i> Frontières terrestres</li>
                        <li><i class="fas fa-ship"></i> Ports lacustres</li>
                        <li><i class="fas fa-border-all"></i> Postes frontaliers</li>
                        <li><i class="fas fa-warehouse"></i> Zones franches</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function previewImage(event) {
                const file = event.target.files[0];
                const preview = document.getElementById('preview');
                const previewContainer = document.getElementById('imagePreview');
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

            .image-preview-container {
                width: 100%;
                max-height: 400px;
                border-radius: 8px;
                overflow: hidden;
                border: 2px solid #e2e8f0;
            }

            .image-preview-container img {
                width: 100%;
                height: auto;
                display: block;
            }

            .info-box {
                display: flex;
                gap: 15px;
                padding: 15px;
                background: #f8f9fa;
                border-radius: 8px;
                margin-bottom: 15px;
            }

            .info-box i {
                font-size: 24px;
                color: #667eea;
                flex-shrink: 0;
            }

            .info-box h4 {
                font-size: 14px;
                font-weight: 600;
                margin-bottom: 5px;
                color: #2d3748;
            }

            .info-box p {
                font-size: 13px;
                color: #718096;
                margin: 0;
            }

            .types-list {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .types-list li {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 10px 0;
                color: #4a5568;
                font-size: 14px;
                border-bottom: 1px solid #e2e8f0;
            }

            .types-list li:last-child {
                border-bottom: none;
            }

            .types-list i {
                color: #667eea;
                font-size: 16px;
                width: 20px;
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
