{{-- resources/views/admin/texte-reglementaires/create.blade.php & edit.blade.php --}}
@extends('layouts.admin')

@section('title', isset($texte) ? 'Modifier le texte' : 'Nouveau texte')
@section('page-title', isset($texte) ? 'Modifier le texte' : 'Nouveau texte')

@section('content')
<div class="page-header">
    <h2 class="page-title">{{ isset($texte) ? 'Modifier le texte réglementaire' : 'Nouveau texte réglementaire' }}</h2>
    <a href="{{ route('admin.texte-reglementaires.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ isset($texte) ? route('admin.texte-reglementaires.update', $texte) : route('admin.texte-reglementaires.store') }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($texte))
                @method('PUT')
            @endif

            <div class="form-group">
                <label class="form-label">Titre<span class="required">*</span></label>
                <input type="text" name="title" class="form-control @error('title') error @enderror" 
                       value="{{ old('title', $texte->title ?? '') }}" required>
                @error('title')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Fichier (PDF)</label>
                @if(isset($texte) && $texte->pathfile)
                <div style="margin-bottom: 10px;">
                    <a href="{{ asset('storage/' . $texte->pathfile) }}" target="_blank" class="btn btn-sm btn-info">
                        <i class="fas fa-file-pdf"></i> Fichier actuel
                    </a>
                </div>
                @endif
                <input type="file" name="pathfile" class="form-control @error('pathfile') error @enderror" accept=".pdf">
                <small style="color: #666;">Format accepté : PDF (Max: 5MB)</small>
                @error('pathfile')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ isset($texte) ? 'Mettre à jour' : 'Enregistrer' }}
                </button>
                <a href="{{ route('admin.texte-reglementaires.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
