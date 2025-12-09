{{-- ACTUALITES FORM: admin/actualites/form.blade.php --}}
@extends('layouts.admin')

@section('title', isset($actualite) ? 'Modifier l\'actualité' : 'Nouvelle actualité')
@section('page-title', isset($actualite) ? 'Modifier l\'actualité' : 'Nouvelle actualité')

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">{{ isset($actualite) ? 'Modifier' : 'Créer' }} une actualité</h2>
    </div>
    <a href="{{ route('admin.actualites.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
</div>

<form action="{{ isset($actualite) ? route('admin.actualites.update', $actualite) : route('admin.actualites.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($actualite))
        @method('PUT')
    @endif

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="title">Titre <span style="color: var(--danger);">*</span></label>
                <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $actualite->title ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control" rows="6">{{ old('description', $actualite->description ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label>Image de couverture</label>
                @if(isset($actualite) && $actualite->image)
                    <img src="{{ Storage::url($actualite->image) }}" style="max-width: 300px; display: block; margin: 10px 0; border-radius: 8px;">
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
                <small style="color: #666;">Format: JPG, PNG (Max: 2MB)</small>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ isset($actualite) ? 'Mettre à jour' : 'Publier' }}
                </button>
                <a href="{{ route('admin.actualites.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </div>
    </div>
</form>
@endsection