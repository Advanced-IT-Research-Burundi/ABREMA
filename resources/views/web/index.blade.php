@extends('layouts.base')

@section('title', 'Accueil | ')

@section('styles')
<style>
  /* ═══════════════════════════════════════
     DESIGN TOKENS – ABREMA Brand Identity
     Deep Green · Crimson Red · Gold · White
  ═══════════════════════════════════════ */
  :root {
    --green:        #1a6b3a;
    --green-dark:   #0e4726;
    --green-light:  #2a8a4e;
    --green-pale:   #e6f4ec;
    --red:          #b51c23;
    --red-dark:     #8b1219;
    --red-light:    #e8383f;
    --gold:         #d4a017;
    --gold-light:   #f0c040;
    --white:        #ffffff;
    --off-white:    #f7faf8;
    --gray-100:     #eef2ee;
    --gray-200:     #d4ddd5;
    --text:         #0a0a0a;
    --text-muted:   #2c2c2c;
    --shadow-sm:    0 2px 8px rgba(10,50,20,.10);
    --shadow:       0 6px 24px rgba(10,50,20,.14);
    --shadow-lg:    0 16px 48px rgba(10,50,20,.18);
    --radius:       10px;
    --transition:   all 0.28s ease;
  }

  /* ──── RESET & BASE ──── */
  *, *::before, *::after { box-sizing: border-box; }
  html { scroll-behavior: smooth; font-size: 16px; }

  /* Texte global plus grand et noir */
  body { font-size: 1rem; color: var(--text); }

  /* ════════════════════════════
     HERO SLIDER – PLEIN ÉCRAN
  ════════════════════════════ */
  .hero-wrapper {
    position: relative;
    width: 100%;
  }
  .hero-slider {
    position: relative;
    width: 100%;
    height: 620px;
    overflow: hidden;
    background: var(--green-dark);
  }
  .hero-slide {
    position: absolute; inset: 0;
    opacity: 0;
    transition: opacity 1.1s ease;
    display: flex; align-items: center;
  }
  .hero-slide.active { opacity: 1; }
  .hero-slide::before {
    content: '';
    position: absolute; inset: 0;
    background:
      linear-gradient(to right, rgba(0,0,0,.62) 0%, rgba(0,0,0,.35) 50%, rgba(0,0,0,.08) 100%),
      linear-gradient(to top, rgba(0,0,0,.45) 0%, transparent 55%);
    z-index: 1;
  }
  .hero-slide img {
    width: 100%; height: 100%;
    object-fit: cover;
    position: absolute; inset: 0;
    transform: scale(1.04);
    transition: transform 7s ease;
  }
  .hero-slide.active img { transform: scale(1); }

  .hero-text {
    position: relative; z-index: 2;
    padding: 0 64px;
    max-width: 700px;
  }
  .hero-tag {
    display: inline-flex; align-items: center; gap: 6px;
    background: var(--gold);
    color: var(--green-dark);
    font-size: 0.72rem; font-weight: 700;
    padding: 5px 14px; border-radius: 20px;
    margin-bottom: 20px;
    letter-spacing: .06em; text-transform: uppercase;
  }
  .hero-text h1 {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(2rem, 3.8vw, 3.4rem);
    color: white;
    line-height: 1.15;
    margin-bottom: 18px;
    font-weight: 400;
    text-shadow: 0 2px 20px rgba(0,0,0,.3);
  }
  .hero-text p {
    color: rgba(255,255,255,.88);
    font-size: 1rem; line-height: 1.78;
    margin-bottom: 34px; max-width: 520px;
  }
  .hero-btns { display: flex; gap: 14px; flex-wrap: wrap; }
  .btn-primary-hero {
    background: var(--gold);
    color: var(--green-dark);
    padding: 14px 30px; border-radius: 8px;
    font-weight: 700; font-size: 0.9rem;
    text-decoration: none;
    display: inline-flex; align-items: center; gap: 8px;
    transition: var(--transition);
    box-shadow: 0 4px 16px rgba(212,160,23,.35);
  }
  .btn-primary-hero:hover {
    background: var(--gold-light);
    transform: translateY(-2px);
    box-shadow: 0 8px 28px rgba(212,160,23,.5);
  }
  .btn-outline-hero {
    background: rgba(255,255,255,.1); color: white;
    padding: 14px 30px; border-radius: 8px;
    font-weight: 600; font-size: 0.9rem;
    text-decoration: none;
    border: 2px solid rgba(255,255,255,.45);
    display: inline-flex; align-items: center; gap: 8px;
    backdrop-filter: blur(6px);
    transition: var(--transition);
  }
  .btn-outline-hero:hover { border-color: var(--gold); color: var(--gold); background: rgba(212,160,23,.1); }

  /* Slider controls */
  .slider-dots-hero {
    position: absolute; bottom: 28px; left: 64px;
    display: flex; gap: 8px; z-index: 5;
  }
  .dot-hero {
    width: 8px; height: 8px; border-radius: 4px;
    background: rgba(255,255,255,.4);
    cursor: pointer; transition: var(--transition);
    border: none;
  }
  .dot-hero.active { background: var(--gold); width: 28px; }
  .hero-arrows {
    position: absolute; bottom: 22px; right: 32px;
    display: flex; gap: 10px; z-index: 5;
  }
  .arrow-btn {
    width: 42px; height: 42px; border-radius: 50%;
    border: 1.5px solid rgba(255,255,255,.3);
    background: rgba(255,255,255,.12);
    color: white; cursor: pointer;
    backdrop-filter: blur(6px);
    transition: var(--transition);
    display: flex; align-items: center; justify-content: center;
    font-size: 0.9rem;
  }
  .arrow-btn:hover { background: var(--gold); border-color: var(--gold); color: var(--green-dark); }

  /* ════════════════════════════
     VISION & MISSION — Bandeaux
     flottants sous le hero
  ════════════════════════════ */
  .vm-strip {
    position: relative;
    z-index: 10;
    margin-top: -1px;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    border-top: 4px solid var(--gold);
    box-shadow: 0 8px 32px rgba(0,0,0,.10);
  }
  .vm-card {
    padding: 30px 36px;
    display: flex; align-items: flex-start; gap: 18px;
    transition: var(--transition);
    position: relative; overflow: hidden;
    background: white;
    border-right: 1px solid var(--gray-100);
  }
  .vm-card:last-child { border-right: none; }
  .vm-card::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 3px;
    transform: scaleX(0); transition: transform .35s ease;
  }
  .vm-card.vision::before  { background: var(--green); }
  .vm-card.mission::before { background: var(--gold); }
  .vm-card.valeurs::before { background: var(--red); }
  .vm-card:hover::before   { transform: scaleX(1); }
  .vm-card:hover { background: var(--off-white); }
  .vm-icon {
    width: 52px; height: 52px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.4rem; flex-shrink: 0; transition: var(--transition);
  }
  .vm-card.vision  .vm-icon { background: var(--green-pale);  color: var(--green); }
  .vm-card.mission .vm-icon { background: #fef8e6;             color: var(--gold); }
  .vm-card.valeurs .vm-icon { background: #fdecea;             color: var(--red); }
  .vm-card.vision:hover  .vm-icon { background: var(--green); color: white; }
  .vm-card.mission:hover .vm-icon { background: var(--gold);  color: white; }
  .vm-card.valeurs:hover .vm-icon { background: var(--red);   color: white; }
  .vm-content h3 {
    font-size: 0.82rem; font-weight: 700;
    letter-spacing: .1em; text-transform: uppercase;
    margin-bottom: 7px;
  }
  .vm-card.vision  .vm-content h3 { color: var(--green); }
  .vm-card.mission .vm-content h3 { color: var(--gold); }
  .vm-card.valeurs .vm-content h3 { color: var(--red); }
  .vm-content p {
    color: var(--text);
    font-size: 0.96rem; line-height: 1.72;
  }

  /* ════════════════════════════
     STATS BAR
  ════════════════════════════ */
  .stats-bar {
    background: linear-gradient(135deg, var(--green-dark) 0%, var(--green) 100%);
    padding: 30px 0;
    border-top: 3px solid var(--gold);
  }
  .stats-inner {
    max-width: 1280px; margin: 0 auto; padding: 0 32px;
    display: grid; grid-template-columns: repeat(4, 1fr);
  }
  .stat-item {
    text-align: center;
    border-right: 1px solid rgba(255,255,255,.2);
    padding: 10px 20px;
  }
  .stat-item:last-child { border-right: none; }
  .stat-num {
    font-family: 'DM Serif Display', serif;
    font-size: 2.4rem; color: var(--gold);
    display: block;
  }
  .stat-lbl { color: rgba(255,255,255,.8); font-size: 0.88rem; margin-top: 4px; }
  .stat-icon { color: rgba(255,255,255,.6); font-size: 1.1rem; display: block; margin-bottom: 6px; }

  /* ════════════════════════════
     SECTIONS SHARED
  ════════════════════════════ */
  .home-section { padding: 80px 0; }
  .sec-tag {
    display: inline-block;
    color: var(--green);
    font-size: 0.85rem; font-weight: 700;
    letter-spacing: .1em; text-transform: uppercase;
    margin-bottom: 10px;
  }
  .sec-title {
    font-family: 'DM Serif Display', serif;
    font-size: clamp(1.9rem, 2.8vw, 2.6rem);
    color: var(--green-dark);
    margin-bottom: 14px;
    line-height: 1.22;
    font-weight: 400;
  }
  .sec-sub { color: var(--text); font-size: 1.08rem; max-width: 600px; line-height: 1.8; }
  .sec-header { margin-bottom: 50px; }
  .sec-header.center { text-align: center; }
  .sec-header.center .sec-sub { margin: 0 auto; }
  .divider {
    width: 56px; height: 4px;
    background: linear-gradient(90deg, var(--green), var(--gold));
    border-radius: 2px; margin: 14px 0;
  }
  .sec-header.center .divider { margin: 14px auto; }

  /* ════════════════════════════
     ANNONCES & PUBLICATIONS
  ════════════════════════════ */
  .section-news { background: var(--off-white); }
  .news-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 32px;
  }
  .news-block {
    background: white;
    border-radius: 14px;
    padding: 32px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray-100);
  }
  .block-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 26px;
    padding-bottom: 14px;
    border-bottom: 3px solid var(--gold);
  }
  .block-header h3 {
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--green-dark);
    display: flex; align-items: center; gap: 10px;
  }
  .block-header h3 i { color: var(--gold); }
  .view-all-link {
    color: var(--green);
    font-size: 0.82rem;
    font-weight: 600;
    display: flex; align-items: center; gap: 5px;
    text-decoration: none;
    transition: var(--transition);
  }
  .view-all-link:hover { color: var(--gold); gap: 8px; }

  /* Announcement cards */
  .announcement-item {
    display: flex; gap: 16px;
    padding: 0; margin-bottom: 22px;
    border-radius: 12px; overflow: hidden;
    transition: var(--transition);
    border: 1px solid transparent;
  }
  .announcement-item:last-child { margin-bottom: 0; }
  .announcement-item:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow);
    border-color: var(--gray-100);
  }
  .announcement-image {
    width: 170px; height: 130px;
    flex-shrink: 0; overflow: hidden;
    border-radius: 10px; position: relative;
  }
  .announcement-image img {
    width: 100%; height: 100%;
    object-fit: cover; transition: var(--transition);
  }
  .announcement-item:hover .announcement-image img { transform: scale(1.08); }
  .announcement-content {
    flex: 1; display: flex; flex-direction: column;
    justify-content: space-between; padding: 6px 0;
  }
  .announcement-title {
    color: var(--text);
    font-size: 1rem; font-weight: 600;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color .2s;
  }
  .announcement-item:hover .announcement-title { color: var(--green); }
  .announcement-excerpt {
    color: var(--text);
    font-size: 0.92rem; line-height: 1.6;
    margin: 6px 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
  .item-meta {
    display: flex; align-items: center;
    justify-content: space-between; margin-top: auto;
  }
  .announcement-date {
    color: var(--text);
    font-size: 0.88rem;
    display: flex; align-items: center; gap: 5px;
  }
  .announcement-date i { color: var(--gold); }
  .read-more {
    color: var(--green); font-size: 0.88rem; font-weight: 600;
    display: inline-flex; align-items: center; gap: 4px;
    padding: 6px 14px;
    border: 1.5px solid var(--green);
    border-radius: 20px; text-decoration: none;
    transition: var(--transition);
  }
  .read-more:hover { background: var(--green); color: white; }

  /* Publications */
  .publication-item {
    padding: 18px 16px; margin-bottom: 14px;
    border-left: 4px solid var(--green);
    background: var(--off-white);
    border-radius: 8px; transition: var(--transition);
  }
  .publication-item:hover {
    transform: translateX(5px);
    box-shadow: var(--shadow-sm);
    background: white; border-left-color: var(--gold);
  }
  .publication-item:last-child { margin-bottom: 0; }
  .publication-title {
    color: var(--text); font-size: 0.96rem;
    font-weight: 600; line-height: 1.4;
  }
  .item-header {
    display: flex; justify-content: space-between;
    align-items: flex-start; gap: 12px; margin-bottom: 10px;
  }
  .item-badge {
    background: var(--gold); color: var(--green-dark);
    padding: 3px 10px; border-radius: 10px;
    font-size: 0.78rem; font-weight: 700; white-space: nowrap;
  }
  .publication-date {
    color: var(--text); font-size: 0.88rem;
    display: flex; align-items: center; gap: 5px;
  }
  .publication-date i { color: var(--gold); }
  .empty-state {
    text-align: center; padding: 40px;
    color: var(--text-muted); font-size: 0.9rem;
  }
  .empty-state i { font-size: 2rem; margin-bottom: 10px; display: block; opacity: .4; }

  /* ════════════════════════════
     WHY WORK WITH US
  ════════════════════════════ */
  .why-section { background: white; }
  .why-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 64px; align-items: center;
  }
  .why-img {
    border-radius: 16px; overflow: hidden;
    aspect-ratio: 4/3; position: relative;
    box-shadow: var(--shadow-lg);
  }
  .why-img img { width: 100%; height: 100%; object-fit: cover; }
  .why-badge {
    position: absolute; bottom: 24px; right: 24px;
    background: var(--gold); color: var(--green-dark);
    padding: 12px 18px; border-radius: 10px;
    font-weight: 700; font-size: 0.83rem;
    box-shadow: var(--shadow);
    display: flex; align-items: center; gap: 6px;
  }
  .why-features {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 14px; margin-top: 28px;
  }
  .why-feat {
    display: flex; gap: 12px; align-items: flex-start;
    background: var(--off-white);
    padding: 16px; border-radius: 10px;
    border-left: 3px solid var(--gray-200);
    transition: var(--transition);
  }
  .why-feat:hover { border-left-color: var(--green); transform: translateY(-2px); box-shadow: var(--shadow-sm); }
  .why-feat i { color: var(--green); font-size: 1.2rem; margin-top: 3px; flex-shrink: 0; }
  .why-feat strong { display: block; font-size: 0.96rem; color: var(--text); margin-bottom: 4px; }
  .why-feat span { font-size: 0.9rem; color: var(--text); }

  /* ════════════════════════════
     LABORATORY
  ════════════════════════════ */
  .lab-section { background: var(--off-white); }
  .lab-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 64px; align-items: center;
  }
  .lab-img {
    border-radius: 16px; overflow: hidden;
    aspect-ratio: 4/3; position: relative;
    box-shadow: var(--shadow-lg);
  }
  .lab-img img {
    width: 100%; height: 100%;
    object-fit: cover; transition: var(--transition);
  }
  .lab-img:hover img { transform: scale(1.04); }
  .lab-img .lab-badge {
    position: absolute; top: 20px; right: 20px;
    background: var(--gold); color: var(--green-dark);
    padding: 8px 16px; border-radius: 20px;
    font-weight: 700; font-size: 0.8rem;
    box-shadow: var(--shadow-sm);
  }
  .lab-text .sec-title { margin-bottom: 18px; }
  .lab-text p {
    color: var(--text); font-size: 1rem;
    line-height: 1.85; text-align: justify; margin-bottom: 24px;
  }
  .lab-features { display: grid; gap: 14px; }
  .lab-feat {
    display: flex; gap: 14px; align-items: flex-start;
    padding: 16px 18px;
    background: white; border-radius: var(--radius);
    border-left: 4px solid var(--green);
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
  }
  .lab-feat:hover { transform: translateX(5px); box-shadow: var(--shadow); }
  .lab-feat-icon {
    width: 44px; height: 44px; border-radius: 50%;
    background: var(--green-pale);
    display: flex; align-items: center; justify-content: center;
    color: var(--green); font-size: 1.2rem; flex-shrink: 0;
    transition: var(--transition);
  }
  .lab-feat:hover .lab-feat-icon { background: var(--green); color: white; }
  .lab-feat h4 { font-size: 1rem; font-weight: 600; color: var(--text); margin-bottom: 4px; }
  .lab-feat p { color: var(--text); font-size: 0.92rem; margin: 0; }

  /* ════════════════════════════
     QUALITY
  ════════════════════════════ */
  .quality-section {
    background: #f0f7f2;
    position: relative; overflow: hidden;
    border-top: 1px solid #d6eadc;
    border-bottom: 1px solid #d6eadc;
  }
  /* Motif géométrique discret en fond */
  .quality-section::before {
    content: '';
    position: absolute; inset: 0;
    background-image:
      radial-gradient(circle at 80% 20%, rgba(26,107,58,.07) 0%, transparent 50%),
      radial-gradient(circle at 10% 80%, rgba(212,160,23,.06) 0%, transparent 45%);
    pointer-events: none;
  }
  /* Bande décorative gauche */
  .quality-section::after {
    content: '';
    position: absolute; top: 0; left: 0;
    width: 5px; height: 100%;
    background: linear-gradient(to bottom, var(--green), var(--gold), var(--red));
  }
  .quality-inner { position: relative; z-index: 1; }
  .quality-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 60px; align-items: center;
  }
  .quality-text .sec-title { color: var(--green-dark); }
  .quality-text .divider { margin: 14px 0; }
  .quality-text .sec-sub { color: var(--text); max-width: 480px; font-size: 1rem; }
  .quality-badges { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 26px; }
  .q-badge {
    background: white;
    border: 1.5px solid var(--gray-200);
    color: var(--text);
    padding: 9px 18px; border-radius: 8px;
    font-size: 0.9rem; font-weight: 600;
    display: flex; align-items: center; gap: 7px;
    transition: var(--transition);
    box-shadow: var(--shadow-sm);
  }
  .q-badge:hover {
    border-color: var(--green);
    background: var(--green-pale);
    color: var(--green);
    transform: translateY(-2px);
    box-shadow: var(--shadow);
  }
  .q-badge i { color: var(--gold); }
  .quality-features { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
  .q-feat {
    background: white;
    border: 1.5px solid var(--gray-100);
    border-radius: 12px; padding: 24px 20px;
    text-align: center; transition: var(--transition);
    box-shadow: var(--shadow-sm);
    position: relative; overflow: hidden;
  }
  .q-feat::before {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, var(--green), var(--gold));
    transform: scaleX(0); transition: transform .3s ease;
  }
  .q-feat:hover::before { transform: scaleX(1); }
  .q-feat:hover { transform: translateY(-4px); box-shadow: var(--shadow); border-color: var(--gray-200); }
  .q-feat i { font-size: 1.8rem; color: var(--green); margin-bottom: 10px; display: block; }
  .q-feat strong { color: var(--green-dark); font-size: 1rem; font-weight: 700; display: block; margin-bottom: 6px; }
  .q-feat p { color: var(--text); font-size: 0.92rem; }

  /* ════════════════════════════
     SERVICES
  ════════════════════════════ */
  .services-section { background: white; }
  .services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px;
  }
  .service-card {
    background: var(--off-white); border-radius: var(--radius);
    padding: 32px 26px;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--gray-100);
    transition: var(--transition);
    position: relative; overflow: hidden;
  }
  .service-card::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, var(--green), var(--gold));
    transform: scaleX(0); transition: transform .3s ease;
  }
  .service-card:hover::before { transform: scaleX(1); }
  .service-card:hover { transform: translateY(-6px); box-shadow: var(--shadow); background: white; }
  .service-icon {
    width: 56px; height: 56px;
    background: var(--green-pale);
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.5rem; color: var(--green);
    margin-bottom: 20px; transition: var(--transition);
  }
  .service-card:hover .service-icon { background: var(--green); color: white; }
  .service-card h3 { font-size: 1.1rem; font-weight: 600; color: var(--text); margin-bottom: 10px; }
  .service-card p { color: var(--text); font-size: 0.96rem; line-height: 1.75; margin-bottom: 20px; }
  .service-link {
    display: inline-flex; align-items: center; gap: 6px;
    color: var(--green); font-size: 0.92rem; font-weight: 600;
    padding: 8px 20px;
    border: 2px solid var(--green); border-radius: 20px;
    text-decoration: none; transition: var(--transition);
  }
  .service-link:hover { background: var(--green); color: white; }

  /* ════════════════════════════
     CLIENTS
  ════════════════════════════ */
  .clients-section { background: var(--off-white); }
  .clients-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 18px;
  }
  .client-card {
    border: 2px solid var(--gray-100);
    border-radius: var(--radius);
    padding: 28px 16px; text-align: center;
    transition: var(--transition); background: white;
  }
  .client-card:hover { border-color: var(--green); transform: translateY(-5px); box-shadow: var(--shadow); }
  .client-icon {
    width: 64px; height: 64px; border-radius: 50%;
    background: var(--green-pale);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.5rem; color: var(--green);
    margin: 0 auto 14px;
    transition: var(--transition); overflow: hidden;
  }
  .client-icon img { width: 100%; height: 100%; object-fit: cover; }
  .client-card:hover .client-icon { background: var(--green); color: white; }
  .client-card h3 { font-size: 1rem; font-weight: 600; color: var(--text); line-height: 1.4; margin-bottom: 8px; }
  .client-card p { font-size: 0.92rem; color: var(--text); line-height: 1.55; }
  .client-badge {
    display: inline-block;
    background: var(--green-pale); color: var(--green);
    padding: 4px 12px; border-radius: 12px;
    font-size: 0.82rem; font-weight: 600; margin-top: 10px;
  }

  /* ════════════════════════════
     PARTNERS — Défilement continu
  ════════════════════════════ */
  .partners-section {
    background: var(--off-white);
    padding: 80px 0;
    border-top: 1px solid var(--gray-100);
  }

  /* Wrapper global avec boutons */
  .partners-carousel {
    position: relative;
    margin-top: 12px;
    padding: 0 56px;
  }

  /* Boutons prev / next */
  .partners-nav {
    position: absolute;
    top: 50%; transform: translateY(-50%);
    z-index: 20;
    width: 44px; height: 44px;
    border-radius: 50%;
    border: 1.5px solid var(--gray-200);
    background: white;
    color: var(--green-dark);
    font-size: 0.88rem;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
  }
  .partners-nav:hover {
    background: var(--green);
    border-color: var(--green);
    color: white;
    box-shadow: var(--shadow);
  }
  .partners-prev { left: 0; }
  .partners-next { right: 0; }

  /* Fenêtre masquante — fade sur les bords */
  .partners-viewport {
    overflow: hidden;
    position: relative;
  }
  .partners-viewport::before,
  .partners-viewport::after {
    content: '';
    position: absolute; top: 0; bottom: 0;
    width: 80px; z-index: 10;
    pointer-events: none;
  }
  .partners-viewport::before {
    left: 0;
    background: linear-gradient(to right, var(--off-white), transparent);
  }
  .partners-viewport::after {
    right: 0;
    background: linear-gradient(to left, var(--off-white), transparent);
  }

  /* Track — transition gérée par JS */
  .partners-track {
    display: flex;
    gap: 20px;
    width: max-content;
    will-change: transform;
  }

  /* Carte partenaire */
  .partner-card {
    background: white;
    border: 1.5px solid var(--gray-100);
    border-radius: 14px;
    padding: 28px 24px;
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    gap: 14px;
    width: 200px;
    height: 160px;
    flex-shrink: 0;
    box-shadow: var(--shadow-sm);
    transition: box-shadow .25s ease, border-color .25s ease, transform .25s ease;
  }
  .partner-card:hover {
    border-color: var(--gray-200);
    box-shadow: var(--shadow);
    transform: translateY(-4px);
  }
  .partner-logo-wrap {
    width: 100%; height: 72px;
    display: flex; align-items: center; justify-content: center;
  }
  .partner-logo-wrap img {
    max-width: 100%; max-height: 64px;
    object-fit: contain;
    filter: grayscale(20%) opacity(.82);
    transition: filter .3s ease;
  }
  .partner-card:hover .partner-logo-wrap img {
    filter: grayscale(0%) opacity(1);
  }
  .partner-name {
    font-size: 0.88rem; font-weight: 600;
    color: var(--text); text-align: center;
    letter-spacing: .04em; text-transform: uppercase;
    border-top: 1px solid var(--gray-100);
    padding-top: 10px; width: 100%;
    white-space: nowrap; overflow: hidden;
    text-overflow: ellipsis;
  }

  /* ════════════════════════════
     RESPONSIVE
  ════════════════════════════ */
  @media (max-width: 1024px) {
    .vm-strip { grid-template-columns: 1fr 1fr; }
    .vm-card.valeurs { grid-column: span 2; }
    .stats-inner { grid-template-columns: repeat(2, 1fr); }
    .why-grid, .lab-grid, .quality-grid { grid-template-columns: 1fr; gap: 40px; }
    .news-grid { grid-template-columns: 1fr; }
    .lab-grid .lab-img { order: -1; }
  }
  @media (max-width: 768px) {
    .hero-slider { height: 520px; }
    .hero-text { padding: 0 28px; }
    .hero-text h1 { font-size: 1.9rem; }
    .slider-dots-hero { left: 28px; }
    .vm-strip { grid-template-columns: 1fr; }
    .vm-card.valeurs { grid-column: auto; }
    .vm-card { padding: 22px 24px; }
    .stats-inner { grid-template-columns: repeat(2, 1fr); }
    .services-grid { grid-template-columns: 1fr; }
    .why-features { grid-template-columns: 1fr; }
    .home-section { padding: 56px 0; }
    .announcement-item { flex-direction: column; }
    .announcement-image { width: 100%; height: 180px; }
    .quality-grid { grid-template-columns: 1fr; }
    .quality-features { grid-template-columns: 1fr 1fr; }
  }
  @media (max-width: 480px) {
    .hero-slider { height: 440px; }
    .hero-text h1 { font-size: 1.55rem; }
    .hero-btns { flex-direction: column; }
    .clients-grid { grid-template-columns: repeat(2, 1fr); }
    .quality-features { grid-template-columns: 1fr; }
  }
</style>
@endsection

@section('content')

{{-- ═══════════ HERO SLIDER PLEIN ÉCRAN ═══════════ --}}
<section style="padding:0;">
  <div class="hero-wrapper">

    {{-- Slider plein écran --}}
    <div class="hero-slider" id="heroSlider">
      @forelse($actualites as $index => $actualite)
        <div class="hero-slide {{ $index === 0 ? 'active' : '' }}">
          <img src="{{ asset('storage/' . $actualite->image) }}" alt="{{ $actualite->title }}">
          <div class="hero-text">
            <span class="hero-tag"><i class="fas fa-star"></i> Actualité ABREMA</span>
            <h1>{{ $actualite->title }}</h1>
            <p>{{ Str::limit($actualite->description, 180) }}</p>
            <div class="hero-btns">
              <a href="{{ route('actualite.show', $actualite->id) }}" class="btn-primary-hero">
                <i class="fas fa-file-alt"></i> Lire plus
              </a>
              <a href="{{ route('information.actualite') }}" class="btn-outline-hero">
                <i class="fas fa-th-list"></i> Toutes les actualités
              </a>
            </div>
          </div>
        </div>
      @empty
        <div class="hero-slide active">
          <img src="{{ asset('images/abremaimage1.jpg') }}" alt="ABREMA">
          <div class="hero-text">
            <span class="hero-tag"><i class="fas fa-shield-alt"></i> Agence de Réglementation</span>
            <h1>Protéger la Santé Publique au Burundi</h1>
            <p>L'ABREMA veille à la qualité, la sûreté et l'efficacité des produits de santé disponibles sur le marché burundais, conformément aux normes OMS et EAC.</p>
            <div class="hero-btns">
              <a href="{{ route('medicament.produits') }}" class="btn-primary-hero">
                <i class="fas fa-file-alt"></i> Soumettre un Dossier
              </a>
              <a href="{{ route('about.profilabrema') }}" class="btn-outline-hero">
                <i class="fas fa-info-circle"></i> En Savoir Plus
              </a>
            </div>
          </div>
        </div>
      @endforelse

      {{-- Dots --}}
      <div class="slider-dots-hero">
        @foreach($actualites as $index => $actualite)
          <span class="dot-hero {{ $index === 0 ? 'active' : '' }}" data-idx="{{ $index }}"></span>
        @endforeach
        @if($actualites->isEmpty())
          <span class="dot-hero active" data-idx="0"></span>
        @endif
      </div>

      {{-- Arrows --}}
      <div class="hero-arrows">
        <button class="arrow-btn" id="prevBtn"><i class="fas fa-chevron-left"></i></button>
        <button class="arrow-btn" id="nextBtn"><i class="fas fa-chevron-right"></i></button>
      </div>
    </div>

    {{-- ══ VISION · MISSION · VALEURS — Bandeaux colorés ══ --}}
    <div class="vm-strip">
      <div class="vm-card vision">
        <div class="vm-icon"><i class="fas fa-eye"></i></div>
        <div class="vm-content">
          <h3>Notre Vision</h3>
          <p>Atteindre un niveau de maturité élevé de qualité de services, le maintenir et l'améliorer de façon continue.</p>
        </div>
      </div>
      <div class="vm-card mission">
        <div class="vm-icon"><i class="fas fa-bullseye"></i></div>
        <div class="vm-content">
          <h3>Notre Mission</h3>
          <p>Promouvoir et protéger la santé publique en s'assurant que les produits de santé sont de bonne qualité, sûrs et efficaces.</p>
        </div>
      </div>
      <div class="vm-card valeurs">
        <div class="vm-icon"><i class="fas fa-star"></i></div>
        <div class="vm-content">
          <h3>Nos Valeurs</h3>
          <p>Intégrité, transparence, excellence et engagement au service de la santé publique burundaise.</p>
        </div>
      </div>
    </div>

  </div>
</section>

{{-- ═══════════ STATS BAR ═══════════ --}}
<div class="stats-bar">
  <div class="stats-inner">
    <div class="stat-item">
      <i class="fas fa-pills stat-icon"></i>
      <span class="stat-num">{{ \App\Models\Produit::count() }}</span>
      <span class="stat-lbl">Médicaments Enregistrés</span>
    </div>
    <div class="stat-item">
      <i class="fas fa-users stat-icon"></i>
      <span class="stat-num">{{ $clients->count() }}</span>
      <span class="stat-lbl">Clients Servis</span>
    </div>
    <div class="stat-item">
      <i class="fas fa-globe stat-icon"></i>
      <span class="stat-num">{{ $partenaires->count() }}</span>
      <span class="stat-lbl">Partenaires</span>
    </div>
    <div class="stat-item">
      <i class="fas fa-newspaper stat-icon"></i>
      <span class="stat-num">{{ \App\Models\Actualite::count() }}</span>
      <span class="stat-lbl">Actualités Publiées</span>
    </div>
  </div>
</div>

{{-- ═══════════ ANNONCES & PUBLICATIONS ═══════════ --}}
<section class="home-section section-news">
  <div class="container-fluid">
    <div class="sec-header center">
      <span class="sec-tag">Informations & Communications</span>
      <h2 class="sec-title">Annonces & Publications</h2>
      <div class="divider"></div>
      <p class="sec-sub">Restez informés des dernières actualités et communications officielles de l'ABREMA</p>
    </div>
    <div class="news-grid">

      {{-- ANNONCES --}}
      <div class="news-block">
        <div class="block-header">
          <h3><i class="fas fa-bullhorn"></i> Annonces</h3>
          <a href="{{ route('information.actualite') }}" class="view-all-link">
            Voir tout <i class="fas fa-arrow-right"></i>
          </a>
        </div>

        @forelse($actualites->take(3) as $actualite)
          <div class="announcement-item">
            <div class="announcement-image">
              <img src="{{ asset('storage/' . $actualite->image) }}" alt="{{ $actualite->title }}">
            </div>
            <div class="announcement-content">
              <div class="announcement-title">{{ $actualite->title }}</div>
              <p class="announcement-excerpt">{{ Str::limit($actualite->description, 100) }}</p>
              <div class="item-meta">
                <span class="announcement-date">
                  <i class="far fa-calendar-alt"></i>
                  {{ $actualite->created_at->format('d M Y') }}
                </span>
                <a href="{{ route('actualite.show', $actualite->id) }}" class="read-more">
                  Lire plus <i class="fas fa-chevron-right"></i>
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="empty-state">
            <i class="fas fa-inbox"></i>
            <p>Aucune annonce pour le moment</p>
          </div>
        @endforelse
      </div>

      {{-- PUBLICATIONS --}}
      <div class="news-block">
        <div class="block-header">
          <h3><i class="fas fa-file-alt"></i> Publications</h3>
          <a href="{{ route('information.document') }}" class="view-all-link">
            Voir tout <i class="fas fa-arrow-right"></i>
          </a>
        </div>

        <div class="publication-item">
          <div class="item-header">
            <div class="publication-title">Rapport annuel 2023 – Activités de l'ABREMA</div>
            <span class="item-badge">PDF</span>
          </div>
          <div class="item-meta">
            <span class="publication-date"><i class="far fa-calendar-alt"></i> 10 mars 2024</span>
            <a href="#" class="read-more">Télécharger <i class="fas fa-download"></i></a>
          </div>
        </div>

        <div class="publication-item">
          <div class="item-header">
            <div class="publication-title">Guide de bonnes pratiques de distribution (GDP)</div>
            <span class="item-badge">PDF</span>
          </div>
          <div class="item-meta">
            <span class="publication-date"><i class="far fa-calendar-alt"></i> 25 février 2024</span>
            <a href="#" class="read-more">Télécharger <i class="fas fa-download"></i></a>
          </div>
        </div>

        <div class="publication-item">
          <div class="item-header">
            <div class="publication-title">Liste des médicaments enregistrés – Q4 2023</div>
            <span class="item-badge" style="background:#c87e4a;color:white;">PDF</span>
          </div>
          <div class="item-meta">
            <span class="publication-date"><i class="far fa-calendar-alt"></i> 18 janvier 2024</span>
            <a href="#" class="read-more">Télécharger <i class="fas fa-download"></i></a>
          </div>
        </div>

        <div class="publication-item">
          <div class="item-header">
            <div class="publication-title">Ordonnance N° 630/991 du 09/08/2023 relative à l'ABREMA</div>
            <span class="item-badge" style="background:var(--green);color:white;">LOI</span>
          </div>
          <div class="item-meta">
            <span class="publication-date"><i class="far fa-calendar-alt"></i> 09 août 2023</span>
            <a href="#" class="read-more">Télécharger <i class="fas fa-download"></i></a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

{{-- ═══════════ WHY WORK WITH US ═══════════ --}}
<section class="home-section why-section">
  <div class="container-fluid">
    <div class="why-grid">
      <div class="why-img">
        <img src="{{ asset('images/abremaimage1.jpg') }}" alt="Bâtiment ABREMA">
        <div class="why-badge"><i class="fas fa-award"></i> ISO 9001 en Cours</div>
      </div>
      <div>
        <span class="sec-tag">Pourquoi Travailler Avec Nous ?</span>
        <h2 class="sec-title">Une Institution de Confiance au Service de la Santé Publique</h2>
        <div class="divider"></div>
        <p class="sec-sub">
          L'ABREMA offre des services rapides et de qualité dans la réglementation des produits de santé,
          garantissant leur qualité, efficacité et innocuité selon les normes OMS, UA et EAC.
        </p>
        <div class="why-features">
          <div class="why-feat">
            <i class="fas fa-check-circle"></i>
            <div>
              <strong>Évaluation Rigoureuse</strong>
              <span>Processus basé sur des critères scientifiques internationaux</span>
            </div>
          </div>
          <div class="why-feat">
            <i class="fas fa-clock"></i>
            <div>
              <strong>Délais Optimisés</strong>
              <span>Procédures efficaces pour les demandes d'autorisation</span>
            </div>
          </div>
          <div class="why-feat">
            <i class="fas fa-globe"></i>
            <div>
              <strong>Normes Internationales</strong>
              <span>Conformité OMS, ICH, EAC et ISO</span>
            </div>
          </div>
          <div class="why-feat">
            <i class="fas fa-laptop"></i>
            <div>
              <strong>Services Digitalisés</strong>
              <span>ASYCUDA et ABREMA-RIMS pour plus d'accessibilité</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ LABORATORY ═══════════ --}}
<section class="home-section lab-section">
  <div class="container-fluid">
    <div class="lab-grid">
      <div class="lab-text">
        <span class="sec-tag">Contrôle Qualité</span>
        <h2 class="sec-title">Laboratoire de Contrôle Qualité</h2>
        <div class="divider"></div>
        <p>
          L'ABREMA réalise les activités de contrôle qualité des produits de santé circulant au Burundi
          en collaboration avec d'autres laboratoires de CQ nationaux et étrangers PQ-OMS. L'ABREMA dispose
          des Kits Minilab permettant de faire des screenings des médicaments importés ou produits localement
          avant leur commercialisation ou après commercialisation, afin de détecter rapidement les médicaments
          falsifiés et/ou de qualité inférieure.
        </p>
        <div class="lab-features">
          <div class="lab-feat">
            <div class="lab-feat-icon"><i class="fas fa-microscope"></i></div>
            <div>
              <h4>Analyses Physico-Chimiques</h4>
              <p>Tests approfondis sur la composition et la pureté des médicaments</p>
            </div>
          </div>
          <div class="lab-feat">
            <div class="lab-feat-icon"><i class="fas fa-search"></i></div>
            <div>
              <h4>Kits Minilab</h4>
              <p>Screening rapide des médicaments importés ou produits localement</p>
            </div>
          </div>
          <div class="lab-feat">
            <div class="lab-feat-icon"><i class="fas fa-handshake"></i></div>
            <div>
              <h4>Collaboration PQ-OMS</h4>
              <p>Partenariat avec des laboratoires internationaux préqualifiés</p>
            </div>
          </div>
        </div>
      </div>
      <div class="lab-img">
        <img src="{{ asset('images/image1.png') }}" alt="Laboratoire ABREMA">
        <span class="lab-badge"><i class="fas fa-flask"></i> Labo Certifié</span>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ QUALITY POLICY ═══════════ --}}
<section class="home-section quality-section">
  <div class="container-fluid quality-inner">
    <div class="quality-grid">
      <div class="quality-text">
        <span class="sec-tag">Politique Qualité</span>
        <h2 class="sec-title">Système de Management de la Qualité</h2>
        <div class="divider"></div>
        <p class="sec-sub">
          L'ABREMA a déjà entrepris un Système de Management de la Qualité (SMQ). Dans cette démarche qualité,
          la Direction se réfère aux normes ISO 9000, ISO 9001, ISO 9004 et ISO 26000 et s'engage à satisfaire
          les exigences des clients et des autres parties prenantes.
        </p>
        <div class="quality-badges">
          <span class="q-badge"><i class="fas fa-certificate"></i> ISO 9000</span>
          <span class="q-badge"><i class="fas fa-certificate"></i> ISO 9001</span>
          <span class="q-badge"><i class="fas fa-certificate"></i> ISO 9004</span>
          <span class="q-badge"><i class="fas fa-certificate"></i> ISO 26000</span>
          <span class="q-badge"><i class="fas fa-globe"></i> Normes OMS</span>
        </div>
      </div>
      <div class="quality-features">
        <div class="q-feat">
          <i class="fas fa-shield-alt"></i>
          <strong>100% Contrôle Qualité</strong>
          <p>Garantie de médicaments sûrs</p>
        </div>
        <div class="q-feat">
          <i class="fas fa-sync-alt"></i>
          <strong>Amélioration Continue</strong>
          <p>Processus en évolution permanente</p>
        </div>
        <div class="q-feat">
          <i class="fas fa-users-cog"></i>
          <strong>Expertise Dédiée</strong>
          <p>Équipe de spécialistes qualifiés</p>
        </div>
        <div class="q-feat">
          <i class="fas fa-handshake"></i>
          <strong>Satisfaction Clients</strong>
          <p>Engagement envers les usagers</p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ SERVICES ═══════════ --}}
