@extends('layouts.admin')

@section('title', 'Nouveau Colis')
@section('page-title', 'Nouveau Colis')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <i class="fas fa-chevron-right"></i>
    <a href="{{ route('admin.colis.index') }}">Colis</a>
    <i class="fas fa-chevron-right"></i>
    <span>Nouveau</span>
@endsection

@push('styles')
<style>
    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: var(--text-dark);
        font-size: 14px;
    }

    .form-label .required {
        color: var(--danger-color);
        margin-left: 3px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 14px;
        transition: all 0.3s ease;
        font-family: 'Inter', sans-serif;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(46,204,113,0.1);
    }

    .form-control.is-invalid {
        border-color: var(--danger-color);
    }

    .invalid-feedback {
        color: var(--danger-color);
        font-size: 13px;
        margin-top: 5px;
        display: block;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
    }

    .file-upload-wrapper {
        position: relative;
    }

    .file-upload-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        background: var(--light-bg);
        border: 2px dashed var(--border-color);
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
        color: var(--text-dark);
        font-weight: 500;
    }

    .file-upload-btn:hover {
        border-color: var(--primary-color);
        background: rgba(46,204,113,0.05);
    }

    .file-upload-btn input[type="file"] {
        display: none;
    }

    .file-name {
        margin-top: 8px;
        font-size: 13px;
        color: var(--text-light);
    }

    .form-help {
        font-size: 13px;
        color: var(--text-light);
        margin-top: 5px;
    }
</style>
@endpush

@section('content')
<div style="max-width: 800px;">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Informations du Colis</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.colis.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="form-label">
                        Nom et Prénom
                        <span class="required">*</span>
                    </label>
                    <input type="text" 
                           name="nom_prenom" 
                           class="form-control @error('nom_prenom') is-invalid @enderror" 
                           value="{{ old('nom_prenom') }}"
                           placeholder="Entrez le nom complet">
                    @error('nom_prenom')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label class="form-label">
                            Téléphone
                            <span class="required">*</span>
                        </label>
                        <input type="tel" 
                               name="phone" 
                               class="form-control @error('phone') is-invalid @enderror" 
                               value="{{ old('phone') }}"
                               placeholder="+257 XX XX XX XX">
                        @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            Email
                            <span class="required">*</span>
                        </label>
                        <input type="email" 
                               name="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               value="{{ old('email') }}"
                               placeholder="exemple@email.com">
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Fichier Joint</label>
                    <div class="file-upload-wrapper">
                        <label class="file-upload-btn">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <span>Choisir un fichier</span>
                            <input type="file" name="pathfile" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" onchange="updateFileName(this)">
                        </label>
                        <div class="file-name" id="fileName"></div>
                    </div>
                    <div class="form-help">Formats acceptés: PDF, DOC, DOCX, JPG, PNG (Max: 5MB)</div>
                    @error('pathfile')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Message / Description
                        <span class="required">*</span>
                    </label>
                    <textarea name="message" 
                              class="form-control @error('message') is-invalid @enderror" 
                              rows="5"
                              placeholder="Décrivez le contenu du colis, les instructions particulières...">{{ old('message') }}</textarea>
                    @error('message')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Utilisateur Responsable</label>
                    <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                        <option value="">-- Sélectionner un utilisateur --</option>
                        @if(isset($users))
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    <div class="form-help">Optionnel: Assignez ce colis à un utilisateur</div>
                    @error('user_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Enregistrer
                    </button>
                    <a href="{{ route('admin.colis.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i>
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function updateFileName(input) {
        const fileName = document.getElementById('fileName');
        if (input.files.length > 0) {
            fileName.textContent = '📎 ' + input.files[0].name;
            fileName.style.color = 'var(--primary-color)';
        } else {
            fileName.textContent = '';
        }
    }
</script>
@endpush