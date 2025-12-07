@extends('layouts.base')

@section('title', 'Accueil')

@section('styles')
<style>
/* HERO SLIDER */
.hero-slider {
    position: relative;
    height: 600px;
    overflow: hidden;
}

.hero-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease;
}

.hero-slide.active {
    opacity: 1;
}

.hero-slide::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(45, 122, 62, 0.9) 0%, rgba(58, 157, 79, 0.7) 100%);
}

.hero-slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.hero-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
    width: 90%;
    max-width: 800px;
    z-index: 2;
}

.hero-content h1 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 20px;
    line-height: 1.2;
}

.hero-content p {
    font-size: 1.3rem;
    margin-bottom: 30px;
    opacity: 0.95;
}

.hero-btn {
    display: inline-block;
    background: #c1272d;
    color: white;
    padding: 15px 40px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1.1rem;
    transition: var(--transition);
}

.hero-btn:hover {
    background: #a01f24;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(193, 39, 45, 0.4);
}

.slider-controls {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 10px;
    z-index: 3;
}

.slider-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255,255,255,0.5);
    cursor: pointer;
    transition: var(--transition);
}

.slider-dot.active {
    background: #c1272d;
    width: 30px;
    border-radius: 6px;
}

/* QUICK ACTIONS */
.quick-actions {
    background: white;
    padding: 40px 0;
    margin-top: -80px;
    position: relative;
    z-index: 10;
}

.actions-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 25px;
}

.action-card {
    background: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: var(--shadow-md);
    text-align: center;
    transition: var(--transition);
    border: 2px solid transparent;
}

.action-card:hover {
    transform: translateY(-10px);
    border-color: #2d7a3e;
    box-shadow: var(--shadow-lg);
}

.action-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #2d7a3e, #3a9d4f);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin: 0 auto 20px;
}

.action-card h3 {
    /* color: #2d7a3e; */
    font-size: 1.2rem;
    margin-bottom: 10px;
}

.action-card p {
    color: var(--text-light);
    font-size: 1.1rem;
}

/* HOME SECTIONS */
.home-section {
    padding: 80px 0;
}

.section-header {
    text-align: center;
    margin-bottom: 50px;
}

.section-header h2 {
    font-size: 2.5rem;
    color: #2d7a3e;
    margin-bottom: 15px;
    position: relative;
    display: inline-block;
}

.section-header h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 4px;
    background: #c1272d;
    border-radius: 2px;
}

.section-header p {
    color: var(--text-light);
    font-size: 1.1rem;
    max-width: 700px;
    margin: 20px auto 0;
}

/* CLIENTS SECTION */
.clients-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
}

.client-card {
    background: white;
    border-radius: 15px;
    padding: 30px 25px;
    box-shadow: var(--shadow-md);
    transition: var(--transition);
    text-align: center;
    border: 2px solid transparent;
    position: relative;
    overflow: hidden;
}

.client-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #2d7a3e, #3a9d4f);
    transform: scaleX(0);
    transition: var(--transition);
}

.client-card:hover::before {
    transform: scaleX(1);
}

.client-card:hover {
    transform: translateY(-8px);
    border-color: #2d7a3e;
    box-shadow: var(--shadow-lg);
}

.client-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #2d7a3e, #3a9d4f);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    margin: 0 auto 20px;
    transition: var(--transition);
}

.client-card:hover .client-icon {
    transform: rotate(360deg) scale(1.1);
}

.client-card h3 {
    color: #2d7a3e;
    font-size: 1.2rem;
    margin-bottom: 12px;
    line-height: 1.3;
}

.client-card p {
    color: var(--text-light);
    font-size: 0.95rem;
    line-height: 1.5;
}

.client-badge {
    display: inline-block;
    background: #e8f5e9;
    color: #2d7a3e;
    padding: 5px 15px;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 600;
    margin-top: 15px;
}

/* PARTNERS SECTION */
.partners-section {
    background: var(--bg-light);
    padding: 60px 0;
}

.partners-slider {
    overflow: hidden;
    position: relative;
}

.partners-track {
    display: flex;
    gap: 50px;
    animation: scroll 30s linear infinite;
}

.partner-item {
    min-width: 180px;
    height: 100px;
    background: white;
    border-radius: 10px;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    text-decoration: none;
}

.partner-item:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-md);
}

.partner-item img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    filter: grayscale(100%);
    transition: var(--transition);
}

.partner-item:hover img {
    filter: grayscale(0%);
}

@keyframes scroll {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%);
    }
}

/* ANNOUNCEMENTS */
.announcements-publications {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
}

.announcement-block,
.publication-block {
    background: white;
    padding: 35px;
    border-radius: 15px;
    box-shadow: var(--shadow-md);
}

.block-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 3px solid #c1272d;
}

.block-header h3 {
    color: #2d7a3e;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    gap: 10px;
}

.block-header i {
    color: #c1272d;
    font-size: 1.8rem;
}

.view-all-link {
    color: #2d7a3e;
    font-size: 0.95rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 5px;
    transition: var(--transition);
}

.view-all-link:hover {
    color: #c1272d;
    gap: 8px;
}

.announcement-item,
.publication-item {
    padding: 20px;
    margin-bottom: 15px;
    border-left: 4px solid #2d7a3e;
    background: #e8f5e9;
    border-radius: 8px;
    transition: var(--transition);
}

.announcement-item:hover,
.publication-item:hover {
    transform: translateX(5px);
    box-shadow: var(--shadow-sm);
    background: white;
}

.announcement-item:last-child,
.publication-item:last-child {
    margin-bottom: 0;
}

.item-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 15px;
    margin-bottom: 10px;
}

.announcement-title,
.publication-title {
    color: #2d7a3e;
    font-size: 1.1rem;
    font-weight: 600;
    line-height: 1.4;
    flex: 1;
}

.item-badge {
    background: #c1272d;
    color: white;
    padding: 4px 12px;
    border-radius: 12px;
    font-size: 0.75rem;
    font-weight: 700;
    white-space: nowrap;
}

.item-meta {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 12px;
}

.announcement-date,
.publication-date {
    color: var(--text-light);
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 5px;
}

.announcement-date i,
.publication-date i {
    color: #c1272d;
}

.read-more {
    color: #2d7a3e;
    font-size: 0.9rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: var(--transition);
}

.read-more:hover {
    color: #c1272d;
    gap: 8px;
}

.publication-item {
    border-left-color: #c1272d;
}

.empty-state {
    text-align: center;
    padding: 40px 20px;
    color: var(--text-light);
}

.empty-state i {
    font-size: 3rem;
    color: var(--border-color);
    margin-bottom: 15px;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .hero-content h1 {
        font-size: 2rem;
    }

    .hero-content p {
        font-size: 1rem;
    }

    .hero-slider {
        height: 500px;
    }

    .section-header h2 {
        font-size: 2rem;
    }

    .actions-grid,
    .clients-grid {
        grid-template-columns: 1fr;
    }

    .announcements-publications {
        grid-template-columns: 1fr;
        gap: 40px;
    }
}

@media (max-width: 480px) {
    .hero-slider {
        height: 400px;
    }

    .quick-actions {
        margin-top: -40px;
    }

    .home-section {
        padding: 50px 0;
    }
}
</style>
@endsection

@section('content')
<!-- HERO SLIDER -->
<section class="hero-slider">
    @forelse($actualites as $index => $actualite)
    <div class="hero-slide {{ $index === 0 ? 'active' : '' }}">
        @if($actualite->image)
            <img src="{{ Storage::url($actualite->image) }}" alt="{{ $actualite->title }}">
        @else
            <img src="{{ asset('assets/images/default-slider.jpg') }}" alt="{{ $actualite->title }}">
        @endif
        <div class="hero-content">
            <h1>{{ $actualite->title }}</h1>
            <p>{{ Str::limit($actualite->description, 150) }}</p>
            <a href="{{ route('information.actualite') }}" class="hero-btn">En savoir plus</a>
        </div>
    </div>
    @empty
    <div class="hero-slide active">
        <img src="{{ asset('assets/images/slider1.jpg') }}" alt="ABREMA">
        <div class="hero-content">
            <h1>Protection de la Santé Publique</h1>
            <p>Garantir la qualité, l'efficacité et l'innocuité des médicaments</p>
            <a href="{{ route('about.profilabrema') }}" class="hero-btn">En savoir plus</a>
        </div>
    </div>
    @endforelse
    
    @if($actualites->count() > 0)
    <div class="slider-controls">
        @foreach($actualites as $index => $actualite)
        <span class="slider-dot {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}"></span>
        @endforeach
    </div>
    @endif
</section>

<!-- QUICK ACTIONS -->
<section class="quick-actions">
    <div class="container-fluid">
        <div class="actions-grid">
            <a href="{{ route('importexport.demande') }}" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-file-import"></i>
                </div>
                <h3>Demande d'importation</h3>
                <p>Soumettre une demande d'autorisation d'importation</p>
            </a>
            <a href="{{ route('medicament.produits') }}" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-pills"></i>
                </div>
                <h3>Enregistrement</h3>
                <p>Enregistrer un nouveau médicament</p>
            </a>
            <a href="{{ route('vigilance.signalement') }}" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h3>Signalement</h3>
                <p>Signaler un effet indésirable ou PMQIF</p>
            </a>
            <a href="{{ route('colis.index') }}" class="action-card">
                <div class="action-icon">
                    <i class="fas fa-box-open"></i>
                </div>
                <h3>Inspection</h3>
                <p>Vérifier l'état de votre inspection</p>
            </a>
        </div>
    </div>
</section>

<!-- ANNOUNCEMENTS & PUBLICATIONS -->
<section class="home-section">
    <div class="container-fluid">
        <div class="section-header">
            <h2>Annonces & Publications</h2>
            <p>Restez informés des dernières actualités et communications officielles</p>
        </div>
        <div class="announcements-publications">
            <!-- ANNONCES -->
            <div class="announcement-block">
                <div class="block-header">
                    <h3>
                        <i class="fas fa-bullhorn"></i>
                        Annonces
                    </h3>
                    <a href="{{ route('information.actualite') }}" class="view-all-link">
                        Voir tout <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                @forelse($actualites->take(4) as $actualite)
                <div class="announcement-item">
                    <div class="item-header">
                        <div class="announcement-title">{{ $actualite->title }}</div>
                        <span class="item-badge">NOUVEAU</span>
                    </div>
                    <div class="item-meta">
                        <div class="announcement-date">
                            <i class="far fa-calendar-alt"></i>
                            {{ $actualite->created_at->format('d M Y') }}
                        </div>
                        <a href="{{ route('information.actualite') }}" class="read-more">
                            Lire plus <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <i class="fas fa-inbox"></i>
                    <p>Aucune annonce pour le moment</p>
                </div>
                @endforelse
            </div>

            <!-- PUBLICATIONS -->
            <div class="publication-block">
                <div class="block-header">
                    <h3>
                        <i class="fas fa-file-alt"></i>
                        Publications
                    </h3>
                    <a href="{{ route('information.document') }}" class="view-all-link">
                        Voir tout <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="publication-item">
                    <div class="item-header">
                        <div class="publication-title">Rapport annuel 2023 - Activités de l'ABREMA</div>
                        <span class="item-badge" style="background: #2d7a3e;">PDF</span>
                    </div>
                    <div class="item-meta">
                        <div class="publication-date">
                            <i class="far fa-calendar-alt"></i>
                            10 mars 2024
                        </div>
                        <a href="#" class="read-more">
                            Télécharger <i class="fas fa-download"></i>
                        </a>
                    </div>
                </div>

                <div class="publication-item">
                    <div class="item-header">
                        <div class="publication-title">Guide de bonnes pratiques de distribution (GDP)</div>
                        <span class="item-badge" style="background: #2d7a3e;">PDF</span>
                    </div>
                    <div class="item-meta">
                        <div class="publication-date">
                            <i class="far fa-calendar-alt"></i>
                            25 février 2024
                        </div>
                        <a href="#" class="read-more">
                            Télécharger <i class="fas fa-download"></i>
                        </a>
                    </div>
                </div>

                <div class="publication-item">
                    <div class="item-header">
                        <div class="publication-title">Liste des médicaments enregistrés - Q4 2023</div>
                        <span class="item-badge" style="background: #2d7a3e;">PDF</span>
                    </div>
                    <div class="item-meta">
                        <div class="publication-date">
                            <i class="far fa-calendar-alt"></i>
                            18 janvier 2024
                        </div>
                        <a href="#" class="read-more">
                            Télécharger <i class="fas fa-download"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CLIENTS SECTION -->
<section class="home-section" style="background: #e8f5e9;">
    <div class="container-fluid">
        <div class="section-header">
            <h2>Nos Clients</h2>
            <p>L'ABREMA au service de tous les acteurs du secteur pharmaceutique burundais</p>
        </div>
        <div class="clients-grid">
            <div class="client-card">
                <div class="client-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <h3>Industries Pharmaceutiques</h3>
                <p>Fabricants et producteurs de médicaments et produits pharmaceutiques</p>
                <span class="client-badge">Secteur Privé</span>
            </div>

            <div class="client-card">
                <div class="client-icon">
                    <i class="fas fa-warehouse"></i>
                </div>
                <h3>Pharmacies Grossistes Privées</h3>
                <p>Distribution en gros de médicaments et dispositifs médicaux</p>
                <span class="client-badge">Secteur Privé</span>
            </div>

            <div class="client-card">
                <div class="client-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>Agences de Promotion</h3>
                <p>Promotion et commercialisation de produits pharmaceutiques</p>
                <span class="client-badge">Secteur Privé</span>
            </div>

            <div class="client-card">
                <div class="client-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <h3>Centrale d'Achat</h3>
                <p>Approvisionnement centralisé en produits pharmaceutiques</p>
                <span class="client-badge">Secteur Public</span>
            </div>

            <div class="client-card">
                <div class="client-icon">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <h3>ONG Nationales et Internationales</h3>
                <p>Organisations œuvrant dans le domaine de la santé</p>
                <span class="client-badge">Société Civile</span>
            </div>

            <div class="client-card">
                <div class="client-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Partenaires au Développement</h3>
                <p>Organismes de coopération internationale en santé</p>
                <span class="client-badge">Partenaires</span>
            </div>

            <div class="client-card">
                <div class="client-icon">
                    <i class="fas fa-hospital"></i>
                </div>
                <h3>Districts et Hôpitaux</h3>
                <p>Structures de santé publiques et privées</p>
                <span class="client-badge">Secteur Santé</span>
            </div>

            <div class="client-card">
                <div class="client-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3>Ministères</h3>
                <p>Administrations publiques et services gouvernementaux</p>
                <span class="client-badge">Secteur Public</span>
            </div>

            <div class="client-card">
                <div class="client-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Populations</h3>
                <p>Citoyens et consommateurs de produits pharmaceutiques</p>
                <span class="client-badge">Grand Public</span>
            </div>

            <div class="client-card">
                <div class="client-icon">
                    <i class="fas fa-flag"></i>
                </div>
                <h3>Ambassades</h3>
                <p>Représentations diplomatiques et consulaires</p>
                <span class="client-badge">Diplomatic</span>
            </div>
        </div>
    </div>
</section>

<!-- PARTNERS SECTION -->
<section class="partners-section">
    <div class="container-fluid">
        <div class="section-header">
            <h2>Nos Partenaires</h2>
            <p>Collaborations pour une meilleure régulation pharmaceutique</p>
        </div>
        @if($partenaires->count() > 0)
        <div class="partners-slider">
            <div class="partners-track">
                @foreach($partenaires as $partenaire)
                <a href="{{ $partenaire->link ?? '#' }}" class="partner-item" 
                   title="{{ $partenaire->nom }}" 
                   {{ $partenaire->link ? 'target="_blank"' : '' }}>
                    @if($partenaire->logo)
                        <img src="{{ Storage::url($partenaire->logo) }}" alt="{{ $partenaire->nom }}">
                    @else
                        <div style="font-weight: 600; color: #2d7a3e;">{{ $partenaire->nom }}</div>
                    @endif
                </a>
                @endforeach
                
                <!-- Duplicate for seamless loop -->
                @foreach($partenaires as $partenaire)
                <a href="{{ $partenaire->link ?? '#' }}" class="partner-item" 
                   title="{{ $partenaire->nom }}"
                   {{ $partenaire->link ? 'target="_blank"' : '' }}>
                    @if($partenaire->logo)
                        <img src="{{ Storage::url($partenaire->logo) }}" alt="{{ $partenaire->nom }}">
                    @else
                        <div style="font-weight: 600; color: #2d7a3e;">{{ $partenaire->nom }}</div>
                    @endif
                </a>
                @endforeach
            </div>
        </div>
        @else
        <div class="empty-state">
            <i class="fas fa-handshake"></i>
            <p>Nos partenaires seront bientôt affichés ici</p>
        </div>
        @endif
    </div>
</section>
@endsection

@section('scripts')
<script>
// HERO SLIDER
const slides = document.querySelectorAll('.hero-slide');
const dots = document.querySelectorAll('.slider-dot');
let currentSlide = 0;

function showSlide(n) {
    slides.forEach(slide => slide.classList.remove('active'));
    dots.forEach(dot => dot.classList.remove('active'));
    
    if (slides[n]) {
        slides[n].classList.add('active');
    }
    if (dots[n]) {
        dots[n].classList.add('active');
    }
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

// Auto slide only if there are multiple slides
if (slides.length > 1) {
    let slideInterval = setInterval(nextSlide, 5000);

    // Manual control
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, 5000);
        });
    });

    // Pause on hover
    const heroSlider = document.querySelector('.hero-slider');
    if (heroSlider) {
        heroSlider.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });
        
        heroSlider.addEventListener('mouseleave', () => {
            slideInterval = setInterval(nextSlide, 5000);
        });
    }
}
</script>
@endsection