<section class="home-section services-section">
  <div class="container-fluid">
    <div class="sec-header center">
      <span class="sec-tag">Fonctions Essentielles</span>
      <h2 class="sec-title">Nos Services</h2>
      <div class="divider"></div>
      <p class="sec-sub">Des services de qualité pour garantir la sécurité pharmaceutique au Burundi</p>
    </div>
    <div class="services-grid">
      <div class="service-card">
        <div class="service-icon"><i class="fas fa-certificate"></i></div>
        <h3>Enregistrement</h3>
        <p>Procédure d'homologation et d'enregistrement des médicaments à usage humain selon les normes internationales.</p>
        <a href="{{ route('medicament.produits') }}" class="service-link">Accéder <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="service-card">
        <div class="service-icon"><i class="fas fa-search"></i></div>
        <h3>Inspection</h3>
        <p>Contrôle de qualité et inspection des établissements pharmaceutiques pour garantir les bonnes pratiques.</p>
        <a href="{{ route('inspection.etablissement') }}" class="service-link">Accéder <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="service-card">
        <div class="service-icon"><i class="fas fa-exclamation-triangle"></i></div>
        <h3>Vigilance</h3>
        <p>Signalement des effets indésirables et des produits de mauvaise qualité circulant sur le marché.</p>
        <a href="{{ route('vigilance.signalement') }}" class="service-link">Accéder <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="service-card">
        <div class="service-icon"><i class="fas fa-microscope"></i></div>
        <h3>Laboratoire</h3>
        <p>Analyses et tests de contrôle qualité des médicaments en collaboration avec les laboratoires PQ-OMS.</p>
        <a href="{{ route('labocontrol.servicelabo') }}" class="service-link">Accéder <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="service-card">
        <div class="service-icon"><i class="fas fa-ship"></i></div>
        <h3>Import & Export</h3>
        <p>Gestion des autorisations d'importation et d'exportation des produits pharmaceutiques via ASYCUDA.</p>
        <a href="{{ route('importexport.demande') }}" class="service-link">Accéder <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="service-card">
        <div class="service-icon"><i class="fas fa-laptop-code"></i></div>
        <h3>Services en Ligne</h3>
        <p>Inspection des colis et services digitalisés pour faciliter les démarches administratives.</p>
        <a href="{{ route('colis.index') }}" class="service-link">Accéder <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ CLIENTS ═══════════ --}}
<section class="home-section clients-section">
  <div class="container-fluid">
    <div class="sec-header center">
      <span class="sec-tag">Nos Clients</span>
      <h2 class="sec-title">L'ABREMA au Service de Tous les Acteurs</h2>
      <div class="divider"></div>
      <p class="sec-sub">L'agence sert l'ensemble des acteurs du secteur pharmaceutique burundais</p>
    </div>
    <div class="clients-grid">
      @forelse($clients as $client)
        <div class="client-card">
          <div class="client-icon">
            @if($client->image)
              <img src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->name }}">
            @else
              <i class="fas fa-users"></i>
            @endif
          </div>
          <h3>{{ $client->name }}</h3>
          @if($client->description)
            <p>{{ Str::limit($client->description, 80) }}</p>
          @endif
          <span class="client-badge">Client ABREMA</span>
        </div>
      @empty
        <div class="client-card"><div class="client-icon"><i class="fas fa-industry"></i></div><h3>Fabricants de Médicaments</h3></div>
        <div class="client-card"><div class="client-icon"><i class="fas fa-ship"></i></div><h3>Importateurs & Distributeurs</h3></div>
        <div class="client-card"><div class="client-icon"><i class="fas fa-hospital"></i></div><h3>Hôpitaux & Cliniques</h3></div>
        <div class="client-card"><div class="client-icon"><i class="fas fa-pills"></i></div><h3>Pharmacies</h3></div>
        <div class="client-card"><div class="client-icon"><i class="fas fa-user-md"></i></div><h3>Professionnels de Santé</h3></div>
        <div class="client-card"><div class="client-icon"><i class="fas fa-flask"></i></div><h3>Laboratoires de Recherche</h3></div>
      @endforelse
    </div>
  </div>
</section>

{{-- ═══════════ PARTENAIRES ═══════════ --}}
<section class="partners-section">
  <div class="container-fluid">
    <div class="sec-header center">
      <span class="sec-tag">Nos Partenaires</span>
      <h2 class="sec-title">Partenaires Internationaux & Nationaux</h2>
      <div class="divider"></div>
      <p class="sec-sub">L'ABREMA collabore avec des institutions de référence nationales et internationales pour garantir les plus hauts standards réglementaires.</p>
    </div>

    <div class="partners-carousel">
      <button class="partners-nav partners-prev" id="partnersPrev" aria-label="Ralentir / Précédent">
        <i class="fas fa-chevron-left"></i>
      </button>

      <div class="partners-viewport">
        <div class="partners-track" id="partnersTrack">
          {{-- Cartes originales --}}
          @foreach($partenaires as $p)
            <div class="partner-card">
              <div class="partner-logo-wrap">
                <img src="{{ asset('uploads/' . $p->logo) }}" alt="{{ $p->nom }}">
              </div>
              <div class="partner-name">{{ $p->nom }}</div>
            </div>
          @endforeach
          {{-- Doublons pour boucle infinie --}}
          @foreach($partenaires as $p)
            <div class="partner-card" aria-hidden="true">
              <div class="partner-logo-wrap">
                <img src="{{ asset('uploads/' . $p->logo) }}" alt="{{ $p->nom }}">
              </div>
              <div class="partner-name">{{ $p->nom }}</div>
            </div>
          @endforeach
        </div>
      </div>

      <button class="partners-nav partners-next" id="partnersNext" aria-label="Accélérer / Suivant">
        <i class="fas fa-chevron-right"></i>
      </button>
    </div>
  </div>
