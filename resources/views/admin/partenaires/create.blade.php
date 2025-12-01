@extends('layouts.admin')

@section('title', 'Ajouter un Partenaire')

@section('page-title', 'Partenaires')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.partenaires.index') }}">Partenaires</a>
    <i class="fas fa-chevron-right"></i>
    <span>Ajouter un Partenaire</span>
@endsection

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h2>Ajouter un Partenaire</h2>
        <p>Remplissez le formulaire pour ajouter un nouveau partenaire</p>
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
                <form action="{{ route('admin.partenaires.store') }}" 
                      method="POST" 
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nom" class="form-label required">
                            Nom du Partenaire
                        </label>
                        <input type="text" 
                               class="form-control @error('nom') is-invalid @enderror" 
                               id="nom" 
                               name="nom" 
                               value="{{ old('nom') }}"
                               placeholder="Ex: Organisation Mondiale de la Santé"
                               required>
                        @error('nom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="logo" class="form-label required">
                            Logo du Partenaire
                        </label>
                        <div class="custom-file-upload">
                            <input type="file" 
                                   class="form-control-file @error('logo') is-invalid @enderror" 
                                   id="logo" 
                                   name="logo"
                                   accept="image/*"
                                   onchange="previewLogo(event)"
                                   required>
                            <label for="logo" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Choisir le logo</span>
                            </label>
                        </div>
                        @error('logo')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            Format accepté: JPG, PNG, SVG, GIF. Taille maximale: 2MB. Recommandé: fond transparent.
                        </small>
                        
                        <div id="logoPreview" class="mt-3" style="display: none;">
                            <div class="logo-preview-container">
                                <img id="preview" src="" alt="Aperçu du logo">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label required">
                            Description
                        </label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="5"
                                  placeholder="Décrivez le partenaire et sa collaboration avec l'ABREMA..."
                                  required>{{ old('description') }}</textarea>
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
                            Enregistrer
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
                <h3>Conseils</h3>
            </div>
            <div class="card-body">
                <div class="info-box">
                    <i class="fas fa-image"></i>
                    <div>
                        <h4>Logo de qualité</h4>
                        <p>Utilisez un logo haute résolution avec fond transparent (PNG) pour un meilleur rendu.</p>
                    </div>
                </div>
                <div class="info-box">
                    <i class="fas fa-palette"></i>
                    <div>
                        <h4>Format recommandé</h4>
                        <p>Format carré ou paysage, minimum 300x300px pour une bonne qualité d'affichage.</p>
                    </div>
                </div>
                <div class="info-box">
                    <i class="fas fa-info-circle"></i>
                    <div>
                        <h4>Description claire</h4>
                        <p>Expliquez le type de partenariat et les domaines de collaboration.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Exemples de partenaires</h3>
            </div>
            <div class="card-body">
                <ul class="example-list">
                    <li><i class="fas fa-check-circle"></i> Organisations internationales</li>
                    <li><i class="fas fa-check-circle"></i> Laboratoires pharmaceutiques</li>
                    <li><i class="fas fa-check-circle"></i> Institutions gouvernementales</li>
                    <li><i class="fas fa-check-circle"></i> ONGs et associations</li>
                    <li><i class="fas fa-check-circle"></i> Universités et centres de recherche</li>
                </ul>
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
    
    .example-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .example-list li {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 0;
        color: #4a5568;
        font-size: 14px;
    }
    
    .example-list i {
        color: #48bb78;
        font-size: 16px;
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