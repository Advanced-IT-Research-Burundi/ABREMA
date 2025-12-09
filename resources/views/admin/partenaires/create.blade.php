
{{-- FORM VIEW: admin/partenaires/form.blade.php --}}
@extends('layouts.admin')

@section('title', isset($partenaire) ? 'Modifier le partenaire' : 'Nouveau partenaire')
@section('page-title', isset($partenaire) ? 'Modifier le partenaire' : 'Nouveau partenaire')

@section('styles')
<style>
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        font-size: 14px;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid var(--border);
        border-radius: 6px;
        font-size: 14px;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(44, 122, 78, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .file-upload {
        border: 2px dashed var(--border);
        border-radius: 6px;
        padding: 30px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
    }

    .file-upload:hover {
        border-color: var(--primary);
        background: rgba(44, 122, 78, 0.05);
    }

    .file-upload input {
        display: none;
    }

    .preview-image {
        max-width: 200px;
        max-height: 200px;
        margin: 20px auto;
        display: block;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }

    .form-actions {
        display: flex;
        gap: 15px;
        padding-top: 20px;
        border-top: 1px solid var(--border);
    }
</style>
@endsection

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">{{ isset($partenaire) ? 'Modifier le partenaire' : 'Nouveau partenaire' }}</h2>
    </div>
    <a href="{{ route('admin.partenaires.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
</div>

<form action="{{ isset($partenaire) ? route('admin.partenaires.update', $partenaire) : route('admin.partenaires.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($partenaire))
        @method('PUT')
    @endif

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="nom">Nom du partenaire <span style="color: var(--danger);">*</span></label>
                <input type="text" 
                       id="nom" 
                       name="nom" 
                       class="form-control" 
                       value="{{ old('nom', $partenaire->nom ?? '') }}" 
                       required>
            </div>

            <div class="form-group">
                <label for="link">Site web</label>
                <input type="url" 
                       id="link" 
                       name="link" 
                       class="form-control" 
                       placeholder="https://example.com"
                       value="{{ old('link', $partenaire->link ?? '') }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" 
                          name="description" 
                          class="form-control">{{ old('description', $partenaire->description ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label>Logo du partenaire</label>
                @if(isset($partenaire) && $partenaire->logo)
                    <img src="{{ Storage::url($partenaire->logo) }}" alt="{{ $partenaire->nom }}" class="preview-image">
                @endif
                <div class="file-upload" onclick="document.getElementById('logo').click()">
                    <i class="fas fa-cloud-upload-alt" style="font-size: 48px; color: var(--primary); margin-bottom: 10px;"></i>
                    <p style="margin: 0; color: #666;">Cliquez pour sélectionner un logo</p>
                    <small style="color: #999;">PNG, JPG, GIF (Max: 2MB)</small>
                    <input type="file" id="logo" name="logo" accept="image/*">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ isset($partenaire) ? 'Mettre à jour' : 'Enregistrer' }}
                </button>
                <a href="{{ route('admin.partenaires.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </div>
    </div>
</form>
@endsection