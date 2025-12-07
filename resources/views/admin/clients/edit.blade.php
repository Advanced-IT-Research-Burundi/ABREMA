@extends('layouts.admin')

@section('title', 'Modifier Client')
@section('page-title', 'Modifier le Client')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Accueil</a>
    <span>/</span>
    <a href="{{ route('admin.clients.index') }}">Clients</a>
    <span>/</span>
    <span>Éditer</span>
@endsection

@section('content')
    <div class="form-page">
        <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data"
            class="product-form">
            @csrf
            @method('PUT')

            <div class="form-layout">

                <!-- Main Form -->
                <div class="form-main">

                    <!-- Informations Générales -->
                    <div class="card form-card">
                        <div class="card-header">
                            <div class="card-header-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            <h3 class="card-title">Informations Générales du Client</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-grid">

                                <!-- Nom -->
                                <div class="form-group span-2">
                                    <label class="form-label required">
                                        <i class="fas fa-font"></i>
                                        Nom du Client
                                    </label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name', $client->name) }}" placeholder="Ex : Entreprise ABC" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="form-group span-2">
                                    <label class="form-label">
                                        <i class="fas fa-align-left"></i>
                                        Description
                                    </label>
                                    <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Brève description du client...">{{ old('description', $client->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="card form-card">
                        <div class="card-header">
                            <div class="card-header-icon">
                                <i class="fas fa-image"></i>
                            </div>
                            <h3 class="card-title">Logo / Image du Client</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">
                                    <i class="fas fa-upload"></i>
                                    Image du Client (laisser vide pour conserver l'actuelle)
                                </label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <small class="form-text">Formats acceptés : JPG, PNG, WebP (max 2MB).</small>

                                @if ($client->image)
                                    <div class="mt-2">
                                        <strong>Image actuelle :</strong><br>
                                        <img src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->name }}"
                                            style="max-width: 150px; height: auto;">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Sidebar -->
                <div class="form-sidebar">

                    <!-- Actions -->
                    <div class="card sticky-card">
                        <div class="card-header">
                            <h3 class="card-title">Actions</h3>
                        </div>

                        <div class="card-body">
                            <div class="action-buttons-vertical">
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-save"></i>
                                    Mettre à jour le Client
                                </button>

                                <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary btn-block">
                                    <i class="fas fa-times"></i>
                                    Annuler
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
