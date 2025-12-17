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
            /* background: linear-gradient(135deg, rgba(44, 90, 160, 0.9) 0%, rgba(30, 65, 120, 0.7) 100%); */
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
            background: var(--secondary-color);
            color: var(--text-dark);
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: var(--transition);
        }

        .hero-btn:hover {
            background: #e0a428;
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(248, 183, 57, 0.4);
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
            transition: var(--transition);
        }

        .slider-dot.active {
            background: var(--secondary-color);
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
            padding: 30px;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            text-align: center;
            border: 2px solid transparent;
            border-radius: 12px;
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

        /* LABORATORY SECTION */
        .laboratory-section {
            /* background: white; */
            padding: 80px 0;
        }

        .lab-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .lab-text h2 {
            /* color: var(--primary-color); */
            font-size: 2.5rem;
            margin-bottom: 25px;
        }

        .lab-text h2 i {
            /* color: var(--secondary-color); */
            margin-right: 15px;
        }

        .lab-text p {
            color: var(--text-dark);
            font-size: 1.3rem;
            line-height: 1.8;
            margin-bottom: 25px;
            text-align: justify;
        }

        .lab-features {
            display: grid;
            gap: 20px;
            margin-top: 15px;
        }

        .lab-feature {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 20px;
            background: var(--bg-light);
            border-radius: 12px;
            border-left: 4px solid var(--primary-color);
            transition: var(--transition);
        }

        .lab-feature:hover {
            /* background: white; */
            box-shadow: var(--shadow-md);
            transform: translateX(5px);
        }

        .lab-feature-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-light));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .lab-feature-text h4 {
            /* color: var(--primary-color); */
            font-size: 1.3rem;
            margin-bottom: 8px;
        }

        .lab-feature-text p {
            /* color: var(--text-light); */
            font-size: 1.1rem;
            margin: 0;
        }

        .lab-image {
            position: relative;
            /* border-radius: 20px; */
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .lab-image img {
            width: 300%;
            height: 300%;
            object-fit: cover;
            transition: var(--transition);
        }

        .lab-image:hover img {
            transform: scale(1.05);
        }

        .lab-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--secondary-color);
            color: var(--text-dark);
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: 700;
            font-size: 1rem;
            box-shadow: var(--shadow-md);
        }

        /* QUALITY POLICY SECTION */
        .quality-section {
            background: var(--bg-light);
            padding: 80px 0;
        }

        .quality-content {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
        }

        .quality-content h2 {
            color: var(--text-dark);
            font-size: 2.5rem;
            margin-bottom: 30px;
            font-weight: 700;
        }

        .quality-content p {
            color: var(--text-dark);
            font-size: 1.4rem;
            line-height: 1.9;
            margin-bottom: 40px;
            text-align: justify;
        }

        .quality-badges {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .quality-badge {
            background: white;
            color: var(--text-dark);
            padding: 15px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 1.1rem;
            border: 2px solid var(--border-color);
            transition: var(--transition);
            box-shadow: var(--shadow-sm);
        }

        .quality-badge:hover {
            border-color: var(--abrema-green);
            box-shadow: var(--shadow-md);
            transform: translateY(-3px);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .quality-content h2 {
                font-size: 2rem;
            }

            .quality-content p {
                font-size: 1rem;
            }

            .quality-badges {
                gap: 15px;
            }

            .quality-badge {
                font-size: 0.95rem;
                padding: 12px 20px;
            }
        }

        /* WHY WORK WITH US SECTION */
        .why-work-section {
            padding: 80px 0;
            /* background: var(--bg-light); */
        }

        .why-work-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .why-work-image {
            position: relative;
            /* border-radius: 20px; */
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            height: 500px;
        }

        .why-work-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .why-work-image:hover img {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            /* background: linear-gradient(to top, rgba(44, 90, 160, 0.9), transparent); */
            padding: 60px;
            /* color: white; */
        }

        .image-overlay h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        /* .image-overlay p {
                                                                                     font-size: 1rem;
                                                                                     opacity: 0.95;
                                                                                    } */

        .why-work-text h2 {
            /* color: var(--primary-color); */
            font-size: 2.5rem;
            margin-bottom: 5px;
        }

        .why-work-text>p {
            /* color: var(--text-dark); */
            font-size: 1.3rem;
            line-height: 1.8;
            margin-bottom: 15px;
            text-align: justify;
        }

        .work-point-text p {
            color: var(--text-light);
            font-size: 1.1rem;
            margin: 0;
            line-height: 1.5;
        }

        /* SERVICES SECTION */
        .announcements-services-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
        }

        /* BLOC ACTUALITÉS */
        .actualites-block {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: var(--shadow-md);
        }

        .block-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid var(--secondary-color);
        }

        .block-header h3 {
            color: var(--text-dark);
            font-size: 1.7rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .block-header h3 i {
            color: var(--secondary-color);
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

        /* GRILLE ACTUALITÉS */
        .actualites-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .actualite-card {
            background: var(--bg-light);
            border-radius: 10px;
            overflow: hidden;
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .actualite-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
            border-color: var(--abrema-green);
        }

        .actualite-image {
            position: relative;
            width: 100%;
            height: 180px;
            overflow: hidden;
        }

        .actualite-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .actualite-card:hover .actualite-image img {
            transform: scale(1.1);
        }

        .actualite-date-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: var(--abrema-green);
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            text-align: center;
            font-weight: 700;
            box-shadow: var(--shadow-md);
        }

        .date-day {
            display: block;
            font-size: 1.4rem;
            line-height: 1;
        }

        .date-month,
        .date-year {
            display: block;
            font-size: 0.75rem;
            opacity: 0.9;
        }

        .actualite-info {
            padding: 15px;
        }

        .actualite-info h4 {
            color: var(--text-dark);
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 8px;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .actualite-info p {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* BLOCS COMMUNS */
        .actualites-block,
        .services-info-block {
            background: white;
            padding: 35px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .block-header {
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 3px solid var(--abrema-green);
        }

        .block-header h3 {
            color: var(--text-dark);
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
        }

        .block-header h3 i {
            color: var(--abrema-green);
        }

        /* CONTENU TEXTE */
        .content-text p {
            color: var(--text-dark);
            font-size: 1.3rem;
            line-height: 1.8;
            margin-bottom: 20px;
            text-align: justify;
        }

        .content-text p:last-child {
            margin-bottom: 0;
        }

        .content-text strong {
            font-weight: 700;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .announcements-services-layout {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {

            .actualites-block,
            .services-info-block {
                padding: 25px;
            }

            .content-text p {
                font-size: 1rem;
            }
        }

        /* RESPONSIVE */
        @media (max-width: 1200px) {
            .announcements-services-layout {
                grid-template-columns: 1fr;
            }

            .actualites-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .actualites-grid {
                grid-template-columns: 1fr;
            }

            .actualites-block,
            .info-card,
            .quick-services,
            .recent-publications {
                padding: 20px;
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
    <section class="hero-slider">

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
    </section>

    <!-- WHY WORK WITH US SECTION -->
    <section class="why-work-section">
        <div class="container-fluid">
            <div class="why-work-content">
                <div class="why-work-image">
                    <img src="images/abremaimage1.jpg" alt="Bâtiment ABREMA">
                </div>
                <div class="why-work-text">
                    <h2>Pourquoi Travailler avec Nous !</h2>
                    <p>
                        ABREMA est une institution offrant de services rapides et de qualité dans la réglementation des
                        produits de santé pour protéger la santé publique en garantissant la qualité, l'efficacité et
                        l'innocuité des produits réglementés en se referrant aux normes de l'OMS, l'UA et de l'EAC.
                    </p>
                    <h2>Vision</h2>
                    <p>
                        La vision de l'ABREMA est d'atteindre le niveau de maturité élevé de qualité
                        de ses services, le maintenir et l’améliorer de façon continue.
                    </p>
                    <h2>Mission</h2>
                    <p> Promouvoir et protéger la santé publique en s'assurant que les produits de santé
                        disponibles sont de bonne qualité, sûrs et efficaces.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- LABORATORY SECTION -->
    <section class="laboratory-section">
        <div class="container-fluid">
            <div class="lab-content">
                <div class="lab-text">
                    <h2> Laboratoire de Contrôle Qualité</h2>
                    <p>
                        L'ABREMA réalise les activités de contrôle qualité des produits de santé circulant au Burundi en
                        collaboration avec d'autres laboratoires de CQ nationaux et étrangers PQ-OMS. L'ABREMA dispose des
                        Kits Minilab lui permettant de faire des screening des médicaments importés ou produits localement
                        avant leur commercialisation ou après commercialisation, afin de détecter rapidement les médicaments
                        falsifiés et ou de qualités inferieure.
                    </p>
                </div>
                <div class="lab-image">
                    <img src="images/image1.png" alt="Laboratoire ABREMA">
                </div>
            </div>
        </div>
    </section>
    <!-- ANNOUNCEMENTS & SERVICES SECTION -->
    <section class="home-section">
        <div class="container-fluid">
            <div class="announcements-services-layout">

                <!-- ENREGISTREMENT/HOMOLOGATION - GAUCHE -->
                <div class="actualites-block">
                    <div class="block-header">
                        <h3> Enregistrement/Homologation</h3>
                    </div>

                    <div class="content-text">
                        <p>
                            L'enregistrement des produits réglementés fait partie des 8 fonctions réglementaires
                            assignées à toute Agence de réglementation pharmaceutique. C'est un processus d'évaluation
                            scientifique et objective d'un dossier de demande d'Autorisation de Mise sur le Marché (AMM)
                            basé sur trois critères dont la qualité, l'innocuité et l'efficacité du produit.
                        </p>
                        <p>
                            L'enregistrement fait recours aux normes OMS, ICH, EAC et nationales afin de prendre
                            une décision éclairée.
                        </p>
                        <p>
                            Au Burundi, l'homologation est régie par l'ordonnance ministérielle N° 630/991 du 09/08/2023
                            portant révision de l'ordonnance ministérielle conjointe N° 630/540/750/11 du 02/08/2013
                            portant mode et conditions de l'homologation des médicaments à usage humain et autres
                            intrants pharmaceutiques au Burundi.
                        </p>
                    </div>
                </div>

                <!-- SERVICE EN LIGNE - DROITE -->
                <div class="services-info-block">
                    <div class="block-header">
                        <h3> Service en ligne</h3>
                    </div>

                    <div class="content-text">
                        <p>
                            L'ABREMA est dans le dynamisme de digitalisation des services offerts à ses clients.
                        </p>
                        <p>
                            Pour la demande d'Autorisation d'importation des médicaments et autres produits de santé,
                            le système du Guichet Unique Electronique « <strong>ASYCUDA</strong> » est disponible.
                        </p>
                        <p>
                            Pour plus d'information veuillez-vous adresser aux services de l'ABREMA.
                        </p>
                        <p>
                            Un nouveau système électronique « <strong>ABREMA-RIMS</strong> » est en cours de finalisation
                            pour digitaliser les fonctions réglementaires clés.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- QUALITY POLICY SECTION -->
    <section class="quality-section">
        <div class="container-fluid">
            <div class="quality-content">
                <h2>Politique Qualité</h2>
                <p>
                    L'ABREMA a déjà entrepris un Système de Management de la Qualité (SMQ). Dans cette démarche qualité,
                    la Direction se réfère aux normes ISO 9000, ISO 9001, ISO 9004 et ISO 26000 et s'engage à satisfaire
                    les exigences des clients et des autres parties prenantes.
                </p>
            </div>
        </div>
    </section>

    <!-- CLIENTS SECTION -->
    <section class="home-section" style="background: var(--bg-light);">
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
                            <img src="{{ asset('storage/' . $p->logo) }}" alt="{{ $p->nom }}">
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
        const heroSlider = document.querySelector('.hero-slider');
        if (heroSlider) {
            heroSlider.addEventListener('mouseenter', () => {
                clearInterval(slideInterval);
            });

            heroSlider.addEventListener('mouseleave', () => {
                slideInterval = setInterval(nextSlide, 5000);
            });
        }
    </script>
@endsection
