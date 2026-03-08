@extends('layouts.base')

@section('title', 'Accueil | ')

@section('styles')
<style>
  /* ═══════════════════════════════════════
     DESIGN TOKENS – ABREMA Brand Identity
     Deep Green · Gold · White
  ═══════════════════════════════════════ */
  :root {
    --green:        #1a5c34;
    --green-dark:   #0d3d22;
    --green-light:  #256b3f;
    --green-pale:   #eaf3ee;
    --gold:         #c4a059;
    --gold-light:   #d4b570;
    --white:        #ffffff;
    --off-white:    #f8faf9;
    --gray-100:     #eeeeee;
    --gray-200:     #dddddd;
    --gray-400:     #999999;
    --text:         #1a1a1a;
    --text-muted:   #555555;
    --shadow-sm:    0 2px 8px rgba(0,0,0,.08);
    --shadow:       0 6px 24px rgba(0,0,0,.12);
    --shadow-lg:    0 16px 48px rgba(0,0,0,.16);
    --radius:       6px;
    --transition:   all 0.28s ease;
    --container:    1200px;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; font-size: 16px; }
  body { font-family: 'Poppins', sans-serif; font-size: 1rem; color: var(--text); background: white; line-height: 1.6; }
  h1,h2,h3,h4 { font-family: 'DM Serif Display', serif; font-weight: 400; }
  a { text-decoration: none; color: inherit; }
  img { max-width: 100%; }

  .container { max-width: var(--container); margin: 0 auto; padding: 0 40px; }

  /* ─── Section shared ─── */
  .section { padding: 80px 0; }
  .section-tag {
    display: block;
    color: var(--gold);
    font-size: 0.78rem; font-weight: 700;
    letter-spacing: .14em; text-transform: uppercase;
    margin-bottom: 10px; font-family: 'Poppins', sans-serif;
  }
  .section-title {
    font-size: clamp(1.9rem, 2.8vw, 2.5rem);
    color: var(--green-dark);
    line-height: 1.22;
    margin-bottom: 16px;
  }
  .divider-gold {
    width: 60px; height: 3px;
    background: var(--gold);
    margin: 18px 0;
    border: none; border-radius: 2px;
  }
  .divider-gold.center { margin: 18px auto; }
  .section-sub {
    color: var(--text-muted);
    font-size: 0.97rem; line-height: 1.85;
    max-width: 600px;
  }
  .section-header.center { text-align: center; }
  .section-header.center .section-sub { margin: 0 auto; }

  .btn-gold {
    display: inline-flex; align-items: center; gap: 8px;
    background: var(--gold); color: white;
    padding: 12px 28px;
    font-size: 0.88rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: .06em;
    transition: var(--transition);
    border: none; cursor: pointer;
  }
  .btn-gold:hover { background: var(--green-dark); transform: translateY(-2px); }

  .btn-outline {
    display: inline-flex; align-items: center; gap: 8px;
    background: transparent; color: white;
    padding: 12px 28px;
    font-size: 0.88rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: .06em;
    border: 2px solid rgba(255,255,255,.5);
    transition: var(--transition);
  }
  .btn-outline:hover { border-color: var(--gold); color: var(--gold); }

  /* ════════════════════════════
     HERO SLIDER
  ════════════════════════════ */
  .hero-slider {
    position: relative; width: 100%; height: 600px;
    overflow: hidden; background: var(--green-dark);
  }
  .hero-slide {
    position: absolute; inset: 0;
    opacity: 0; transition: opacity 1.1s ease;
    display: flex; align-items: center;
  }
  .hero-slide.active { opacity: 1; }
  .hero-slide::before {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(to right, rgba(0,0,0,.7) 0%, rgba(0,0,0,.4) 55%, rgba(0,0,0,.1) 100%);
    z-index: 1;
  }
  .hero-slide img {
    width: 100%; height: 100%; object-fit: cover;
    position: absolute; inset: 0;
    transform: scale(1.04); transition: transform 7s ease;
  }
  .hero-slide.active img { transform: scale(1); }
  .hero-content {
    position: relative; z-index: 2;
    padding: 0 60px; max-width: 680px;
  }
  .hero-tag {
    display: inline-block;
    background: var(--gold); color: white;
    font-size: 0.72rem; font-weight: 700;
    padding: 5px 16px; letter-spacing: .1em;
    text-transform: uppercase; margin-bottom: 22px;
  }
  .hero-content h1 {
    font-size: clamp(2.2rem, 4vw, 3.6rem);
    color: white; line-height: 1.15;
    margin-bottom: 20px;
    text-shadow: 0 2px 20px rgba(0,0,0,.3);
  }
  .hero-content p {
    color: rgba(255,255,255,.88);
    font-size: 1rem; line-height: 1.8;
    margin-bottom: 34px; max-width: 500px;
  }
  .hero-btns { display: flex; gap: 14px; flex-wrap: wrap; }

  /* Slider nav */
  .slider-arrow {
    position: absolute; top: 50%; transform: translateY(-50%);
    z-index: 5; width: 46px; height: 46px;
    background: rgba(255,255,255,.15);
    border: 1.5px solid rgba(255,255,255,.3);
    color: white; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.9rem; backdrop-filter: blur(6px);
    transition: var(--transition);
  }
  .slider-arrow:hover { background: var(--gold); border-color: var(--gold); }
  .slider-prev { left: 24px; }
  .slider-next { right: 24px; }
  .slider-dots {
    position: absolute; bottom: 26px; left: 50%;
    transform: translateX(-50%);
    display: flex; gap: 8px; z-index: 5;
  }
  .slider-dot {
    width: 8px; height: 8px;
    background: rgba(255,255,255,.4);
    border: none; cursor: pointer; transition: var(--transition);
  }
  .slider-dot.active { background: var(--gold); width: 28px; }

  /* ════════════════════════════
     STATS BAR
  ════════════════════════════ */
  .stats-bar {
    background: var(--green-dark);
    border-top: 3px solid var(--gold);
  }
  .stats-inner {
    display: grid; grid-template-columns: repeat(4,1fr);
  }
  .stat-item {
    text-align: center; padding: 28px 20px;
    border-right: 1px solid rgba(255,255,255,.12);
  }
  .stat-item:last-child { border-right: none; }
  .stat-icon { color: var(--gold); font-size: 1.6rem; margin-bottom: 10px; display: block; }
  .stat-num {
    font-family: 'DM Serif Display', serif;
    font-size: 2.4rem; color: white; display: block; line-height: 1;
  }
  .stat-lbl { color: rgba(255,255,255,.65); font-size: 0.85rem; margin-top: 6px; display: block; }

  /* ════════════════════════════
     À PROPOS (style "Committed to Justice")
  ════════════════════════════ */
  .about-section { background: white; }
  .about-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 70px; align-items: center;
  }
  .about-img-wrap {
    position: relative;
  }
  .about-img-main {
    width: 100%; aspect-ratio: 4/3;
    object-fit: cover;
  }
  .about-img-badge {
    position: absolute; bottom: -24px; right: -24px;
    background: var(--gold); color: white;
    padding: 20px 24px; text-align: center;
    box-shadow: var(--shadow);
  }
  .about-img-badge .num {
    font-family: 'DM Serif Display', serif;
    font-size: 2.2rem; line-height: 1; display: block;
  }
  .about-img-badge .lbl { font-size: 0.78rem; text-transform: uppercase; letter-spacing: .08em; }
  .about-text p {
    color: var(--text-muted); font-size: 0.97rem;
    line-height: 1.88; margin-bottom: 18px; text-align: justify;
  }
  .about-features { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-top: 26px; }
  .about-feat {
    display: flex; gap: 10px; align-items: flex-start;
    padding: 14px; border: 1px solid var(--gray-100);
    transition: var(--transition);
  }
  .about-feat:hover { border-color: var(--gold); background: var(--off-white); }
  .about-feat i { color: var(--gold); font-size: 1.1rem; margin-top: 3px; flex-shrink: 0; }
  .about-feat strong { display: block; font-size: 0.92rem; color: var(--green-dark); margin-bottom: 3px; font-family: 'Poppins', sans-serif; font-weight: 600; }
  .about-feat span { font-size: 0.87rem; color: var(--text-muted); }

  /* ════════════════════════════
     SERVICES (style "Practice Areas")
  ════════════════════════════ */
  .services-section { background: var(--off-white); }
  .services-grid {
    display: grid; grid-template-columns: repeat(3,1fr);
    gap: 0; border: 1px solid var(--gray-100);
  }
  .service-card {
    padding: 36px 28px; background: white;
    border-right: 1px solid var(--gray-100);
    border-bottom: 1px solid var(--gray-100);
    transition: var(--transition);
    position: relative; overflow: hidden;
  }
  .service-card::after {
    content: '';
    position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
    background: var(--gold); transform: scaleX(0);
    transition: transform .3s ease;
  }
  .service-card:hover::after { transform: scaleX(1); }
  .service-card:hover { background: var(--green-dark); }
  .service-card:hover h3, .service-card:hover p { color: white; }
  .service-card:hover .service-icon { background: rgba(255,255,255,.1); color: var(--gold); }
  .service-card:hover .service-link { color: var(--gold); border-color: var(--gold); }
  .service-icon {
    width: 60px; height: 60px;
    background: var(--green-pale);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.5rem; color: var(--green);
    margin-bottom: 20px; transition: var(--transition);
  }
  .service-card h3 { font-family: 'DM Serif Display', serif; font-size: 1.2rem; color: var(--green-dark); margin-bottom: 12px; transition: var(--transition); }
  .service-card p { color: var(--text-muted); font-size: 0.92rem; line-height: 1.75; margin-bottom: 20px; transition: var(--transition); }
  .service-link {
    font-size: 0.82rem; font-weight: 700; color: var(--green);
    text-transform: uppercase; letter-spacing: .08em;
    border-bottom: 1.5px solid var(--green); padding-bottom: 2px;
    display: inline-flex; align-items: center; gap: 6px;
    transition: var(--transition);
  }

  /* ════════════════════════════
     WHY CHOOSE US (Lab + Qualité)
  ════════════════════════════ */
  .why-section { background: white; }
  .why-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 70px; align-items: center;
  }
  .why-text .section-sub { max-width: 100%; }
  .why-text p {
    color: var(--text-muted); font-size: 0.97rem;
    line-height: 1.88; margin-bottom: 18px; text-align: justify;
  }
  .why-features { margin-top: 30px; display: grid; gap: 14px; }
  .why-feat {
    display: flex; gap: 14px; align-items: flex-start;
    padding: 18px 20px; border-left: 3px solid var(--gold);
    background: var(--off-white); transition: var(--transition);
  }
  .why-feat:hover { background: white; box-shadow: var(--shadow-sm); border-left-color: var(--green); }
  .why-feat-icon {
    width: 44px; height: 44px; flex-shrink: 0;
    background: var(--green-pale);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.2rem; color: var(--green); transition: var(--transition);
  }
  .why-feat:hover .why-feat-icon { background: var(--green); color: white; }
  .why-feat h4 { font-family: 'Poppins', sans-serif; font-size: 0.96rem; font-weight: 600; color: var(--green-dark); margin-bottom: 4px; }
  .why-feat p { color: var(--text-muted); font-size: 0.9rem; margin: 0; }
  .why-img-wrap { position: relative; }
  .why-img-main { width: 100%; aspect-ratio: 4/3; object-fit: cover; }
  .why-badge {
    position: absolute; top: 20px; left: -20px;
    background: var(--green-dark); color: white;
    padding: 16px 20px;
    font-size: 0.82rem; font-weight: 600; letter-spacing: .04em;
    display: flex; align-items: center; gap: 8px;
    box-shadow: var(--shadow);
  }
  .why-badge i { color: var(--gold); }

  /* ════════════════════════════
     QUALITY / PROCESS (plein écran)
  ════════════════════════════ */
  .quality-section {
    background: linear-gradient(135deg, var(--green-dark) 0%, var(--green-light) 100%);
    padding: 80px 0; color: white;
  }
  .quality-section .section-tag { color: var(--gold-light); }
  .quality-section .section-title { color: white; }
  .quality-section .divider-gold { background: var(--gold-light); }
  .quality-section .section-sub { color: rgba(255,255,255,.78); max-width: 100%; }
  .quality-badges { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 24px; }
  .q-badge {
    background: rgba(255,255,255,.1);
    border: 1.5px solid rgba(255,255,255,.25);
    color: white; padding: 8px 18px;
    font-size: 0.88rem; font-weight: 600;
    display: flex; align-items: center; gap: 7px;
    transition: var(--transition);
  }
  .q-badge:hover { background: var(--gold); border-color: var(--gold); }
  .q-badge i { color: var(--gold-light); }
  .quality-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: start; }
  .quality-feats { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
  .q-feat {
    background: rgba(255,255,255,.08);
    border: 1px solid rgba(255,255,255,.15);
    padding: 28px 22px; text-align: center;
    transition: var(--transition);
  }
  .q-feat:hover { background: rgba(255,255,255,.14); transform: translateY(-4px); }
  .q-feat i { font-size: 2rem; color: var(--gold-light); margin-bottom: 12px; display: block; }
  .q-feat strong { color: white; font-size: 1rem; font-family: 'Poppins', sans-serif; font-weight: 600; display: block; margin-bottom: 8px; }
  .q-feat p { color: rgba(255,255,255,.65); font-size: 0.88rem; }

  /* ════════════════════════════
     TEAM (style "Legal Experts")
  ════════════════════════════ */
  .team-section { background: var(--off-white); }
  .team-grid {
    display: grid; grid-template-columns: repeat(4,1fr); gap: 24px;
  }
  .team-card {
    background: white; overflow: hidden;
    box-shadow: var(--shadow-sm); transition: var(--transition);
    border: 1px solid var(--gray-100);
  }
  .team-card:hover { transform: translateY(-6px); box-shadow: var(--shadow); }
  .team-photo {
    width: 100%; aspect-ratio: 3/4; overflow: hidden;
    position: relative;
  }
  .team-photo img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
  .team-card:hover .team-photo img { transform: scale(1.06); }
  .team-photo-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(13,61,34,.8) 0%, transparent 55%);
    display: flex; align-items: flex-end; padding: 20px;
    opacity: 0; transition: var(--transition);
  }
  .team-card:hover .team-photo-overlay { opacity: 1; }
  .team-socials { display: flex; gap: 8px; }
  .team-socials a {
    width: 34px; height: 34px;
    background: var(--gold); color: white;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.85rem; transition: var(--transition);
  }
  .team-socials a:hover { background: white; color: var(--green-dark); }
  .team-info { padding: 20px; border-top: 2px solid var(--gold); }
  .team-info h3 { font-family: 'DM Serif Display', serif; font-size: 1.1rem; color: var(--green-dark); margin-bottom: 4px; }
  .team-info span { font-size: 0.85rem; color: var(--gold); font-weight: 600; text-transform: uppercase; letter-spacing: .06em; }

  /* ════════════════════════════
     CLIENTS (style "Testimonials")
  ════════════════════════════ */
  .clients-section {
    background: var(--green-dark);
    padding: 80px 0;
  }
  .clients-section .section-tag { color: var(--gold-light); }
  .clients-section .section-title { color: white; }
  .clients-section .divider-gold { background: var(--gold-light); }
  .clients-section .section-sub { color: rgba(255,255,255,.7); }
  .clients-grid {
    display: grid; grid-template-columns: repeat(3,1fr); gap: 24px; margin-top: 48px;
  }
  .client-card {
    background: rgba(255,255,255,.07);
    border: 1px solid rgba(255,255,255,.12);
    padding: 30px; transition: var(--transition); position: relative;
  }
  .client-card:hover { background: rgba(255,255,255,.12); transform: translateY(-4px); }
  .client-quote { color: var(--gold); font-size: 2.5rem; line-height: 1; margin-bottom: 14px; font-family: serif; }
  .client-card h3 { font-family: 'DM Serif Display', serif; font-size: 1.1rem; color: white; margin-bottom: 8px; }
  .client-card p { font-size: 0.9rem; color: rgba(255,255,255,.65); line-height: 1.7; margin-bottom: 16px; }
  .client-badge {
    display: inline-block;
    background: var(--gold); color: white;
    padding: 4px 14px; font-size: 0.78rem;
    font-weight: 700; text-transform: uppercase; letter-spacing: .08em;
  }
  .client-icon-wrap {
    width: 60px; height: 60px; overflow: hidden;
    background: rgba(255,255,255,.12);
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 18px;
  }
  .client-icon-wrap img { width: 100%; height: 100%; object-fit: cover; }
  .client-icon-wrap i { font-size: 1.6rem; color: var(--gold); }

  /* ════════════════════════════
     PUBLICATIONS (style "Awards")
  ════════════════════════════ */
  .publications-section { background: white; }
  .pub-grid {
    display: grid; grid-template-columns: repeat(3,1fr); gap: 24px;
  }
  .pub-card {
    border: 1px solid var(--gray-100);
    padding: 28px; transition: var(--transition);
    position: relative; overflow: hidden;
  }
  .pub-card::before {
    content: ''; position: absolute; top: 0; left: 0;
    width: 4px; height: 100%;
    background: var(--gold); transform: scaleY(0);
    transition: transform .3s ease; transform-origin: top;
  }
  .pub-card:hover::before { transform: scaleY(1); }
  .pub-card:hover { box-shadow: var(--shadow); transform: translateY(-4px); }
  .pub-type {
    display: inline-block;
    background: var(--gold); color: white;
    padding: 4px 12px; font-size: 0.75rem;
    font-weight: 700; text-transform: uppercase;
    letter-spacing: .08em; margin-bottom: 14px;
  }
  .pub-type.loi { background: var(--green); }
  .pub-card h3 { font-family: 'DM Serif Display', serif; font-size: 1.05rem; color: var(--green-dark); margin-bottom: 12px; line-height: 1.4; }
  .pub-card .pub-date { color: var(--gray-400); font-size: 0.85rem; display: flex; align-items: center; gap: 6px; margin-bottom: 18px; }
  .pub-card .pub-date i { color: var(--gold); }
  .pub-download {
    display: inline-flex; align-items: center; gap: 6px;
    color: var(--green); font-size: 0.85rem; font-weight: 600;
    text-transform: uppercase; letter-spacing: .06em;
    border-bottom: 1.5px solid var(--green); padding-bottom: 2px;
    transition: var(--transition);
  }
  .pub-download:hover { color: var(--gold); border-color: var(--gold); }

  /* ════════════════════════════
     ANNONCES (style "Blogs")
  ════════════════════════════ */
  .news-section { background: var(--off-white); }
  .news-grid {
    display: grid; grid-template-columns: repeat(3,1fr); gap: 28px;
  }
  .news-card {
    background: white; overflow: hidden;
    box-shadow: var(--shadow-sm); transition: var(--transition);
  }
  .news-card:hover { transform: translateY(-6px); box-shadow: var(--shadow); }
  .news-img {
    width: 100%; height: 210px; overflow: hidden; position: relative;
  }
  .news-img img { width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
  .news-card:hover .news-img img { transform: scale(1.07); }
  .news-body { padding: 24px; }
  .news-meta {
    display: flex; gap: 12px; align-items: center;
    margin-bottom: 12px; flex-wrap: wrap;
  }
  .news-date { font-size: 0.82rem; color: var(--gray-400); display: flex; align-items: center; gap: 5px; }
  .news-date i { color: var(--gold); }
  .news-body h3 { font-family: 'DM Serif Display', serif; font-size: 1.1rem; color: var(--green-dark); margin-bottom: 10px; line-height: 1.4; }
  .news-body p { color: var(--text-muted); font-size: 0.9rem; line-height: 1.7; margin-bottom: 18px; }
  .news-link {
    font-size: 0.82rem; font-weight: 700; color: var(--green);
    text-transform: uppercase; letter-spacing: .08em;
    border-bottom: 1.5px solid var(--green); padding-bottom: 2px;
    display: inline-flex; align-items: center; gap: 6px;
    transition: var(--transition);
  }
  .news-link:hover { color: var(--gold); border-color: var(--gold); gap: 10px; }

  /* ════════════════════════════
     PARTNERS
  ════════════════════════════ */
  .partners-section { background: white; padding: 70px 0; border-top: 1px solid var(--gray-100); }
  .partners-carousel { position: relative; margin-top: 40px; padding: 0 52px; }
  .partners-nav {
    position: absolute; top: 50%; transform: translateY(-50%);
    z-index: 20; width: 42px; height: 42px;
    border: 1.5px solid var(--gray-200);
    background: white; color: var(--green-dark);
    font-size: 0.88rem; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    transition: var(--transition);
  }
  .partners-nav:hover { background: var(--green); border-color: var(--green); color: white; }
  .partners-prev { left: 0; }
  .partners-next { right: 0; }
  .partners-viewport { overflow: hidden; position: relative; }
  .partners-viewport::before,
  .partners-viewport::after {
    content: ''; position: absolute; top: 0; bottom: 0;
    width: 60px; z-index: 10; pointer-events: none;
  }
  .partners-viewport::before { left: 0; background: linear-gradient(to right, white, transparent); }
  .partners-viewport::after  { right: 0; background: linear-gradient(to left, white, transparent); }
  .partners-track { display: flex; gap: 20px; width: max-content; }
  .partner-card {
    background: white; border: 1.5px solid var(--gray-100);
    padding: 22px 20px; display: flex; flex-direction: column;
    align-items: center; justify-content: center; gap: 12px;
    width: 190px; height: 140px; flex-shrink: 0;
    transition: var(--transition);
  }
  .partner-card:hover { border-color: var(--gold); box-shadow: var(--shadow-sm); transform: translateY(-3px); }
  .partner-logo-wrap { width: 100%; height: 64px; display: flex; align-items: center; justify-content: center; }
  .partner-logo-wrap img { max-width: 100%; max-height: 56px; object-fit: contain; filter: grayscale(20%) opacity(.8); transition: filter .3s; }
  .partner-card:hover .partner-logo-wrap img { filter: none; }
  .partner-name {
    font-size: 0.78rem; font-weight: 600; color: var(--text);
    text-align: center; letter-spacing: .05em; text-transform: uppercase;
    border-top: 1px solid var(--gray-100); padding-top: 8px; width: 100%;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
  }

  /* ════════════════════════════
     RESPONSIVE
  ════════════════════════════ */
  @media (max-width: 1024px) {
    .about-grid, .why-grid, .quality-grid { grid-template-columns: 1fr; gap: 40px; }
    .services-grid { grid-template-columns: repeat(2,1fr); }
    .team-grid { grid-template-columns: repeat(2,1fr); }
    .clients-grid, .pub-grid, .news-grid { grid-template-columns: repeat(2,1fr); }
    .stats-inner { grid-template-columns: repeat(2,1fr); }
  }
  @media (max-width: 768px) {
    .hero-slider { height: 520px; }
    .hero-content { padding: 0 30px; }
    .hero-content h1 { font-size: 2rem; }
    .services-grid { grid-template-columns: 1fr; }
    .team-grid { grid-template-columns: repeat(2,1fr); }
    .clients-grid, .pub-grid, .news-grid { grid-template-columns: 1fr; }
    .quality-feats { grid-template-columns: 1fr 1fr; }
    .about-features { grid-template-columns: 1fr; }
    .container { padding: 0 20px; }
  }
  @media (max-width: 480px) {
    .hero-slider { height: 440px; }
    .hero-btns { flex-direction: column; }
    .team-grid { grid-template-columns: 1fr; }
    .stats-inner { grid-template-columns: repeat(2,1fr); }
    .quality-feats { grid-template-columns: 1fr; }
  }
</style>
@endsection

@section('content')

{{-- ═══════════ HERO SLIDER ═══════════ --}}
<section style="padding:0;">
  <div class="hero-slider" id="heroSlider">
    @forelse($actualites as $index => $actualite)
      <div class="hero-slide {{ $index === 0 ? 'active' : '' }}">
        <img src="{{ asset('storage/' . $actualite->image) }}" alt="{{ $actualite->title }}">
        <div class="hero-content">
          <span class="hero-tag"><i class="fas fa-star"></i> Actualité ABREMA</span>
          <h1>{{ $actualite->title }}</h1>
          <p>{{ Str::limit($actualite->description, 180) }}</p>
          <div class="hero-btns">
            <a href="{{ route('actualite.show', $actualite->id) }}" class="btn-gold">
              <i class="fas fa-file-alt"></i> Lire plus
            </a>
            <a href="{{ route('information.actualite') }}" class="btn-outline">
              <i class="fas fa-th-list"></i> Toutes les actualités
            </a>
          </div>
        </div>
      </div>
    @empty
      <div class="hero-slide active">
        <img src="{{ asset('images/abremaimage1.jpg') }}" alt="ABREMA">
        <div class="hero-content">
          <span class="hero-tag"><i class="fas fa-shield-alt"></i> Agence de Réglementation</span>
          <h1>Protéger la Santé Publique au Burundi</h1>
          <p>L'ABREMA veille à la qualité, la sûreté et l'efficacité des produits de santé disponibles sur le marché burundais, conformément aux normes OMS et EAC.</p>
          <div class="hero-btns">
            <a href="{{ route('medicament.produits') }}" class="btn-gold"><i class="fas fa-file-alt"></i> Soumettre un Dossier</a>
            <a href="{{ route('about.profilabrema') }}" class="btn-outline"><i class="fas fa-info-circle"></i> En Savoir Plus</a>
          </div>
        </div>
      </div>
    @endforelse

    <button class="slider-arrow slider-prev" id="prevBtn"><i class="fas fa-chevron-left"></i></button>
    <button class="slider-arrow slider-next" id="nextBtn"><i class="fas fa-chevron-right"></i></button>

    <div class="slider-dots">
      @foreach($actualites as $index => $actualite)
        <button class="slider-dot {{ $index === 0 ? 'active' : '' }}" data-idx="{{ $index }}"></button>
      @endforeach
      @if($actualites->isEmpty())
        <button class="slider-dot active" data-idx="0"></button>
      @endif
    </div>
  </div>
</section>

{{-- ═══════════ STATS BAR ═══════════ --}}
<div class="stats-bar">
  <div class="container">
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
</div>

{{-- ═══════════ À PROPOS (Committed to Justice style) ═══════════ --}}
<section class="section about-section">
  <div class="container">
    <div class="about-grid">
      <div class="about-img-wrap">
        <img src="{{ asset('images/abremaimage1.jpg') }}" alt="Bâtiment ABREMA" class="about-img-main">
        <div class="about-img-badge">
          <span class="num">+10</span>
          <span class="lbl">Ans d'Expérience</span>
        </div>
      </div>
      <div class="about-text">
        <span class="section-tag">À Propos de l'ABREMA</span>
        <h2 class="section-title">Une Institution de Confiance au Service de la Santé</h2>
        <hr class="divider-gold">
        <p>
          L'ABREMA (Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments) est l'autorité nationale compétente chargée de la réglementation des médicaments et des aliments au Burundi.
        </p>
        <p>
          L'agence veille à ce que tous les produits de santé disponibles sur le marché burundais soient de bonne qualité, sûrs et efficaces, conformément aux normes OMS, UA et EAC. Elle assure la protection de la santé publique à travers des activités d'enregistrement, d'inspection, de vigilance et de contrôle qualité.
        </p>
        <div class="about-features">
          <div class="about-feat">
            <i class="fas fa-eye"></i>
            <div>
              <strong>Notre Vision</strong>
              <span>Atteindre un niveau élevé de qualité de services et l'améliorer de façon continue.</span>
            </div>
          </div>
          <div class="about-feat">
            <i class="fas fa-bullseye"></i>
            <div>
              <strong>Notre Mission</strong>
              <span>Promouvoir et protéger la santé publique en s'assurant de la qualité des produits.</span>
            </div>
          </div>
          <div class="about-feat">
            <i class="fas fa-globe"></i>
            <div>
              <strong>Normes Internationales</strong>
              <span>Conformité aux standards OMS, ICH, EAC et ISO dans tous nos processus.</span>
            </div>
          </div>
          <div class="about-feat">
            <i class="fas fa-laptop"></i>
            <div>
              <strong>Services Digitalisés</strong>
              <span>ASYCUDA et ABREMA-RIMS pour des démarches accessibles et transparentes.</span>
            </div>
          </div>
        </div>
        <div style="margin-top:30px;">
          <a href="{{ route('about.profilabrema') }}" class="btn-gold">En Savoir Plus <i class="fas fa-arrow-right"></i></a>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ SERVICES (Practice Areas style) ═══════════ --}}
<section class="section services-section">
  <div class="container">
    <div class="section-header center" style="margin-bottom:50px;">
      <span class="section-tag">Fonctions Essentielles</span>
      <h2 class="section-title">Nos Services</h2>
      <hr class="divider-gold center">
      <p class="section-sub">Des services de qualité pour garantir la sécurité pharmaceutique au Burundi</p>
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
        <p>Inspection des colis et services digitalisés pour faciliter les démarches administratives des usagers.</p>
        <a href="{{ route('colis.index') }}" class="service-link">Accéder <i class="fas fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ WHY (Laboratoire + Qualité style "Why Choose Us") ═══════════ --}}
<section class="section why-section">
  <div class="container">
    <div class="why-grid">
      <div class="why-text">
        <span class="section-tag">Contrôle & Laboratoire</span>
        <h2 class="section-title">Pourquoi Choisir l'ABREMA ?</h2>
        <hr class="divider-gold">
        <p>
          L'ABREMA réalise les activités de contrôle qualité des produits de santé circulant au Burundi
          en collaboration avec d'autres laboratoires de CQ nationaux et étrangers PQ-OMS. L'agence dispose
          des Kits Minilab permettant de faire des screenings des médicaments importés ou produits localement
          pour détecter rapidement les médicaments falsifiés et/ou de qualité inférieure.
        </p>
        <div class="why-features">
          <div class="why-feat">
            <div class="why-feat-icon"><i class="fas fa-microscope"></i></div>
            <div>
              <h4>Analyses Physico-Chimiques</h4>
              <p>Tests approfondis sur la composition et la pureté des médicaments disponibles sur le marché.</p>
            </div>
          </div>
          <div class="why-feat">
            <div class="why-feat-icon"><i class="fas fa-search"></i></div>
            <div>
              <h4>Kits Minilab</h4>
              <p>Screening rapide des médicaments importés ou produits localement avant commercialisation.</p>
            </div>
          </div>
          <div class="why-feat">
            <div class="why-feat-icon"><i class="fas fa-check-circle"></i></div>
            <div>
              <h4>Évaluation Rigoureuse</h4>
              <p>Processus basé sur des critères scientifiques et des normes internationales reconnues.</p>
            </div>
          </div>
          <div class="why-feat">
            <div class="why-feat-icon"><i class="fas fa-handshake"></i></div>
            <div>
              <h4>Collaboration PQ-OMS</h4>
              <p>Partenariat avec des laboratoires internationaux préqualifiés par l'Organisation Mondiale de la Santé.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="why-img-wrap">
        <div class="why-badge"><i class="fas fa-award"></i> ISO 9001 en Cours</div>
        <img src="{{ asset('images/image1.png') }}" alt="Laboratoire ABREMA" class="why-img-main">
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ QUALITY – SMQ (plein écran, style process) ═══════════ --}}
<section class="quality-section">
  <div class="container">
    <div class="quality-grid">
      <div>
        <span class="section-tag">Politique Qualité</span>
        <h2 class="section-title">Système de Management de la Qualité</h2>
        <hr class="divider-gold">
        <p class="section-sub">
          L'ABREMA a entrepris un Système de Management de la Qualité (SMQ). Dans cette démarche, la Direction se réfère aux normes ISO 9000, ISO 9001, ISO 9004 et ISO 26000 et s'engage à satisfaire les exigences des clients et des autres parties prenantes.
        </p>
        <div class="quality-badges">
          <span class="q-badge"><i class="fas fa-certificate"></i> ISO 9000</span>
          <span class="q-badge"><i class="fas fa-certificate"></i> ISO 9001</span>
          <span class="q-badge"><i class="fas fa-certificate"></i> ISO 9004</span>
          <span class="q-badge"><i class="fas fa-certificate"></i> ISO 26000</span>
          <span class="q-badge"><i class="fas fa-globe"></i> Normes OMS</span>
        </div>
      </div>
      <div class="quality-feats">
        <div class="q-feat">
          <i class="fas fa-shield-alt"></i>
          <strong>100% Contrôle Qualité</strong>
          <p>Garantie de médicaments sûrs pour tous les Burundais</p>
        </div>
        <div class="q-feat">
          <i class="fas fa-sync-alt"></i>
          <strong>Amélioration Continue</strong>
          <p>Processus en évolution et perfectionnement permanents</p>
        </div>
        <div class="q-feat">
          <i class="fas fa-users-cog"></i>
          <strong>Expertise Dédiée</strong>
          <p>Équipe de spécialistes qualifiés et engagés</p>
        </div>
        <div class="q-feat">
          <i class="fas fa-handshake"></i>
          <strong>Satisfaction Clients</strong>
          <p>Engagement total envers les usagers et partenaires</p>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ ÉQUIPE (Legal Experts style) ═══════════ --}}
<section class="section team-section">
  <div class="container">
    <div class="section-header center" style="margin-bottom:50px;">
      <span class="section-tag">Notre Équipe</span>
      <h2 class="section-title">Experts de l'ABREMA</h2>
      <hr class="divider-gold center">
      <p class="section-sub">Une équipe de professionnels dévoués à la réglementation des produits de santé au Burundi</p>
    </div>
    <div class="team-grid">
      <div class="team-card">
        <div class="team-photo">
          <img src="{{ asset('images/abremaimage1.jpg') }}" alt="Membre">
          <div class="team-photo-overlay">
            <div class="team-socials">
              <a href="#"><i class="fas fa-envelope"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
        <div class="team-info">
          <h3>Directeur Général</h3>
          <span>Direction</span>
        </div>
      </div>
      <div class="team-card">
        <div class="team-photo">
          <img src="{{ asset('images/abremaimage1.jpg') }}" alt="Membre">
          <div class="team-photo-overlay">
            <div class="team-socials">
              <a href="#"><i class="fas fa-envelope"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
        <div class="team-info">
          <h3>Chef Enregistrement</h3>
          <span>Médicaments</span>
        </div>
      </div>
      <div class="team-card">
        <div class="team-photo">
          <img src="{{ asset('images/abremaimage1.jpg') }}" alt="Membre">
          <div class="team-photo-overlay">
            <div class="team-socials">
              <a href="#"><i class="fas fa-envelope"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
        <div class="team-info">
          <h3>Chef Laboratoire</h3>
          <span>Contrôle Qualité</span>
        </div>
      </div>
      <div class="team-card">
        <div class="team-photo">
          <img src="{{ asset('images/abremaimage1.jpg') }}" alt="Membre">
          <div class="team-photo-overlay">
            <div class="team-socials">
              <a href="#"><i class="fas fa-envelope"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
        <div class="team-info">
          <h3>Chef Inspection</h3>
          <span>Pharmacovigilance</span>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ═══════════ CLIENTS (Testimonials style) ═══════════ --}}
<section class="clients-section">
  <div class="container">
    <div class="section-header center" style="margin-bottom:0;">
      <span class="section-tag">Nos Clients</span>
      <h2 class="section-title">L'ABREMA au Service de Tous les Acteurs</h2>
      <hr class="divider-gold center">
      <p class="section-sub">L'agence sert l'ensemble des acteurs du secteur pharmaceutique burundais</p>
    </div>
    <div class="clients-grid">
      @forelse($clients as $client)
        <div class="client-card">
          <div class="client-icon-wrap">
            @if($client->image)
              <img src="{{ asset('storage/' . $client->image) }}" alt="{{ $client->name }}">
            @else
              <i class="fas fa-users"></i>
            @endif
          </div>
          <h3>{{ $client->name }}</h3>
          @if($client->description)
            <p>{{ Str::limit($client->description, 100) }}</p>
          @endif
          <span class="client-badge">Client ABREMA</span>
        </div>
      @empty
        <div class="client-card">
          <div class="client-icon-wrap"><i class="fas fa-industry"></i></div>
          <h3>Fabricants de Médicaments</h3>
          <p>Industries pharmaceutiques opérant au Burundi soumises à la réglementation ABREMA.</p>
          <span class="client-badge">Client ABREMA</span>
        </div>
        <div class="client-card">
          <div class="client-icon-wrap"><i class="fas fa-ship"></i></div>
          <h3>Importateurs & Distributeurs</h3>
          <p>Sociétés d'importation et de distribution de produits pharmaceutiques agréées.</p>
          <span class="client-badge">Client ABREMA</span>
        </div>
        <div class="client-card">
          <div class="client-icon-wrap"><i class="fas fa-hospital"></i></div>
          <h3>Hôpitaux & Cliniques</h3>
          <p>Établissements de soins bénéficiant des services de réglementation et d'inspection.</p>
          <span class="client-badge">Client ABREMA</span>
        </div>
        <div class="client-card">
          <div class="client-icon-wrap"><i class="fas fa-pills"></i></div>
          <h3>Pharmacies</h3>
          <p>Officines pharmaceutiques soumises aux contrôles réguliers de conformité et qualité.</p>
          <span class="client-badge">Client ABREMA</span>
        </div>
        <div class="client-card">
          <div class="client-icon-wrap"><i class="fas fa-user-md"></i></div>
          <h3>Professionnels de Santé</h3>
          <p>Médecins et pharmaciens partenaires de la surveillance des médicaments sur le marché.</p>
          <span class="client-badge">Client ABREMA</span>
        </div>
        <div class="client-card">
          <div class="client-icon-wrap"><i class="fas fa-flask"></i></div>
          <h3>Laboratoires de Recherche</h3>
          <p>Institutions de recherche collaborant pour le développement de nouveaux produits.</p>
          <span class="client-badge">Client ABREMA</span>
        </div>
      @endforelse
    </div>
  </div>
</section>

{{-- ═══════════ PUBLICATIONS (Awards style) ═══════════ --}}
<section class="section publications-section">
  <div class="container">
    <div class="section-header center" style="margin-bottom:50px;">
      <span class="section-tag">Documents Officiels</span>
      <h2 class="section-title">Publications & Rapports</h2>
      <hr class="divider-gold center">
      <p class="section-sub">Accédez aux documents officiels, rapports et textes législatifs publiés par l'ABREMA</p>
    </div>
    <div class="pub-grid">
      <div class="pub-card">
        <span class="pub-type">PDF</span>
        <h3>Rapport annuel 2023 – Activités de l'ABREMA</h3>
        <p class="pub-date"><i class="far fa-calendar-alt"></i> 10 mars 2024</p>
        <a href="#" class="pub-download">Télécharger <i class="fas fa-download"></i></a>
      </div>
      <div class="pub-card">
        <span class="pub-type">PDF</span>
        <h3>Guide de bonnes pratiques de distribution (GDP)</h3>
        <p class="pub-date"><i class="far fa-calendar-alt"></i> 25 février 2024</p>
        <a href="#" class="pub-download">Télécharger <i class="fas fa-download"></i></a>
      </div>
      <div class="pub-card">
        <span class="pub-type">PDF</span>
        <h3>Liste des médicaments enregistrés – Q4 2023</h3>
        <p class="pub-date"><i class="far fa-calendar-alt"></i> 18 janvier 2024</p>
        <a href="#" class="pub-download">Télécharger <i class="fas fa-download"></i></a>
      </div>
      <div class="pub-card">
        <span class="pub-type loi">LOI</span>
        <h3>Ordonnance N° 630/991 du 09/08/2023 relative à l'ABREMA</h3>
        <p class="pub-date"><i class="far fa-calendar-alt"></i> 09 août 2023</p>
        <a href="#" class="pub-download">Télécharger <i class="fas fa-download"></i></a>
      </div>
      <div class="pub-card">
        <span class="pub-type">PDF</span>
        <h3>Rapport de surveillance post-commercialisation 2022</h3>
        <p class="pub-date"><i class="far fa-calendar-alt"></i> 15 juin 2023</p>
        <a href="#" class="pub-download">Télécharger <i class="fas fa-download"></i></a>
      </div>
      <div class="pub-card">
        <span class="pub-type loi">LOI</span>
        <h3>Loi N° 1/18 du 19/09/2014 portant réglementation pharmaceutique</h3>
        <p class="pub-date"><i class="far fa-calendar-alt"></i> 19 septembre 2014</p>
        <a href="#" class="pub-download">Télécharger <i class="fas fa-download"></i></a>
      </div>
    </div>
    <div style="text-align:center;margin-top:40px;">
      <a href="{{ route('information.document') }}" class="btn-gold">Voir Toutes les Publications <i class="fas fa-arrow-right"></i></a>
    </div>
  </div>
</section>

{{-- ═══════════ ANNONCES / ACTUALITÉS (Blog style) ═══════════ --}}
<section class="section news-section">
  <div class="container">
    <div class="section-header center" style="margin-bottom:50px;">
      <span class="section-tag">Informations & Communications</span>
      <h2 class="section-title">Dernières Annonces</h2>
      <hr class="divider-gold center">
      <p class="section-sub">Restez informés des dernières actualités et communications officielles de l'ABREMA</p>
    </div>
    <div class="news-grid">
      @forelse($actualites->take(3) as $actualite)
        <div class="news-card">
          <div class="news-img">
            <img src="{{ asset('storage/' . $actualite->image) }}" alt="{{ $actualite->title }}">
          </div>
          <div class="news-body">
            <div class="news-meta">
              <span class="news-date"><i class="far fa-calendar-alt"></i> {{ $actualite->created_at->format('d M Y') }}</span>
            </div>
            <h3>{{ $actualite->title }}</h3>
            <p>{{ Str::limit($actualite->description, 110) }}</p>
            <a href="{{ route('actualite.show', $actualite->id) }}" class="news-link">Lire plus <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      @empty
        <div class="news-card">
          <div class="news-img"><img src="{{ asset('images/abremaimage1.jpg') }}" alt="Actualité"></div>
          <div class="news-body">
            <div class="news-meta"><span class="news-date"><i class="far fa-calendar-alt"></i> 01 Jan 2024</span></div>
            <h3>Bienvenue sur le site de l'ABREMA</h3>
            <p>Découvrez tous les services et actualités de l'Autorité Burundaise de Régulation des Médicaments.</p>
            <a href="{{ route('information.actualite') }}" class="news-link">Lire plus <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="news-card">
          <div class="news-img"><img src="{{ asset('images/abremaimage1.jpg') }}" alt="Actualité"></div>
          <div class="news-body">
            <div class="news-meta"><span class="news-date"><i class="far fa-calendar-alt"></i> 15 Jan 2024</span></div>
            <h3>Nouvelles procédures d'enregistrement 2024</h3>
            <p>L'ABREMA annonce la mise à jour de ses procédures d'enregistrement des médicaments pour 2024.</p>
            <a href="{{ route('information.actualite') }}" class="news-link">Lire plus <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="news-card">
          <div class="news-img"><img src="{{ asset('images/abremaimage1.jpg') }}" alt="Actualité"></div>
          <div class="news-body">
            <div class="news-meta"><span class="news-date"><i class="far fa-calendar-alt"></i> 20 Jan 2024</span></div>
            <h3>Campagne de sensibilisation aux médicaments falsifiés</h3>
            <p>L'ABREMA lance une campagne nationale de sensibilisation contre les médicaments de mauvaise qualité.</p>
            <a href="{{ route('information.actualite') }}" class="news-link">Lire plus <i class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      @endforelse
    </div>
    <div style="text-align:center;margin-top:44px;">
      <a href="{{ route('information.actualite') }}" class="btn-gold">Toutes les Annonces <i class="fas fa-arrow-right"></i></a>
    </div>
  </div>
