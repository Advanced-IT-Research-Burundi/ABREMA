{{-- ÉQUIPE DIRECTION FORM: admin/equipe-directions/form.blade.php --}}
@extends('layouts.admin')

@section('title', isset($membre) ? 'Modifier le membre' : 'Nouveau membre')
@section('page-title', isset($membre) ? 'Modifier le membre' : 'Nouveau membre')

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">{{ isset($membre) ? 'Modifier' : 'Ajouter' }} un membre</h2>
    </div>
    <a href="{{ route('admin.equipe-directions.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
</div>

<form action="{{ isset($membre) ? route('admin.equipe-directions.update', $membre) : route('admin.equipe-directions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($membre))
        @method('PUT')
    @endif

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="nom_prenom">Nom & Prénom <span style="color: var(--danger);">*</span></label>
                <input type="text" id="nom_prenom" name="nom_prenom" class="form-control" value="{{ old('nom_prenom', $membre->nom_prenom ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email <span style="color: var(--danger);">*</span></label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $membre->email ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description / Fonction <span style="color: var(--danger);">*</span></label>
                <textarea id="description" name="description" class="form-control" rows="5" required>{{ old('description', $membre->description ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label>Photo</label>
                @if(isset($membre) && $membre->photo)
                    <img src="{{ Storage::url($membre->photo) }}" style="max-width: 200px; display: block; margin: 10px 0; border-radius: 8px;">
                @endif
                <input type="file" name="photo" class="form-control" accept="image/*">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ isset($membre) ? 'Mettre à jour' : 'Enregistrer' }}
                </button>
                <a href="{{ route('admin.equipe-directions.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </div>
    </div>
</form>
@endsection