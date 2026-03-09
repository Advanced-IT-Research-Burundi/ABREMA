@extends('layouts.base')

@section('title', 'Rappel des Produits | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')

    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Rappel des Produits</span>
        </div>
        <h1>Rappel des Produits</h1>
        <p class="lead">Retrait du marché des produits non conformes, falsifiés ou de qualité inférieure</p>
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
                        <div class="sc-icon"><i class="fas fa-undo-alt"></i></div>
                        <h4>Signaler un produit</h4>
                        <p>Contactez l'ABREMA pour tout produit suspect</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>
                </aside>

                <main class="main-content">

                    <h2>Rappel des Produits</h2>

                    <p>
                        En cas d'identification ou de notification d'un produit non conforme, falsifié
                        et/ou de qualité inférieure, l'ABREMA procède au rappel des lots concernés afin
                        de protéger la santé publique.
                    </p>

                    <div class="alert-box">
                        <h3><i class="fas fa-exclamation-triangle"></i> Produits non conformes</h3>
                        <p>
                            Tout produit identifié comme falsifié, de qualité inférieure ou ne répondant
                            pas aux normes réglementaires fait l'objet d'un rappel immédiat et d'une
                            communication publique par l'ABREMA.
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Motifs de rappel</h3>
                        <div class="feat-grid">
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-times-circle"></i></div>
                                <div>
                                    <h4>Produit falsifié</h4>
                                    <p>Tout médicament dont la composition, l'identité ou la source est délibérément frauduleuse.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-exclamation-triangle"></i></div>
                                <div>
                                    <h4>Qualité inférieure</h4>
                                    <p>Produits ne respectant pas les spécifications de qualité de l'autorisation de mise sur le marché.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-virus"></i></div>
                                <div>
                                    <h4>Contamination</h4>
                                    <p>Présence de contaminants microbiologiques, chimiques ou physiques dans le produit.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-tag"></i></div>
                                <div>
                                    <h4>Étiquetage incorrect</h4>
                                    <p>Erreurs d'étiquetage pouvant induire en erreur ou présenter un risque pour les patients.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-section">
                        <h3>Procédure de rappel</h3>
                        <ul>
                            <li>Identification et notification du problème à l'ABREMA</li>
                            <li>Évaluation du risque et décision de rappel par les autorités compétentes</li>
                            <li>Notification aux grossistes, pharmacies et établissements de santé concernés</li>
                            <li>Retrait des lots du marché et des points de distribution</li>
                            <li>Communication publique si nécessaire pour la protection des patients</li>
                            <li>Destruction ou retour au fabricant des lots rappelés</li>
                            <li>Rapport de clôture et suivi post-rappel</li>
                        </ul>
                    </div>

                    <div class="info-box">
                        <h3><i class="fas fa-phone-alt"></i> Signaler un produit suspect</h3>
                        <p>
                            Si vous suspectez qu'un médicament est falsifié ou de qualité inférieure,
                            contactez immédiatement l'ABREMA au <strong>+257 22 22 97 39</strong>
                            ou au numéro vert <strong>203</strong>. Votre signalement contribue à
                            protéger la santé publique.
                        </p>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection