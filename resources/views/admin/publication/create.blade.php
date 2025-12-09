{{-- resources/views/admin/publications/create.blade.php & edit.blade.php --}}
@extends('layouts.admin')

@section('title', isset($publication) ? 'Modifier la publication' : 'Nouvelle publication')
@section('page-title', isset($publication) ? 'Modifier la publication' : 'Nouvelle publication')

@section('content')
<div class="page-header">
    <h2 class="page-title">{{ isset($publication) ? 'Modifier la publication' : 'Nouvelle publication' }}</h2>
    <a href="{{ route('admin.publications.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ isset($publication) ? route('admin.publications.update', $publication) : route('admin.publications.store') }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($publication))
                @method('PUT')
            @endif

            <div class="form-group">
                <label class="form-label">Titre<span class="required">*</span></label>
                <input type="text" name="title" class="form-control @error('title') error @enderror" 
                       value="{{ old('title', $publication->title ?? '') }}" required>
                @error('title')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control @error('description') error @enderror" rows="5">{{ old('description', $publication->description ?? '') }}</textarea>
                @error('description')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label">Image</label>
                @if(isset($publication) && $publication->image)
                <div style="margin-bottom: 10px;">
                    <img src="{{ asset('storage/' . $publication->image) }}" style="max-width: 200px; border-radius: 8px;">
                </div>
                @endif
                <input type="file" name="image" class="form-control @error('image') error @enderror" accept="image/*">
                @error('image')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ isset($publication) ? 'Mettre à jour' : 'Enregistrer' }}
                </button>
                <a href="{{ route('admin.publications.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection