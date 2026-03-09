@extends('layouts.base')

@section('title', 'Inspection des Colis | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <style>
        /* ── Formulaire ── */
        .page-form .form-group { margin-bottom: 20px; }

        .page-form label {
            display: block; font-size: 0.84rem; font-weight: 600;
            color: var(--text); margin-bottom: 6px;
        }

        .page-form input[type="text"],
        .page-form input[type="tel"],
        .page-form input[type="email"],
        .page-form input[type="file"],
        .page-form textarea {
            width: 100%; padding: 10px 14px;
            border: 1px solid var(--gray-200);
            font-size: 0.88rem; font-family: 'Poppins', sans-serif;
            color: var(--text); background: #fff;
            outline: none; transition: border-color .2s, box-shadow .2s;
        }
        .page-form input:focus,
        .page-form textarea:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(26,92,52,.08);
        }
        .page-form input.is-invalid,
        .page-form textarea.is-invalid { border-color: #dc2626; }
        .page-form .invalid-feedback {
            font-size: 0.78rem; color: #dc2626; margin-top: 4px;
        }
        .page-form textarea { resize: vertical; min-height: 110px; }
        .page-form input[type="file"] { padding: 8px 10px; cursor: pointer; }

        .form-hint {
            font-size: 0.78rem; color: var(--gray-400); margin-top: 5px;
        }

        .form-note-box {
            background: var(--gold-pale, #fffbeb);
            border-left: 4px solid var(--gold);
            padding: 14px 18px; margin-bottom: 24px;
            font-size: 0.86rem; color: var(--gray-700); line-height: 1.72;
        }
        .form-note-box strong { color: var(--green-dark); }

        .btn-submit {
            display: inline-flex; align-items: center; gap: 9px;
            background: var(--green-dark); color: #fff;
            padding: 12px 28px; font-size: 0.9rem; font-weight: 700;
            border: none; cursor: pointer; transition: var(--tr);
            font-family: 'Poppins', sans-serif; margin-top: 6px;
        }
        .btn-submit:hover { background: var(--green); transform: translateY(-1px); }

        /* Alert success / danger */
        .alert-success-custom {
            background: #f0fdf4; border-left: 4px solid #22c55e;
            padding: 14px 18px; margin-bottom: 22px;
            font-size: 0.88rem; color: #166534;
            display: flex; align-items: center; gap: 10px;
        }
        .alert-error-custom {
            background: #fef2f2; border-left: 4px solid #dc2626;
            padding: 14px 18px; margin-bottom: 22px;
            font-size: 0.88rem; color: #991b1b;
            display: flex; align-items: center; gap: 10px;
        }
    </style>
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Inspection des Colis</span>
        </div>
        <h1>Inspection des Colis</h1>
        <p class="lead">Soumettez votre demande d'inspection de colis auprès de l'ABREMA</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR ══ --}}
                <aside class="sidebar-nav">

                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('submitcolis') ? 'active' : '' }}"
                               href="{{ route('submitcolis') }}">
                                <span>Inspection des Colis</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('importexport.demande') ? 'active' : '' }}"
                               href="{{ route('importexport.demande') }}">
                                <span>Demande d'importation</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                        </nav>
                    </div>

                    <div class="nav-block">
                        <div class="nav-block-title">
                            <i class="fas fa-bolt"></i> Services Rapides
                        </div>
                        <nav>
                            <a class="nav-link" href="{{ route('importexport.demande') }}">
                                <span>Demande d'importation</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="{{ route('vigilance.signalement') }}">
                                <span>Signalement PMQIF</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="{{ route('vigilance.delegue') }}">
                                <span>Délégués médicaux</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                        </nav>
                    </div>

                    <div class="nav-block">
                        <div class="nav-block-title">
                            <i class="fas fa-map-marker-alt"></i> Points d'Entrée
                        </div>
                        <nav>
                            <a class="nav-link" href="#"><span>Aéroport Melchior Ndadaye</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="#"><span>Port de Bujumbura</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="#"><span>Frontière de Kobero</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="#"><span>Frontière de Kanyaru haut</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="#"><span>Frontière Gasenyi Nemba</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="#"><span>Frontière Gatumba</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                        </nav>
                    </div>

                    <div class="sidebar-contact">
                        <div class="sc-icon"><i class="fas fa-box-open"></i></div>
                        <h4>Service Inspection</h4>
                        <p>Pour toute question sur l'inspection des colis</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                    <a href="{{ asset('doc/FORMULAIRE_DE_DEMANDE_INSPECTION_DES_COLIS.docx') }}"
                       download class="sidebar-pdf">
                        <i class="fas fa-download"></i> Télécharger le Formulaire
                    </a>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Soumettre une demande d'inspection de colis</h2>

                    <p>
                        Utilisez ce formulaire pour soumettre votre colis à l'inspection réglementaire
                        de l'ABREMA. Veuillez suivre les instructions ci-dessous avant de remplir le formulaire.
                    </p>

                    {{-- Alertes --}}
                    @if(session('success'))
                        <div class="alert-success-custom">
                            <i class="fas fa-check-circle"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert-error-custom">
                            <i class="fas fa-exclamation-circle"></i>
                            Veuillez corriger les erreurs ci-dessous avant de soumettre.
                        </div>
                    @endif

                    {{-- Notice instructions --}}
                    <div class="info-box">
                        <h3><i class="fas fa-list-ol"></i> Avant de compléter le formulaire</h3>
                        <ol style="margin: 10px 0 0 18px; padding: 0; line-height: 2;">
                            <li>
                                Téléchargez le formulaire officiel —
                                <a href="{{ asset('doc/FORMULAIRE_DE_DEMANDE_INSPECTION_DES_COLIS.docx') }}"
                                   download style="color:var(--green); font-weight:600;">
                                    <i class="fas fa-download"></i> Télécharger le formulaire (.docx)
                                </a>
                            </li>
                            <li>Remplissez-le complètement et signez-le</li>
                            <li>Téléversez-le ci-dessous avec vos informations</li>
                        </ol>
                    </div>

                    {{-- Note fichier --}}
                    <div class="form-note-box">
                        <strong><i class="fas fa-paperclip"></i> Note :</strong>
                        Une fois le formulaire de demande d'inspection des colis signé et rempli,
                        veuillez le téléverser ici. Fichiers acceptés : <strong>PDF, DOC, DOCX, JPG, PNG</strong> (max. 5 Mo).
                    </div>

                    {{-- Formulaire --}}
                    <form action="{{ route('submitcolis') }}" method="POST"
                          enctype="multipart/form-data" class="page-form">
                        @csrf

                        <div class="form-group">
                            <label>Nom de l'expéditeur <span style="color:#dc2626;">*</span></label>
                            <input type="text" name="nom_prenom"
                                   class="@error('nom_prenom') is-invalid @enderror"
                                   value="{{ old('nom_prenom') }}"
                                   placeholder="Nom et prénom complets" required>
                            @error('nom_prenom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Téléphone <span style="color:#dc2626;">*</span></label>
                            <input type="tel" name="phone"
                                   class="@error('phone') is-invalid @enderror"
                                   value="{{ old('phone') }}"
                                   placeholder="+257 XX XX XX XX" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Adresse Email <span style="color:#dc2626;">*</span></label>
                            <input type="email" name="email"
                                   class="@error('email') is-invalid @enderror"
                                   value="{{ old('email') }}"
                                   placeholder="exemple@domaine.com" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Message / Description <span style="color:#dc2626;">*</span></label>
                            <textarea name="message"
                                      class="@error('message') is-invalid @enderror"
                                      placeholder="Décrivez le contenu du colis et l'objet de la demande d'inspection…"
                                      required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Formulaire signé (fichier joint)</label>
                            <input type="file" name="pathfile"
                                   class="@error('pathfile') is-invalid @enderror"
                                   accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                            @error('pathfile')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <p class="form-hint">
                                <i class="fas fa-paperclip"></i>
                                Formats acceptés : PDF, DOC, DOCX, JPG, PNG &mdash; Taille max : 5 Mo
                            </p>
                        </div>

                        <button type="submit" class="btn-submit">
                            <i class="fas fa-paper-plane"></i> Soumettre la demande
                        </button>

                    </form>

                </main>

            </div>
        </div>
    </div>

@endsection