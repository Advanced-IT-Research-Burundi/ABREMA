@extends('layouts.base')

@section('title', 'À propos du Laboratoire | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <a href="{{ route('labocontrol.servicelabo') }}">Laboratoire</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">À propos du Laboratoire</span>
        </div>
        <h1>À propos du Laboratoire de l'ABREMA</h1>
        <p class="lead">Direction des services de laboratoire et de contrôle qualité des produits de santé</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR ══ --}}
                <aside class="sidebar-nav">

                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('labocontrol.servicelabo') ? 'active' : '' }}"
                               href="{{ route('labocontrol.servicelabo') }}">
                                <span>Service Laboratoire</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('labocontrol.apropos') ? 'active' : '' }}"
                               href="{{ route('labocontrol.apropos') }}">
                                <span>À propos du Laboratoire</span>
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
                        <div class="sc-icon"><i class="fas fa-flask"></i></div>
                        <h4>Laboratoire de l'ABREMA</h4>
                        <p>Pour toute demande d'analyse ou d'information</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>À propos du Laboratoire de l'ABREMA</h2>

                    <p>
                        La direction des services de laboratoire est l'une des directions techniques de l'ABREMA.
                        Le laboratoire de contrôle qualité constitue un outil essentiel dans l'assurance qualité des
                        produits de santé, permettant de réaliser le contrôle qualité des produits réglementés.
                    </p>

                    <div class="blockquote-box">
                        Son rôle est de s'assurer que les produits sont conformes aux normes et standards établis,
                        et de fournir à l'Autorité de régulation les éléments probants nécessaires pour prendre des
                        décisions réglementaires éclairées dans des délais raisonnables.
                    </div>

                    {{-- Objectifs spécifiques --}}
                    <div class="content-section">
                        <h3>Objectifs du Laboratoire de Contrôle Qualité</h3>
                        <ul>
                            <li>Conduire une évaluation de la qualité des médicaments et autres produits réglementés à travers des analyses de laboratoire, tout en produisant des rapports exacts et précis en temps opportun.</li>
                            <li>Effectuer des vérifications sur terrain de produits réglementés au moyen de techniques de screening comme la spectrométrie <strong>(NIR)</strong>, la spectrométrie <strong>Raman</strong> et les techniques sur la <strong>CCM</strong>.</li>
                            <li>Produire des preuves scientifiques et des rapports sur la qualité et l'innocuité des produits réglementés afin d'éclairer et de faciliter la prise de décisions réglementaires.</li>
                            <li>Fournir un soutien technique aux fabricants locaux et renforcer leurs capacités en matière de contrôle de la qualité par des formations sur place et hors site.</li>
                            <li>Mener des enquêtes sur la qualité et l'état de sécurité des produits réglementés afin de prendre des mesures légales ou réglementaires appropriées.</li>
                        </ul>
                    </div>

                    {{-- Mission d'ordre public --}}
                    <div class="content-section">
                        <h3>Mission d'Ordre Public</h3>
                        <div class="feat-grid">
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-chart-line"></i></div>
                                <div>
                                    <h4>Surveillance post-commercialisation</h4>
                                    <p>Vérification que les produits importés ou fabriqués localement maintiennent leur qualité tout au long de la chaîne d'approvisionnement.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-search"></i></div>
                                <div>
                                    <h4>Examen des produits suspects</h4>
                                    <p>Analyse des produits soupçonnés d'efficacité réduite, altérés, contaminés ou falsifiés.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-certificate"></i></div>
                                <div>
                                    <h4>Soutien à l'évaluation AMM</h4>
                                    <p>Contrôle qualité des échantillons soumis lors des demandes d'Autorisation de Mise sur le Marché.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-utensils"></i></div>
                                <div>
                                    <h4>Contrôle qualité des aliments</h4>
                                    <p>Contrôle des aliments préfabriqués et emballés pour s'assurer qu'ils ne présentent pas de risque pour la santé.</p>
                                </div>
                            </div>
                        </div>

                        <div class="info-box" style="margin-top: 16px;">
                            <h3><i class="fas fa-gavel"></i> Soutien aux autorités judiciaires</h3>
                            <p>
                                Le laboratoire soutient les autorités judiciaires dans l'identification et l'analyse
                                des drogues saisies, ainsi que dans la recherche et l'analyse des stupéfiants dans
                                les fluides biologiques.
                            </p>
                        </div>
                    </div>

                    {{-- Mission de prestations --}}
                    <div class="content-section">
                        <h3>Mission de Prestations de Services</h3>
                        <ul>
                            <li><strong>Contrôle qualité de routine :</strong> Faciliter le contrôle qualité de tous les produits réglementés importés ou fabriqués localement, pour s'assurer de leur conformité aux normes requises.</li>
                            <li><strong>Support technique :</strong> Fournir un support technique et des services d'analyse aux différentes parties prenantes dans le secteur de la santé.</li>
                            <li><strong>Formation et renforcement de capacités :</strong> Participer au renforcement des capacités nationales en matière de contrôle qualité par des activités de formation et de transfert de compétences.</li>
                        </ul>

                        <div class="alert-box">
                            <h3><i class="fas fa-shield-alt"></i> Rôle central</h3>
                            <p>
                                Ces missions confèrent au laboratoire de l'ABREMA un rôle central dans le système
                                national de régulation des produits de santé, en garantissant que seuls des produits
                                de qualité, sûrs et efficaces soient disponibles sur le marché burundais.
                            </p>
                        </div>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection