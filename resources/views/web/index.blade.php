@extends('layouts.base')
@section('content')
    <div>
        <!-- Image Gallery Slider -->
        <section class="gallery-slider main-slider">
            <div class="slider-container-full">
                @if ($actualites && $actualites->count() > 0)
                    <div class="slider-wrapper">
                        @foreach ($actualites as $index => $actu)
                            <div class="slide @if ($index == 0) active @endif">
                                @if ($actu->image)
                                    <img src="{{ asset('storage/' . $actu->image) }}" alt="{{ $actu->title }}">
                                @else
                                    <img src="{{ asset('assets/images/default-slide.jpg') }}" alt="{{ $actu->title }}">
                                @endif
                                <div class="slide-overlay"></div>
                                <div class="slide-caption">
                                    <div class="container">
                                        <h2>{{ $actu->title }}</h2>
                                        <p>{{ Str::limit($actu->description, 200) }}</p>
                                        <div class="slide-meta">
                                            <span><i class="fas fa-calendar"></i>
                                                {{ $actu->created_at->format('d M Y') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Navigation Controls -->
                    <button class="slider-btn prev-btn" aria-label="Image précédente">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="slider-btn next-btn" aria-label="Image suivante">
                        <i class="fas fa-chevron-right"></i>
                    </button>

                    <!-- Dots Indicators -->
                    <div class="slider-dots">
                        @foreach ($actualites as $index => $actu)
                            <span class="dot @if ($index == 0) active @endif"
                                data-slide="{{ $index }}"></span>
                        @endforeach
                    </div>
                @else
                    <!-- Fallback si aucune actualité -->
                    <div class="slider-wrapper">
                        <div class="slide active">
                            <img src="{{ asset('assets/images/default-slide.jpg') }}" alt="ABREMA">
                            <div class="slide-overlay"></div>
                            <div class="slide-caption">
                                <div class="container">
                                    <h2>Bienvenue chez ABREMA</h2>
                                    <p>L'Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <!-- Vision Mission Section -->
        <section class="vision-mission">
            <div class="container">
                <div class="vm-grid">
                    <div class="vm-card">
                        <div class="vm-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3>Vision</h3>
                        <p>La vision de l'ABREMA est d'atteindre le niveau de maturité élevé de qualité de ses services, le
                            maintenir et l'améliorer de façon continue.</p>
                    </div>

                    <div class="vm-card">
                        <div class="vm-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3>Mission</h3>
                        <p>Promouvoir et protéger la santé publique en s'assurant que les produits de santé disponibles sont
                            de bonne qualité, sûrs et efficaces.</p>
                    </div>

                    <div class="vm-card">
                        <div class="vm-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3>Valeurs</h3>
                        <p>Excellence, Intégrité, Transparence, Innovation et Collaboration pour garantir la sécurité
                            sanitaire du Burundi.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services Section -->
        <section class="services" id="services">
            <div class="container-fluid" style="margin-left: 50px; margin-right:50px;">
                <div class="section-header">
                    <h2>Nos Services</h2>
                    <p>ABREMA offre des services rapides et de qualité dans la réglementation des produits de santé</p>
                </div>

                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-file-medical"></i>
                        </div>
                        <h3>Enregistrement/Homologation</h3>
                        <p>Processus d'évaluation scientifique et objective d'un dossier de demande d'Autorisation de Mise
                            sur le Marché (AMM) basé sur la qualité, l'innocuité et l'efficacité.</p>
                        <a href="#enregistrement" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>

                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-laptop"></i>
                        </div>
                        <h3>Service en ligne</h3>
                        <p>Digitalisation des services avec le Guichet Unique Électronique « ASYCUDA » et le nouveau système
                            « ABREMA-RIMS » en cours de finalisation.</p>
                        <a href="#services" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>

                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-flask"></i>
                        </div>
                        <h3>Laboratoire de contrôle qualité</h3>
                        <p>Réalisation des activités de contrôle qualité avec des Kits Minilab pour détecter rapidement les
                            médicaments falsifiés ou de qualité inférieure.</p>
                        <a href="#laboratoire" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>

                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3>Politique qualité</h3>
                        <p>Système de Management de la Qualité (SMQ) conforme aux normes ISO 9000, ISO 9001, ISO 9004 et ISO
                            26000.</p>
                        <a href="#qms" class="service-link">En savoir plus <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Why Choose Us -->
        <section class="why-choose-us">
            <div class="container-fluid" style="margin-left: 50px; margin-right:50px;">
                <div class="why-content">
                    <div class="why-text">
                        <h2>Pourquoi travailler avec nous !</h2>
                        <p>ABREMA est une institution offrant de services rapides et de qualité dans la réglementation des
                            produits de santé pour protéger la santé publique en garantissant la qualité, l'efficacité et
                            l'innocuité des produits réglementés en se référant aux normes de l'OMS, l'UA et de l'EAC.</p>

                        <ul class="why-list">
                            <li><i class="fas fa-check-circle"></i> Conformité aux normes internationales OMS, ICH, EAC</li>
                            <li><i class="fas fa-check-circle"></i> Processus d'évaluation rigoureux et transparent</li>
                            <li><i class="fas fa-check-circle"></i> Services digitalisés et accessibles</li>
                            <li><i class="fas fa-check-circle"></i> Équipe d'experts qualifiés</li>
                            <li><i class="fas fa-check-circle"></i> Laboratoire de contrôle qualité certifié</li>
                        </ul>

                        <a href="#contact" class="btn btn-primary">Contactez-nous</a>
                    </div>

                    <div class="why-image">
                        <img src="{{ asset('assets/images/slides/Img1.png') }}" alt="Laboratoire ABREMA">
                    </div>
                </div>
            </div>
        </section>

        <!-- Clients Section -->
        <section class="clients">
            <div class="container-fluid" style="margin-left: 50px; margin-right:50px;">
                <div class="section-header">
                    <h2>Nos Clients</h2>
                    <p>Nous servons divers acteurs du secteur de la santé au Burundi</p>
                </div>

                <div class="clients-grid">
                    @if ($clients && $clients->count() > 0)
                        @foreach ($clients as $client)
                            <div class="client-item">
                                @if ($client->image)
                                    <img src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->name }}">
                                @else
                                    <i class="fas fa-users"></i> <!-- icône fallback -->
                                @endif
                                <p>{{ $client->name }}</p>
                            </div>
                        @endforeach
                    @else
                        <p>Aucun client pour le moment.</p>
                    @endif
                </div>
            </div>
        </section>


        <!-- News Section -->
        {{-- <section class="news">
            <div class="container fluid" style="margin-left: 50px; margin-right:50px;">
                <div class="section-header">
                    <h2>Actualités & Publications</h2>
                    <p>Restez informés de nos dernières activités</p>
                </div>

                <div class="news-grid">
                    @if ($actualites && $actualites->count() > 0)
                        @foreach ($actualites->take(3) as $actualite)
                            <article class="news-card">
                                <div class="news-image">
                                    @if ($actualite->image)
                                        <img src="{{ asset('storage/' . $actualite->image) }}" alt="{{ $actualite->title }}">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&h=400&fit=crop" alt="{{ $actualite->title }}">
                                    @endif
                                    <span class="news-badge">Actualité</span>
                                </div>
                                <div class="news-content">
                                    <div class="news-meta">
                                        <span><i class="fas fa-calendar"></i> {{ $actualite->created_at->format('d M Y') }}</span>
                                        <span><i class="fas fa-user"></i> ABREMA</span>
                                    </div>
                                    <h3>{{ $actualite->title }}</h3>
                                    <p>{{ Str::limit($actualite->description, 120) }}</p>
                                    <a href="#" class="read-more">Lire plus <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </article>
                        @endforeach
                    @else
                        <article class="news-card">
                            <div class="news-image">
                                <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&h=400&fit=crop" alt="Actualité">
                                <span class="news-badge">Actualité</span>
                            </div>
                            <div class="news-content">
                                <div class="news-meta">
                                    <span><i class="fas fa-calendar"></i> {{ now()->format('d M Y') }}</span>
                                    <span><i class="fas fa-tag"></i> Réglementation</span>
                                </div>
                                <h3>Aucune actualité disponible</h3>
                                <p>Les actualités seront bientôt disponibles...</p>
                            </div>
                        </article>
                    @endif
                </div>

                @if ($actualites && $actualites->count() > 3)
                    <div class="news-cta">
                        <a href="#publications" class="btn btn-primary">Voir toutes les actualités</a>
                    </div>
                @endif
            </div>
        </section> --}}

        <!-- Points d'Entrée Section -->
        <section class="point-entree">
            <div class="container-fluid" style="margin-left: 50px; margin-right:50px;">
                <div class="section-header">
                    <h2>Points d'Entrée</h2>
                    <p>Assurer la sécurité sanitaire des produits de santé importés au Burundi</p>
                </div>

                <div class="points-grid">
                    <div class="point-card">
                        <div class="point-icon bg-blue">
                            <i class="fas fa-ship"></i>
                        </div>
                        <h3>Ports</h3>
                        <p>Contrôle des produits de santé importés via les ports pour garantir leur conformité aux normes de
                            qualité et de sécurité.</p>
                    </div>

                    <div class="point-card">
                        <div class="point-icon bg-green">
                            <i class="fas fa-plane"></i>
                        </div>
                        <h3>Aéroports</h3>
                        <p>Inspection rigoureuse des produits de santé entrant par les aéroports pour prévenir
                            l'introduction de produits non conformes sur le marché burundais.</p>
                    </div>

                    <div class="point-card">
                        <div class="point-icon bg-orange">
                            <i class="fas fa-truck"></i>
                        </div>
                        <h3>Postes Frontaliers</h3>
                        <p>Surveillance et contrôle des produits de santé aux postes frontaliers terrestres pour assurer
                            leur qualité et sécurité avant leur distribution au Burundi.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Partners Section -->
        <section class="partners-slider-section">
            <h2 class="partners-title">Nos Partenaires</h2>

            @if ($partenaires && $partenaires->count() > 0)
                <div class="container-fluid" style="margin-left: 50px; margin-right:50px;">
                    <div class="partners-slider-container">
                        <div class="partners-slider-wrapper" id="partnersSlider">
                            @foreach ($partenaires as $partenaire)
                                <div class="partner-slide">
                                    @if ($partenaire->link)
                                        <a href="{{ $partenaire->link }}" target="_blank" rel="noopener noreferrer"
                                            title="{{ $partenaire->nom }}">
                                            @if ($partenaire->logo)
                                                <img src="{{ asset('storage/' . $partenaire->logo) }}"
                                                    alt="{{ $partenaire->nom }}" class="partner-logo" loading="lazy">
                                            @else
                                                <div class="partner-placeholder">
                                                    <span>{{ substr($partenaire->nom, 0, 2) }}</span>
                                                </div>
                                            @endif
                                            @if ($partenaire->description)
                                                <p class="partner-name">{{ $partenaire->nom }}</p>
                                            @endif
                                        </a>
                                    @else
                                        <div class="partner-no-link" title="{{ $partenaire->nom }}">
                                            @if ($partenaire->logo)
                                                <img src="{{ asset('storage/' . $partenaire->logo) }}"
                                                    alt="{{ $partenaire->nom }}" class="partner-logo" loading="lazy">
                                            @else
                                                <div class="partner-placeholder">
                                                    <span>{{ substr($partenaire->nom, 0, 2) }}</span>
                                                </div>
                                            @endif
                                            @if ($partenaire->description)
                                                <p class="partner-name">{{ $partenaire->nom }}</p>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <!-- Arrows -->
                        <button class="partners-arrow left" id="partnerPrev" aria-label="Partenaire précédent">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="partners-arrow right" id="partnerNext" aria-label="Partenaire suivant">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>

                </div>
            @else
                <div class="no-partners">
                    <p>Aucun partenaire pour le moment</p>
                </div>
            @endif
        </section>
    </div>

    <script>
        // Main Slider (Actualités)
        document.addEventListener('DOMContentLoaded', function() {
            const slides = document.querySelectorAll('.gallery-slider .slide');
            const dots = document.querySelectorAll('.gallery-slider .dot');
            const prevBtn = document.querySelector('.gallery-slider .prev-btn');
            const nextBtn = document.querySelector('.gallery-slider .next-btn');

            if (slides.length > 0) {
                let currentSlide = 0;
                const totalSlides = slides.length;
                let autoplayInterval;

                function showSlide(index) {
                    slides.forEach(slide => slide.classList.remove('active'));
                    dots.forEach(dot => dot.classList.remove('active'));

                    if (index >= totalSlides) currentSlide = 0;
                    else if (index < 0) currentSlide = totalSlides - 1;
                    else currentSlide = index;

                    slides[currentSlide].classList.add('active');
                    dots[currentSlide].classList.add('active');
                }

                function nextSlide() {
                    showSlide(currentSlide + 1);
                }

                function prevSlide() {
                    showSlide(currentSlide - 1);
                }

                function startAutoplay() {
                    autoplayInterval = setInterval(nextSlide, 5000);
                }

                function stopAutoplay() {
                    clearInterval(autoplayInterval);
                }

                // Event Listeners
                if (nextBtn) {
                    nextBtn.addEventListener('click', () => {
                        stopAutoplay();
                        nextSlide();
                        startAutoplay();
                    });
                }

                if (prevBtn) {
                    prevBtn.addEventListener('click', () => {
                        stopAutoplay();
                        prevSlide();
                        startAutoplay();
                    });
                }

                dots.forEach((dot, index) => {
                    dot.addEventListener('click', () => {
                        stopAutoplay();
                        showSlide(index);
                        startAutoplay();
                    });
                });

                // Touch events pour mobile
                let touchStartX = 0;
                let touchEndX = 0;

                const sliderContainer = document.querySelector('.gallery-slider .slider-container-full');
                if (sliderContainer) {
                    sliderContainer.addEventListener('touchstart', (e) => {
                        touchStartX = e.changedTouches[0].screenX;
                    });

                    sliderContainer.addEventListener('touchend', (e) => {
                        touchEndX = e.changedTouches[0].screenX;
                        handleSwipe();
                    });
                }

                function handleSwipe() {
                    if (touchEndX < touchStartX - 50) {
                        stopAutoplay();
                        nextSlide();
                        startAutoplay();
                    }
                    if (touchEndX > touchStartX + 50) {
                        stopAutoplay();
                        prevSlide();
                        startAutoplay();
                    }
                }

                // Démarrer l'autoplay
                startAutoplay();

                // Pause autoplay on hover
                sliderContainer?.addEventListener('mouseenter', stopAutoplay);
                sliderContainer?.addEventListener('mouseleave', startAutoplay);
            }
        });

        // Partners Slider
        const partnersSlider = document.getElementById('partnersSlider');
        const partnerPrevBtn = document.getElementById('partnerPrev');
        const partnerNextBtn = document.getElementById('partnerNext');

        if (partnersSlider && partnerPrevBtn && partnerNextBtn) {
            const scrollAmount = 300;
            let isAutoScrolling = true;
            let autoScrollInterval;

            function autoScroll() {
                if (!isAutoScrolling) return;

                const maxScroll = partnersSlider.scrollWidth - partnersSlider.clientWidth;

                if (partnersSlider.scrollLeft >= maxScroll) {
                    partnersSlider.scrollTo({
                        left: 0,
                        behavior: 'smooth'
                    });
                } else {
                    partnersSlider.scrollBy({
                        left: scrollAmount,
                        behavior: 'smooth'
                    });
                }
            }

            function startAutoScroll() {
                isAutoScrolling = true;
                autoScrollInterval = setInterval(autoScroll, 3000);
            }

            function stopAutoScroll() {
                isAutoScrolling = false;
                clearInterval(autoScrollInterval);
            }

            partnerNextBtn.addEventListener('click', () => {
                stopAutoScroll();
                partnersSlider.scrollBy({
                    left: scrollAmount,
                    behavior: 'smooth'
                });
                setTimeout(startAutoScroll, 5000);
            });

            partnerPrevBtn.addEventListener('click', () => {
                stopAutoScroll();
                partnersSlider.scrollBy({
                    left: -scrollAmount,
                    behavior: 'smooth'
                });
                setTimeout(startAutoScroll, 5000);
            });

            partnersSlider.addEventListener('mouseenter', stopAutoScroll);
            partnersSlider.addEventListener('mouseleave', startAutoScroll);

            // Démarrer le défilement automatique
            if (partnersSlider.children.length > 4) {
                startAutoScroll();
            }
        }
    </script>

@endsection
