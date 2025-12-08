@extends('layouts.base')

@section('title', 'colis')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')
    <!-- PAGE BANNER -->
    <div class="page-banner">
        <div class="container-fluid">
            <h1>Inspection des Colis</h1>
            <p class="lead">Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</p>
        </div>
    </div>

    <!-- MAIN LAYOUT -->
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                <!-- SIDEBAR NAV -->
                <aside class="sidebar-nav">
                    <h3>Navigation</h3>
                    <nav class="nav flex-column">
                        <a class="nav-link active" href="{{ route('about.profilabrema') }}">Profil global d'ABREMA</a>
                        <a class="nav-link" href="{{ route('about.organigramme') }}">Organigramme</a>
                        <a class="nav-link" href="{{ route('about.equipe') }}">Équipe de Direction</a>
                        <a class="nav-link" href="{{ route('about.fonction') }}">Fonction Réglementaire</a>
                        <a class="nav-link" href="{{ route('about.qms') }}">QMS</a>
                    </nav>
                </aside>

                <!-- MAIN CONTENT -->
                <main class="main-content">
                    <h2>Soumettre Un colis</h2>
                    <div class="page-section">

                        {{-- Message de succès --}}
                        @if (session('success'))
                            <div class="alert alert-success page-text">{{ session('success') }}</div>
                        @endif

                        {{-- Erreurs globales --}}
                        @if ($errors->any())
                            <div class="alert alert-danger page-text">
                                <strong>Veuillez corriger les erreurs ci-dessous :</strong>
                            </div>
                        @endif

                        <form action="{{ route('colis.store') }}" method="POST" enctype="multipart/form-data"
                            class="page-form">
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
                                    class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                    required>
                                @error('phone')
                                    <div class="invalid-feedback page-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label page-text">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <div class="invalid-feedback page-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label page-text">Message / Description</label>
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="4" required>{{ old('message') }}</textarea>
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

                </main>

                <!-- SIDEBAR WIDGETS -->
                <aside>
                    <!-- Avis au public -->
                    <div class="widget">
                        <h3>Avis au Public</h3>
                        <p class="text-muted small">Pas d'avis au Public pour le moment</p>
                    </div>

                    <!-- Services rapides -->
                    <div class="widget widget-services">
                        <h3>Services Rapides</h3>
                        <a href="{{ route('importexport.demande') }}" class="service-link">
                            <span>Demande d'importation</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="{{ route('colis.index') }}" class="service-link">
                            <span>Inspection des colis</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="{{ route('vigilance.signalement') }}" class="service-link">
                            <span>Signalement PMQIF</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                        <a href="{{ route('vigilance.delegue') }}" class="service-link">
                            <span>Délégués médicaux</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Liens officiels -->
                    <div class="widget widget-links">
                        <h3>Points D'Entrees</h3>
                        <a href="#">Aéroport international Melchior Ndadaye</a>
                        <a href="#">Port de Bujumbura</a>
                        <a href="#">Frontière de Kobero</a>
                        <a href="#">Frontière de Kanyaru haut</a>
                        <a href="#">Frontière Gasenyi Nemba</a>
                        <a href="#">Frontière Gatumba</a>
                    </div>
                </aside>

            </div>
        </div>
    </div>
@endsection
