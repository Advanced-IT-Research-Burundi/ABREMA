@extends('layouts.base')

@section('title', 'Profil de l\'ABREMA')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">À Propos</span>
        </div>
        <h1>À propos de l'ABREMA</h1>
        <p class="lead">Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</p>
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

                    {{-- Bloc contact coloré --}}
                    <div class="sidebar-contact">
                        <div class="sc-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>Contactez-nous pour toute assistance</h4>
                        <p>Notre équipe est disponible du lundi au vendredi</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                    {{-- Bouton PDF --}}
                    <a href="#" class="sidebar-pdf">
                        <i class="fas fa-file-pdf"></i> Télécharger le Profil PDF
                    </a>

                </aside>

                {{-- ══ CONTENU PRINCIPAL ══ --}}
                <main class="main-content">

                    {{-- Image flottante haut droite --}}
                    <div class="content-img-top">
                        <img src="{{ asset('images/abremaimage1.jpg') }}" alt="Bâtiment ABREMA">
                    </div>

                    <h2>À propos de l'ABREMA</h2>

                    <p>
                        L'Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments
                        <strong>« ABREMA »</strong> est une administration personnalisée de l'État placée sous la
                        tutelle du ministère ayant la santé publique dans ses attributions.
                    </p>

                    <p>
                        L'ABREMA est régie par la loi N°1/11 du 08 Mai 2020 portant Réglementation de l'exercice
                        de la Pharmacie et du Médicament à usage humain, et a été créée en 2021 par le décret
                        N° 100/039 du 26 Février 2021 portant création, organisation et fonctionnement de l'ABREMA.
                    </p>

                    <p>
                        L'ABREMA a pour objectif général de protéger la santé publique par la promotion de la
                        qualité et la sécurité des médicaments et des aliments sur le territoire burundais.
                    </p>

                    {{-- ── Section --}}
                    <div class="content-section">
                        <h3>Mission Principale</h3>

                        <p>
                            L'ABREMA garantit l'accès à des médicaments de qualité, sûrs et efficaces pour tous
                            les citoyens burundais, à travers des activités réglementaires rigoureuses couvrant
                            l'enregistrement, l'inspection, la vigilance et le contrôle qualité.
                        </p>

                        <div class="info-box">
                            <h3><i class="fas fa-bullseye"></i> Engagement qualité</h3>
                            <p>
                                ABREMA s'engage à offrir des services de réglementation pharmaceutique de qualité
                                dans la poursuite de la protection de la santé publique et en faisant appel à un
                                personnel compétent et dévoué ainsi qu'aux technologies adaptées.
                            </p>
                        </div>

                        <div class="blockquote-box">
                            L'ABREMA veille à ce que tous les produits de santé disponibles sur le marché burundais
                            soient de bonne qualité, sûrs et efficaces, conformément aux normes OMS, UA et EAC.
                        </div>
                    </div>

                    {{-- ── Section valeurs --}}
                    <div class="content-section">
                        <h3>Nos Valeurs</h3>
                        <ul>
                            <li>Excellence dans la régulation pharmaceutique</li>
                            <li>Transparence et intégrité</li>
                            <li>Protection de la santé publique</li>
                            <li>Innovation et amélioration continue</li>
                            <li>Collaboration avec les parties prenantes</li>
                        </ul>
                    </div>

                    {{-- ── Section forces --}}
                    <div class="content-section">
                        <h3>Pourquoi faire confiance à l'ABREMA ?</h3>
                        <div class="feat-grid">
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-check-circle"></i></div>
                                <div>
                                    <h4>Évaluation Rigoureuse</h4>
                                    <p>Processus basé sur des critères scientifiques internationaux reconnus.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-globe"></i></div>
                                <div>
                                    <h4>Normes Internationales</h4>
                                    <p>Conformité OMS, ICH, EAC et ISO dans tous nos processus.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-clock"></i></div>
                                <div>
                                    <h4>Délais Optimisés</h4>
                                    <p>Procédures efficaces pour les demandes d'autorisation.</p>
                                </div>
                            </div>
                            <div class="feat-card">
                                <div class="feat-icon"><i class="fas fa-laptop"></i></div>
                                <div>
                                    <h4>Services Digitalisés</h4>
                                    <p>ASYCUDA et ABREMA-RIMS pour plus d'accessibilité.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ── FAQ Accordéon --}}
                    <div class="content-section faq-section">
                        <h2>Questions Fréquentes</h2>
                        <p class="faq-intro">
                            Retrouvez les réponses aux questions les plus posées sur l'ABREMA et ses services.
                        </p>

                        <div class="faq-item">
                            <div class="faq-question">
                                <span>Qu'est-ce que l'ABREMA ?</span>
                                <span class="faq-icon"><i class="fas fa-plus"></i></span>
                            </div>
                            <div class="faq-answer">
                                <p>L'ABREMA est l'Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments,
                                créée par décret N° 100/039 du 26 Février 2021. C'est une administration personnalisée de l'État
                                chargée de réguler les médicaments et aliments sur le territoire burundais.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                <span>Comment soumettre un dossier d'enregistrement de médicament ?</span>
                                <span class="faq-icon"><i class="fas fa-plus"></i></span>
                            </div>
                            <div class="faq-answer">
                                <p>Les dossiers d'enregistrement sont soumis selon les procédures définies par l'ABREMA,
                                conformément aux lignes directrices OMS et EAC. Vous pouvez accéder aux formulaires et
                                instructions via notre plateforme ABREMA-RIMS disponible en ligne.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                <span>Quels sont les services offerts par l'ABREMA ?</span>
                                <span class="faq-icon"><i class="fas fa-plus"></i></span>
                            </div>
                            <div class="faq-answer">
                                <p>L'ABREMA offre des services d'enregistrement de médicaments, d'inspection des établissements
                                pharmaceutiques, de contrôle qualité au laboratoire, de pharmacovigilance, ainsi que des
                                autorisations d'importation et d'exportation de produits de santé.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                <span>Comment signaler un médicament de mauvaise qualité ?</span>
                                <span class="faq-icon"><i class="fas fa-plus"></i></span>
                            </div>
                            <div class="faq-answer">
                                <p>Tout professionnel de santé ou citoyen peut signaler un médicament suspect via notre
                                formulaire de signalement PMQIF disponible sur notre site, ou contacter directement notre
                                service de vigilance au numéro vert 203 (appel gratuit).</p>
                            </div>
                        </div>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
// FAQ Accordéon
document.querySelectorAll('.faq-question').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var item = this.closest('.faq-item');
        var isOpen = item.classList.contains('open');
        // Fermer tous
        document.querySelectorAll('.faq-item.open').forEach(function(el) {
            el.classList.remove('open');
            el.querySelector('.faq-icon i').className = 'fas fa-plus';
        });
        // Ouvrir si était fermé
        if (!isOpen) {
            item.classList.add('open');
            item.querySelector('.faq-icon i').className = 'fas fa-minus';
        }
    });
});
</script>
@endsection