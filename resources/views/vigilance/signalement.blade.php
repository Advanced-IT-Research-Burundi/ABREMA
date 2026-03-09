@extends('layouts.base')

@section('title', 'Signalement PMQIF | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')

    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Signalement PMQIF</span>
        </div>
        <h1>Signalement PMQIF</h1>
        <p class="lead">Produits Médicaux de Qualité Inférieure ou Falsifiés</p>
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
                        <div class="sc-icon"><i class="fas fa-flag"></i></div>
                        <h4>Signaler un PMQIF</h4>
                        <p>Contactez notre service de pharmacovigilance</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>
                </aside>

                <main class="main-content">

                    <h2>Signalement PMQIF</h2>

                    <p>
                        L'ABREMA est responsable de la surveillance des événements indésirables des produits
                        de santé. Cette surveillance se fait par la notification spontanée en utilisant les
                        outils standards développés à cet effet. L'ABREMA est également responsable du
                        contrôle de la promotion et de la publicité médicale.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-pills"></i> Qu'est-ce qu'un PMQIF ?</h3>
                        <p>
                            Un <strong>PMQIF</strong> (Produit Médical de Qualité Inférieure ou Falsifié)
                            est tout médicament, dispositif médical ou autre produit de santé qui ne
                            respecte pas les normes de qualité requises, ou dont la composition,
                            l'identité ou l'origine a été délibérément falsifiée.
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Types de PMQIF</h3>
                        <div class="feat-grid">
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-flask"></i></div>
                                <div>
                                    <h4>Sous-standards</h4>
                                    <p>Produits légalement fabriqués mais ne répondant pas aux normes de qualité ou aux spécifications de l'AMM.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-user-secret"></i></div>
                                <div>
                                    <h4>Falsifiés</h4>
                                    <p>Produits dont l'identité, la composition ou la source est présentée de manière fausse et délibérée.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-ban"></i></div>
                                <div>
                                    <h4>Non enregistrés</h4>
                                    <p>Produits mis sur le marché sans avoir obtenu une autorisation de mise sur le marché de l'ABREMA.</p>
                                </div>
                            </div>
                            <div class="feat-card">
<div class="feat-icon"><i class="fas fa-recycle"></i></div>
                                <div>
                                    <h4>Produits périmés</h4>
                                    <p>Médicaments commercialisés au-delà de leur date de péremption, présentant un risque pour les patients.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Comment identifier un PMQIF ?</h3>
                        <ul>
                            <li>Vérifier la date de péremption et les conditions de conservation</li>
                            <li>Contrôler l'intégrité de l'emballage et de l'étiquetage</li>
                            <li>S'assurer que le produit dispose d'un numéro d'AMM valide délivré par l'ABREMA</li>
                            <li>Observer toute anomalie dans l'aspect, la couleur ou l'odeur du produit</li>
                            <li>Vérifier l'authenticité du fabricant et du titulaire de l'AMM</li>
                        </ul>
                    </div>

                    <div class="alert-box">
                        <h3><i class="fas fa-phone-alt"></i> Signalez immédiatement</h3>
                        <p>
                            Si vous suspectez un PMQIF, ne l'utilisez pas et signalez-le immédiatement
                            à l'ABREMA au <strong>+257 22 22 97 39</strong> ou au numéro vert <strong>203</strong>.
                            Conservez le produit pour inspection.
                        </p>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection