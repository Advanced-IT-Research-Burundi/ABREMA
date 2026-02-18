<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ABREMA | Agence Burundaise de Réglementation des Médicaments</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
:root {
  --green: #2d6a4f;
  --green-light: #40916c;
  --green-dark: #1b4332;
  --green-pale: #d8f3dc;
  --gold: #e9c46a;
  --white: #ffffff;
  --gray-50: #f8faf9;
  --gray-100: #eef2ef;
  --gray-200: #d1dbd4;
  --text: #1a2e1e;
  --text-light: #4a6355;
  --shadow: 0 4px 20px rgba(45,106,79,0.12);
  --shadow-lg: 0 12px 40px rgba(45,106,79,0.18);
  --radius: 12px;
  --transition: all 0.3s ease;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
html { scroll-behavior: smooth; }
body {
  font-family: 'DM Sans', sans-serif;
  color: var(--text);
  background: var(--white);
  overflow-x: hidden;
}

/* ── TOP BAR ── */
.topbar {
  background: var(--green-dark);
  color: rgba(255,255,255,.75);
  padding: 8px 0;
  font-size: 0.82rem;
}
.topbar-inner {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 8px;
}
.topbar-left { display: flex; gap: 20px; align-items: center; }
.topbar-left span { display: flex; align-items: center; gap: 6px; }
.topbar-left i { color: var(--gold); }
.topbar-right { display: flex; gap: 12px; }
.topbar-right a { color: rgba(255,255,255,.7); font-size: 0.8rem; transition: color 0.2s; }
.topbar-right a:hover { color: var(--gold); }

/* ── NAVBAR ── */
nav {
  background: white;
  box-shadow: 0 2px 20px rgba(0,0,0,.08);
  position: sticky;
  top: 0;
  z-index: 100;
}
.nav-inner {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 30px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  height: 72px;
}
.logo {
  display: flex;
  align-items: center;
  gap: 12px;
  text-decoration: none;
}
.logo-icon {
  width: 46px; height: 46px;
  background: var(--green);
  border-radius: 10px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.4rem; color: white;
}
.logo-text { line-height: 1.1; }
.logo-text strong { display: block; font-size: 1.15rem; color: var(--green-dark); font-weight: 700; }
.logo-text small { font-size: 0.7rem; color: var(--text-light); letter-spacing: .04em; }
.nav-links { display: flex; gap: 4px; align-items: center; list-style: none; }
.nav-links a {
  display: flex; align-items: center; gap: 5px;
  padding: 8px 14px; border-radius: 8px;
  color: var(--text); text-decoration: none; font-size: 0.9rem; font-weight: 500;
  transition: var(--transition);
}
.nav-links a:hover, .nav-links a.active { background: var(--green-pale); color: var(--green); }
.nav-links a i { font-size: 0.75rem; opacity: .6; }
.nav-cta {
  background: var(--green);
  color: white !important;
  padding: 9px 22px !important;
  border-radius: 8px !important;
  font-weight: 600 !important;
}
.nav-cta:hover { background: var(--green-dark) !important; color: white !important; transform: translateY(-1px); box-shadow: var(--shadow); }

/* ── HERO ── */
.hero {
  display: grid;
  grid-template-columns: 1fr 380px;
  min-height: 580px;
}
.hero-slider {
  position: relative;
  overflow: hidden;
  background: var(--green-dark);
}
.hero-slide {
  position: absolute; inset: 0;
  opacity: 0; transition: opacity 1s ease;
  display: flex;
  align-items: flex-end;
}
.hero-slide.active { opacity: 1; }
.hero-slide::before {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(27,67,50,.92) 0%, rgba(45,106,79,.6) 60%, transparent 100%);
  z-index: 1;
}
.hero-slide img {
  width: 100%; height: 100%;
  object-fit: cover;
  position: absolute; inset: 0;
}
.hero-text {
  position: relative; z-index: 2;
  padding: 60px 50px;
  max-width: 640px;
}
.hero-tag {
  display: inline-block;
  background: var(--gold);
  color: var(--green-dark);
  font-size: 0.75rem;
  font-weight: 700;
  padding: 5px 14px;
  border-radius: 20px;
  margin-bottom: 18px;
  letter-spacing: .05em;
  text-transform: uppercase;
}
.hero-text h1 {
  font-family: 'Playfair Display', serif;
  font-size: clamp(1.8rem, 3vw, 2.8rem);
  color: white;
  line-height: 1.2;
  margin-bottom: 14px;
  font-weight: 800;
}
.hero-text p {
  color: rgba(255,255,255,.82);
  font-size: 1rem;
  line-height: 1.7;
  margin-bottom: 28px;
  max-width: 480px;
}
.hero-btns { display: flex; gap: 12px; flex-wrap: wrap; }
.btn-primary {
  background: var(--gold);
  color: var(--green-dark);
  padding: 12px 28px;
  border-radius: 8px;
  font-weight: 700;
  font-size: 0.9rem;
  text-decoration: none;
  transition: var(--transition);
  display: inline-flex; align-items: center; gap: 8px;
}
.btn-primary:hover { background: #f4d03f; transform: translateY(-2px); box-shadow: 0 8px 24px rgba(233,196,106,.4); }
.btn-outline {
  background: transparent;
  color: white;
  padding: 12px 28px;
  border-radius: 8px;
  font-weight: 600;
  font-size: 0.9rem;
  text-decoration: none;
  border: 2px solid rgba(255,255,255,.5);
  transition: var(--transition);
  display: inline-flex; align-items: center; gap: 8px;
}
.btn-outline:hover { border-color: white; background: rgba(255,255,255,.1); }

/* Slider controls */
.slider-dots {
  position: absolute;
  bottom: 24px; left: 50px;
  display: flex; gap: 8px;
  z-index: 5;
}
.dot {
  width: 8px; height: 8px;
  border-radius: 4px;
  background: rgba(255,255,255,.4);
  cursor: pointer;
  transition: var(--transition);
}
.dot.active { background: var(--gold); width: 28px; }
.hero-arrows {
  position: absolute;
  bottom: 24px; right: 30px;
  display: flex; gap: 8px;
  z-index: 5;
}
.arrow-btn {
  width: 40px; height: 40px;
  border-radius: 50%;
  border: none;
  background: rgba(255,255,255,.15);
  color: white;
  cursor: pointer;
  font-size: 0.9rem;
  backdrop-filter: blur(4px);
  transition: var(--transition);
  display: flex; align-items: center; justify-content: center;
}
.arrow-btn:hover { background: var(--gold); color: var(--green-dark); }

/* ── HERO SIDEBAR ── */
.hero-sidebar {
  background: var(--gray-50);
  border-left: 3px solid var(--green-pale);
  display: flex;
  flex-direction: column;
  padding: 30px 28px;
  gap: 20px;
  justify-content: center;
}
.vm-block {
  background: white;
  border-radius: var(--radius);
  padding: 26px;
  box-shadow: var(--shadow);
  border-left: 4px solid var(--green);
  transition: var(--transition);
}
.vm-block:last-child { border-left-color: var(--gold); }
.vm-block:hover { transform: translateX(4px); box-shadow: var(--shadow-lg); }
.vm-label {
  display: flex; align-items: center; gap: 10px;
  margin-bottom: 12px;
}
.vm-label i { color: var(--green); font-size: 1.2rem; }
.vm-label h3 { font-size: 1.1rem; font-weight: 700; color: var(--green-dark); }
.vm-block p { color: var(--text-light); font-size: 0.92rem; line-height: 1.65; }

/* ── STATS BAR ── */
.stats-bar {
  background: var(--green);
  padding: 28px 0;
}
.stats-inner {
  max-width: 1280px; margin: 0 auto; padding: 0 30px;
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
}
.stat {
  text-align: center;
  border-right: 1px solid rgba(255,255,255,.2);
  padding: 0 20px;
}
.stat:last-child { border-right: none; }
.stat-num {
  font-family: 'Playfair Display', serif;
  font-size: 2.2rem;
  font-weight: 800;
  color: var(--gold);
  display: block;
}
.stat-label { color: rgba(255,255,255,.8); font-size: 0.85rem; margin-top: 4px; }

/* ── SECTION SHARED ── */
section { padding: 80px 0; }
.container { max-width: 1280px; margin: 0 auto; padding: 0 30px; }
.sec-tag {
  display: inline-block;
  color: var(--green);
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: .08em;
  text-transform: uppercase;
  margin-bottom: 10px;
}
.sec-title {
  font-family: 'Playfair Display', serif;
  font-size: clamp(1.6rem, 2.5vw, 2.2rem);
  font-weight: 700;
  color: var(--green-dark);
  margin-bottom: 14px;
  line-height: 1.25;
}
.sec-sub { color: var(--text-light); font-size: 1rem; max-width: 600px; line-height: 1.7; }
.sec-header { margin-bottom: 50px; }
.sec-header.center { text-align: center; }
.sec-header.center .sec-sub { margin: 0 auto; }
.divider {
  width: 60px; height: 4px;
  background: linear-gradient(90deg, var(--green), var(--gold));
  border-radius: 2px;
  margin: 14px 0;
}
.sec-header.center .divider { margin: 14px auto; }

/* ── SERVICES (info sections) ── */
.info-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 28px;
}
.info-card {
  background: white;
  border-radius: var(--radius);
  padding: 32px 28px;
  box-shadow: var(--shadow);
  border: 1px solid var(--gray-100);
  transition: var(--transition);
  position: relative;
  overflow: hidden;
}
.info-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 3px;
  background: linear-gradient(90deg, var(--green), var(--gold));
  transform: scaleX(0);
  transition: transform .3s ease;
}
.info-card:hover::before { transform: scaleX(1); }
.info-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-lg); }
.info-icon {
  width: 56px; height: 56px;
  background: var(--green-pale);
  border-radius: 14px;
  display: flex; align-items: center; justify-content: center;
  font-size: 1.5rem;
  color: var(--green);
  margin-bottom: 20px;
  transition: var(--transition);
}
.info-card:hover .info-icon { background: var(--green); color: white; }
.info-card h3 { font-size: 1.1rem; font-weight: 700; color: var(--green-dark); margin-bottom: 12px; }
.info-card p { color: var(--text-light); font-size: 0.9rem; line-height: 1.7; }
.card-num {
  position: absolute;
  top: 20px; right: 22px;
  font-family: 'Playfair Display', serif;
  font-size: 3rem;
  font-weight: 800;
  color: var(--gray-100);
  line-height: 1;
}

/* ── WHY US ── */
.why-section { background: var(--gray-50); }
.why-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
.why-img {
  border-radius: 16px;
  overflow: hidden;
  aspect-ratio: 4/3;
  background: var(--green-pale);
  display: flex; align-items: center; justify-content: center;
  font-size: 5rem;
  color: var(--green);
  box-shadow: var(--shadow-lg);
  position: relative;
}
.why-img img { width: 100%; height: 100%; object-fit: cover; }
.why-badge {
  position: absolute;
  bottom: 24px; right: 24px;
  background: var(--gold);
  color: var(--green-dark);
  padding: 12px 20px;
  border-radius: 10px;
  font-weight: 700;
  font-size: 0.85rem;
  box-shadow: var(--shadow);
}
.why-features { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 28px; }
.why-feat {
  display: flex; gap: 12px; align-items: flex-start;
  background: white; padding: 16px; border-radius: 10px;
  box-shadow: 0 2px 8px rgba(0,0,0,.05);
  transition: var(--transition);
}
.why-feat:hover { transform: translateY(-3px); box-shadow: var(--shadow); }
.why-feat i { color: var(--green); font-size: 1.2rem; margin-top: 2px; flex-shrink: 0; }
.why-feat div { }
.why-feat strong { display: block; font-size: 0.9rem; color: var(--text); margin-bottom: 3px; }
.why-feat span { font-size: 0.82rem; color: var(--text-light); }

/* ── CLIENTS ── */
.clients-section { background: white; }
.clients-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
  gap: 20px;
}
.client-card {
  border: 2px solid var(--gray-100);
  border-radius: var(--radius);
  padding: 24px 16px;
  text-align: center;
  transition: var(--transition);
  cursor: default;
}
.client-card:hover {
  border-color: var(--green);
  transform: translateY(-6px);
  box-shadow: var(--shadow);
}
.client-icon {
  width: 52px; height: 52px;
  border-radius: 50%;
  background: var(--green-pale);
  display: flex; align-items: center; justify-content: center;
  font-size: 1.4rem;
  color: var(--green);
  margin: 0 auto 14px;
  transition: var(--transition);
}
.client-card:hover .client-icon { background: var(--green); color: white; }
.client-card h3 { font-size: 0.9rem; font-weight: 700; color: var(--text); line-height: 1.3; }

/* ── PARTNERS ── */
.partners-section { background: var(--gray-50); padding: 60px 0; }
.partners-track-wrap {
  overflow: hidden;
  position: relative;
  margin: 0 -30px;
  padding: 10px 0;
}
.partners-track {
  display: flex;
  gap: 24px;
  animation: marquee 18s linear infinite;
  width: max-content;
}
.partners-track:hover { animation-play-state: paused; }
@keyframes marquee {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}
.partner-box {
  min-width: 220px;
  height: 110px;
  background: white;
  border-radius: var(--radius);
  display: flex; align-items: center; justify-content: center;
  box-shadow: var(--shadow);
  padding: 20px;
  flex-shrink: 0;
}
.partner-box img { max-width: 100%; max-height: 60px; object-fit: contain; filter: grayscale(30%); transition: filter .3s; }
.partner-box:hover img { filter: grayscale(0%); }