</section>

@endsection

@section('scripts')
<script>
(function () {
  'use strict';

  /* ══════════════════════════════════
     HERO SLIDER
  ══════════════════════════════════ */
  const sliderEl = document.getElementById('heroSlider');
  if (sliderEl) {
    const slides  = Array.from(sliderEl.querySelectorAll('.hero-slide'));
    const dots    = Array.from(sliderEl.querySelectorAll('.dot-hero'));
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let current   = 0;
    let autoTimer = null;
    const INTERVAL = 5500;

    function goTo(index) {
      slides[current].classList.remove('active');
      if (dots[current]) dots[current].classList.remove('active');
      current = ((index % slides.length) + slides.length) % slides.length;
      slides[current].classList.add('active');
      if (dots[current]) dots[current].classList.add('active');
    }

    function startAuto() {
      if (slides.length <= 1) return;
      stopAuto();
      autoTimer = setInterval(() => goTo(current + 1), INTERVAL);
    }

    function stopAuto() {
      if (autoTimer) { clearInterval(autoTimer); autoTimer = null; }
    }

    if (prevBtn) prevBtn.addEventListener('click', () => { goTo(current - 1); stopAuto(); startAuto(); });
    if (nextBtn) nextBtn.addEventListener('click', () => { goTo(current + 1); stopAuto(); startAuto(); });

    dots.forEach((dot, i) => {
      dot.addEventListener('click', () => {
        if (i === current) return;
        goTo(i); stopAuto(); startAuto();
      });
    });

    sliderEl.addEventListener('mouseenter', stopAuto);
    sliderEl.addEventListener('mouseleave', startAuto);

    // Swipe tactile
    let touchStartX = 0;
    sliderEl.addEventListener('touchstart', e => { touchStartX = e.changedTouches[0].clientX; }, { passive: true });
    sliderEl.addEventListener('touchend', e => {
      const delta = e.changedTouches[0].clientX - touchStartX;
      if (Math.abs(delta) < 40) return;
      goTo(delta < 0 ? current + 1 : current - 1);
      stopAuto(); startAuto();
    }, { passive: true });

    startAuto();
  }

  /* ══════════════════════════════════
     PARTNERS CAROUSEL
  ══════════════════════════════════ */
  const track     = document.getElementById('partnersTrack');
  const prevP     = document.getElementById('partnersPrev');
  const nextP     = document.getElementById('partnersNext');
  const dotsWrap  = document.getElementById('partnersDots');

  /* ══════════════════════════════════
     PARTNERS — Défilement par étapes
     avec pause entre chaque avance
  ══════════════════════════════════ */
  const partnersTrack = document.getElementById('partnersTrack');
  const partnersPrev  = document.getElementById('partnersPrev');
  const partnersNext  = document.getElementById('partnersNext');
  const partnersVP    = partnersTrack ? partnersTrack.parentElement : null;

  if (partnersTrack && partnersVP) {

    // ── Config ──────────────────────────
    const PAUSE_MS   = 2500;   // pause entre chaque déplacement (ms)
    const TRANS_MS   = 600;    // durée de la transition CSS (ms)
    const CARD_W     = 220;    // largeur d'une carte (px) — doit matcher le CSS
    const GAP        = 20;     // gap entre cartes (px)
    const STEP       = 1;      // nombre de cartes avancées à chaque pas

    let currentPos   = 0;      // index de la première carte visible
    let paused       = false;  // pause manuelle (survol)
    let autoTimer    = null;

    // Nombre de cartes originales (la moitié du track — le reste sont les doublons)
    const allCards   = Array.from(partnersTrack.querySelectorAll('.partner-card'));
    const totalCards = allCards.length / 2;  // moitié = originaux

    // ── Applique la transition ──────────
    function slideTo(pos, animated) {
      const offset = pos * (CARD_W + GAP);
      partnersTrack.style.transition = animated
        ? `transform ${TRANS_MS}ms cubic-bezier(.4,0,.2,1)`
        : 'none';
      partnersTrack.style.transform  = `translateX(-${offset}px)`;
    }

    // ── Avance d'un cran ────────────────
    function advance() {
      currentPos += STEP;

      // Dès qu'on dépasse les originaux → on a atteint les doublons
      // On glisse visuellement jusqu'au doublon, puis on reset silencieusement
      if (currentPos >= totalCards) {
        slideTo(currentPos, true);

        // Après la transition : reset à la position équivalente dans les originaux
        setTimeout(() => {
          currentPos -= totalCards;
          slideTo(currentPos, false);
        }, TRANS_MS + 50);
      } else {
        slideTo(currentPos, true);
      }
    }

    // ── Recule d'un cran ────────────────
    function retreat() {
      if (currentPos <= 0) {
        // Jump silencieux vers la fin des originaux, puis recule
        currentPos = totalCards;
        slideTo(currentPos, false);
        setTimeout(() => {
          currentPos -= STEP;
          slideTo(currentPos, true);
        }, 30);
      } else {
        currentPos -= STEP;
        slideTo(currentPos, true);
      }
    }

    // ── Autoplay ────────────────────────
    function startAuto() {
      stopAuto();
      autoTimer = setInterval(() => {
        if (!paused) advance();
      }, PAUSE_MS + TRANS_MS);
    }

    function stopAuto() {
      if (autoTimer) { clearInterval(autoTimer); autoTimer = null; }
    }

    // ── Pause au survol ─────────────────
    partnersVP.addEventListener('mouseenter', () => { paused = true; });
    partnersVP.addEventListener('mouseleave', () => { paused = false; });

    // ── Boutons manuels ─────────────────
    partnersPrev.addEventListener('click', () => {
      retreat();
      stopAuto(); startAuto();
    });

    partnersNext.addEventListener('click', () => {
      advance();
      stopAuto(); startAuto();
    });

    // ── Swipe tactile ───────────────────
    let tStartX = 0;
    partnersVP.addEventListener('touchstart', e => {
      tStartX = e.changedTouches[0].clientX;
    }, { passive: true });
    partnersVP.addEventListener('touchend', e => {
      const delta = e.changedTouches[0].clientX - tStartX;
      if (Math.abs(delta) < 40) return;
      delta < 0 ? advance() : retreat();
      stopAuto(); startAuto();
    }, { passive: true });

    // ── Init ────────────────────────────
    slideTo(0, false);
    startAuto();
  }

})();
</script>
@endsection