@extends('layouts.base')

@section('title', 'Bienvenue | ')

@section('styles')
    <style>
        /* HERO SLIDER */
        .hero-with-sidebar {
            margin-top: 0;
        }

        .hero-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 0;
            min-height: 600px;
        }

        /* HERO SLIDER (PARTIE GAUCHE) */
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

        .hero-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            padding: 3px;
        }

        .hero-content {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            width: 90%;
            max-width: 600px;
            z-index: 2;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .hero-content h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1.2;
            font-family: 'Times New Roman', Times, serif;
            color: #6c738c;

        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.95;
        }

        /* CONTRÔLES SLIDER */
        .hero-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 5;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 26px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.3s;
        }

        .hero-arrow:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        .prev-arrow {
            left: 20px;
        }

        .next-arrow {
            right: 20px;
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
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s;
        }

        .slider-dot.active {
            background: var(--secondary-color);
            width: 30px;
            border-radius: 6px;
        }

        /* VISION/MISSION SIDEBAR (PARTIE DROITE) */
        .vision-mission-sidebar {
            background: white;
            padding: 10px 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 30px;
        }

        .vm-card {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 12px;
            /* margin-right: 30px;
                                                            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
                                                            transition: box-shadow 0.3s ease; */
        }

        .vm-card:hover {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        /* .vm-icon {
                                                                                width: 60px;
                                                                                height: 60px;
                                                                                background: var(--abrema-green);
                                                                                color: white;
                                                                                border-radius: 50%;
                                                                                display: flex;
                                                                                align-items: center;
                                                                                justify-content: center;
                                                                                font-size: 1.8rem;
                                                                                margin-bottom: 20px;
                                                                            } */

        .vm-card h3 {
            /* color: var(--abrema-green); */
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .vm-card p {
            color: #555;
            font-size: 1.2rem;
            line-height: 1.7;
        }

        /* RESPONSIVE */
        @media (max-width: 1200px) {
            .hero-container {
                grid-template-columns: 1.5fr 1fr;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .vm-card {
                padding: 25px;
            }

            .vm-card h3 {
                font-size: 1.3rem;
            }

            .vm-card p {
                font-size: 0.95rem;
            }
        }

        @media (max-width: 992px) {
            .hero-container {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .hero-slider {
                height: 500px;
            }

            .vision-mission-sidebar {
                padding: 50px 30px;
                flex-direction: row;
                gap: 30px;
            }

            .vm-card {
                flex: 1;
            }
        }

        @media (max-width: 768px) {
            .hero-slider {
                height: 400px;
            }

            .hero-content h1 {
                font-size: 1.8rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .vision-mission-sidebar {
                flex-direction: column;
                padding: 40px 20px;
                gap: 25px;
            }

            .vm-card {
                padding: 20px;
            }

            .vm-icon {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }

            .hero-arrow {
                width: 40px;
                height: 40px;
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            .hero-slider {
                height: 350px;
            }

            .hero-content h1 {
                font-size: 1.5rem;
            }

            .hero-content p {
                font-size: 0.9rem;
            }

            .vm-card h3 {
                font-size: 1.2rem;
            }

            .vm-card p {
                font-size: 0.9rem;
            }
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
            background: var(--abrema-green);
            padding: 10px;
            border-radius: 5px;
            box-shadow: var(--shadow-md);
            text-align: center;
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .action-card:hover {
            transform: translateY(-10px);
            border-color: var(--primary-color);
            box-shadow: var(--shadow-lg);
        }

        .action-icon {
            width: 25px;
            height: 25px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 20px;
        }

        .action-card h3 {
            color: white;
            font-size: 1.4rem;
            margin-bottom: 10px;
        }

        .action-card p {
            color: white;
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
            /* color: var(--primary-color); */
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
            background: var(--secondary-color);
            border-radius: 2px;
        }

        .section-header p {
            /* color: var(--text-light); */
            font-size: 1.3rem;
            max-width: 700px;
            margin: 20px auto 0;
        }

        /* CLIENTS SECTION */
        .clients-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            align-items: center;
        }

        .client-card {
            background: white;
            padding: 15px;
            /* box-shadow: var(--shadow-md);
                                                                                                                            transition: var(--transition); */
            text-align: center;
            border: 2px solid transparent;
            border-radius: 6px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 200px;
        }

        .client-card:hover {
            transform: translateY(-8px);
            border-color: var(--abrema-green);
            box-shadow: var(--shadow-lg);
        }

        /* Logo du client */
        .client-logo {
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            background: var(--bg-light);
            border-radius: 50%;
            padding: 15px;
            transition: var(--transition);
        }

        .client-card:hover .client-logo {
            transform: scale(1.1);
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
        }

        .client-logo i {
            font-size: 3.5rem;
            color: var(--abrema-green);
            transition: var(--transition);
        }

        .client-card:hover .client-logo i {
            color: white;
        }

        /* Nom du client */
        .client-card h3 {
            color: var(--text-dark);
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        /* Description courte */
        .client-card p {
            color: var(--text-light);
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        /* Badge optionnel */
        .client-badge {
            display: inline-block;
            background: var(--abrema-green);
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        /* Version alternative : logos en ligne simple */
        .clients-grid-simple {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 40px;
        }

        .client-simple {
            text-align: center;
            transition: var(--transition);
        }

        .client-simple:hover {
            transform: translateY(-5px);
        }

        .client-simple-logo {
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 50%;
            box-shadow: var(--shadow-md);
            margin: 0 auto 15px;
            padding: 15px;
            transition: var(--transition);
        }

        .client-simple:hover .client-simple-logo {
            box-shadow: var(--shadow-lg);
            background: var(--abrema-green);
        }

        .client-simple-logo i {
            font-size: 2.5rem;
            color: var(--abrema-green);
            transition: var(--transition);
        }

        .client-simple:hover .client-simple-logo i {
            color: white;
        }

        .client-simple h4 {
            color: var(--text-dark);
            font-size: 1rem;
            font-weight: 600;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .clients-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 20px;
            }

            .client-card {
                padding: 20px;
                min-height: 180px;
            }

            .client-logo {
                width: 100px;
                height: 100px;
            }

            .client-logo i {
                font-size: 3rem;
            }
        }

        /* SECTION INSTITUTIONNELLE SOBRE */
        .institution-section {
            background: #ffffff;
            /* padding: 0px 0; */
            /* Augmenté de 10px à 60px pour plus d'espace */

            padding-top: 40px;
        }

        .institution-container {
            max-width: 1200px;
            background: #ffffff;
            /* Limité à 1200px au lieu de 7900px */
            margin: 0 auto;
            padding: 0 40px;
            /* Ajout de padding pour les côtés */
            text-align: center;
        }

        .institution-container h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .institution-container p {
            font-size: 1.2rem;
            line-height: 1.9;
            color: #000;
            margin-bottom: 20px;
            text-align: justify;
            /* Meilleure lisibilité pour les paragraphes */
        }

        /* Mobile */
        @media (max-width: 768px) {
            .institution-container h2 {
                font-size: 1.6rem;
            }

            .institution-container p {
                font-size: 1rem;
            }
        }


        /* PARTNERS SECTION */
        .partners-section {
            background: var(--bg-light);
            padding: 30px 0;
        }

        .partners-slider-container {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            padding: 0 50px;
            /* espace pour les boutons */
        }

        .partners-slider {
            display: flex;
            /* gap: 40px; */
            overflow: hidden;
            scroll-behavior: smooth;
            /* padding: 20px 0; */
        }

        .partner-box {
            min-width: 300px;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: var(--shadow-sm);
        }

        .partner-box img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        /* Boutons */
        .slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;

            background: white;
            border: none;
            color: black;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            box-shadow: var(--shadow-md);
            transition: 0.2s;
        }

        .slider-btn:hover {
            background: var(--primary-dark);
        }

        .prev-btn {
            left: 10px;
        }

        .next-btn {
            right: 10px;
        }


        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }


        .view-all-link {
            color: var(--abrema-green);
            font-size: 0.95rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: var(--transition);
        }

        .view-all-link:hover {
            color: var(--secondary-color);
            gap: 8px;
        }

        /*PAGE DÉTAIL ACTUALITÉ*/
        .actualite-detail-page {
            padding: 60px 0;
            background: var(--bg-light);
        }

        .actualite-detail-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .actualite-header {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: var(--shadow-md);
            margin-bottom: 30px;
        }

        .actualite-breadcrumb {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .actualite-breadcrumb a {
            color: var(--abrema-green);
            transition: var(--transition);
        }

        .actualite-breadcrumb a:hover {
            color: var(--secondary-color);
        }

        .actualite-breadcrumb i {
            font-size: 0.7rem;
        }

        .actualite-category {
            display: inline-block;
            background: var(--secondary-color);
            color: var(--text-dark);
            padding: 6px 18px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .actualite-title {
            color: var(--abrema-green);
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 20px;
        }

        .actualite-meta {
            display: flex;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
            padding-top: 20px;
            border-top: 2px solid var(--border-color);
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .meta-item i {
            color: var(--abrema-green);
            font-size: 1.1rem;
        }

        .actualite-image-container {
            position: relative;
            width: 100%;
            height: 500px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            margin-bottom: 30px;
        }

        .actualite-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .actualite-content {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: var(--shadow-md);
            margin-bottom: 30px;
        }

        .actualite-description {
            color: var(--text-dark);
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .actualite-body {
            color: var(--text-dark);
            font-size: 1.05rem;
            line-height: 1.9;
        }

        .actualite-body p {
            margin-bottom: 20px;
        }

        .actualite-body h3 {
            color: var(--abrema-green);
            font-size: 1.5rem;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .actualite-body ul,
        .actualite-body ol {
            margin-left: 30px;
            margin-bottom: 20px;
            list-style: disc;
        }

        .actualite-body li {
            margin-bottom: 10px;
        }

        .actualite-share {
            background: var(--bg-light);
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 30px;
        }

        .actualite-share h4 {
            color: var(--text-dark);
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .share-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .share-btn {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: white;
            font-size: 1.2rem;
            transition: var(--transition);
        }

        .share-btn.facebook {
            background: #1877f2;
        }

        .share-btn.twitter {
            background: #1da1f2;
        }

        .share-btn.linkedin {
            background: #0a66c2;
        }

        .share-btn.whatsapp {
            background: #25d366;
        }

        .share-btn:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .actualite-navigation {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: var(--shadow-md);
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .nav-link {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 20px;
            border: 2px solid var(--border-color);
            border-radius: 12px;
            transition: var(--transition);
        }

        .nav-link:hover {
            border-color: var(--abrema-green);
            background: var(--bg-light);
        }

        .nav-link.prev {
            text-align: left;
        }

        .nav-link.next {
            text-align: right;
            flex-direction: row-reverse;
        }

        .nav-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--abrema-green);
            color: white;
            border-radius: 50%;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .nav-link:hover .nav-icon {
            background: var(--secondary-color);
            color: var(--text-dark);
        }

        .nav-text {
            flex: 1;
        }

        .nav-label {
            font-size: 0.85rem;
            color: var(--text-light);
            margin-bottom: 5px;
        }

        .nav-title {
            color: var(--text-dark);
            font-weight: 600;
            font-size: 1rem;
        }

        .back-to-list {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 30px;
            background: var(--abrema-green);
            color: white;
            border-radius: 50px;
            font-weight: 600;
            transition: var(--transition);
            margin-top: 30px;
        }

        .back-to-list:hover {
            background: var(--abrema-dark-green);
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        /*  RESPONSIVE */
        @media (max-width: 992px) {
            .announcements-publications {
                grid-template-columns: 1fr;
            }

            .actualite-title {
                font-size: 2rem;
            }

            .actualite-image-container {
                height: 400px;
            }
        }

        @media (max-width: 768px) {
            .announcement-item {
                flex-direction: column;
            }

            .announcement-image {
                width: 100%;
                height: 200px;
            }

            .actualite-header,
            .actualite-content {
                padding: 25px;
            }

            .actualite-title {
                font-size: 1.7rem;
            }

            .actualite-image-container {
                height: 300px;
            }

            .actualite-navigation {
                flex-direction: column;
            }

            .nav-link.next {
                flex-direction: row;
                text-align: left;
            }
        }

        @media (max-width: 480px) {
            .actualite-meta {
                gap: 15px;
            }

            .actualite-title {
                font-size: 1.5rem;
            }

            .actualite-image-container {
                height: 250px;
            }

            .share-buttons {
                gap: 10px;
            }

            .share-btn {
                width: 45px;
                height: 45px;
            }
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

            .stat-number {
                font-size: 2.5rem;
            }

            .actions-grid,
            .services-grid,
            .clients-grid {
                grid-template-columns: 1fr;
            }

            .lab-content,
            .why-work-content,
            .announcements-publications {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .lab-content .lab-image,
            .why-work-content .why-work-image {
                order: -1;
                height: 350px;
            }

            .quality-content h2 {
                font-size: 2rem;
                flex-direction: column;
            }

            .quality-badges {
                gap: 15px;
            }

            .quality-badge {
                font-size: 0.95rem;
                padding: 12px 20px;
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
    <section class="hero-with-sidebar">
        <div class="hero-container">
            <!-- SLIDER À GAUCHE -->
            <div class="hero-slider">
                @foreach ($actualites as $index => $actualite)
                    <div class="hero-slide {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $actualite->image) }}" alt="Slide {{ $index + 1 }}">

                        <div class="hero-content">
                            <h1>{{ $actualite->title }}</h1>
                            <p>{{ $actualite->description }}</p>
                        </div>
                    </div>
                @endforeach

                <div class="slider-controls">
                    @foreach ($actualites as $index => $actualite)
                        <span class="slider-dot {{ $index === 0 ? 'active' : '' }}" data-slide="{{ $index }}"></span>
                    @endforeach
                </div>

                <button class="hero-arrow prev-arrow">&#10094;</button>
                <button class="hero-arrow next-arrow">&#10095;</button>
            </div>

            <!-- VISION/MISSION À DROITE -->
            <div class="vision-mission-sidebar">
                <div class="vm-card">
                    <h3>Vision</h3>
                    <p>La vision de l'ABREMA est d'atteindre le niveau de maturité élevé de qualité de ses services, le
                        maintenir et l'améliorer de façon continue.</p>
                </div>

                <div class="vm-card">
                    <h3>Mission</h3>
                    <p>Promouvoir et protéger la santé publique en s'assurant que les produits de santé disponibles sont de
                        bonne qualité, sûrs et efficaces.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="institution-section">
        <div class="institution-container">
            <h2>Enregistrement et homologation</h2>
            <p>
                L’enregistrement des produits réglementés fait partie des fonctions
                essentielles assignées à toute agence de réglementation pharmaceutique.
                Il s’agit d’un processus d’évaluation scientifique et objective des dossiers
                de demande d’Autorisation de Mise sur le Marché (AMM).
            </p>
            <p>
                Cette évaluation repose sur trois critères fondamentaux :
                la qualité, l’innocuité et l’efficacité du produit, conformément aux normes
                de l’OMS, de l’ICH, de l’EAC et aux exigences nationales.
            </p>
            <p>
                Au Burundi, l’homologation est régie par l’ordonnance ministérielle
                N° 630/991 du 09/08/2023.
            </p>
        </div>
    </section>

    <section class="institution-section">
        <div class="institution-container">
            <h2>Service en ligne</h2>

            <p>
                L’ABREMA s’inscrit dans une dynamique de digitalisation progressive des services
                offerts à ses clients afin d’améliorer l’efficacité, la transparence et l’accessibilité
                des procédures réglementaires.
            </p>

            <p>
                Pour les demandes d’autorisation d’importation des médicaments et autres produits
                de santé, le système du Guichet Unique Électronique
                <strong>ASYCUDA</strong> est actuellement opérationnel.
            </p>

            <p>
                Pour toute information complémentaire, les usagers sont invités à se rapprocher
                des services compétents de l’ABREMA.
            </p>

            <p>
                Un nouveau système électronique dénommé
                <strong>ABREMA-RIMS</strong> est en cours de finalisation afin de
                digitaliser les principales fonctions réglementaires de l’institution.
            </p>
        </div>
    </section>

    <!-- WHY WORK WITH US SECTION -->
    <section class="institution-section">
        <div class="institution-container">
            <h2>Pourquoi travailler avec nous ?</h2>
            <p>
                ABREMA est une institution offrant des services rapides et de qualité dans la
                réglementation des produits de santé afin de protéger la santé publique en
                garantissant la qualité, l’efficacité et l’innocuité des produits réglementés,
                conformément aux normes de l’OMS, de l’UA et de l’EAC.
            </p>
        </div>
    </section>

    <!-- LABORATORY SECTION -->
    <section class="institution-section">
        <div class="institution-container">
            <h2>Laboratoire de contrôle qualité</h2>
            <p>
                L’ABREMA réalise les activités de contrôle qualité des produits de santé
                circulant au Burundi en collaboration avec d’autres laboratoires nationaux
                et internationaux préqualifiés par l’OMS.
            </p>
            <p>
                L’institution dispose des kits Minilab permettant d’effectuer le screening
                des médicaments importés ou produits localement, avant ou après leur
                commercialisation, afin de détecter rapidement les médicaments falsifiés
                ou de qualité inférieure.
            </p>
        </div>
    </section>

    <!-- QUALITY POLICY SECTION -->
    <section class="institution-section">
        <div class="institution-container">
            <h2>Politique qualité</h2>

            <p>
                L’ABREMA a entrepris la mise en œuvre d’un Système de Management de la Qualité (SMQ)
                visant à assurer la performance, la fiabilité et l’amélioration continue de ses services.
            </p>

            <p>
                Dans cette démarche qualité, la Direction se réfère aux normes internationales
                <strong>ISO 9000</strong>, <strong>ISO 9001</strong>, <strong>ISO 9004</strong>
                et <strong>ISO 26000</strong>.
            </p>

            <p>
                L’institution s’engage à satisfaire les exigences de ses clients ainsi que celles
                des autres parties prenantes, dans le respect des bonnes pratiques de gouvernance
                et de réglementation pharmaceutique.
            </p>
        </div>
    </section>

    <!-- CLIENTS SECTION -->
    <section class="home-section" style="background: var(--bg-white);">
        <div class="container-fluid">
            <div class="section-header">
                <h2>Nos Clients</h2>
                <p>L'ABREMA au service de tous les acteurs du secteur pharmaceutique burundais</p>
            </div>
            <div class="clients-grid">
                @foreach ($clients as $client)
                    <div class="client-card">
                        <div class="client-logo">
                            <i class="fas {{ $client->icon }}"></i>
                        </div>
                        <h3>{{ $client->name }}</h3>
                        @if ($client->description)
                            <p>{{ Str::limit($client->description, 80) }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- PARTNERS SECTION -->
    <section class="partners-section">
        <div class="container text-center">
            <div class="section-header mb-5">
                <h2>Nos Partenaires</h2>
            </div>

            <div class="partners-slider-container">

                <!-- BOUTON GAUCHE -->
                <button class="slider-btn prev-btn">&#10094;</button>

                <!-- SLIDER -->
                <div class="partners-slider" id="partnersSlider">
                    @foreach ($partenaires as $p)
                        <div class="partner-box">
                            <a href="{{ $p->link }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ asset('storage/' . $p->logo) }}" alt="{{ $p->nom }}">
                            </a>
                        </div>
                    @endforeach
                </div>

                <!-- BOUTON DROITE -->
                <button class="slider-btn next-btn">&#10095;</button>
            </div>
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

            slides[n].classList.add('active');
            dots[n].classList.add('active');
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        // Auto slide
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

        // Arrow Controls
        const prevHeroBtn = document.querySelector('.hero-arrow.prev-arrow');
        const nextHeroBtn = document.querySelector('.hero-arrow.next-arrow');

        if (prevHeroBtn) {
            prevHeroBtn.addEventListener('click', () => {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
                clearInterval(slideInterval);
                slideInterval = setInterval(nextSlide, 5000);
            });
        }

        if (nextHeroBtn) {
            nextHeroBtn.addEventListener('click', () => {
                nextSlide();
                clearInterval(slideInterval);
                slideInterval = setInterval(nextSlide, 5000);
            });
        }
    </script>
@endsection