/* ── QUALITY ── */
.quality-section {
  background: linear-gradient(135deg, var(--green-dark) 0%, var(--green) 100%);
  position: relative;
  overflow: hidden;
}
.quality-section::before {
  content: '';
  position: absolute; inset: 0;
  background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.quality-inner { position: relative; z-index: 1; }
.quality-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
.quality-text .sec-title { color: white; }
.quality-text .sec-sub { color: rgba(255,255,255,.8); max-width: 480px; }
.quality-badges { display: flex; flex-wrap: wrap; gap: 12px; margin-top: 28px; }
.q-badge {
  background: rgba(255,255,255,.12);
  backdrop-filter: blur(8px);
  border: 1px solid rgba(255,255,255,.2);
  color: white;
  padding: 10px 18px;
  border-radius: 8px;
  font-size: 0.85rem;
  font-weight: 600;
  display: flex; align-items: center; gap: 8px;
  transition: var(--transition);
}
.q-badge:hover { background: rgba(255,255,255,.22); }
.q-badge i { color: var(--gold); }
.quality-features { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.q-feat {
  background: rgba(255,255,255,.08);
  border: 1px solid rgba(255,255,255,.12);
  border-radius: 12px;
  padding: 22px;
  text-align: center;
  transition: var(--transition);
}
.q-feat:hover { background: rgba(255,255,255,.15); transform: translateY(-3px); }
.q-feat i { font-size: 1.8rem; color: var(--gold); margin-bottom: 10px; display: block; }
.q-feat strong { color: white; font-size: 0.9rem; font-weight: 700; display: block; margin-bottom: 6px; }
.q-feat p { color: rgba(255,255,255,.7); font-size: 0.82rem; }

/* ── FOOTER ── */
footer {
  background: var(--green-dark);
  color: rgba(255,255,255,.75);
  padding: 60px 0 0;
}
.footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 50px; }
.footer-about p { font-size: 0.88rem; line-height: 1.7; margin: 16px 0 24px; max-width: 280px; }
.footer-logo { display: flex; align-items: center; gap: 12px; text-decoration: none; }
.footer-logo .logo-icon { background: rgba(255,255,255,.12); }
.footer-logo span { color: white; font-weight: 700; font-size: 1.1rem; }
.footer-social { display: flex; gap: 10px; }
.social-icon {
  width: 36px; height: 36px;
  border-radius: 8px;
  background: rgba(255,255,255,.1);
  display: flex; align-items: center; justify-content: center;
  color: white; font-size: 0.85rem;
  text-decoration: none;
  transition: var(--transition);
}
.social-icon:hover { background: var(--gold); color: var(--green-dark); }
.footer-col h4 { color: white; font-size: 0.95rem; font-weight: 700; margin-bottom: 18px; }
.footer-col ul { list-style: none; }
.footer-col ul li { margin-bottom: 10px; }
.footer-col ul li a { color: rgba(255,255,255,.65); text-decoration: none; font-size: 0.87rem; transition: color .2s; display: flex; align-items: center; gap: 8px; }
.footer-col ul li a i { font-size: 0.75rem; color: var(--gold); }
.footer-col ul li a:hover { color: var(--gold); }
.footer-bottom {
  border-top: 1px solid rgba(255,255,255,.1);
  padding: 20px 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 0.82rem;
  color: rgba(255,255,255,.5);
  flex-wrap: wrap;
  gap: 10px;
}

/* ── RESPONSIVE ── */
@media (max-width: 1024px) {
  .hero { grid-template-columns: 1fr; }
  .hero-sidebar { flex-direction: row; gap: 16px; }
  .vm-block { flex: 1; }
  .stats-inner { grid-template-columns: repeat(2, 1fr); }
  .why-grid, .quality-grid { grid-template-columns: 1fr; gap: 40px; }
  .footer-grid { grid-template-columns: 1fr 1fr; }
}
@media (max-width: 768px) {
  .topbar-left { display: none; }
  .nav-links { display: none; }
  .hero-text { padding: 40px 24px; }
  .hero-text h1 { font-size: 1.6rem; }
  .hero-sidebar { flex-direction: column; padding: 24px; }
  .stats-inner { grid-template-columns: repeat(2, 1fr); }
  .stat { border-right: none; border-bottom: 1px solid rgba(255,255,255,.2); padding-bottom: 16px; }
  .info-grid { grid-template-columns: 1fr; }
  .why-features { grid-template-columns: 1fr; }
  .quality-features { grid-template-columns: 1fr 1fr; }
  .footer-grid { grid-template-columns: 1fr; }
  .footer-bottom { justify-content: center; text-align: center; }
  section { padding: 56px 0; }
}
</style>
</head>
<body>

<!-- TOP BAR -->
<div class="topbar">
  <div class="topbar-inner">
    <div class="topbar-left">
      <span><i class="fas fa-map-marker-alt"></i> Avenue de l'OUA, Bujumbura – Burundi</span>
      <span><i class="fas fa-envelope"></i> info@abrema.gov.bi</span>
      <span><i class="fas fa-clock"></i> Lun – Ven : 7h30 – 17h00</span>
    </div>
    <div class="topbar-right">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-linkedin-in"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
    </div>
  </div>
</div>

<!-- NAVBAR -->
<nav>
  <div class="nav-inner">
    <a href="#" class="logo">
      <div class="logo-icon"><i class="fas fa-shield-alt"></i></div>
      <div class="logo-text">
        <strong>ABREMA</strong>
        <small>Réglementation des Médicaments</small>
      </div>
    </a>
    <ul class="nav-links">
      <li><a href="#" class="active">Accueil</a></li>
      <li><a href="#">À Propos <i class="fas fa-chevron-down"></i></a></li>
      <li><a href="#">Services <i class="fas fa-chevron-down"></i></a></li>
      <li><a href="#">Réglementation <i class="fas fa-chevron-down"></i></a></li>
      <li><a href="#">Actualités</a></li>
      <li><a href="#">Partenaires</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="#" class="nav-cta">Soumettre un Dossier</a></li>
    </ul>
  </div>
</nav>

<!-- HERO -->
<section style="padding:0;">
  <div class="hero">
    <!-- SLIDER -->
    <div class="hero-slider" id="heroSlider">
      <div class="hero-slide active">
        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1200&q=80" alt="Slide 1">
        <div class="hero-text">
          <span class="hero-tag"><i class="fas fa-star"></i> Agence de Réglementation</span>
          <h1>Protéger la Santé Publique au Burundi</h1>
          <p>L'ABREMA veille à la qualité, la sûreté et l'efficacité des produits de santé disponibles sur le marché burundais, conformément aux normes OMS et EAC.</p>
          <div class="hero-btns">
            <a href="#" class="btn-primary"><i class="fas fa-file-alt"></i> Soumettre un Dossier</a>
            <a href="#" class="btn-outline"><i class="fas fa-play-circle"></i> En Savoir Plus</a>
          </div>
        </div>
      </div>
      <div class="hero-slide">
        <img src="https://images.unsplash.com/photo-1587854692152-cbe660dbde88?w=1200&q=80" alt="Slide 2">
        <div class="hero-text">
          <span class="hero-tag"><i class="fas fa-flask"></i> Contrôle Qualité</span>
          <h1>Laboratoire de Contrôle de Qualité des Médicaments</h1>
          <p>Nous réalisons le contrôle qualité des produits de santé en collaboration avec des laboratoires nationaux et internationaux préqualifiés par l'OMS.</p>
          <div class="hero-btns">
            <a href="#" class="btn-primary"><i class="fas fa-microscope"></i> Nos Analyses</a>
            <a href="#" class="btn-outline"><i class="fas fa-info-circle"></i> Plus d'infos</a>
          </div>
        </div>
      </div>
      <div class="hero-slide">
        <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=1200&q=80" alt="Slide 3">
        <div class="hero-text">
          <span class="hero-tag"><i class="fas fa-digital-tachograph"></i> Digitalisation</span>
          <h1>ABREMA-RIMS : Services Réglementaires en Ligne</h1>
          <p>Notre nouveau système électronique va digitaliser les principales fonctions réglementaires pour plus d'efficacité et de transparence.</p>
          <div class="hero-btns">
            <a href="#" class="btn-primary"><i class="fas fa-laptop"></i> Accéder au Portail</a>
            <a href="#" class="btn-outline"><i class="fas fa-question-circle"></i> FAQ</a>
          </div>
        </div>
      </div>
      <div class="slider-dots">
        <span class="dot active" data-idx="0"></span>
        <span class="dot" data-idx="1"></span>
        <span class="dot" data-idx="2"></span>
      </div>
      <div class="hero-arrows">
        <button class="arrow-btn" id="prevBtn"><i class="fas fa-chevron-left"></i></button>
        <button class="arrow-btn" id="nextBtn"><i class="fas fa-chevron-right"></i></button>
      </div>
    </div>

    <!-- SIDEBAR -->
    <div class="hero-sidebar">
      <div class="vm-block">
        <div class="vm-label">
          <i class="fas fa-eye"></i>
          <h3>Notre Vision</h3>
        </div>
        <p>Atteindre un niveau de maturité élevé de qualité de services, le maintenir et l'améliorer de façon continue.</p>
      </div>
      <div class="vm-block">
        <div class="vm-label">
          <i class="fas fa-bullseye"></i>
          <h3>Notre Mission</h3>
        </div>
        <p>Promouvoir et protéger la santé publique en s'assurant que les produits de santé disponibles sont de bonne qualité, sûrs et efficaces.</p>
      </div>
    </div>
  </div>
</section>

<!-- STATS BAR -->
<div class="stats-bar">
  <div class="stats-inner">
    <div class="stat">
      <span class="stat-num">500+</span>
      <span class="stat-label">Produits Homologués</span>
    </div>
    <div class="stat">
      <span class="stat-num">150+</span>
      <span class="stat-label">Clients Servis</span>
    </div>
    <div class="stat">
      <span class="stat-num">12+</span>
      <span class="stat-label">Partenaires Internationaux</span>
    </div>
    <div class="stat">
      <span class="stat-num">100%</span>
      <span class="stat-label">Conformité OMS</span>
    </div>
  </div>
</div>

<!-- SERVICES / INFO SECTIONS -->
<section style="background: var(--gray-50);">
  <div class="container">
    <div class="sec-header center">
      <span class="sec-tag">Nos Fonctions Essentielles</span>
      <h2 class="sec-title">Services Réglementaires de l'ABREMA</h2>
      <div class="divider"></div>
      <p class="sec-sub">L'ABREMA couvre l'ensemble du cycle de vie des produits de santé, de l'enregistrement au contrôle post-commercialisation.</p>
    </div>
    <div class="info-grid">
      <div class="info-card">
        <span class="card-num">01</span>
        <div class="info-icon"><i class="fas fa-certificate"></i></div>
        <h3>Enregistrement & Homologation</h3>
        <p>Évaluation scientifique et objective des dossiers AMM selon les critères de qualité, innocuité et efficacité, conformément aux normes OMS, ICH et EAC.</p>
      </div>
      <div class="info-card">
        <span class="card-num">02</span>
        <div class="info-icon"><i class="fas fa-laptop-code"></i></div>
        <h3>Services en Ligne (ABREMA-RIMS)</h3>
        <p>Digitalisation des procédures réglementaires. Le système ASYCUDA est opérationnel pour les autorisations d'importation. Le nouveau ABREMA-RIMS est en finalisation.</p>
      </div>
      <div class="info-card">
        <span class="card-num">03</span>
        <div class="info-icon"><i class="fas fa-microscope"></i></div>
        <h3>Contrôle Qualité au Laboratoire</h3>
        <p>Activités de contrôle qualité avec des kits Minilab pour le screening des médicaments importés ou produits localement, avant ou après commercialisation.</p>
      </div>
      <div class="info-card">
        <span class="card-num">04</span>
        <div class="info-icon"><i class="fas fa-search"></i></div>
        <h3>Inspection & Surveillance</h3>
        <p>Inspection des établissements pharmaceutiques pour s'assurer du respect des bonnes pratiques de fabrication, de distribution et de dispensation.</p>
      </div>
      <div class="info-card">
        <span class="card-num">05</span>
        <div class="info-icon"><i class="fas fa-exclamation-triangle"></i></div>
        <h3>Pharmacovigilance</h3>
        <p>Surveillance des effets indésirables des médicaments et détection rapide des médicaments falsifiés ou de qualité inférieure sur le marché burundais.</p>
      </div>
      <div class="info-card">
        <span class="card-num">06</span>
        <div class="info-icon"><i class="fas fa-gavel"></i></div>
        <h3>Cadre Légal & Réglementaire</h3>
        <p>Élaboration et mise en œuvre des textes réglementaires régissant le secteur pharmaceutique, dont l'ordonnance N° 630/991 du 09/08/2023.</p>
      </div>
    </div>
  </div>
</section>

<!-- WHY US -->
<section class="why-section">
  <div class="container">
    <div class="why-grid">
      <div class="why-img">
        <img src="https://images.unsplash.com/photo-1582719471384-894fbb16e074?w=800&q=80" alt="ABREMA Laboratory">
        <div class="why-badge"><i class="fas fa-award"></i> ISO 9001 en Cours</div>
      </div>
      <div>
        <span class="sec-tag">Pourquoi Travailler Avec Nous ?</span>
        <h2 class="sec-title">Une Institution de Confiance au Service de la Santé Publique</h2>
        <div class="divider"></div>
        <p class="sec-sub">L'ABREMA offre des services rapides et de qualité dans la réglementation des produits de santé, garantissant leur qualité, efficacité et innocuité selon les normes OMS, UA et EAC.</p>
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
            <i class="fas fa-digital-tachograph"></i>
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

<!-- CLIENTS -->
<section class="clients-section">
  <div class="container">
    <div class="sec-header center">
      <span class="sec-tag">Nos Clients</span>
      <h2 class="sec-title">L'ABREMA au Service de Tous les Acteurs</h2>
      <div class="divider"></div>
      <p class="sec-sub">L'agence sert l'ensemble des acteurs du secteur pharmaceutique burundais, des importateurs aux professionnels de santé.</p>
    </div>
    <div class="clients-grid">
      <div class="client-card">
        <div class="client-icon"><i class="fas fa-industry"></i></div>
        <h3>Fabricants de Médicaments</h3>
      </div>
      <div class="client-card">
        <div class="client-icon"><i class="fas fa-ship"></i></div>
        <h3>Importateurs & Distributeurs</h3>
      </div>
      <div class="client-card">
        <div class="client-icon"><i class="fas fa-hospital"></i></div>
        <h3>Hôpitaux & Cliniques</h3>
      </div>
      <div class="client-card">
        <div class="client-icon"><i class="fas fa-pharmacy"></i></div>
        <h3>Pharmacies</h3>
      </div>
      <div class="client-card">
        <div class="client-icon"><i class="fas fa-user-md"></i></div>
        <h3>Professionnels de Santé</h3>
      </div>
      <div class="client-card">
        <div class="client-icon"><i class="fas fa-flask"></i></div>
        <h3>Laboratoires de Recherche</h3>
      </div>
    </div>
  </div>
</section>

<!-- QUALITY POLICY -->
<section class="quality-section">
  <div class="container quality-inner">
    <div class="quality-grid">
      <div class="quality-text">
        <span class="sec-tag" style="color:var(--gold)">Politique Qualité</span>
        <h2 class="sec-title">Système de Management de la Qualité</h2>
        <div class="divider"></div>
        <p class="sec-sub">L'ABREMA met en œuvre un SMQ visant à assurer la performance, la fiabilité et l'amélioration continue de ses services, en référence aux normes ISO internationales.</p>
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

<!-- PARTNERS -->
<section class="partners-section">
  <div class="container">
    <div class="sec-header center">
      <span class="sec-tag">Nos Partenaires</span>
      <h2 class="sec-title">Partenaires Internationaux & Nationaux</h2>
      <div class="divider"></div>
    </div>
  </div>
  <div class="partners-track-wrap">
    <div class="partners-track" id="partnersTrack">
      <!-- Set 1 -->
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/WHO_logo.svg/320px-WHO_logo.svg.png" alt="OMS/WHO"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8e/African_Union_Logo.svg/320px-African_Union_Logo.svg.png" alt="Union Africaine"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/EAC_logo.svg/320px-EAC_logo.svg.png" alt="EAC"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/UNICEF_Logo.svg/320px-UNICEF_Logo.svg.png" alt="UNICEF"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/UNDP_logo.svg/320px-UNDP_logo.svg.png" alt="UNDP"></div>
      <!-- Set 2 (duplicate for marquee) -->
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/WHO_logo.svg/320px-WHO_logo.svg.png" alt="OMS/WHO"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8e/African_Union_Logo.svg/320px-African_Union_Logo.svg.png" alt="Union Africaine"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/EAC_logo.svg/320px-EAC_logo.svg.png" alt="EAC"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/UNICEF_Logo.svg/320px-UNICEF_Logo.svg.png" alt="UNICEF"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/UNDP_logo.svg/320px-UNDP_logo.svg.png" alt="UNDP"></div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="container">
    <div class="footer-grid">
      <div class="footer-about">
        <a href="#" class="footer-logo">
          <div class="logo-icon"><i class="fas fa-shield-alt"></i></div>
          <span>ABREMA</span>
        </a>
        <p>Agence Burundaise de Réglementation des Médicaments et des Aliments. Nous protégeons la santé publique en garantissant la qualité des produits de santé au Burundi.</p>
        <div class="footer-social">
          <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Services</h4>
        <ul>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Enregistrement AMM</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Importation ASYCUDA</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Contrôle Qualité</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Inspection</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Pharmacovigilance</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Liens Utiles</h4>
        <ul>
          <li><a href="#"><i class="fas fa-chevron-right"></i> À Propos</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Réglementation</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Actualités</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Publications</a></li>
          <li><a href="#"><i class="fas fa-chevron-right"></i> Contact</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Contact</h4>
        <ul>
          <li><a href="#"><i class="fas fa-map-marker-alt"></i> Avenue de l'OUA, Bujumbura</a></li>
          <li><a href="#"><i class="fas fa-phone"></i> +257 22 22 XXXX</a></li>
          <li><a href="#"><i class="fas fa-envelope"></i> info@abrema.gov.bi</a></li>
          <li><a href="#"><i class="fas fa-clock"></i> Lun–Ven : 7h30–17h00</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2024 ABREMA – Tous droits réservés</span>
      <span>Politique de Confidentialité · Mentions Légales</span>
    </div>
  </div>
</footer>

<script>
// HERO SLIDER
const slides = document.querySelectorAll('.hero-slide');
const dots = document.querySelectorAll('.dot');
let current = 0;
let timer;

function goTo(n) {
  slides[current].classList.remove('active');
  dots[current].classList.remove('active');
  current = (n + slides.length) % slides.length;
  slides[current].classList.add('active');
  dots[current].classList.add('active');
}

function startTimer() {
  timer = setInterval(() => goTo(current + 1), 5000);
}

startTimer();

document.getElementById('prevBtn').addEventListener('click', () => { clearInterval(timer); goTo(current - 1); startTimer(); });
document.getElementById('nextBtn').addEventListener('click', () => { clearInterval(timer); goTo(current + 1); startTimer(); });
dots.forEach(d => d.addEventListener('click', () => { clearInterval(timer); goTo(+d.dataset.idx); startTimer(); }));

const heroSlider = document.getElementById('heroSlider');
heroSlider.addEventListener('mouseenter', () => clearInterval(timer));
heroSlider.addEventListener('mouseleave', startTimer);
</script>
</body>
</html>