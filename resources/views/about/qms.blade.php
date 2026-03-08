@extends('layouts.base')

@section('title', 'Système de Management de la Qualité | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <style>
        /* Visionneuse PDF intégrée */
        .pdf-viewer-wrapper {
            width: 100%;
            border: 1px solid var(--gray-200);
            background: var(--gray-50);
            overflow: hidden;
            margin-top: 10px;
        }
        .pdf-viewer-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 12px 16px;
            background: var(--green-dark);
            color: #fff;
        }
        .pdf-viewer-header span {
            font-size: 0.84rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .pdf-viewer-header span i { color: var(--gold); }
        .pdf-viewer-header a {
            font-size: 0.8rem;
            color: var(--gold-light);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color .2s;
        }
        .pdf-viewer-header a:hover { color: #fff; }
        .pdf-viewer-wrapper embed {
            display: block;
            width: 100%;
            height: 780px;
            border: none;
        }

        /* Badges ISO */
        .iso-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 18px 0;
        }
        .iso-badge {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 10px 16px;
            border: 1.5px solid var(--green);
            background: var(--green-pale);
            transition: all .24s;
        }
        .iso-badge:hover {
            background: var(--green);
            border-color: var(--green);
        }
        .iso-badge:hover .iso-num,
        .iso-badge:hover .iso-label { color: #fff; }
        .iso-num {
            font-family: 'DM Serif Display', serif;
            font-size: 1.1rem;
            color: var(--green-dark);
            font-weight: 400;
            line-height: 1;
            transition: color .24s;
        }
        .iso-label {
            font-size: 0.78rem;
            color: var(--gray-600);
            line-height: 1.3;
            transition: color .24s;
        }
        .iso-icon {
            font-size: 1.2rem;
            color: var(--gold);
            flex-shrink: 0;
        }
    </style>
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <a href="{{ route('about.profilabrema') }}">À Propos</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">QMS</span>
        </div>
        <h1>Système de Management de la Qualité</h1>
        <p class="lead">Démarche qualité de l'ABREMA fondée sur les normes ISO internationales</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR GAUCHE ══ --}}
                <aside class="sidebar-nav">

                    {{-- Navigation --}}
                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('about.profilabrema') ? 'active' : '' }}"
                               href="{{ route('about.profilabrema') }}">
                                <span>Profil global d'ABREMA</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('about.organigramme') ? 'active' : '' }}"
                               href="{{ route('about.organigramme') }}">
                                <span>Organigramme</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('about.equipe') ? 'active' : '' }}"
                               href="{{ route('about.equipe') }}">
                                <span>Équipe de Direction</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('about.fonction') ? 'active' : '' }}"
                               href="{{ route('about.fonction') }}">
                                <span>Fonction Réglementaire</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('about.qms') ? 'active' : '' }}"
                               href="{{ route('about.qms') }}">
                                <span>QMS</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                        </nav>
                    </div>

                    {{-- Services Rapides --}}
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

                    {{-- Points d'entrée --}}
                    <div class="nav-block">
                        <div class="nav-block-title">
                            <i class="fas fa-map-marker-alt"></i> Points d'Entrée
                        </div>
                        <nav>
                            <a class="nav-link" href="#">
                                <span>Aéroport Melchior Ndadaye</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="#">
                                <span>Port de Bujumbura</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="#">
                                <span>Frontière de Kobero</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="#">
                                <span>Frontière de Kanyaru haut</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="#">
                                <span>Frontière Gasenyi Nemba</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link" href="#">
                                <span>Frontière Gatumba</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                        </nav>
                    </div>

                    {{-- Bloc contact --}}
                    <div class="sidebar-contact">
                        <div class="sc-icon"><i class="fas fa-award"></i></div>
                        <h4>Politique Qualité ABREMA</h4>
                        <p>Téléchargez notre politique qualité complète en PDF</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                    <a href="{{ asset('files/politique_qualite_qms.pdf') }}" download class="sidebar-pdf">
                        <i class="fas fa-file-pdf"></i> Télécharger la Politique Qualité
                    </a>

                </aside>

                {{-- ══ CONTENU PRINCIPAL ══ --}}
                <main class="main-content">

                    <h2>Système de Management de la Qualité</h2>

                    <p>
                        L'ABREMA a déjà entrepris un Système de Management de la Qualité <strong>(SMQ / QMS)</strong>.
                        Dans cette démarche qualité, la Direction se réfère aux normes ISO et s'engage à satisfaire
                        aux exigences des clients et des autres parties prenantes.
                    </p>

                    {{-- Badges normes ISO --}}
                    <div class="iso-badges">
                        <div class="iso-badge">
                            <i class="fas fa-certificate iso-icon"></i>
                            <div>
                                <div class="iso-num">ISO 9000</div>
                                <div class="iso-label">Principes fondamentaux & vocabulaire</div>
                            </div>
                        </div>
                        <div class="iso-badge">
                            <i class="fas fa-check-double iso-icon"></i>
                            <div>
                                <div class="iso-num">ISO 9001</div>
                                <div class="iso-label">Systèmes de management de la qualité</div>
                            </div>
                        </div>
                        <div class="iso-badge">
                            <i class="fas fa-chart-line iso-icon"></i>
                            <div>
                                <div class="iso-num">ISO 9004</div>
                                <div class="iso-label">Management pour le succès durable</div>
                            </div>
                        </div>
                        <div class="iso-badge">
                            <i class="fas fa-handshake iso-icon"></i>
                            <div>
                                <div class="iso-num">ISO 26000</div>
                                <div class="iso-label">Responsabilité sociétale</div>
                            </div>
                        </div>
                    </div>

                    <div class="info-box">
                        <h3><i class="fas fa-award"></i> Engagement de la Direction</h3>
                        <p>
                            La Direction de l'ABREMA s'engage à offrir des services de réglementation
                            pharmaceutique de qualité, en faisant appel à un personnel compétent et dévoué
                            ainsi qu'aux technologies adaptées, dans le strict respect des normes ISO.
                        </p>
                    </div>

                    {{-- Visionneuse PDF Politique Qualité --}}
                    <div class="content-section">
                        <h3>Politique Qualité</h3>
                        <p>
                            La politique qualité de l'ABREMA définit les orientations stratégiques
                            et les engagements de l'institution envers ses parties prenantes.
                        </p>

                        <div class="pdf-viewer-wrapper">
                            <div class="pdf-viewer-header">
                                <span>
                                    <i class="fas fa-file-pdf"></i>
                                    Politique Qualité — ABREMA QMS
                                </span>
                                <a href="{{ asset('files/politique_qualite_qms.pdf') }}"
                                   target="_blank">
                                    <i class="fas fa-external-link-alt"></i> Ouvrir dans un nouvel onglet
                                </a>
                            </div>
                            <embed src="{{ asset('files/politique_qualite_qms.pdf') }}"
                                   type="application/pdf"
                                   width="100%"
                                   height="780px">
                        </div>

                        <div style="display:flex; gap:12px; margin-top:14px;">
                            <a href="{{ asset('files/politique_qualite_qms.pdf') }}"
                               target="_blank" class="btn-primary-page">
                                <i class="fas fa-eye"></i> Voir en plein écran
                            </a>
                            <a href="{{ asset('files/politique_qualite_qms.pdf') }}"
                               download class="btn-gold-page">
                                <i class="fas fa-download"></i> Télécharger le PDF
                            </a>
                        </div>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection