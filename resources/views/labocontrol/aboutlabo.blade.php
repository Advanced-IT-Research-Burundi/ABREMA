@extends('layouts.base')

@section('title', 'À propos du Laboratoire - ABREMA')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')
    <!-- PAGE BANNER -->
    <div class="page-banner">
        <div class="container-fluid">
            <h1>À propos du Laboratoire de l'ABREMA</h1>
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
                        <a class="nav-link {{ Route::is('about.profilabrema') ? 'active' : '' }}" href="{{ route('about.profilabrema') }}">Profil global d'ABREMA</a>
                        <a class="nav-link {{ Route::is('about.organigramme') ? 'active' : '' }}" href="{{ route('about.organigramme') }}">Organigramme</a>
                        <a class="nav-link {{ Route::is('about.equipe') ? 'active' : '' }}" href="{{ route('about.equipe') }}">Équipe de Direction de l'ABREMA</a>
                        <a class="nav-link {{ Route::is('about.fonction') ? 'active' : '' }}" href="{{ route('about.fonction') }}">Fonction Réglementaire</a>
                        <a class="nav-link {{ Route::is('about.qms') ? 'active' : '' }}" href="{{ route('about.qms') }}">QMS</a>
                    </nav>
                </aside>

                <!-- MAIN CONTENT -->
                <main class="main-content">
                    <h2>À propos du laboratoire ABREMA</h2>
                    <div class="page-section">

                        <ul class="page-list">
                            <li><strong>Objectif du laboratoire de contrôle qualité</strong></li>
                        </ul>

                        <div class="page-text">
                            <p>La direction des services de laboratoire est l'une des directions techniques de l'ABREMA. Le
                                laboratoire de contrôle qualité constitue un outil essentiel dans l'assurance qualité des
                                produits de santé, permettant de réaliser le contrôle qualité des produits réglementés. Son
                                rôle est de s'assurer que les produits sont conformes aux normes et standards établis, et de
                                fournir à l'Autorité de régulation les éléments probants nécessaires pour prendre des
                                décisions réglementaires éclairées dans des délais raisonnables.</p>

                            <p>Les objectifs spécifiques du laboratoire de contrôle qualité sont :</p>

                            <ul class="page-list">
                                <li>Conduire une évaluation de la qualité des médicaments et autres produits règlementés à
                                    travers des analyses de laboratoire, tout en produisant des rapports exacts et précis en
                                    temps opportun.</li>
                                <li>Effectuer des vérifications sur terrain de produits réglementés au moyen de techniques
                                    de screening comme la spectrométrie (NIR), la spectrométrie Raman et les techniques sur
                                    la CCM.</li>
                                <li>Produire des preuves scientifiques et des rapports sur la qualité et l'innocuité des
                                    produits réglementés afin d'éclairer et de faciliter la prise de décisions
                                    réglementaires.</li>
                                <li>Fournir un soutien technique aux fabricants locaux et renforcer leurs capacités en
                                    matière de contrôle de la qualité des produits réglementés au moyen d'une formation sur
                                    place et hors site et d'évaluations en laboratoire.</li>
                                <li>Mener des enquêtes sur la qualité et l'état de sécurité des produits réglementés afin de
                                    prendre des mesures légales ou réglementaires appropriées.</li>
                            </ul>
                        </div>

                        <div class="page-divider"></div>

                        <ul class="page-list">
                            <li><strong>Missions du laboratoire de contrôle qualité</strong></li>
                        </ul>

                        <div class="page-text">
                            <p>Les missions du laboratoire de contrôle qualité de l'ABREMA se répartissent en deux
                                catégories principales :</p>
                        </div>

                        <ul class="page-list">
                            <li><strong>Mission d'ordre public</strong></li>
                        </ul>

                        <div class="page-text">
                            <ul class="page-list">
                                <li><strong>Surveillance post-commercialisation :</strong> Aider l'Autorité de régulation
                                    dans sa mission de surveillance de la qualité des produits règlementés après leur
                                    commercialisation, en vérifiant que les produits importés ou fabriqués localement
                                    maintiennent leur qualité dans les conditions de stockage tout au long de la chaîne
                                    d'approvisionnement.</li>
                                <li><strong>Examen des produits suspects :</strong> Examiner les produits soupçonnés d'être
                                    d'une efficacité réduite ou douteuse, et rechercher des signes d'altération, de
                                    contamination ou de falsification.</li>
                                <li><strong>Soutien à l'évaluation des AMM :</strong> Contribuer à la prise de décision lors
                                    de l'évaluation des dossiers de demande d'Autorisation de Mise sur le Marché (AMM) des
                                    produits règlementés, par le contrôle qualité des échantillons soumis.</li>
                                <li><strong>Contrôle qualité des aliments :</strong> Contrôler la qualité des aliments
                                    préfabriqués et emballés pour s'assurer qu'ils ne présentent pas de risque pour la santé
                                    des consommateurs.</li>
                                <li><strong>Soutien aux autorités judiciaires :</strong> Soutenir les autorités judiciaires
                                    dans l'identification et l'analyse des drogues saisies, ainsi que dans la recherche et
                                    l'analyse des stupéfiants dans les fluides biologiques.</li>
                            </ul>
                        </div>

                        <ul class="page-list">
                            <li><strong>Mission de prestations de services</strong></li>
                        </ul>

                        <div class="page-text">
                            <ul class="page-list">
                                <li><strong>Contrôle qualité de routine :</strong> Faciliter le contrôle qualité de tous les
                                    produits règlementés importés ou fabriqués localement, pour s'assurer de leur conformité
                                    aux normes de qualité requises et de l'adéquation de leur conditionnement pour préserver
                                    l'intégrité du produit.</li>
                                <li><strong>Support technique :</strong> Fournir un support technique et des services
                                    d'analyse aux différentes parties prenantes dans le secteur de la santé, contribuant
                                    ainsi à la protection de la santé publique.</li>
                                <li><strong>Formation et renforcement de capacités :</strong> Participer au renforcement des
                                    capacités nationales en matière de contrôle qualité par des activités de formation et de
                                    transfert de compétences.</li>
                            </ul>

                            <p>Ces missions confèrent au laboratoire de l'ABREMA un rôle central dans le système national de
                                régulation des produits de santé, en garantissant que seuls des produits de qualité, sûrs et
                                efficaces soient disponibles sur le marché burundais.</p>
                        </div>
                    </div>
                </main>

                <!-- SIDEBAR WIDGETS -->
                <aside>
                    <!-- Avis au public -->
                    <div class="widget">
                        <h3>Avis au Public</h3>

                        @if ($avisPublics->count() == 0)
                            <p class="text-muted small">Pas d'avis au Public pour le moment</p>
                        @else
                            <ul class="list-unstyled">
                                @foreach ($avisPublics as $avis)
                                    <li style="margin-bottom: 12px;">
                                        <strong>{{ $avis->title }}</strong>
                                        <br>

                                        <a href="{{ route('information.evenement') }}" class="btn btn-link p-0"
                                            style="font-size: 0.9rem;">
                                            Lire plus →
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                           <!-- Services rapides -->
                    <div class="widget widget-services">
                        <h3>Services Rapides</h3>
                        <a href="{{ route('importexport.demande') }}" class="service-link">
                            <span>Demande d'importation</span>
                        </a>
                        <a href="{{ route('submitcolis') }}" class="service-link">
                            <span>Inspection des colis</span>

                        </a>
                        <a href="{{ route('vigilance.signalement') }}" class="service-link">
                            <span>Signalement PMQIF</span>
                        </a>
                        <a href="{{ route('vigilance.delegue') }}" class="service-link">
                            <span>Délégués médicaux</span>
                        </a>
                    </div>

                    <!-- Liens officiels -->
                    <div class="widget widget-links">
                        <h3>Points d'entrée</h3>
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
