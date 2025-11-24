@extends('layouts.user')
@section('title', 'Accueil - Abrema')
@section('content')
    <!-- HERO -->
    <section class="hero container">
        <div class="hero-grid">

            <div class="slider">
                <div class="slides" aria-live="polite">
                    <div class="slide active" data-index="0">
                        <div class="kicker">Annonce — 24 Nov 2025</div>
                        <h2>La Procure Générale introduit la technologie Blockchain</h2>
                        <p>Amélioration de la traçabilité des dossiers et renforcement de la sécurité juridique. Lire le
                            communiqué complet pour plus de détails.</p>
                        <div class="actions">
                            <button class="btn primary">Lire le communiqué</button>
                            <button class="btn ghost">Plus d'actualités</button>
                        </div>
                    </div>

                    <div class="slide" data-index="1">
                        <div class="kicker">Publication — 10 Nov 2025</div>
                        <h2>Lancement du service de réception des citoyens</h2>
                        <p>Un guichet numérique a été mis en place pour faciliter la prise de rendez-vous et le suivi
                            des dossiers.</p>
                        <div class="actions">
                            <button class="btn primary">Prendre Rendez-vous</button>
                            <button class="btn ghost">Voir les services</button>
                        </div>
                    </div>

                    <div class="slide" data-index="2">
                        <div class="kicker">Projet — 01 Oct 2025</div>
                        <h2>Campagne de sensibilisation sur l'État de droit</h2>
                        <p>Programme national dans les provinces pour renforcer la connaissance des droits des citoyens.
                        </p>
                        <div class="actions">
                            <button class="btn primary">Découvrir le projet</button>
                        </div>
                    </div>
                </div>

                <div class="slider-controls" aria-hidden="false">
                    <button class="ctrl" id="prev"><i class="fa fa-chevron-left"></i></button>
                    <button class="ctrl" id="next"><i class="fa fa-chevron-right"></i></button>
                </div>
            </div>

            <div class="side-boxes">
                <a class="side-card" href="#services"><i class="fa fa-briefcase"></i><span>Tâches &amp;
                        Missions</span></a>
                <a class="side-card" href="#documents"><i class="fa fa-file-lines"></i><span>Documents
                        Clés</span></a>
                <a class="side-card" href="#faq"><i class="fa fa-comments"></i><span>Questions /Réponses</span></a>
            </div>

        </div>
    </section>

    <!-- MAIN CONTENT -->
    <main class="container">
        <div class="main-grid">

            <div>
                <section id="news" class="card">
                    <div class="section-title">
                        <h3>Actualités</h3>
                    </div>

                    <div class="news-grid">
                        <article class="news-item">
                            <div class="news-thumb" style="background-image:url('images/img1.jpg')"></div>
                            <div class="news-body">
                                <h4>Réunion ministérielle sur la sécurité</h4>
                                <div class="meta">22 Mai 2025 — Communiqué</div>
                                <p style="margin-top:8px;color:#555">Résumé bref de l'article d'actualité qui informe
                                    sur la réunion et les décisions prises.</p>
                            </div>
                        </article>

                        <article class="news-item">
                            <div class="news-thumb" style="background-image:url('images/img2.jpg')"></div>
                            <div class="news-body">
                                <h4>Conférence de Presse Annuelle</h4>
                                <div class="meta">10 Juin 2025</div>
                                <p style="margin-top:8px;color:#555">Points saillants, chiffres et
                                    recommandationscommuniqués par la procure.</p>
                            </div>
                        </article>

                        <article class="news-item">
                            <div class="news-thumb" style="background-image:url('images/img2.jpg')"></div>
                            <div class="news-body">
                                <h4>Lutte contre la corruption : nouveau rapport</h4>
                                <div class="meta">02 Avr 2025</div>
                            </div>
                        </article>

                        <article class="news-item">
                            <div class="news-thumb" style="background-image:url('images/img2.jpg')"></div>
                            <div class="news-body">
                                <h4>Formation des agents judiciaires</h4>
                                <div class="meta">12 Mar 2025</div>
                            </div>
                        </article>
                    </div>

                </section>

                <section class="card" style="margin-top:18px">
                    <div class="section-title">
                        <h3>Projets &amp; Services</h3>
                    </div>
                    <div class="projects-grid">
                        <div class="project">Site Officiel du Président — Lien</div>
                        <div class="project">Administration du Gouvernement — Ressources</div>
                        <div class="project">Guichet Numérique — Prise de RDV</div>
                        <div class="project">Rapports Annuels — Téléchargement</div>
                    </div>
                </section>

                <section class="card" style="margin-top:18px">
                    <div class="section-title">
                        <h3>Vision &amp; Mission</h3>
                    </div>
                    <p>Notre mission est d'assurer la légalité, de protéger les droits et libertés des citoyens et de
                        renforcer l'État de droit. Nous agissons avec transparence, efficacité et impartialité.</p>
                </section>
            </div>

            <!-- SIDEBAR -->
            <aside>
                <div class="card publication-card">
                    <div class="card-header"><i class="fa fa-globe"></i><strong>Nouvelles Régionales</strong></div>
                    <ul>
                        <li><a href="#">Nouvelle importante région A</a></li>
                        <li><a href="#">Annonce de la région B</a></li>
                        <li><a href="#">Mise à jour régionale</a></li>
                    </ul>
                </div>

                <div class="card" style="margin-top:14px">
                    <div class="section-title">
                        <h3>Services</h3>
                    </div>
                    <div class="service-list">
                        <div class="service-item"><i class="fa fa-user-circle"></i>
                            <div>Réception des citoyens</div>
                        </div>
                        <div class="service-item"><i class="fa fa-handshake"></i>
                            <div>Aide juridique</div>
                        </div>
                        <div class="service-item"><i class="fa fa-chart-line"></i>
                            <div>Rapports &amp; Statistiques</div>
                        </div>
                    </div>
                </div>

                <div class="card" style="margin-top:14px">
                    <div class="section-title">
                        <h3>Publications</h3>
                    </div>
                    <ul style="list-style:none;padding:0;margin:0">
                        <li style="padding:10px 0;border-bottom:1px dashed #eee"><a href="#">Bulletin
                                trimestriel (PDF)</a></li>
                        <li style="padding:10px 0;border-bottom:1px dashed #eee"><a href="#">Vidéo : discours
                                officiel</a></li>
                        <li style="padding:10px 0"><a href="#">Guide citoyen</a></li>
                    </ul>
                </div>
            </aside>
        </div>
    </main>

    <!-- PARTNERS -->
    <section class="partners container">
        <div class="partners-grid">
            <div class="partner">Partenaire 1</div>
            <div class="partner">Partenaire 2</div>
            <div class="partner">Partenaire 3</div>
            <div class="partner">Partenaire 4</div>
        </div>
    </section>
@endsection
