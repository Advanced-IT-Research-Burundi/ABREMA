@extends('layouts.base')

@section('title', 'Les Documents | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <style>
        .pdf-viewer-wrapper {
            width: 100%; border: 1px solid var(--gray-200);
            background: var(--gray-50); overflow: hidden; margin-top: 10px;
        }
        .pdf-viewer-header {
            display: flex; align-items: center; justify-content: space-between;
            padding: 12px 16px; background: var(--green-dark); color: #fff;
        }
        .pdf-viewer-header span {
            font-size: 0.84rem; font-weight: 600;
            display: flex; align-items: center; gap: 8px;
        }
        .pdf-viewer-header span i { color: var(--gold); }
        .pdf-viewer-header a {
            font-size: 0.8rem; color: var(--gold-light);
            text-decoration: none; display: flex; align-items: center;
            gap: 5px; transition: color .2s;
        }
        .pdf-viewer-header a:hover { color: #fff; }
        .pdf-viewer-wrapper embed { display: block; width: 100%; height: 780px; border: none; }

        /* Doc section séparateur */
        .doc-section { padding-top: 30px; margin-top: 30px; border-top: 1px solid var(--gray-100); }
        .doc-section:first-child { padding-top: 0; margin-top: 0; border-top: none; }

        /* État vide */
        .doc-empty {
            text-align: center; padding: 60px 20px; color: var(--gray-400);
        }
        .doc-empty i { font-size: 3rem; display: block; margin-bottom: 16px; opacity: .28; }
        .doc-empty h3 {
            font-family: 'DM Serif Display', serif; font-size: 1.2rem;
            color: var(--gray-600); font-weight: 400; margin-bottom: 8px;
        }
        .doc-empty p { font-size: 0.88rem; color: var(--gray-400); margin: 0; }
    </style>
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Documents</span>
        </div>
        <h1>Les Documents</h1>
        <p class="lead">Consultez et téléchargez les documents officiels de l'ABREMA</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR ══ --}}
                <aside class="sidebar-nav">

                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('information.actualite') ? 'active' : '' }}"
                               href="{{ route('information.actualite') }}">
                                <span>Actualités</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('information.document') ? 'active' : '' }}"
                               href="{{ route('information.document') }}">
                                <span>Documents</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('information.evenement') ? 'active' : '' }}"
                               href="{{ route('information.evenement') }}">
                                <span>Événements</span>
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
                            <a class="nav-link" href="{{ route('submitcolis') }}">
                                <span>Inspection des colis</span>
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
                        <div class="sc-icon"><i class="fas fa-folder-open"></i></div>
                        <h4>Besoin d'un document ?</h4>
                        <p>Contactez-nous pour toute demande de document officiel</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Les Documents</h2>
                    <p>Consultez et téléchargez les documents officiels publiés par l'ABREMA.</p>

                    @if ($autreDocuments->count() == 0)

                        <div class="doc-empty">
                            <i class="fas fa-folder-open"></i>
                            <h3>Aucun document disponible</h3>
                            <p>Il n'y a pas de documents publiés pour le moment. Revenez bientôt.</p>
                        </div>

                    @else

                        @foreach ($autreDocuments as $autreDocument)
                            <div class="doc-section">

                                <h3>{{ $autreDocument->title }}</h3>

                                @if($autreDocument->pathfile)

                                    <div class="pdf-viewer-wrapper">
                                        <div class="pdf-viewer-header">
                                            <span>
                                                <i class="fas fa-file-pdf"></i>
                                                {{ $autreDocument->title }}
                                            </span>
                                            <a href="{{ asset('storage/' . $autreDocument->pathfile) }}" target="_blank">
                                                <i class="fas fa-external-link-alt"></i> Ouvrir dans un nouvel onglet
                                            </a>
                                        </div>
                                        <embed src="{{ asset('storage/' . $autreDocument->pathfile) }}"
                                               type="application/pdf" width="100%" height="780px">
                                    </div>

                                    <div style="display:flex; gap:12px; margin-top:14px;">
                                        <a href="{{ asset('storage/' . $autreDocument->pathfile) }}"
                                           target="_blank" class="btn-primary-page">
                                            <i class="fas fa-eye"></i> Voir en plein écran
                                        </a>
                                        <a href="{{ asset('storage/' . $autreDocument->pathfile) }}"
                                           download class="btn-gold-page">
                                            <i class="fas fa-download"></i> Télécharger
                                        </a>
                                    </div>

                                @else
                                    <div class="alert-box">
                                        <h3><i class="fas fa-exclamation-triangle"></i> Fichier indisponible</h3>
                                        <p>Le fichier pour ce document n'est pas encore disponible.</p>
                                    </div>
                                @endif

                            </div>
                        @endforeach

                        <div style="margin-top: 28px; padding-top: 20px; border-top: 1px solid var(--gray-100);">
                            {{ $autreDocuments->links() }}
                        </div>

                    @endif

                </main>

            </div>
        </div>
    </div>

@endsection