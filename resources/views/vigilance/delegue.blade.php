@extends('layouts.base')

@section('title', 'Délégués Médicaux | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')

    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Délégués Médicaux</span>
        </div>
        <h1>Les Délégués Médicaux</h1>
        <p class="lead">Contrôle de la promotion et de la publicité médicale au Burundi</p>
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
                        <div class="sc-icon"><i class="fas fa-user-md"></i></div>
                        <h4>Service Vigilance</h4>
                        <p>Pour toute question sur les délégués médicaux</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>
                </aside>

                <main class="main-content">

                    <h2>Délégués Médicaux</h2>

                    <p>
                        L'ABREMA est responsable de la surveillance des événements indésirables des produits
                        de santé. Cette surveillance se fait par la notification spontanée en utilisant les
                        outils standards développés à cet effet. L'ABREMA est également responsable du
                        contrôle de la promotion et de la publicité médicale.
                    </p>

                    <div class="info-box">
                        <h3><i class="fas fa-user-md"></i> Rôle des Délégués Médicaux</h3>
                        <p>
                            Les délégués médicaux sont des professionnels chargés de promouvoir les médicaments
                            auprès des prescripteurs. Leur activité est strictement encadrée par la réglementation
                            de l'ABREMA afin de garantir une information objective et conforme aux autorisations
                            de mise sur le marché.
                        </p>
                    </div>

                    <div class="content-section">
                        <h3>Obligations réglementaires</h3>
                        <div class="feat-grid">
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-id-card"></i></div>
                                <div>
                                    <h4>Accréditation obligatoire</h4>
                                    <p>Tout délégué médical doit être accrédité auprès de l'ABREMA avant d'exercer son activité.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-clipboard-check"></i></div>
                                <div>
                                    <h4>Information conforme</h4>
                                    <p>La promotion doit être conforme aux données de l'AMM et ne doit pas induire en erreur.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-ban"></i></div>
                                <div>
                                    <h4>Interdictions</h4>
                                    <p>Toute promotion de médicaments non autorisés ou hors indication est strictement interdite.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-search"></i></div>
                                <div>
                                    <h4>Contrôle et surveillance</h4>
                                    <p>L'ABREMA effectue des contrôles réguliers des pratiques promotionnelles sur le terrain.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="alert-box">
                        <h3><i class="fas fa-exclamation-circle"></i> Signalement d'infraction</h3>
                        <p>
                            Tout professionnel de santé ou citoyen peut signaler à l'ABREMA une pratique
                            promotionnelle non conforme via le service de pharmacovigilance ou par téléphone
                            au numéro vert <strong>203</strong>.
                        </p>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection