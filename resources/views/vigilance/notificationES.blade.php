@extends('layouts.base')

@section('title', 'Notifications ES | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')

    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Notifications ES</span>
        </div>
        <h1>Les Notifications ES</h1>
        <p class="lead">Notifications d'Événements Indésirables liés aux produits de santé</p>
    </div>

    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                <aside class="sidebar-nav">
                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('vigilance.signalement') ? 'active' : '' }}"
                               href="{{ route('vigilance.signalement') }}">
                                <span>Signalement PMQIF</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('vigilance.delegue') ? 'active' : '' }}"
                               href="{{ route('vigilance.delegue') }}">
                                <span>Délégués Médicaux</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('vigilance.notificationES') ? 'active' : '' }}"
                               href="{{ route('vigilance.notificationES') }}">
                                <span>Notifications ES</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('vigilance.rappel') ? 'active' : '' }}"
                               href="{{ route('vigilance.rappel') }}">
                                <span>Rappel des Produits</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('vigilance.textevigilance') ? 'active' : '' }}"
                               href="{{ route('vigilance.textevigilance') }}">
                                <span>Textes Réglementaires</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                        </nav>
                    </div>

                    <div class="nav-block">
                        <div class="nav-block-title"><i class="fas fa-bolt"></i> Services Rapides</div>
                        <nav>
                            <a class="nav-link" href="{{ route('importexport.demande') }}"><span>Demande d'importation</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="{{ route('submitcolis') }}"><span>Inspection des colis</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="{{ route('vigilance.signalement') }}"><span>Signalement PMQIF</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                            <a class="nav-link" href="{{ route('vigilance.delegue') }}"><span>Délégués médicaux</span><span class="nav-arrow"><i class="fas fa-chevron-right"></i></span></a>
                        </nav>
                    </div>

                    <div class="nav-block">
                        <div class="nav-block-title"><i class="fas fa-map-marker-alt"></i> Points d'Entrée</div>
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
                        <div class="sc-icon"><i class="fas fa-exclamation-triangle"></i></div>
                        <h4>Service Pharmacovigilance</h4>
                        <p>Pour notifier un événement indésirable</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>
                </aside>

                <main class="main-content">

                    <h2>Notifications ES</h2>

                    <p>
                        L'ABREMA est responsable de la surveillance des événements indésirables des produits
                        de santé. Cette surveillance se fait par la notification spontanée en utilisant les
                        outils standards développés à cet effet. L'ABREMA est également responsable du
                        contrôle de la promotion et de la publicité médicale.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-bell"></i> Qu'est-ce qu'une Notification ES ?</h3>
                        <p>
                            Une notification d'événement indésirable (ES) est tout signalement d'un effet
                            non désiré survenu chez un patient après l'utilisation d'un médicament ou d'un
                            produit de santé. Ces notifications permettent à l'ABREMA de surveiller la
                            sécurité des produits en circulation sur le marché burundais.
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Qui peut notifier ?</h3>
                        <div class="feat-grid">
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-stethoscope"></i></div>
                                <div>
                                    <h4>Professionnels de santé</h4>
                                    <p>Médecins, pharmaciens, infirmiers et tout autre professionnel de santé habilité.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-hospital"></i></div>
                                <div>
                                    <h4>Établissements de santé</h4>
                                    <p>Hôpitaux, cliniques et centres de santé observant des effets indésirables.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-industry"></i></div>
                                <div>
                                    <h4>Titulaires d'AMM</h4>
                                    <p>Les fabricants et titulaires d'AMM ont l'obligation légale de notifier les événements indésirables.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-user"></i></div>
                                <div>
                                    <h4>Patients et grand public</h4>
                                    <p>Tout citoyen ayant observé ou subi un effet indésirable peut faire une notification spontanée.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Comment notifier ?</h3>
                        <ul>
                            <li>Remplir le formulaire de notification spontanée disponible auprès de l'ABREMA</li>
                            <li>Le transmettre par courrier, email ou en se présentant au siège de l'ABREMA</li>
                            <li>Contacter le numéro vert <strong>203</strong> pour toute urgence</li>
                            <li>Utiliser la plateforme en ligne de pharmacovigilance lorsqu'elle est disponible</li>
                        </ul>
                    </div>

                    <div class="alert-box">
                        <h3><i class="fas fa-shield-alt"></i> Confidentialité garantie</h3>
                        <p>
                            Toutes les notifications reçues par l'ABREMA sont traitées de manière confidentielle.
                            L'identité des déclarants est protégée conformément à la réglementation nationale
                            sur la protection des données personnelles.
                        </p>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection