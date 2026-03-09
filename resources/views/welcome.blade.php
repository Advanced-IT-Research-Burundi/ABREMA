<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ABREMA – Autorité Burundaise de Régulation des Médicaments et des Aliments</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    /* ═══════════════════════════════
       DESIGN TOKENS – Extracted from ABREMA Logo
       Deep Green, Crimson Red, Gold, White
    ═══════════════════════════════ */
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
      --text:         #131f14;
      --text-muted:   #4a6352;
      --shadow-sm:    0 2px 8px rgba(10,50,20,.10);
      --shadow:       0 6px 24px rgba(10,50,20,.14);
      --shadow-lg:    0 16px 48px rgba(10,50,20,.18);
      --radius:       10px;
      --transition:   all 0.28s ease;
    }

    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    html { scroll-behavior: smooth; }
    body { font-family: 'Poppins', sans-serif; color: var(--text); background: var(--white); overflow-x: hidden; }

    /* ── UTILITY ── */
    .container-fluid { max-width: 1280px; margin: 0 auto; padding: 0 32px; }
    .container { max-width: 1200px; margin: 0 auto; padding: 0 32px; }

    /* ════════════════════════════════
       HEADER
    ════════════════════════════════ */
    .header {
      background: var(--green-dark);
      padding: 0;
      position: sticky;
      top: 0;
      z-index: 200;
      box-shadow: 0 2px 16px rgba(0,0,0,.25);
    }
    .header-content {
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 78px;
      gap: 16px;
    }
    .logo-link {
      display: flex;
      align-items: center;
      gap: 14px;
      text-decoration: none;
    }
    .logo-img {
      width: 54px;
      height: 54px;
      border-radius: 50%;
      border: 2px solid var(--gold);
      object-fit: contain;
      background: white;
      padding: 2px;
    }
    .logo-placeholder {
      width: 54px; height: 54px; border-radius: 50%;
      background: var(--green);
      border: 2px solid var(--gold);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.4rem; color: var(--gold);
      flex-shrink: 0;
    }
    .logo-text h1 {
      font-family: 'DM Serif Display', serif;
      font-size: 0.88rem;
      color: var(--white);
      line-height: 1.25;
      font-weight: 400;
      max-width: 400px;
    }
    .logo-text h1 span {
      display: block;
      font-size: 1.3rem;
      color: var(--gold);
      letter-spacing: .03em;
    }
    .header-actions { display: flex; gap: 10px; align-items: center; }
    .search-btn, .mobile-menu-toggle {
      background: rgba(255,255,255,.1);
      border: 1px solid rgba(255,255,255,.2);
      color: white;
      width: 42px; height: 42px;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1rem;
      display: flex; align-items: center; justify-content: center;
      transition: var(--transition);
    }
    .search-btn:hover, .mobile-menu-toggle:hover {
      background: var(--gold); color: var(--green-dark);
    }
    .mobile-menu-toggle { display: none; flex-direction: column; gap: 5px; padding: 10px; }
    .mobile-menu-toggle span { display: block; height: 2px; width: 20px; background: white; border-radius: 2px; transition: var(--transition); }

    /* Search Modal */
    .search-modal {
      display: none;
      position: fixed; inset: 0;
      background: rgba(10,40,18,.92);
      backdrop-filter: blur(12px);
      z-index: 999;
      align-items: center; justify-content: center;
    }
    .search-modal.open { display: flex; }
    .search-modal-content {
      background: white;
      border-radius: 16px;
      padding: 40px;
      width: 90%; max-width: 640px;
      position: relative;
    }
    .close-search {
      position: absolute; top: 16px; right: 16px;
      background: var(--gray-100);
      border: none; border-radius: 50%;
      width: 36px; height: 36px;
      cursor: pointer; font-size: 1rem;
      display: flex; align-items: center; justify-content: center;
      transition: var(--transition);
    }
    .close-search:hover { background: var(--red); color: white; }
    .search-box {
      display: flex; align-items: center;
      border: 2px solid var(--green);
      border-radius: 10px;
      overflow: hidden;
      margin-bottom: 20px;
    }
    .search-icon { padding: 0 14px; color: var(--green); font-size: 1rem; }
    .search-input { flex: 1; border: none; outline: none; font-size: 1rem; font-family: 'Poppins', sans-serif; padding: 14px 0; }
    .search-submit {
      background: var(--green); color: white;
      border: none; padding: 0 20px; height: 100%; cursor: pointer;
      font-size: 1rem; transition: var(--transition);
    }
    .search-submit:hover { background: var(--green-dark); }
    .search-suggestions p { font-size: 0.82rem; color: var(--text-muted); margin-bottom: 10px; font-weight: 500; }
    .suggestion-tags { display: flex; gap: 8px; flex-wrap: wrap; }
    .suggestion-tag {
      background: var(--green-pale); color: var(--green);
      padding: 6px 14px; border-radius: 20px;
      font-size: 0.8rem; font-weight: 500; cursor: pointer;
      transition: var(--transition);
    }
    .suggestion-tag:hover { background: var(--green); color: white; }

    /* ════════════════════════════════
       NAVBAR
    ════════════════════════════════ */
    .navbar {
      background: var(--white);
      border-bottom: 3px solid var(--green);
      position: sticky;
      top: 78px;
      z-index: 100;
      box-shadow: var(--shadow-sm);
    }
    .nav-menu {
      display: flex;
      list-style: none;
      align-items: stretch;
      gap: 0;
      overflow-x: auto;
      scrollbar-width: none;
    }
    .nav-menu::-webkit-scrollbar { display: none; }
    .nav-menu > li { position: relative; flex-shrink: 0; }
    .nav-menu > li > a {
      display: flex; align-items: center; gap: 6px;
      padding: 16px 18px;
      color: var(--text);
      text-decoration: none;
      font-size: 0.87rem;
      font-weight: 500;
      transition: var(--transition);
      white-space: nowrap;
    }
    .nav-menu > li > a i { font-size: 0.7rem; color: var(--green); }
    .nav-menu > li > a:hover,
    .nav-menu > li > a.active {
      color: var(--green);
      background: var(--green-pale);
    }
    .nav-menu > li > a.active {
      border-bottom: 3px solid var(--green);
      margin-bottom: -3px;
    }

    /* Dropdown */
    .dropdown-menu {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background: white;
      min-width: 240px;
      border-radius: 0 0 var(--radius) var(--radius);
      box-shadow: var(--shadow-lg);
      list-style: none;
      z-index: 200;
      border-top: 3px solid var(--green);
      padding: 8px 0;
    }
    .dropdown:hover .dropdown-menu { display: block; animation: fadeDown .2s ease; }
    @keyframes fadeDown { from { opacity:0; transform:translateY(-6px); } to { opacity:1; transform:translateY(0); } }
    .dropdown-menu li a {
      display: flex; align-items: center; gap: 10px;
      padding: 10px 20px;
      color: var(--text);
      text-decoration: none;
      font-size: 0.84rem;
      font-weight: 400;
      transition: var(--transition);
      border-left: 3px solid transparent;
    }
    .dropdown-menu li a:hover {
      background: var(--green-pale);
      color: var(--green);
      border-left-color: var(--green);
      padding-left: 24px;
    }

    /* Submenu */
    .has-submenu { position: relative; }
    .has-submenu > a::after { content: '›'; margin-left: auto; font-size: 1.1rem; }
    .dropdown-submenu {
      display: none;
      position: absolute;
      left: 100%; top: 0;
      background: white;
      min-width: 220px;
      border-radius: var(--radius);
      box-shadow: var(--shadow-lg);
      list-style: none;
      z-index: 300;
      border-top: 3px solid var(--gold);
      padding: 8px 0;
    }
    .has-submenu:hover .dropdown-submenu { display: block; }
    .dropdown-submenu li a {
      padding: 10px 18px;
      font-size: 0.82rem;
      color: var(--text);
      text-decoration: none;
      display: block;
      transition: var(--transition);
    }
    .dropdown-submenu li a:hover { background: var(--green-pale); color: var(--green); }

    /* ════════════════════════════════
       HERO SECTION
    ════════════════════════════════ */
    .hero {
      display: grid;
      grid-template-columns: 1fr 360px;
      min-height: 540px;
      position: relative;
    }
    .hero-slider {
      position: relative;
      overflow: hidden;
      background: var(--green-dark);
    }
    .hero-slide {
      position: absolute; inset: 0;
      opacity: 0;
      transition: opacity 1s ease;
      display: flex; align-items: flex-end;
    }
    .hero-slide.active { opacity: 1; }
    .hero-slide::before {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(14,71,38,.95) 0%, rgba(26,107,58,.65) 55%, rgba(181,28,35,.15) 100%);
      z-index: 1;
    }
    .hero-slide img { width: 100%; height: 100%; object-fit: cover; position: absolute; inset: 0; }
    .hero-text {
      position: relative; z-index: 2;
      padding: 60px 50px;
      max-width: 680px;
    }
    .hero-tag {
      display: inline-flex; align-items: center; gap: 6px;
      background: var(--gold);
      color: var(--green-dark);
      font-size: 0.72rem; font-weight: 700;
      padding: 5px 14px; border-radius: 20px;
      margin-bottom: 18px;
      letter-spacing: .06em; text-transform: uppercase;
    }
    .hero-text h1 {
      font-family: 'DM Serif Display', serif;
      font-size: clamp(1.8rem, 3vw, 2.9rem);
      color: white;
      line-height: 1.18;
      margin-bottom: 16px;
      font-weight: 400;
    }
    .hero-text p {
      color: rgba(255,255,255,.85);
      font-size: 0.97rem; line-height: 1.75;
      margin-bottom: 30px; max-width: 500px;
    }
    .hero-btns { display: flex; gap: 12px; flex-wrap: wrap; }
    .btn-primary {
      background: var(--gold);
      color: var(--green-dark);
      padding: 13px 28px; border-radius: 8px;
      font-weight: 700; font-size: 0.88rem;
      text-decoration: none;
      display: inline-flex; align-items: center; gap: 8px;
      transition: var(--transition);
    }
    .btn-primary:hover { background: var(--gold-light); transform: translateY(-2px); box-shadow: 0 8px 24px rgba(212,160,23,.4); }
    .btn-outline {
      background: transparent; color: white;
      padding: 13px 28px; border-radius: 8px;
      font-weight: 600; font-size: 0.88rem;
      text-decoration: none;
      border: 2px solid rgba(255,255,255,.5);
      display: inline-flex; align-items: center; gap: 8px;
      transition: var(--transition);
    }
    .btn-outline:hover { border-color: var(--gold); color: var(--gold); }
    .btn-red {
      background: var(--red);
      color: white;
      padding: 13px 28px; border-radius: 8px;
      font-weight: 700; font-size: 0.88rem;
      text-decoration: none;
      display: inline-flex; align-items: center; gap: 8px;
      transition: var(--transition);
    }
    .btn-red:hover { background: var(--red-dark); transform: translateY(-2px); }

    /* Slider controls */
    .slider-dots {
      position: absolute; bottom: 24px; left: 50px;
      display: flex; gap: 8px; z-index: 5;
    }
    .dot {
      width: 8px; height: 8px; border-radius: 4px;
      background: rgba(255,255,255,.4);
      cursor: pointer; transition: var(--transition);
    }
    .dot.active { background: var(--gold); width: 28px; }
    .hero-arrows {
      position: absolute; bottom: 24px; right: 28px;
      display: flex; gap: 8px; z-index: 5;
    }
    .arrow-btn {
      width: 40px; height: 40px; border-radius: 50%;
      border: none;
      background: rgba(255,255,255,.15);
      color: white; cursor: pointer;
      backdrop-filter: blur(4px);
      transition: var(--transition);
      display: flex; align-items: center; justify-content: center;
    }
    .arrow-btn:hover { background: var(--gold); color: var(--green-dark); }

    /* Hero Sidebar */
    .hero-sidebar {
      background: var(--off-white);
      border-left: 4px solid var(--green);
      display: flex; flex-direction: column;
      padding: 36px 28px; gap: 20px;
      justify-content: center;
    }
    .vm-block {
      background: white; border-radius: var(--radius);
      padding: 26px 22px;
      box-shadow: var(--shadow-sm);
      border-left: 4px solid var(--green);
      transition: var(--transition);
    }
    .vm-block:last-child { border-left-color: var(--red); }
    .vm-block:hover { transform: translateX(4px); box-shadow: var(--shadow); }
    .vm-label {
      display: flex; align-items: center; gap: 10px;
      margin-bottom: 10px;
    }
    .vm-label i { color: var(--green); font-size: 1.2rem; }
    .vm-block:last-child .vm-label i { color: var(--red); }
    .vm-label h3 { font-size: 1rem; font-weight: 600; color: var(--green-dark); }
    .vm-block p { color: var(--text-muted); font-size: 0.88rem; line-height: 1.65; }

    /* ════════════════════════════════
       STATS BAR
    ════════════════════════════════ */
    .stats-bar {
      background: linear-gradient(135deg, var(--green-dark), var(--green));
      padding: 30px 0;
    }
    .stats-inner {
      max-width: 1200px; margin: 0 auto; padding: 0 32px;
      display: grid; grid-template-columns: repeat(4, 1fr);
    }
    .stat {
      text-align: center;
      border-right: 1px solid rgba(255,255,255,.2);
      padding: 10px 20px;
    }
    .stat:last-child { border-right: none; }
    .stat-num {
      font-family: 'DM Serif Display', serif;
      font-size: 2.4rem; color: var(--gold);
      display: block;
    }
    .stat-label { color: rgba(255,255,255,.8); font-size: 0.83rem; margin-top: 4px; }

    /* ════════════════════════════════
       SECTION SHARED
    ════════════════════════════════ */
    section { padding: 80px 0; }
    .sec-tag {
      display: inline-block;
      color: var(--green);
      font-size: 0.75rem; font-weight: 700;
      letter-spacing: .1em; text-transform: uppercase;
      margin-bottom: 10px;
    }
    .sec-title {
      font-family: 'DM Serif Display', serif;
      font-size: clamp(1.6rem, 2.5vw, 2.3rem);
      color: var(--green-dark);
      margin-bottom: 14px;
      line-height: 1.22;
      font-weight: 400;
    }
    .sec-sub { color: var(--text-muted); font-size: 0.96rem; max-width: 600px; line-height: 1.75; }
    .sec-header { margin-bottom: 50px; }
    .sec-header.center { text-align: center; }
    .sec-header.center .sec-sub { margin: 0 auto; }
    .divider {
      width: 56px; height: 4px;
      background: linear-gradient(90deg, var(--green), var(--gold));
      border-radius: 2px; margin: 14px 0;
    }
    .sec-header.center .divider { margin: 14px auto; }

    /* ════════════════════════════════
       SERVICES CARDS
    ════════════════════════════════ */
    .services-section { background: var(--off-white); }
    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 26px;
    }
    .info-card {
      background: white; border-radius: var(--radius);
      padding: 32px 26px;
      box-shadow: var(--shadow-sm);
      border: 1px solid var(--gray-100);
      transition: var(--transition);
      position: relative; overflow: hidden;
    }
    .info-card::before {
      content: '';
      position: absolute; top: 0; left: 0; right: 0; height: 3px;
      background: linear-gradient(90deg, var(--green), var(--gold));
      transform: scaleX(0); transition: transform .3s ease;
    }
    .info-card:hover::before { transform: scaleX(1); }
    .info-card:hover { transform: translateY(-6px); box-shadow: var(--shadow); }
    .info-icon {
      width: 56px; height: 56px;
      background: var(--green-pale);
      border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.5rem; color: var(--green);
      margin-bottom: 20px;
      transition: var(--transition);
    }
    .info-card:hover .info-icon { background: var(--green); color: white; }
    .info-card h3 { font-size: 1.02rem; font-weight: 600; color: var(--green-dark); margin-bottom: 10px; }
    .info-card p { color: var(--text-muted); font-size: 0.88rem; line-height: 1.7; }
    .card-num {
      position: absolute; top: 18px; right: 20px;
      font-family: 'DM Serif Display', serif;
      font-size: 2.8rem; color: var(--gray-100);
      line-height: 1;
    }

    /* ════════════════════════════════
       WHY US
    ════════════════════════════════ */
    .why-section { background: white; }
    .why-grid {
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 64px; align-items: center;
    }
    .why-img {
      border-radius: 16px; overflow: hidden;
      aspect-ratio: 4/3;
      position: relative;
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
      border-left: 3px solid var(--green-pale);
      transition: var(--transition);
    }
    .why-feat:hover { border-left-color: var(--green); transform: translateY(-2px); box-shadow: var(--shadow-sm); }
    .why-feat i { color: var(--green); font-size: 1.1rem; margin-top: 3px; flex-shrink: 0; }
    .why-feat strong { display: block; font-size: 0.88rem; color: var(--text); margin-bottom: 3px; }
    .why-feat span { font-size: 0.8rem; color: var(--text-muted); }

    /* ════════════════════════════════
       CLIENTS
    ════════════════════════════════ */
    .clients-section { background: var(--off-white); }
    .clients-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
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
      width: 52px; height: 52px; border-radius: 50%;
      background: var(--green-pale);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.4rem; color: var(--green);
      margin: 0 auto 14px;
      transition: var(--transition);
    }
    .client-card:hover .client-icon { background: var(--green); color: white; }
    .client-card h3 { font-size: 0.88rem; font-weight: 600; color: var(--text); line-height: 1.4; }

    /* ════════════════════════════════
       QUALITY SECTION
    ════════════════════════════════ */
    .quality-section {
      background: linear-gradient(135deg, var(--green-dark) 0%, var(--green) 100%);
      position: relative; overflow: hidden;
    }
    .quality-section::before {
      content: '';
      position: absolute; inset: 0;
      background: repeating-linear-gradient(
        45deg,
        transparent,
        transparent 30px,
        rgba(255,255,255,.02) 30px,
        rgba(255,255,255,.02) 60px
      );
    }
    /* Red accent stripe */
    .quality-section::after {
      content: '';
      position: absolute; top: 0; left: 0; width: 6px; height: 100%;
      background: var(--red);
    }
    .quality-inner { position: relative; z-index: 1; }
    .quality-grid {
      display: grid; grid-template-columns: 1fr 1fr;
      gap: 60px; align-items: center;
    }
    .quality-text .sec-title { color: white; }
    .quality-text .sec-sub { color: rgba(255,255,255,.82); max-width: 480px; }
    .quality-badges { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 26px; }
    .q-badge {
      background: rgba(255,255,255,.1);
      border: 1px solid rgba(255,255,255,.2);
      color: white;
      padding: 9px 16px; border-radius: 8px;
      font-size: 0.82rem; font-weight: 600;
      display: flex; align-items: center; gap: 7px;
      transition: var(--transition);
    }
    .q-badge:hover { background: rgba(255,255,255,.2); }
    .q-badge i { color: var(--gold); }
    .quality-features { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .q-feat {
      background: rgba(255,255,255,.08);
      border: 1px solid rgba(255,255,255,.12);
      border-radius: 12px; padding: 22px;
      text-align: center; transition: var(--transition);
    }
    .q-feat:hover { background: rgba(255,255,255,.15); transform: translateY(-3px); }
    .q-feat i { font-size: 1.8rem; color: var(--gold); margin-bottom: 10px; display: block; }
    .q-feat strong { color: white; font-size: 0.88rem; font-weight: 600; display: block; margin-bottom: 6px; }
    .q-feat p { color:black; font-size: 0.8rem; }

    /* ════════════════════════════════
       PARTNERS
    ════════════════════════════════ */
    .partners-section { background: white; padding: 60px 0; }
    .partners-track-wrap { overflow: hidden; position: relative; margin: 0 -32px; padding: 10px 0; }
    .partners-track {
      display: flex; gap: 24px;
      animation: marquee 20s linear infinite;
      width: max-content;
    }
    .partners-track:hover { animation-play-state: paused; }
    @keyframes marquee {
      0% { transform: translateX(0); }
      100% { transform: translateX(-50%); }
    }
    .partner-box {
      min-width: 210px; height: 100px;
      background: var(--off-white);
      border-radius: var(--radius);
      display: flex; align-items: center; justify-content: center;
      box-shadow: var(--shadow-sm); padding: 20px;
      flex-shrink: 0; border: 1px solid var(--gray-100);
      transition: var(--transition);
    }
    .partner-box:hover { border-color: var(--green); box-shadow: var(--shadow); }
    .partner-box img { max-width: 100%; max-height: 55px; object-fit: contain; filter: grayscale(30%); transition: filter .3s; }
    .partner-box:hover img { filter: grayscale(0%); }

    /* ════════════════════════════════
       FOOTER
    ════════════════════════════════ */
    .footer { background: var(--green-dark); color: rgba(255,255,255,.75); }
    .footer-main { padding: 64px 0 40px; }
    .footer-grid {
      display: grid;
      grid-template-columns: 2fr 1fr 1.2fr 1.2fr;
      gap: 40px;
    }

    /* Footer brand */
    .footer-logo {
      display: flex; align-items: center; gap: 12px;
      text-decoration: none; margin-bottom: 16px;
    }
    .footer-logo-icon {
      width: 48px; height: 48px; border-radius: 50%;
      background: rgba(255,255,255,.1);
      border: 2px solid var(--gold);
      display: flex; align-items: center; justify-content: center;
      font-size: 1.3rem; color: var(--gold);
    }
    .footer-logo h3 { color: white; font-size: 1.2rem; font-weight: 700; }
    .footer-col > p { font-size: 0.86rem; line-height: 1.72; max-width: 270px; margin-bottom: 22px; }

    .footer-social { display: flex; gap: 10px; }
    .social-icon {
      width: 36px; height: 36px; border-radius: 8px;
      background: rgba(255,255,255,.1);
      display: flex; align-items: center; justify-content: center;
      color: white; font-size: 0.85rem; text-decoration: none;
      transition: var(--transition);
    }
    .social-icon:hover { background: var(--gold); color: var(--green-dark); }

    .footer-col h4 { color: white; font-size: 0.95rem; font-weight: 600; margin-bottom: 18px; padding-bottom: 10px; border-bottom: 1px solid rgba(255,255,255,.1); }
    .footer-links { list-style: none; }
    .footer-links li { margin-bottom: 10px; }
    .footer-links li a {
      color: rgba(255,255,255,.65);
      text-decoration: none; font-size: 0.86rem;
      display: flex; align-items: center; gap: 8px;
      transition: color .2s;
    }
    .footer-links li a::before { content: '›'; color: var(--gold); font-size: 1rem; }
    .footer-links li a:hover { color: var(--gold); }

    .footer-contact { list-style: none; }
    .footer-contact li {
      display: flex; align-items: flex-start; gap: 12px;
      margin-bottom: 12px; font-size: 0.86rem;
    }
    .footer-contact li i { color: var(--gold); margin-top: 3px; flex-shrink: 0; width: 14px; }
    .footer-contact li a { color: rgba(255,255,255,.65); text-decoration: none; transition: color .2s; }
    .footer-contact li a:hover { color: var(--gold); }

    .footer-bottom {
      border-top: 1px solid rgba(255,255,255,.1);
      padding: 20px 0;
    }
    .footer-bottom-content p {
      font-size: 0.82rem; color: rgba(255,255,255,.5);
      padding: 12px 0;
    }

    /* Scroll to top */
    .scroll-top {
      position: fixed; bottom: 28px; right: 28px;
      width: 44px; height: 44px; border-radius: 50%;
      background: var(--green);
      color: white; border: none; cursor: pointer;
      font-size: 1rem;
      display: flex; align-items: center; justify-content: center;
      box-shadow: var(--shadow);
      transition: var(--transition); z-index: 999;
      opacity: 0; pointer-events: none;
    }
    .scroll-top.visible { opacity: 1; pointer-events: all; }
    .scroll-top:hover { background: var(--red); transform: translateY(-3px); }

    /* ════════════════════════════════
       RESPONSIVE
    ════════════════════════════════ */
    @media (max-width: 1024px) {
      .hero { grid-template-columns: 1fr; }
      .hero-sidebar { flex-direction: row; gap: 16px; padding: 28px; }
      .vm-block { flex: 1; }
      .stats-inner { grid-template-columns: repeat(2, 1fr); }
      .why-grid, .quality-grid { grid-template-columns: 1fr; gap: 40px; }
      .footer-grid { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 768px) {
      .logo-text h1 { display: none; }
      .nav-menu > li > a { padding: 14px 14px; font-size: 0.82rem; }
      .hero-text { padding: 40px 24px; }
      .hero-sidebar { flex-direction: column; }
      .stats-inner { grid-template-columns: repeat(2, 1fr); }
      .info-grid { grid-template-columns: 1fr; }
      .why-features { grid-template-columns: 1fr; }
      .footer-grid { grid-template-columns: 1fr; }
      section { padding: 56px 0; }
      .mobile-menu-toggle { display: flex; }
    }
  </style>
</head>
<body>

<!-- ════════ HEADER ════════ -->
<header class="header">
  <div class="container-fluid">
    <div class="header-content">
      <a href="#" class="logo-link">
        <!-- Use your actual logo by replacing the div below with: <img src="/images/ABREMA_LOGO.png" class="logo-img" alt="Logo ABREMA"> -->
        <div class="logo-placeholder"><i class="fas fa-shield-alt"></i></div>
        <div class="logo-text">
          <h1>
            <span>ABREMA</span>
            Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments
          </h1>
        </div>
      </a>
      <div class="header-actions">
        <button class="search-btn" id="openSearch" aria-label="Rechercher">
          <i class="fas fa-search"></i>
        </button>
        <button class="mobile-menu-toggle" id="mobileMenuToggle" aria-label="Menu">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>
  </div>

  <!-- SEARCH MODAL -->
  <div id="searchModal" class="search-modal">
    <div class="search-modal-content">
      <button class="close-search" id="closeSearch"><i class="fas fa-times"></i></button>
      <div class="search-box">
        <i class="fas fa-search search-icon"></i>
        <input type="text" placeholder="Recherche......" class="search-input" id="searchInput" autofocus>
        <button class="search-submit"><i class="fas fa-search"></i></button>
      </div>
      <div class="search-suggestions">
        <p>Suggestions populaires :</p>
        <div class="suggestion-tags">
          <span class="suggestion-tag">Enregistrement</span>
          <span class="suggestion-tag">Importation</span>
          <span class="suggestion-tag">Inspection</span>
          <span class="suggestion-tag">Vigilance</span>
          <span class="suggestion-tag">Laboratoire</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- ════════ NAVBAR ════════ -->
<nav class="navbar" id="mainNav">
  <div class="container-fluid">
    <ul class="nav-menu" id="navMenu">
      <li><a href="#" class="active">Accueil</a></li>

      <li class="dropdown">
        <a href="#">À propos <i class="fas fa-chevron-down"></i></a>
        <ul class="dropdown-menu">
          <li><a href="#">Profil de l'ABREMA</a></li>
          <li><a href="#">Organigramme</a></li>
          <li><a href="#">Équipe de Direction</a></li>
          <li><a href="#">Fonction Réglementaire</a></li>
          <li><a href="#">QMS</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Médicaments <i class="fas fa-chevron-down"></i></a>
        <ul class="dropdown-menu">
          <li class="has-submenu">
            <a href="#">Enregistrement / Homologation</a>
            <ul class="dropdown-submenu">
              <li><a href="#">Enregistrement</a></li>
              <li><a href="#">Listes des Notifications</a></li>
              <li><a href="#">Textes Réglementaires</a></li>
              <li><a href="#">Liste Nationale des Médicaments Essentiels</a></li>
            </ul>
          </li>
          <li class="has-submenu">
            <a href="#">Import & Export</a>
            <ul class="dropdown-submenu">
              <li><a href="#">Demande d'importation</a></li>
              <li><a href="#">Textes Réglementaires</a></li>
            </ul>
          </li>
          <li class="has-submenu">
            <a href="#">Inspection</a>
            <ul class="dropdown-submenu">
              <li><a href="#">Établissements</a></li>
              <li><a href="#">Inspection GMP</a></li>
              <li><a href="#">Inspection GDP</a></li>
            </ul>
          </li>
          <li class="has-submenu">
            <a href="#">Vigilance & Publicité</a>
            <ul class="dropdown-submenu">
              <li><a href="#">Notifications / ES</a></li>
              <li><a href="#">Signalement / PMQIF</a></li>
              <li><a href="#">Délégués Médicaux</a></li>
              <li><a href="#">Rappel de produit</a></li>
              <li><a href="#">Textes Réglementaires</a></li>
            </ul>
          </li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Labo Contrôle Qualité <i class="fas fa-chevron-down"></i></a>
        <ul class="dropdown-menu">
          <li><a href="#">Service Laboratoire</a></li>
          <li><a href="#">À propos du Labo</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Services en Ligne <i class="fas fa-chevron-down"></i></a>
        <ul class="dropdown-menu">
          <li><a href="#">Inspection des colis</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#">Information et Publication <i class="fas fa-chevron-down"></i></a>
        <ul class="dropdown-menu">
          <li><a href="#">Événements</a></li>
          <li><a href="#">Actualités</a></li>
          <li><a href="#">Autres Documents</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<!-- ════════ HERO ════════ -->
<section style="padding:0;">
  <div class="hero">
    <div class="hero-slider" id="heroSlider">

      <div class="hero-slide active">
        <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1200&q=80" alt="Santé Publique">
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
        <img src="https://images.unsplash.com/photo-1587854692152-cbe660dbde88?w=1200&q=80" alt="Contrôle Qualité">
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
        <img src="https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=1200&q=80" alt="Digitalisation">
        <div class="hero-text">
          <span class="hero-tag"><i class="fas fa-laptop"></i> Digitalisation</span>
          <h1>ABREMA-RIMS : Services Réglementaires en Ligne</h1>
          <p>Notre système électronique digitalise les principales fonctions réglementaires pour plus d'efficacité et de transparence dans le secteur pharmaceutique.</p>
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

    <div class="hero-sidebar">
      <div class="vm-block">
        <div class="vm-label"><i class="fas fa-eye"></i><h3>Notre Vision</h3></div>
        <p>Atteindre un niveau de maturité élevé de qualité de services, le maintenir et l'améliorer de façon continue.</p>
      </div>
      <div class="vm-block">
        <div class="vm-label"><i class="fas fa-bullseye"></i><h3>Notre Mission</h3></div>
        <p>Promouvoir et protéger la santé publique en s'assurant que les produits de santé disponibles sont de bonne qualité, sûrs et efficaces.</p>
      </div>
    </div>
  </div>
</section>

<!-- ════════ STATS ════════ -->
<div class="stats-bar">
  <div class="stats-inner">
    <div class="stat"><span class="stat-num">500+</span><span class="stat-label">Produits Homologués</span></div>
    <div class="stat"><span class="stat-num">150+</span><span class="stat-label">Clients Servis</span></div>
    <div class="stat"><span class="stat-num">12+</span><span class="stat-label">Partenaires Internationaux</span></div>
    <div class="stat"><span class="stat-num">100%</span><span class="stat-label">Conformité OMS</span></div>
  </div>
</div>

<!-- ════════ SERVICES ════════ -->
<section class="services-section">
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
        <p>Digitalisation des procédures réglementaires. Le système ASYCUDA est opérationnel pour les autorisations d'importation.</p>
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

<!-- ════════ WHY US ════════ -->
<section class="why-section">
  <div class="container">
    <div class="why-grid">
      <div class="why-img">
        <img src="https://images.unsplash.com/photo-1582719471384-894fbb16e074?w=800&q=80" alt="Laboratoire ABREMA">
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
            <div><strong>Évaluation Rigoureuse</strong><span>Processus basé sur des critères scientifiques internationaux</span></div>
          </div>
          <div class="why-feat">
            <i class="fas fa-clock"></i>
            <div><strong>Délais Optimisés</strong><span>Procédures efficaces pour les demandes d'autorisation</span></div>
          </div>
          <div class="why-feat">
            <i class="fas fa-globe"></i>
            <div><strong>Normes Internationales</strong><span>Conformité OMS, ICH, EAC et ISO</span></div>
          </div>
          <div class="why-feat">
            <i class="fas fa-laptop"></i>
            <div><strong>Services Digitalisés</strong><span>ASYCUDA et ABREMA-RIMS pour plus d'accessibilité</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ════════ CLIENTS ════════ -->
<section class="clients-section">
  <div class="container">
    <div class="sec-header center">
      <span class="sec-tag">Nos Clients</span>
      <h2 class="sec-title">L'ABREMA au Service de Tous les Acteurs</h2>
      <div class="divider"></div>
      <p class="sec-sub">L'agence sert l'ensemble des acteurs du secteur pharmaceutique burundais, des importateurs aux professionnels de santé.</p>
    </div>
    <div class="clients-grid">
      <div class="client-card"><div class="client-icon"><i class="fas fa-industry"></i></div><h3>Fabricants de Médicaments</h3></div>
      <div class="client-card"><div class="client-icon"><i class="fas fa-ship"></i></div><h3>Importateurs & Distributeurs</h3></div>
      <div class="client-card"><div class="client-icon"><i class="fas fa-hospital"></i></div><h3>Hôpitaux & Cliniques</h3></div>
      <div class="client-card"><div class="client-icon"><i class="fas fa-pills"></i></div><h3>Pharmacies</h3></div>
      <div class="client-card"><div class="client-icon"><i class="fas fa-user-md"></i></div><h3>Professionnels de Santé</h3></div>
      <div class="client-card"><div class="client-icon"><i class="fas fa-flask"></i></div><h3>Laboratoires de Recherche</h3></div>
    </div>
  </div>
</section>

<!-- ════════ QUALITY ════════ -->
<section class="quality-section">
  <div class="container quality-inner">
    <div class="quality-grid">
      <div class="quality-text">
        <span class="sec-tag" style="color:var(--gold-light)">Politique Qualité</span>
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
        <div class="q-feat"><i class="fas fa-shield-alt"></i><strong>100% Contrôle Qualité</strong><p>Garantie de médicaments sûrs</p></div>
        <div class="q-feat"><i class="fas fa-sync-alt"></i><strong>Amélioration Continue</strong><p>Processus en évolution permanente</p></div>
        <div class="q-feat"><i class="fas fa-users-cog"></i><strong>Expertise Dédiée</strong><p>Équipe de spécialistes qualifiés</p></div>
        <div class="q-feat"><i class="fas fa-handshake"></i><strong>Satisfaction Clients</strong><p>Engagement envers les usagers</p></div>
      </div>
    </div>
  </div>
</section>

<!-- ════════ PARTNERS ════════ -->
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
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/WHO_logo.svg/320px-WHO_logo.svg.png" alt="OMS/WHO"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8e/African_Union_Logo.svg/320px-African_Union_Logo.svg.png" alt="Union Africaine"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/EAC_logo.svg/320px-EAC_logo.svg.png" alt="EAC"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/UNICEF_Logo.svg/320px-UNICEF_Logo.svg.png" alt="UNICEF"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/UNDP_logo.svg/320px-UNDP_logo.svg.png" alt="UNDP"></div>
      <!-- Duplicates for infinite marquee -->
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/WHO_logo.svg/320px-WHO_logo.svg.png" alt="OMS/WHO"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/en/thumb/8/8e/African_Union_Logo.svg/320px-African_Union_Logo.svg.png" alt="Union Africaine"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/EAC_logo.svg/320px-EAC_logo.svg.png" alt="EAC"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/UNICEF_Logo.svg/320px-UNICEF_Logo.svg.png" alt="UNICEF"></div>
      <div class="partner-box"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/UNDP_logo.svg/320px-UNDP_logo.svg.png" alt="UNDP"></div>
    </div>
  </div>
</section>

<!-- ════════ FOOTER ════════ -->
<footer class="footer">
  <div class="footer-main">
    <div class="container-fluid">
      <div class="footer-grid">
        <div class="footer-col">
          <div class="footer-logo">
            <div class="footer-logo-icon"><i class="fas fa-shield-alt"></i></div>
            <h3>ABREMA</h3>
          </div>
          <p>Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments. Nous protégeons la santé publique en garantissant la qualité des produits de santé au Burundi.</p>
          <div class="footer-social">
            <a href="https://www.facebook.com/profile.php?id=61576348075548" class="social-icon" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.youtube.com/@Abrema-Burundi" class="social-icon" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
            <a href="https://x.com/Abrema_Burundi" class="social-icon" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="https://www.linkedin.com/in/abrema" class="social-icon" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.instagram.com/abrema_burundi/" class="social-icon" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          </div>
        </div>

        <div class="footer-col">
          <h4>Liens Rapides</h4>
          <ul class="footer-links">
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Profil global d'ABREMA</a></li>
            <li><a href="#">Liste des médicaments</a></li>
            <li><a href="#">À propos du Laboratoire</a></li>
            <li><a href="#">Équipe de Direction</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Liens Importants</h4>
          <ul class="footer-links">
            <li><a href="https://presidence.gov.bi/" target="_blank">Présidence de la République</a></li>
            <li><a href="https://www.minsante.gov.bi/" target="_blank">Ministère de la Santé Publique</a></li>
            <li><a href="https://finances.gov.bi/" target="_blank">Ministère des Finances & Budget</a></li>
            <li><a href="https://camebu.net/" target="_blank">CAMEBU</a></li>
          </ul>
        </div>

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
              <span>Numéro vert : <strong style="color:var(--gold)">203</strong></span>
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
      <div class="footer-bottom-content" style="text-align:center;">
        <p>Copyright © 2025 Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments – Tous droits réservés</p>
      </div>
    </div>
  </div>
</footer>

<!-- SCROLL TO TOP -->
<button class="scroll-top" id="scrollTop" aria-label="Retour en haut">
  <i class="fas fa-arrow-up"></i>
</button>

<script>
  // ── HERO SLIDER ──
  const slides = document.querySelectorAll('.hero-slide');
  const dots   = document.querySelectorAll('.dot');
  let current  = 0;
  let timer;

  function goTo(n) {
    slides[current].classList.remove('active');
    dots[current].classList.remove('active');
    current = (n + slides.length) % slides.length;
    slides[current].classList.add('active');
    dots[current].classList.add('active');
  }
  function startTimer() { timer = setInterval(() => goTo(current + 1), 5000); }
  startTimer();

  document.getElementById('prevBtn').addEventListener('click', () => { clearInterval(timer); goTo(current - 1); startTimer(); });
  document.getElementById('nextBtn').addEventListener('click', () => { clearInterval(timer); goTo(current + 1); startTimer(); });
  dots.forEach(d => d.addEventListener('click', () => { clearInterval(timer); goTo(+d.dataset.idx); startTimer(); }));

  const heroSlider = document.getElementById('heroSlider');
  heroSlider.addEventListener('mouseenter', () => clearInterval(timer));
  heroSlider.addEventListener('mouseleave', startTimer);

  // ── SEARCH MODAL ──
  const modal = document.getElementById('searchModal');
  document.getElementById('openSearch').addEventListener('click', () => modal.classList.add('open'));
  document.getElementById('closeSearch').addEventListener('click', () => modal.classList.remove('open'));
  modal.addEventListener('click', e => { if (e.target === modal) modal.classList.remove('open'); });

  // ── SCROLL TO TOP ──
  const scrollBtn = document.getElementById('scrollTop');
  window.addEventListener('scroll', () => {
    scrollBtn.classList.toggle('visible', window.scrollY > 400);
  });
  scrollBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
</script>
</body>
</html>