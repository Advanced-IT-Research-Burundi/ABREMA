{{-- CLIENTS FORM: admin/clients/form.blade.php --}}
@extends('layouts.admin')

@section('title', isset($client) ? 'Modifier le client' : 'Nouveau client')
@section('page-title', isset($client) ? 'Modifier le client' : 'Nouveau client')

@section('content')
<div class="page-header">
    <div>
        <h2 class="page-title">{{ isset($client) ? 'Modifier' : 'Ajouter' }} un client</h2>
    </div>
    <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Retour
    </a>
</div>

<form action="{{ isset($client) ? route('admin.clients.update', $client) : route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($client))
        @method('PUT')
    @endif

    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nom du client <span style="color: var(--danger);">*</span></label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $client->name ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control" value="{{ old('description', $client->description ?? '') }}">
            </div>

            <div class="form-group">
                <label>Photo</label>
                @if(isset($client) && $client->image)
                    <img src="{{ Storage::url($client->image) }}" style="width: 150px; height: 150px; object-fit: cover; display: block; margin: 10px 0; border-radius: 50%;">
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ isset($client) ? 'Mettre à jour' : 'Enregistrer' }}
                </button>
                <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Annuler
                </a>
            </div>
        </div>
    </div>
</form>
@endsection