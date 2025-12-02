@extends('layouts.admin')

@section('title', 'Nouveau Client')
@section('page-title', 'Créer un Nouveau Client')

@section('breadcrumb')
    <a href="{{ route('admin.dashboard') }}">Accueil</a>
    <span>/</span>
    <a href="{{ route('admin.clients.index') }}">Clients</a>
    <span>/</span>
    <span>Nouveau</span>
@endsection

@section('content')
<div class="form-page">
    <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data" class="product-form">
        @csrf
        
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
                                       value="{{ old('name') }}"
                                       placeholder="Ex : Entreprise ABC" required>
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
                                <textarea name="description" rows="3"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Brève description du client...">{{ old('description') }}</textarea>
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
                            <label class="form-label required">
                                <i class="fas fa-upload"></i>
                                Image du Client
                            </label>
                            <input type="file" name="image"
                                   class="form-control @error('image') is-invalid @enderror"
                                   required>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text">Formats acceptés : JPG, PNG, WebP (max 2MB).</small>
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
                                Enregistrer le Client
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
