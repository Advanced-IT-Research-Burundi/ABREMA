@extends('layouts.admin')

@section('title', 'Modifier un Membre')

@section('page-title', 'Équipe de Direction')

@section('breadcrumb')
    <span>Administration</span>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.equipe-directions.index') }}">Équipe de Direction</a>
    <i class="fas fa-chevron-right"></i>
    <span>Modifier</span>
@endsection

@section('content')
<div class="content-header">
    <div class="content-header-left">
        <h2>Modifier un Membre</h2>
        <p>Modifiez les informations du membre de l'équipe</p>
    </div>
    <div class="content-header-right">
        <a href="{{ route('admin.equipe-directions.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i>
            Retour
        </a>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.equipe-directions.update', $equipeDirection) }}" 
                      method="POST" 
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nom_prenom" class="form-label required">
                            Nom & Prénom
                        </label>
                        <input type="text" 
                               class="form-control @error('nom_prenom') is-invalid @enderror" 
                               id="nom_prenom" 
                               name="nom_prenom" 
                               value="{{ old('nom_prenom', $equipeDirection->nom_prenom) }}"
                               placeholder="Ex: Dr. Jean Dupont"
                               required>
                        @error('nom_prenom')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label required">
                            Email
                        </label>
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" 
                               name="email" 
                               value="{{ old('email', $equipeDirection->email) }}"
                               placeholder="email@abrema.bi"
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label required">
                            Description / Fonction
                        </label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="5"
                                  placeholder="Ex: Directeur Général de l'ABREMA, responsable de..."
                                  required>{{ old('description', $equipeDirection->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            Décrivez le poste et les responsabilités du membre
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="photo" class="form-label">
                            Photo
                        </label>
                        
                        @if($equipeDirection->photo)
                            <div class="current-photo mb-3">
                                <p class="text-muted mb-2">Photo actuelle:</p>
                                <img src="{{ Storage::url($equipeDirection->photo) }}" 
                                     alt="{{ $equipeDirection->nom_prenom }}" 
                                     class="current-photo-img">
                            </div>
                        @endif
                        
                        <div class="custom-file-upload">
                            <input type="file" 
                                   class="form-control-file @error('photo') is-invalid @enderror" 
                                   id="photo" 
                                   name="photo"
                                   accept="image/*"
                                   onchange="previewImage(event)">
                            <label for="photo" class="file-upload-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span>Choisir une nouvelle photo</span>
                            </label>
                        </div>
                        @error('photo')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">
                            Format accepté: JPG, PNG. Taille maximale: 2MB. Laissez vide pour conserver la photo actuelle.
                        </small>
                        
                        <div id="imagePreview" class="mt-3" style="display: none;">
                            <p class="text-muted mb-2">Nouvel aperçu:</p>
                            <img id="preview" src="" alt="Aperçu" class="img-preview">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            Mettre à jour
                        </button>
                        <a href="{{ route('admin.equipe-directions.index') }}" class="btn btn-secondary">
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
                        <p>{{ $equipeDirection->created_at->format('d/m/Y à H:i') }}</p>
                    </div>
                </div>
                <div class="info-item">
                    <i class="fas fa-clock"></i>
                    <div>
                        <strong>Modifié le</strong>
                        <p>{{ $equipeDirection->updated_at->format('d/m/Y à H:i') }}</p>
                    </div>
                </div>
                @if($equipeDirection->user)
                    <div class="info-item">
                        <i class="fas fa-user"></i>
                        <div>
                            <strong>Créé par</strong>
                            <p>{{ $equipeDirection->user->name }}</p>
                        </div>
                    </div>
                @endif
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
    
    .current-photo-img {
        max-width: 200px;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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
    
    .img-preview {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
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