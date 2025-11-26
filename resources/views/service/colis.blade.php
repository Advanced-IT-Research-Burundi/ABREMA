@extends('layouts.base')

@section('title', 'Soumettre un colis')

@section('content')
<div class="container mt-5">
    <h2>Soumettre un nouveau colis</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('colis.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nom et prénom de l'expéditeur</label>
            <input type="text" name="nom_prenom" class="form-control @error('nom_prenom') is-invalid @enderror" 
                   value="{{ old('nom_prenom') }}" required>
            @error('nom_prenom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Téléphone</label>
            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" 
                   value="{{ old('phone') }}" required>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                   value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Message / Description</label>
            <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="4" required>{{ old('message') }}</textarea>
            @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Fichier joint (optionnel)</label>
            <input type="file" name="pathfile" class="form-control @error('pathfile') is-invalid @enderror" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
            @error('pathfile')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="text-muted">Formats acceptés : PDF, DOC, DOCX, JPG, PNG (Max 5MB)</small>
        </div>

        <button type="submit" class="btn btn-primary">Soumettre le colis</button>
    </form>
</div>
@endsection
