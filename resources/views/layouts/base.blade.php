<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title') ABREMA</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=DM+Serif+Display&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    :root {
      --green:       #1a5c34;
      --green-dark:  #0d3d22;
      --green-light: #256b3f;
      --green-pale:  #eaf3ee;
      --gold:        #c4a059;
      --gold-light:  #d4b570;
      --gold-pale:   #fdf6e9;
      --white:       #ffffff;
      --gray-100:    #f0f0f0;
      --gray-200:    #dddddd;
      --gray-400:    #999999;
      --gray-700:    #444444;
      --text:        #1a1a1a;
      --shadow:      0 4px 20px rgba(0,0,0,.18);
      --tr:          all .25s ease;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body {
      font-family: 'Poppins', sans-serif;
      font-size: 15px; color: var(--text);
      background: #fff; line-height: 1.6;
    }
    a { text-decoration: none; color: inherit; }
    img { max-width: 100%; display: block; }

    /* ════════════════════════════════════════════
       TOPBAR  — plein écran sans max-width
    ════════════════════════════════════════════ */
    #topbar {
      width: 100%;
      background: var(--green-dark);
      border-bottom: 2px solid var(--gold);
    }
    #topbar .tb-wrap {
      width: 100%;
      padding: 0 32px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 16px;
    }

    .tb-date {
      display: flex; align-items: center; gap: 12px; flex-shrink: 0;
    }
    .tb-date .d-box {
      background: var(--gold); color: #fff;
      width: 40px; height: 40px;
      display: flex; flex-direction: column;
      align-items: center; justify-content: center; line-height: 1;
    }
    .tb-date .d-box .d-num  { font-size: 1rem; font-weight: 700; }
    .tb-date .d-box .d-mon  { font-size: 0.52rem; text-transform: uppercase; letter-spacing: .05em; }
    .tb-date .d-name        { color: rgba(255,255,255,.70); font-size: 0.76rem; white-space: nowrap; }

    .tb-contacts {
      display: flex; align-items: center; gap: 24px; flex: 1; justify-content: center;
    }
    .tb-contacts a,
    .tb-contacts span {
      color: rgba(255,255,255,.72); font-size: 0.76rem;
      display: flex; align-items: center; gap: 6px;
      white-space: nowrap; transition: color .2s;
    }
    .tb-contacts a:hover { color: var(--gold); }
    .tb-contacts i { color: var(--gold); font-size: 0.8rem; }

    .tb-socials {
      display: flex; align-items: center; gap: 3px; flex-shrink: 0;
    }
    .tb-socials a {
      width: 26px; height: 26px; border-radius: 3px;
      display: flex; align-items: center; justify-content: center;
      font-size: 0.76rem; color: #fff;
      transition: opacity .2s, transform .2s;
    }
    .tb-socials a.fb { background: #3b5998; }
    .tb-socials a.tw { background: #1da1f2; }
    .tb-socials a.yt { background: #ff0000; }
    .tb-socials a.li { background: #0077b5; }
    .tb-socials a:hover { opacity: .82; transform: translateY(-1px); }

    /* ════════════════════════════════════════════
       BRAND BAR  — logo + recherche, plein écran
    ════════════════════════════════════════════ */
    #brand-bar {
      width: 100%;
      background: #fff;
      border-bottom: 1px solid var(--gray-200);
    }
    #brand-bar .bb-wrap {
      width: 100%;
      padding: 12px 32px;
      display: flex; align-items: center;
      justify-content: space-between; gap: 20px;
    }
    .bb-logo { display: flex; align-items: center; gap: 14px; }
    .bb-logo img { height: 58px; }
    .bb-logo-txt h1 {
      font-family: 'DM Serif Display', serif;
      font-size: 1.55rem; color: var(--green-dark); line-height: 1; margin-bottom: 3px;
    }
    .bb-logo-txt span {
      font-size: 0.66rem; text-transform: uppercase;
      letter-spacing: .13em; color: var(--gray-400);
    }
    .bb-search {
      display: flex; align-items: center;
      border: 1.5px solid var(--gray-200); height: 38px; overflow: hidden;
    }
    .bb-search input {
      border: none; outline: none;
      padding: 0 14px; font-size: 0.84rem;
      width: 260px; height: 100%;
      font-family: 'Poppins', sans-serif;
    }
    .bb-search button {
      height: 100%; padding: 0 18px;
      background: var(--gold); border: none;
      color: #fff; cursor: pointer; font-size: 0.88rem; transition: background .2s;
    }
    .bb-search button:hover { background: var(--green-dark); }

    /* ════════════════════════════════════════════
       NAVBAR  — plein écran sans max-width
    ════════════════════════════════════════════ */
    #navbar {
      width: 100%;
      background: var(--green-dark);
      position: sticky; top: 0; z-index: 999;
      box-shadow: var(--shadow);
    }
    #navbar .nav-wrap {
      width: 100%;
      padding: 0 32px;
      display: flex; align-items: stretch;
      justify-content: space-between;
      height: 52px;
    }

    .nav-menu {
      display: flex; align-items: stretch;
      list-style: none; height: 100%; flex: 1;
    }
    .nav-menu > li {
      position: relative; display: flex; align-items: stretch;
    }
    .nav-menu > li > a {
      display: flex; align-items: center; gap: 5px;
      padding: 0 17px; height: 100%;
      color: rgba(255,255,255,.86);
      font-size: 0.78rem; font-weight: 600;
      text-transform: uppercase; letter-spacing: .07em;
      white-space: nowrap;
      border-bottom: 3px solid transparent;
      transition: var(--tr);
    }
    .nav-menu > li > a .arr {
      font-size: 0.58rem; opacity: .65; transition: transform .22s;
    }
    .nav-menu > li:hover > a .arr { transform: rotate(180deg); }
    .nav-menu > li > a:hover,
    .nav-menu > li.active > a {
      color: #fff;
      background: rgba(255,255,255,.07);
      border-bottom-color: var(--gold);
    }
    .nav-menu > li.active > a { color: var(--gold-light); }

    /* Dropdown */
    .nav-drop {
      position: absolute; top: 100%; left: 0;
      min-width: 230px; background: var(--green-dark);
      border-top: 2px solid var(--gold);
      box-shadow: 0 8px 28px rgba(0,0,0,.28);
      list-style: none;
      opacity: 0; visibility: hidden;
      transform: translateY(6px);
      transition: all .22s ease; z-index: 100;
    }
    .nav-menu > li:hover .nav-drop {
      opacity: 1; visibility: visible; transform: translateY(0);
    }
    .nav-drop li + li { border-top: 1px solid rgba(255,255,255,.07); }
    .nav-drop li a {
      display: flex; align-items: center; gap: 10px;
      padding: 11px 18px;
      color: rgba(255,255,255,.75); font-size: 0.81rem; font-weight: 500;
      border-left: 2px solid transparent; transition: var(--tr);
    }
    .nav-drop li a i { color: var(--gold); font-size: 0.78rem; width: 14px; flex-shrink: 0; }
    .nav-drop li a:hover {
      color: var(--gold-light);
      background: rgba(255,255,255,.06);
      border-left-color: var(--gold);
      padding-left: 22px;
    }

    /* CTA */
    .nav-cta {
      display: flex; align-items: center; flex-shrink: 0; margin-left: 12px;
    }
    .nav-cta a {
      display: inline-flex; align-items: center; gap: 7px;
      background: var(--gold); color: #fff;
      padding: 0 22px; height: 100%;
      font-size: 0.77rem; font-weight: 700;
      text-transform: uppercase; letter-spacing: .07em;
      transition: background .22s; white-space: nowrap;
    }
    .nav-cta a:hover { background: var(--gold-light); }

    /* Hamburger */
    .hamburger {
      display: none; flex-direction: column;
      justify-content: center; gap: 5px;
      cursor: pointer; padding: 0 4px;
      background: none; border: none;
    }
    .hamburger span {
      display: block; width: 24px; height: 2px;
      background: #fff; border-radius: 2px; transition: var(--tr);
    }

    /* ════════════════════════════════════════════
       MOBILE NAV
    ════════════════════════════════════════════ */
    #mobile-nav {
      display: none; position: fixed; inset: 0;
      background: var(--green-dark); z-index: 2000;
      flex-direction: column; overflow-y: auto;
    }
    #mobile-nav.open { display: flex; }
    .mn-header {
      display: flex; align-items: center; justify-content: space-between;
      padding: 16px 22px; border-bottom: 1px solid rgba(255,255,255,.1);
    }
    .mn-header img { height: 44px; filter: brightness(0) invert(1); }
    .mn-close {
      background: none; border: none; color: #fff; font-size: 1.3rem; cursor: pointer; padding: 6px;
    }
    .mn-list { list-style: none; padding: 12px 0; }
    .mn-list li a {
      display: flex; align-items: center; justify-content: space-between;
      padding: 13px 22px; color: rgba(255,255,255,.82);
      font-size: 0.88rem; font-weight: 500;
      border-bottom: 1px solid rgba(255,255,255,.06); transition: color .2s;
    }
    .mn-list li a:hover { color: var(--gold-light); }
    .mn-list li a .arr-r { font-size: 0.72rem; color: var(--gold); }
    .mn-sub { display: none; list-style: none; background: rgba(0,0,0,.15); }
    .mn-sub.open { display: block; }
    .mn-sub li a { padding-left: 38px; font-size: 0.84rem; }

    /* ════════════════════════════════════════════
       FOOTER  — plein écran
    ════════════════════════════════════════════ */
    .footer { background: var(--green-dark); color: #fff; }

    .footer-main { padding: 64px 0 50px; border-bottom: 1px solid rgba(255,255,255,.1); }

    .footer-grid {
      width: 100%; padding: 0 40px;
      display: grid; grid-template-columns: 2fr 1fr 1.4fr 1.2fr; gap: 52px;
    }

    /* Col 1 — logo + description + réseaux */
    .footer-logo {
      display: flex; align-items: center; gap: 14px; margin-bottom: 18px;
    }
    .footer-logo img {
      height: 58px; filter: brightness(0) invert(1);
    }
    .footer-logo h3 {
      font-family: 'DM Serif Display', serif;
      font-size: 1.6rem; color: #fff; line-height: 1;
    }
    .footer-col > p {
      color: rgba(255,255,255,.55); font-size: 0.88rem; line-height: 1.88; margin-bottom: 20px;
    }
    .footer-social { display: flex; gap: 9px; margin-top: 4px; }
    .footer-social a {
      width: 36px; height: 36px;
      border: 1.5px solid rgba(255,255,255,.2);
      display: flex; align-items: center; justify-content: center;
      color: rgba(255,255,255,.65); font-size: 0.85rem; transition: var(--tr);
    }
    .footer-social a:hover { background: var(--gold); border-color: var(--gold); color: #fff; }

    /* Cols 2–4 — titres */
    .footer-col h4 {
      font-family: 'DM Serif Display', serif;
      font-size: 1.1rem; color: #fff;
      padding-bottom: 12px; margin-bottom: 20px;
      border-bottom: 2px solid var(--gold); display: inline-block;
    }

    /* Listes de liens */
    .footer-links { list-style: none; }
    .footer-links li { margin-bottom: 10px; }
    .footer-links li a {
      color: rgba(255,255,255,.58); font-size: 0.88rem;
      display: flex; align-items: center; gap: 9px; transition: var(--tr);
    }
    .footer-links li a::before {
      content: ''; width: 5px; height: 5px;
      background: var(--gold); border-radius: 50%; flex-shrink: 0;
    }
    .footer-links li a:hover { color: var(--gold-light); padding-left: 4px; }

    /* Contact */
    .footer-contact { list-style: none; }
    .footer-contact li {
      display: flex; gap: 12px; align-items: flex-start;
      margin-bottom: 14px; font-size: 0.87rem; color: rgba(255,255,255,.62);
    }
    .footer-contact li i { color: var(--gold); margin-top: 3px; width: 15px; flex-shrink: 0; }
    .footer-contact li a { color: var(--gold-light); transition: color .2s; }
    .footer-contact li a:hover { color: #fff; }

    /* Barre de copyright */
    .footer-bottom { background: rgba(0,0,0,.25); }
    .footer-bottom-content { padding: 16px 40px; }
    .footer-bottom-content p {
      color: rgba(255,255,255,.42); font-size: 0.82rem;
      text-align: center;
    }

    /* ════════════════════════════════════════════
       RESPONSIVE
    ════════════════════════════════════════════ */
    @media (max-width: 1100px) {
      .tb-contacts { display: none; }
      .footer-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 820px) {
      .nav-menu, .nav-cta { display: none; }
      .hamburger { display: flex; }
      .bb-search { display: none; }
      .bb-logo-txt { display: none; }
      .footer-grid { grid-template-columns: 1fr; padding: 0 22px; }
      .footer-bottom-content { padding: 14px 22px; }
    }
    @media (max-width: 480px) {
      .tb-date .d-name { display: none; }
      #topbar .tb-wrap,
      #navbar .nav-wrap,
      #brand-bar .bb-wrap { padding: 0 16px; }
    }
  </style>

  @yield('styles')
</head>
<body>

<!-- ═══════════════ TOPBAR ═══════════════ -->
<div id="topbar">
  <div class="tb-wrap">

    <div class="tb-date">
      <div class="d-box">
        <span class="d-num" id="tb-day">--</span>
        <span class="d-mon" id="tb-mon">---</span>
      </div>
      <span class="d-name" id="tb-dayname">...</span>
    </div>

    <div class="tb-contacts">
      <span><i class="fas fa-map-marker-alt"></i> Avenue de l'Industrie, No 12, Bujumbura</span>
      <a href="tel:+25722229739"><i class="fas fa-phone"></i> +257 22 22 97 39</a>
      <a href="/cdn-cgi/l/email-protection#2f464149406f4e4d5d4a424e01484059014d46"><i class="fas fa-envelope"></i> <span class="__cf_email__" data-cfemail="9ff6f1f9f0dffefdedfaf2feb1f8f0e9b1fdf6">[email&#160;protected]</span></a>
      <span><i class="fas fa-headset"></i> Numéro vert : <strong style="color:var(--gold-light)">203</strong></span>
    </div>

    <div class="tb-socials">
      <a href="#" class="fb" title="Facebook"><i class="fab fa-facebook-f"></i></a>
      <a href="#" class="tw" title="Twitter"><i class="fab fa-twitter"></i></a>
      <a href="#" class="yt" title="YouTube"><i class="fab fa-youtube"></i></a>
      <a href="#" class="li" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
    </div>

  </div>
</div>

<!-- ═══════════════ BRAND BAR ═══════════════ -->
<div id="brand-bar">
  <div class="bb-wrap">
    <a href="{{ route('home') }}" class="bb-logo">
      <img src="{{ asset('images/ABREMA_LOGO.png') }}" alt="Logo ABREMA">
      <div class="bb-logo-txt">
        <h1>ABREMA</h1>
        <span>Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</span>
      </div>
    </a>
    <form action="{{ route('home') }}" method="GET" class="bb-search">
      <input type="text" name="q" placeholder="Rechercher un médicament, service…" value="{{ request('q') }}">
      <button type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>
</div>

<!-- ═══════════════ NAVBAR ═══════════════ -->
<nav id="navbar">
  <div class="nav-wrap">

    <ul class="nav-menu">

      <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}">
          <i class="fas fa-home" style="font-size:.82rem"></i>&nbsp;Accueil
        </a>
      </li>

      <li class="{{ request()->routeIs('about.*') ? 'active' : '' }}">
        <a href="#">À Propos <i class="fas fa-chevron-down arr"></i></a>
        <ul class="nav-drop">
          <li><a href="{{ route('about.profilabrema') }}"><i class="fas fa-building"></i> Profil de l'ABREMA</a></li>
          <li><a href="{{ route('about.organigramme') }}"><i class="fas fa-sitemap"></i> Organigramme</a></li>
          <li><a href="{{route('about.equipe')}}"><i class="fas fa-gavel"></i> Equipe de direction</a></li>
          <li><a href="{{route('about.fonction')}}"><i class="fas fa-file-alt"></i> Fonction Reglementaire</a></li>
        </ul>
      </li>

      <li class="{{ request()->routeIs('medicament.*') ? 'active' : '' }}">
        <a href="#">Médicaments <i class="fas fa-chevron-down arr"></i></a>
        <ul class="nav-drop">
          <li><a href="{{ route('medicament.produits') }}"><i class="fas fa-pills"></i> Medicaments Enregistrés</a></li>
          <li><a href="{{route('medicament.listemedicament')}}"><i class="fas fa-file-medical"></i> Liste Nationale de medicaments</a></li>
          <li><a href="{{route('medicament.notifications')}}"><i class="fas fa-file-medical"></i> Notifications</a></li>
          <li><a href="{{route('medicament.textemedicament')}}"><i class="fas fa-ban"></i> Textes Reglementaires</a></li>
        </ul>
      </li>

      <li class="{{ request()->routeIs('inspection.*') ? 'active' : '' }}">
        <a href="#">Inspection <i class="fas fa-chevron-down arr"></i></a>
        <ul class="nav-drop">
          <li><a href="{{ route('inspection.etablissement') }}"><i class="fas fa-hospital"></i> Établissements</a></li>
          <li><a href="{{route('inspection.GMP')}}"><i class="fas fa-clipboard-check"></i> Inspections GMP</a></li>
          <li><a href="{{route('inspection.GDP')}}"><i class="fas fa-store"></i> Inspections GDP</a></li>
        </ul>
      </li>

      <li class="{{ request()->routeIs('labocontrol.*') ? 'active' : '' }}">
        <a href="#">Laboratoire <i class="fas fa-chevron-down arr"></i></a>
        <ul class="nav-drop">
          <li><a href="{{ route('labocontrol.servicelabo') }}"><i class="fas fa-microscope"></i> Services du Labo</a></li>
          <li><a href="{{route('labocontrol.aboutlabo')}}"><i class="fas fa-flask"></i> Analyses &amp; Tests</a></li>
        </ul>
      </li>

      <li class="{{ request()->routeIs('vigilance.*') ? 'active' : '' }}">
        <a href="#">Vigilance <i class="fas fa-chevron-down arr"></i></a>
        <ul class="nav-drop">
          <li><a href="{{ route('vigilance.notificationES') }}"><i class="fas fa-exclamation-triangle"></i> Signalement</a></li>
          <li><a href="{{ route('vigilance.signalement') }}"><i class="fas fa-exclamation-triangle"></i> Signalement</a></li>
          <li><a href="{{route('vigilance.delegue')}}"><i class="fas fa-bell"></i> Delegues</a></li>
          <li><a href="{{ route('vigilance.rappel') }}"><i class="fas fa-exclamation-triangle"></i> Rappel du Produit</a></li>
          <li><a href="{{route('vigilance.textevigilance')}}"><i class="fas fa-chart-line"></i> Textes Reglementaires</a></li>
        </ul>
      </li>

      <li class="{{ request()->routeIs('importexport.*') ? 'active' : '' }}">
        <a href="#">Import / Export <i class="fas fa-chevron-down arr"></i></a>
        <ul class="nav-drop">
          <li><a href="{{ route('importexport.demande') }}"><i class="fas fa-file-import"></i> Demande d'Autorisation</a></li>
          <li><a href="{{route('importexport.texteimport')}}"><i class="fas fa-ship"></i> Textes Reglementaires</a></li>
        </ul>
      </li>

      <li class="{{ request()->routeIs('information.*') ? 'active' : '' }}">
        <a href="#">Actualités <i class="fas fa-chevron-down arr"></i></a>
        <ul class="nav-drop">
          <li><a href="{{ route('information.actualite') }}"><i class="fas fa-newspaper"></i> Annonces</a></li>
          <li><a href="{{ route('information.document') }}"><i class="fas fa-file-pdf"></i> Publications</a></li>
        </ul>
      </li>

    </ul>

    <div class="nav-cta">
      <a href="{{ route('submitcolis') }}">
        <i class="fas fa-laptop-code"></i> Services en Ligne
      </a>
    </div>

    <button class="hamburger" id="hamburger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>

  </div>
</nav>

<!-- ═══════════════ MENU MOBILE ═══════════════ -->
<div id="mobile-nav">
  <div class="mn-header">
    <img src="{{ asset('images/ABREMA_LOGO.png') }}" alt="ABREMA">
    <button class="mn-close" id="mn-close"><i class="fas fa-times"></i></button>
  </div>
  <ul class="mn-list">
    <li><a href="{{ route('home') }}"><span><i class="fas fa-home"></i>&nbsp; Accueil</span></a></li>
    <li>
      <a href="#" class="mn-toggle"><span><i class="fas fa-info-circle"></i>&nbsp; À Propos</span><i class="fas fa-chevron-down arr-r"></i></a>
      <ul class="mn-sub">
        <li><a href="{{ route('about.profilabrema') }}">Profil de l'ABREMA</a></li>
        <li><a href="#">Organisation</a></li>
        <li><a href="#">Textes Législatifs</a></li>
      </ul>
    </li>
    <li>
      <a href="#" class="mn-toggle"><span><i class="fas fa-pills"></i>&nbsp; Médicaments</span><i class="fas fa-chevron-down arr-r"></i></a>
      <ul class="mn-sub">
        <li><a href="{{ route('medicament.produits') }}">Produits Enregistrés</a></li>
        <li><a href="#">Dossiers d'AMM</a></li>
      </ul>
    </li>
    <li><a href="{{ route('inspection.etablissement') }}"><span><i class="fas fa-search"></i>&nbsp; Inspection</span></a></li>
    <li><a href="{{ route('labocontrol.servicelabo') }}"><span><i class="fas fa-microscope"></i>&nbsp; Laboratoire</span></a></li>
    <li><a href="{{ route('vigilance.signalement') }}"><span><i class="fas fa-exclamation-triangle"></i>&nbsp; Vigilance</span></a></li>
    <li><a href="{{ route('importexport.demande') }}"><span><i class="fas fa-ship"></i>&nbsp; Import / Export</span></a></li>
    <li><a href="{{ route('information.actualite') }}"><span><i class="fas fa-newspaper"></i>&nbsp; Actualités</span></a></li>
    <li>
      <a href="{{ route('submitcolis') }}" style="color:var(--gold-light);font-weight:600">
        <span><i class="fas fa-laptop-code"></i>&nbsp; Services en Ligne</span>
      </a>
    </li>
  </ul>
</div>

@yield('content')


<!-- ═══════════════ FOOTER ═══════════════ -->
<footer class="footer">
  <div class="footer-main">
    <div class="container-fluid">
      <div class="footer-grid">

        <!-- Col 1 — Marque -->
        <div class="footer-col">
          <div class="footer-logo">
            <img src="{{ asset('/images/logo.png') }}" alt="Logo">
            <h3>ABREMA</h3>
          </div>
          <p>Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</p>
          <div class="footer-social">
            <a href="https://www.facebook.com/profile.php?id=61576348075548" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
            <a href="https://www.youtube.com/@Abrema-Burundi" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            <a href="https://x.com/Abrema_Burundi" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="https://www.linkedin.com/in/abrema" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
            <a href="https://www.instagram.com/abrema_burundi/" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          </div>
        </div>

        <!-- Col 2 — Liens Rapides -->
        <div class="footer-col">
          <h4>Liens Rapides</h4>
          <ul class="footer-links">
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('about.profilabrema') }}">Profil global d'ABREMA</a></li>
            <li><a href="{{ route('medicament.produits') }}">Liste des médicaments</a></li>
            <li><a href="{{ route('labocontrol.servicelabo') }}">À propos du laboratoire</a></li>
            <li><a href="{{ route('about.equipe') }}">Équipe de direction</a></li>
          </ul>
        </div>

        <!-- Col 3 — Liens Importants -->
        <div class="footer-col">
          <h4>Liens Importants</h4>
          <ul class="footer-links">
            <li><a href="https://presidence.gov.bi/" target="_blank">Présidence de la République</a></li>
            <li><a href="https://www.minsante.gov.bi/" target="_blank">Ministère de la Santé Publique</a></li>
            <li><a href="https://finances.gov.bi/" target="_blank">Ministère des Finances et du Budget</a></li>
            <li><a href="https://camebu.net/" target="_blank">CAMEBU</a></li>
          </ul>
        </div>

        <!-- Col 4 — Contact -->
        <div class="footer-col">
          <h4>Contact</h4>
          <ul class="footer-contact">
            <li>
              <i class="fas fa-map-marker-alt"></i>
              <span>Avenue de l'industrie, No 12, BUJUMBURA</span>
            </li>
            <li>
              <i class="fas fa-phone"></i>
              <span>+257 22 22 97 39</span>
            </li>
            <li>
              <i class="fas fa-phone"></i>
              <span>Numéro vert : <strong style="color:var(--gold-light)">203</strong></span>
            </li>
            <li>
              <i class="fas fa-envelope"></i>
              <span><a href="mailto:info@abrema.gov.bi">info@abrema.gov.bi</a></span>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="container-fluid">
      <div class="footer-bottom-content">
        <p>Copyright &copy; {{ date('Y') }} Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments — Tous droits réservés.</p>
      </div>
    </div>
  </div>
</footer>
<script>
(function () {
  /* Date dynamique */
  const DAYS   = ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'];
  const MONTHS = ['JAN','FÉV','MAR','AVR','MAI','JUN','JUL','AOÛ','SEP','OCT','NOV','DÉC'];
  const now = new Date();
  const el = id => document.getElementById(id);
  if (el('tb-day'))     el('tb-day').textContent     = String(now.getDate()).padStart(2,'0');
  if (el('tb-mon'))     el('tb-mon').textContent     = MONTHS[now.getMonth()]+' '+now.getFullYear();
  if (el('tb-dayname')) el('tb-dayname').textContent = DAYS[now.getDay()];

  /* Menu mobile */
  const ham     = document.getElementById('hamburger');
  const mnav    = document.getElementById('mobile-nav');
  const mnClose = document.getElementById('mn-close');
  if (ham)     ham.addEventListener('click',     () => mnav.classList.add('open'));
  if (mnClose) mnClose.addEventListener('click', () => mnav.classList.remove('open'));

  document.querySelectorAll('.mn-toggle').forEach(btn => {