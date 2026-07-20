{{-- AVIS PUBLICS FORM: admin/avis-publics/form.blade.php --}}
@extends('layouts.admin')

@section('title', isset($avis) ? 'Modifier l\'avis' : 'Nouvel avis')
@section('page-title', isset($avis) ? 'Modifier l\'avis' : 'Nouvel avis')

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">{{ isset($avis) ? 'Modifier' : 'Créer' }} un avis public</h2>
    </div>
    <a href="{{ route('admin.avis-publics.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
</div>

<form action="{{ isset($avis) ? route('admin.avis-publics.update', $avis) : route('admin.avis-publics.store') }}" method="POST">
    @csrf
    @if(isset($avis))
        @method('PUT')
    @endif

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Titre <span style="color: var(--danger);">*</span></label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $avis->title ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="contenu">Contenu court <span style="color: var(--danger);">*</span></label>
                <input type="text" id="contenu" name="contenu" class="form-control" value="{{ old('contenu', $avis->contenu ?? '') }}" required>
                <small style="color: #666;">Résumé en une phrase</small>
            </div>

            <div class="form-group">
                <label for="description">Description complète <span style="color: var(--danger);">*</span></label>
                <textarea id="description" name="description" class="form-control" rows="8" required>{{ old('description', $avis->description ?? '') }}</textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ isset($avis) ? 'Mettre à jour' : 'Publier' }}
                </button>
                <a href="{{ route('admin.avis-publics.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </div>
    </div>
</form>
@endsection