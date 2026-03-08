@extends('layouts.base')

@section('title', 'Fonctions Réglementaires | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <a href="{{ route('about.profilabrema') }}">À Propos</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Fonctions Réglementaires</span>
        </div>
        <h1>Fonctions Réglementaires de l'ABREMA</h1>
        <p class="lead">Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR GAUCHE ══ --}}
                <aside class="sidebar-nav">

                    {{-- Navigation principale --}}
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
                        <div class="sc-icon"><i class="fas fa-headset"></i></div>
                        <h4>Contactez-nous pour toute assistance</h4>
                        <p>Disponible du lundi au vendredi</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU PRINCIPAL ══ --}}
                <main class="main-content">

                    <h2>Fonctions Réglementaires de l'ABREMA</h2>

                    <p>
                        L'ABREMA exerce un ensemble de fonctions réglementaires essentielles visant à garantir
                        que tous les produits de santé disponibles sur le marché burundais répondent aux normes
                        internationales de qualité, de sécurité et d'efficacité.
                    </p>

                    {{-- Grille de fonctions --}}
                    <div class="content-section" style="border-top:none; padding-top:8px;">
                        <div class="feat-grid" style="grid-template-columns: 1fr 1fr; gap:14px;">

                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-certificate"></i></div>
                                <div>
                                    <h4>Enregistrement / Homologation</h4>
                                    <p>Évaluation scientifique des dossiers pour l'autorisation de mise sur le marché des produits.</p>
                                </div>
                            </div>

                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-search"></i></div>
                                <div>
                                    <h4>Inspection des Établissements</h4>
                                    <p>Vérification de la conformité aux bonnes pratiques de fabrication, de distribution et de pharmacie.</p>
                                </div>
                            </div>

                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-exclamation-triangle"></i></div>
                                <div>
                                    <h4>Pharmacovigilance</h4>
                                    <p>Surveillance des effets indésirables des médicaments après leur mise sur le marché.</p>
                                </div>
                            </div>

                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-bullhorn"></i></div>
                                <div>
                                    <h4>Régulation de la Publicité</h4>
                                    <p>Contrôle des messages publicitaires pour assurer leur véracité et leur conformité.</p>
                                </div>
                            </div>

                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-microscope"></i></div>
                                <div>
                                    <h4>Contrôle Qualité</h4>
                                    <p>Analyse et tests en laboratoire pour garantir la qualité des produits de santé.</p>
                                </div>
                            </div>

                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-flask"></i></div>
                                <div>
                                    <h4>Essais Cliniques</h4>
                                    <p>Évaluation des protocoles d'essais cliniques pour assurer la sécurité des participants.</p>
                                </div>
                            </div>

                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-id-card"></i></div>
                                <div>
                                    <h4>Octroi des Licences</h4>
                                    <p>Autorisation des pharmacies, grossistes et fabricants pharmaceutiques.</p>
                                </div>
                            </div>

                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-ship"></i></div>
                                <div>
                                    <h4>Import / Export</h4>
                                    <p>Surveillance des flux transfrontaliers pour prévenir l'entrée de produits non conformes.</p>
                                </div>
                            </div>

                            <div class="feat-card" style="grid-column: 1 / -1;">
                                <div class="feat-icon"><i class="fas fa-syringe"></i></div>
                                <div>
                                    <h4>Libération des Lots de Vaccins</h4>
                                    <p>Inspection et approbation des lots de vaccins avant leur distribution sur le territoire national.</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Liste détaillée --}}
                    <div class="content-section">
                        <h3>Détail des Fonctions</h3>
                        <ul>
                            <li><strong>Enregistrement / Homologation :</strong> Évaluation scientifique des dossiers pour l'autorisation de mise sur le marché des produits.</li>
                            <li><strong>Inspection des établissements pharmaceutiques :</strong> Vérification de la conformité aux bonnes pratiques de fabrication, de distribution et de pharmacie.</li>
                            <li><strong>Pharmacovigilance :</strong> Surveillance des effets indésirables des médicaments après leur mise sur le marché.</li>
                            <li><strong>Régulation de la publicité et de la promotion :</strong> Contrôle des messages publicitaires pour assurer leur véracité et leur conformité.</li>
                            <li><strong>Contrôle de la qualité des produits de santé :</strong> Analyse et tests en laboratoire pour garantir la qualité des produits.</li>
                            <li><strong>Essais cliniques :</strong> Évaluation des protocoles d'essais cliniques pour assurer la sécurité des participants.</li>
                            <li><strong>Octroi des licences aux établissements pharmaceutiques :</strong> Autorisation des pharmacies, grossistes et fabricants.</li>
                            <li><strong>Contrôle des importations et exportations :</strong> Surveillance des flux transfrontaliers pour prévenir l'entrée de produits non conformes.</li>
                            <li><strong>Libération des lots pour les vaccins :</strong> Inspection et approbation des lots de vaccins avant leur distribution.</li>
                        </ul>

                        <div class="info-box">
                            <h3><i class="fas fa-shield-alt"></i> Engagement de l'ABREMA</h3>
                            <p>
                                Grâce à ces fonctions, l'ABREMA s'engage à protéger la santé publique en assurant
                                que seuls des produits sûrs, efficaces et de haute qualité sont disponibles sur le
                                marché burundais.
                            </p>
                        </div>
                    </div>

                    {{-- Nos valeurs --}}
                    <div class="content-section">
                        <h3>Nos Valeurs</h3>
                        <div class="feat-grid">
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-star"></i></div>
                                <div>
                                    <h4>Excellence</h4>
                                    <p>Excellence dans la régulation pharmaceutique au service de la population.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-balance-scale"></i></div>
                                <div>
                                    <h4>Transparence & Intégrité</h4>
                                    <p>Transparence et intégrité dans tous nos processus réglementaires.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-heartbeat"></i></div>
                                <div>
                                    <h4>Santé Publique</h4>
                                    <p>Protection de la santé publique comme priorité absolue de notre mission.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-sync-alt"></i></div>
                                <div>
                                    <h4>Innovation Continue</h4>
                                    <p>Innovation et amélioration continue de nos pratiques réglementaires.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection