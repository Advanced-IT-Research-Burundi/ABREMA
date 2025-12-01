@extends('layouts.admin')

@section('title', 'Publier un Avis Public')

@section('page-title', 'Avis Publics')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.avis-publics.index') }}">Avis Publics</a>
    <i class="fas fa-chevron-right"></i>
    <span>Publier un Avis</span>
@endsection

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h2>Publier un Avis Public</h2>
        <p>Remplissez le formulaire pour publier un nouvel avis public</p>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.avis-publics.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Retour
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.avis-publics.store') }}" 
                      method="POST" 
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title" class="form-label required">
                            Titre de l'Avis
                        </label>
                        <input type="text" 
                               class="form-control @error('title') is-invalid @enderror" 
                               id="title" 
                               name="title" 
                               value="{{ old('title') }}"
                               placeholder="Ex: Appel d'offres pour fourniture de médicaments"
                               required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label required">
                            Description
                        </label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="5"
                                  placeholder="Décrivez brièvement le contenu de cet avis public..."
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            Cette description sera affichée aux utilisateurs pour les aider à comprendre le contenu
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="contenu" class="form-label required">
                            Document de l'Avis
                        </label>
                        <div class="custom-file-upload">
                            <input type="file" 
                                   class="form-control-file @error('contenu') is-invalid @enderror" 
                                   id="contenu" 
                                   name="contenu"
                                   accept=".pdf,.doc,.docx,.xls,.xlsx,.txt"
                                   onchange="previewFile(event)"
                                   required>
                            <label for="contenu" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Choisir le document</span>
                            </label>
                        </div>
                        @error('contenu')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            Formats acceptés: PDF, DOC, DOCX, XLS, XLSX, TXT. Taille maximale: 10MB.
                        </small>
                        
                        <div id="filePreview" class="mt-3" style="display: none;">
                            <div class="file-preview-container">
                                <div class="file-preview-icon">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <div class="file-preview-info">
                                    <div class="file-preview-name" id="fileName"></div>
                                    <div class="file-preview-size" id="fileSize"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-bullhorn"></i>
                            Publier l'Avis
                        </button>
                        <a href="{{ route('admin.avis-publics.index') }}" class="btn btn-secondary">
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
                    <i class="fas fa-file-pdf"></i>
                    <div>
                        <h4>Format PDF recommandé</h4>
                        <p>Privilégiez le format PDF pour garantir un affichage identique sur tous les appareils.</p>
                    </div>
                </div>
                <div class="info-box">
                    <i class="fas fa-heading"></i>
                    <div>
                        <h4>Titre clair et précis</h4>
                        <p>Utilisez un titre qui résume clairement l'objet de l'avis public.</p>
                    </div>
                </div>
                <div class="info-box">
                    <i class="fas fa-align-left"></i>
                    <div>
                        <h4>Description détaillée</h4>
                        <p>Expliquez le contexte et les informations essentielles de l'avis.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3>Types d'avis publics</h3>
            </div>
            <div class="card-body">
                <ul class="avis-types-list">
                    <li><i class="fas fa-gavel"></i> Appels d'offres</li>
                    <li><i class="fas fa-exclamation-triangle"></i> Avis de sécurité</li>
                    <li><i class="fas fa-ban"></i> Retraits de produits</li>
                    <li><i class="fas fa-info-circle"></i> Communications officielles</li>
                    <li><i class="fas fa-newspaper"></i> Communiqués de presse</li>
                    <li><i class="fas fa-calendar"></i> Annonces d'événements</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function previewFile(event) {
    const file = event.target.files[0];
    const previewContainer = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const label = event.target.nextElementSibling;
    
    if (file) {
        fileName.textContent = file.name;
        
        // Calculate file size
        const size = file.size;
        const units = ['B', 'KB', 'MB', 'GB'];
        let unitIndex = 0;
        let filesize = size;
        
        while (filesize >= 1024 && unitIndex < units.length - 1) {
            filesize /= 1024;
            unitIndex++;
        }
        
        fileSize.textContent = filesize.toFixed(2) + ' ' + units[unitIndex];
        previewContainer.style.display = 'block';
        label.querySelector('span').textContent = file.name;
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
    
    .file-preview-container {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        background: #f7fafc;
        border: 2px solid #e2e8f0;
        border-radius: 8px;
    }
    
    .file-preview-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 28px;
    }
    
    .file-preview-name {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 5px;
    }
    
    .file-preview-size {
        font-size: 13px;
        color: #718096;
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
    
    .avis-types-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    
    .avis-types-list li {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 0;
        color: #4a5568;
        font-size: 14px;
        border-bottom: 1px solid #e2e8f0;
    }
    
    .avis-types-list li:last-child {
        border-bottom: none;
    }
    
    .avis-types-list i {
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