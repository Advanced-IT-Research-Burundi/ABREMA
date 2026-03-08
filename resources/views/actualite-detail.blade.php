@extends('layouts.base')

@section('title', $actualite->title . ' | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <style>
        /* ── Page article ── */
        .article-wrapper {
            max-width: 860px;
        }

        /* Image hero */
        .article-hero {
            width: 100%; height: 420px;
            overflow: hidden; position: relative;
            margin-bottom: 0;
        }
        .article-hero img {
            width: 100%; height: 100%;
            object-fit: cover; display: block;
            transition: transform .5s ease;
        }
        .article-hero:hover img { transform: scale(1.03); }
        .article-hero-placeholder {
            width: 100%; height: 420px;
            background: linear-gradient(135deg, var(--green-dark) 0%, var(--green-light) 100%);
            display: flex; align-items: center; justify-content: center;
        }
        .article-hero-placeholder i { font-size: 80px; color: rgba(255,255,255,.15); }

        .article-badge {
            position: absolute; top: 18px; right: 18px;
            background: var(--gold); color: #fff;
            padding: 5px 16px;
            font-size: 0.75rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .10em;
        }

        /* Meta bar */
        .article-meta {
            display: flex; align-items: center; flex-wrap: wrap;
            gap: 20px; padding: 16px 0 20px;
            border-bottom: 1px solid var(--gray-100);
            margin-bottom: 24px;
        }
        .article-meta .meta-item {
            display: flex; align-items: center; gap: 7px;
            font-size: 0.84rem; color: var(--gray-400);
        }
        .article-meta .meta-item i { color: var(--gold); font-size: 0.8rem; }

        /* Corps de l'article */
        .article-lead {
            font-size: 1.05rem; font-weight: 600;
            color: var(--text); line-height: 1.8;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--gray-100);
        }
        .article-content {
            font-size: 0.95rem; line-height: 1.92;
            color: var(--gray-700); text-align: justify;
        }
        .article-content p { margin-bottom: 16px; }

        /* Partage */
        .share-section {
            margin-top: 36px; padding-top: 28px;
            border-top: 1px solid var(--gray-100);
        }
        .share-section h4 {
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem; font-weight: 700;
            color: var(--green-dark);
            text-transform: uppercase; letter-spacing: .10em;
            margin-bottom: 14px;
            display: flex; align-items: center; gap: 8px;
        }
        .share-section h4 i { color: var(--gold); }
        .share-btns { display: flex; gap: 10px; flex-wrap: wrap; }
        .share-btn {
            width: 40px; height: 40px;
            display: flex; align-items: center; justify-content: center;
            color: #fff; font-size: 0.9rem;
            text-decoration: none; transition: var(--tr);
        }
        .share-btn:hover { transform: translateY(-3px); opacity: .85; color: #fff; }
        .share-btn.fb  { background: #1877f2; }
        .share-btn.tw  { background: #1da1f2; }
        .share-btn.li  { background: #0a66c2; }
        .share-btn.wa  { background: #25d366; }

        /* Navigation prev/next */
        .article-nav {
            display: grid; grid-template-columns: 1fr 1fr;
            gap: 14px; margin-top: 32px;
        }
        .article-nav a {
            display: flex; align-items: center; gap: 12px;
            padding: 16px 18px;
            border: 1px solid var(--gray-200);
            background: #fff; text-decoration: none;
            transition: var(--tr);
        }
        .article-nav a:hover { border-color: var(--green); background: var(--green-pale); }
        .article-nav a.nav-next { flex-direction: row-reverse; text-align: right; }
        .article-nav .nav-arrow-circle {
            width: 38px; height: 38px; flex-shrink: 0;
            background: var(--green-dark); color: #fff;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.8rem; transition: var(--tr);
        }
        .article-nav a:hover .nav-arrow-circle { background: var(--gold); }
        .article-nav .nav-label {
            font-size: 0.75rem; color: var(--gray-400);
            text-transform: uppercase; letter-spacing: .08em;
            display: block; margin-bottom: 3px;
        }
        .article-nav .nav-title {
            font-size: 0.88rem; font-weight: 600;
            color: var(--text); line-height: 1.35;
        }

        /* Bouton retour */
        .btn-back {
            display: inline-flex; align-items: center; gap: 9px;
            margin-top: 28px;
            background: var(--green-dark); color: #fff;
            padding: 11px 24px; font-size: 0.86rem; font-weight: 600;
            text-decoration: none; transition: var(--tr);
        }
        .btn-back:hover { background: var(--green); transform: translateY(-1px); color: #fff; }

        /* ── Section autres actualités ── */
        .related-section {
            background: var(--off-white);
            padding: 52px 0 60px;
            border-top: 1px solid var(--gray-200);
        }
        .related-header {
            text-align: center; margin-bottom: 36px;
        }
        .related-header h2 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.9rem; color: var(--green-dark);
            font-weight: 400; margin-bottom: 10px;
        }
        .related-header hr {
            width: 60px; border: none;
            border-top: 3px solid var(--gold);
            margin: 0 auto 12px;
        }
        .related-header p { font-size: 0.9rem; color: var(--gray-400); }

        .related-grid {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 20px; margin-bottom: 34px;
        }

        .related-card {
            background: #fff; border: 1px solid var(--gray-200);
            overflow: hidden; transition: var(--tr);
        }
        .related-card:hover {
            border-color: var(--green);
            transform: translateY(-4px); box-shadow: var(--shadow);
        }
        .related-card-img {
            height: 180px; overflow: hidden; position: relative;
        }
        .related-card-img img {
            width: 100%; height: 100%;
            object-fit: cover; display: block;
            transition: transform .4s ease;
        }
        .related-card:hover .related-card-img img { transform: scale(1.06); }
        .related-card-img .rc-date {
            position: absolute; top: 12px; left: 12px;
            background: var(--green-dark); color: #fff;
            padding: 6px 10px; text-align: center;
            border-left: 3px solid var(--gold); line-height: 1.2;
        }
        .related-card-img .rc-date .rc-day { font-family: 'DM Serif Display', serif; font-size: 1.2rem; }
        .related-card-img .rc-date .rc-month { font-size: 0.68rem; text-transform: uppercase; letter-spacing: .08em; color: var(--gold-light); }
        .related-card-body { padding: 18px 20px; }
        .related-card-body h3 {
            font-family: 'DM Serif Display', serif;
            font-size: 1rem; color: var(--text);
            font-weight: 400; line-height: 1.35;
            margin-bottom: 8px; transition: color .2s;
            display: -webkit-box; -webkit-line-clamp: 2;
            -webkit-box-orient: vertical; overflow: hidden;
        }
        .related-card:hover .related-card-body h3 { color: var(--green); }
        .related-card-body p {
            font-size: 0.84rem; color: var(--gray-400);
            line-height: 1.65; margin-bottom: 12px;
            display: -webkit-box; -webkit-line-clamp: 2;
            -webkit-box-orient: vertical; overflow: hidden;
        }
        .related-card-body a.rc-link {
            font-size: 0.82rem; font-weight: 600;
            color: var(--green); text-decoration: none;
            display: inline-flex; align-items: center; gap: 5px;
            transition: gap .2s, color .2s;
        }
        .related-card-body a.rc-link:hover { color: var(--gold); gap: 8px; }

        .related-footer { text-align: center; }

        @media (max-width: 820px) {
            .article-nav { grid-template-columns: 1fr; }
            .related-grid { grid-template-columns: 1fr 1fr; }
            .article-hero { height: 260px; }
            .article-hero-placeholder { height: 260px; }
        }
        @media (max-width: 540px) {
            .related-grid { grid-template-columns: 1fr; }
        }
    </style>
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <a href="{{ route('information.actualite') }}">Actualités</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">{{ Str::limit($actualite->title, 48) }}</span>
        </div>
        <h1>{{ $actualite->title }}</h1>
        <p class="lead">
            <i class="far fa-calendar-alt" style="color:var(--gold);"></i>
            {{ $actualite->created_at->format('d F Y') }} &nbsp;·&nbsp;
            <i class="far fa-clock" style="color:var(--gold);"></i>
            {{ $actualite->created_at->diffForHumans() }}
        </p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR ══ --}}
                <aside class="sidebar-nav">

                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('information.actualite') ? 'active' : '' }}"
                               href="{{ route('information.actualite') }}">
                                <span>Actualités</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('information.document') ? 'active' : '' }}"
                               href="{{ route('information.document') }}">
                                <span>Documents</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('information.evenement') ? 'active' : '' }}"
                               href="{{ route('information.evenement') }}">
                                <span>Événements</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                        </nav>
                    </div>

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

                    <div class="nav-block">
                        <div class="nav-block-title">
                            <i class="fas fa-map-marker-alt"></i> Points d'Entrée
                        </div>
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
                        <div class="sc-icon"><i class="fas fa-newspaper"></i></div>
                        <h4>Toutes nos actualités</h4>
                        <p>Consultez l'ensemble de nos publications</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content article-wrapper">

                    {{-- Image hero --}}
                    @if($actualite->image)
                        <div class="article-hero">
                            <img src="{{ asset('storage/' . $actualite->image) }}" alt="{{ $actualite->title }}">
                            <span class="article-badge">Actualité</span>
                        </div>
                    @else
                        <div class="article-hero-placeholder">
                            <i class="fas fa-bullhorn"></i>
                            <span class="article-badge">Actualité</span>
                        </div>
                    @endif

                    {{-- Meta --}}
                    <div class="article-meta">
                        <span class="meta-item">
                            <i class="far fa-calendar-alt"></i>
                            {{ $actualite->created_at->format('d F Y') }}
                        </span>
                        <span class="meta-item">
                            <i class="far fa-clock"></i>
                            {{ $actualite->created_at->diffForHumans() }}
                        </span>
                        <span class="meta-item">
                            <i class="fas fa-user"></i>
                            Admin ABREMA
                        </span>
                    </div>

                    {{-- Description / chapeau --}}
                    <p class="article-lead">{{ $actualite->description }}</p>

                    {{-- Contenu complet --}}
                    <div class="article-content">
                        {!! nl2br(e($actualite->contenu ?? $actualite->description)) !!}
                    </div>

                    {{-- Partage --}}
                    <div class="share-section">
                        <h4><i class="fas fa-share-alt"></i> Partager cette actualité</h4>
                        <div class="share-btns">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                               target="_blank" class="share-btn fb" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}&text={{ urlencode($actualite->title) }}"
                               target="_blank" class="share-btn tw" title="Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ urlencode($actualite->title) }}"
                               target="_blank" class="share-btn li" title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($actualite->title . ' ' . url()->current()) }}"
                               target="_blank" class="share-btn wa" title="WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>

                    {{-- Navigation précédent / suivant --}}
                    @if(isset($previousActualite) || isset($nextActualite))
                        <div class="article-nav">
                            @if(isset($previousActualite))
                                <a href="{{ route('actualite.show', $previousActualite->id) }}">
                                    <div class="nav-arrow-circle"><i class="fas fa-chevron-left"></i></div>
                                    <div>
                                        <span class="nav-label">Article précédent</span>
                                        <span class="nav-title">{{ Str::limit($previousActualite->title, 52) }}</span>
                                    </div>
                                </a>
                            @else
                                <div></div>
                            @endif

                            @if(isset($nextActualite))
                                <a href="{{ route('actualite.show', $nextActualite->id) }}" class="nav-next">
                                    <div class="nav-arrow-circle"><i class="fas fa-chevron-right"></i></div>
                                    <div>
                                        <span class="nav-label">Article suivant</span>
                                        <span class="nav-title">{{ Str::limit($nextActualite->title, 52) }}</span>
                                    </div>
                                </a>
                            @endif
                        </div>
                    @endif

                    {{-- Bouton retour --}}
                    <a href="{{ route('information.actualite') }}" class="btn-back">
                        <i class="fas fa-arrow-left"></i> Retour aux actualités
                    </a>

                </main>

            </div>
        </div>
    </div>

    {{-- ── AUTRES ACTUALITÉS ── --}}
    @if(isset($autresActualites) && $autresActualites->count() > 0)
        <div class="related-section">
            <div class="container-fluid" style="padding: 0 40px;">

                <div class="related-header">
                    <h2>Autres <span style="font-weight:300; color:var(--text);">Actualités</span></h2>
                    <hr>
                    <p>Découvrez nos autres publications récentes</p>
                </div>

                <div class="related-grid">
                    @foreach($autresActualites as $autre)
                        <div class="related-card">
                            <div class="related-card-img">
                                @if($autre->image)
                                    <img src="{{ asset('storage/' . $autre->image) }}" alt="{{ $autre->title }}">
                                @else
                                    <div style="width:100%;height:100%;background:linear-gradient(135deg,var(--green-dark),var(--green-light));display:flex;align-items:center;justify-content:center;">
                                        <i class="fas fa-bullhorn" style="font-size:2.5rem;color:rgba(255,255,255,.2);"></i>
                                    </div>
                                @endif
                                <div class="rc-date">
                                    <div class="rc-day">{{ $autre->created_at->format('d') }}</div>
                                    <div class="rc-month">{{ $autre->created_at->format('M') }}</div>
                                </div>
                            </div>
                            <div class="related-card-body">
                                <h3>{{ $autre->title }}</h3>
                                <p>{{ $autre->description }}</p>
                                <a href="{{ route('actualite.show', $autre->id) }}" class="rc-link">
                                    Lire plus <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="related-footer">
                    <a href="{{ route('information.actualite') }}" class="btn-primary-page">
                        <i class="fas fa-list"></i> Voir toutes les actualités
                    </a>
                </div>

            </div>
        </div>
    @endif

@endsection