</section>

{{-- ═══════════ PARTENAIRES ═══════════ --}}
<section class="partners-section">
  <div class="container">
    <div class="section-header center" style="margin-bottom:0;">
      <span class="section-tag">Nos Partenaires</span>
      <h2 class="section-title">Partenaires Internationaux & Nationaux</h2>
      <hr class="divider-gold center">
      <p class="section-sub">L'ABREMA collabore avec des institutions de référence nationales et internationales pour garantir les plus hauts standards réglementaires.</p>
    </div>
    <div class="partners-carousel">
      <button class="partners-nav partners-prev" id="partnersPrev"><i class="fas fa-chevron-left"></i></button>
      <div class="partners-viewport">
        <div class="partners-track" id="partnersTrack">
          @foreach($partenaires as $p)
            <div class="partner-card">
              <div class="partner-logo-wrap">
                <img src="{{ asset('uploads/' . $p->logo) }}" alt="{{ $p->nom }}">
              </div>
              <div class="partner-name">{{ $p->nom }}</div>
            </div>
          @endforeach
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
      <button class="partners-nav partners-next" id="partnersNext"><i class="fas fa-chevron-right"></i></button>
    </div>
  </div>
</section>

@endsection

@section('scripts')
<script>
(function () {
  'use strict';

  /* ── HERO SLIDER ── */
  const sliderEl = document.getElementById('heroSlider');
  if (sliderEl) {
    const slides  = Array.from(sliderEl.querySelectorAll('.hero-slide'));
    const dots    = Array.from(sliderEl.querySelectorAll('.slider-dot'));
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
    function stopAuto() { if (autoTimer) { clearInterval(autoTimer); autoTimer = null; } }

    if (prevBtn) prevBtn.addEventListener('click', () => { goTo(current - 1); stopAuto(); startAuto(); });
    if (nextBtn) nextBtn.addEventListener('click', () => { goTo(current + 1); stopAuto(); startAuto(); });
    dots.forEach((dot, i) => dot.addEventListener('click', () => { goTo(i); stopAuto(); startAuto(); }));
    sliderEl.addEventListener('mouseenter', stopAuto);
    sliderEl.addEventListener('mouseleave', startAuto);

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

  /* ── PARTNERS CAROUSEL ── */
  const partnersTrack = document.getElementById('partnersTrack');
  const partnersPrev  = document.getElementById('partnersPrev');
  const partnersNext  = document.getElementById('partnersNext');
  const partnersVP    = partnersTrack ? partnersTrack.parentElement : null;

  if (partnersTrack && partnersVP) {
    const PAUSE_MS   = 2500;
    const TRANS_MS   = 600;
    const CARD_W     = 210;
    const GAP        = 20;
    const STEP       = 1;
    let currentPos   = 0;
    let paused       = false;
    let autoTimer    = null;
    const allCards   = Array.from(partnersTrack.querySelectorAll('.partner-card'));
    const totalCards = allCards.length / 2;

    function slideTo(pos, animated) {
      const offset = pos * (CARD_W + GAP);
      partnersTrack.style.transition = animated ? `transform ${TRANS_MS}ms cubic-bezier(.4,0,.2,1)` : 'none';
      partnersTrack.style.transform  = `translateX(-${offset}px)`;
    }
    function advance() {
      currentPos += STEP;
      if (currentPos >= totalCards) {
        slideTo(currentPos, true);
        setTimeout(() => { currentPos -= totalCards; slideTo(currentPos, false); }, TRANS_MS + 50);
      } else { slideTo(currentPos, true); }
    }
    function retreat() {
      if (currentPos <= 0) {
        currentPos = totalCards; slideTo(currentPos, false);
        setTimeout(() => { currentPos -= STEP; slideTo(currentPos, true); }, 30);
      } else { currentPos -= STEP; slideTo(currentPos, true); }
    }
    function startAuto() { stopAuto(); autoTimer = setInterval(() => { if (!paused) advance(); }, PAUSE_MS + TRANS_MS); }
    function stopAuto()  { if (autoTimer) { clearInterval(autoTimer); autoTimer = null; } }

    partnersVP.addEventListener('mouseenter', () => { paused = true; });
    partnersVP.addEventListener('mouseleave', () => { paused = false; });
    partnersPrev.addEventListener('click', () => { retreat(); stopAuto(); startAuto(); });
    partnersNext.addEventListener('click', () => { advance(); stopAuto(); startAuto(); });

    let tStartX = 0;
    partnersVP.addEventListener('touchstart', e => { tStartX = e.changedTouches[0].clientX; }, { passive: true });
    partnersVP.addEventListener('touchend', e => {
      const delta = e.changedTouches[0].clientX - tStartX;
      if (Math.abs(delta) < 40) return;
      delta < 0 ? advance() : retreat();
      stopAuto(); startAuto();
    }, { passive: true });

    slideTo(0, false);
    startAuto();
  }

})();
</script>
@endsection