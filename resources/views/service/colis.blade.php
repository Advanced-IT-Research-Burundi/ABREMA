@extends('layouts.base')

@section('title', 'Soumettre un colis')

@section('content')
<div class="page-wrapper">

    <div class="page-section">
        <h2 class="page-section-title">Soumettre un nouveau colis</h2>

        {{-- Message de succès --}}
        @if(session('success'))
            <div class="alert alert-success page-text">{{ session('success') }}</div>
        @endif

        {{-- Erreurs globales --}}
        @if ($errors->any())
            <div class="alert alert-danger page-text">
                <strong>Veuillez corriger les erreurs ci-dessous :</strong>
            </div>
        @endif

        <form action="{{ route('colis.store') }}" method="POST" enctype="multipart/form-data" class="page-form">
            @csrf

            <div class="mb-3">
                <label class="form-label page-text">Nom et prénom de l'expéditeur</label>
                <input type="text" name="nom_prenom"
                       class="form-control @error('nom_prenom') is-invalid @enderror"
                       value="{{ old('nom_prenom') }}" required>
                @error('nom_prenom')
                    <div class="invalid-feedback page-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label page-text">Téléphone</label>
                <input type="tel" name="phone"
                       class="form-control @error('phone') is-invalid @enderror"
                       value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="invalid-feedback page-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label page-text">Email</label>
                <input type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback page-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label page-text">Message / Description</label>
                <textarea name="message"
                          class="form-control @error('message') is-invalid @enderror"
                          rows="4" required>{{ old('message') }}</textarea>
                @error('message')
                    <div class="invalid-feedback page-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label page-text">Fichier joint (optionnel)</label>
                <input type="file" name="pathfile"
                       class="form-control @error('pathfile') is-invalid @enderror"
                       accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                @error('pathfile')
                    <div class="invalid-feedback page-text">{{ $message }}</div>
                @enderror
                <small class="text-muted page-text">
                    Formats acceptés : PDF, DOC, DOCX, JPG, PNG (Max 5MB)
                </small>
            </div>

            <button type="submit" class="btn btn-primary">Soumettre le colis</button>
        </form>
    </div>

</div>
@endsection
