@extends('layouts.base')

@section('title', 'Médicaments Enregistrés | ')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/pages.css') }}">
    <style>
        /* ── Toolbar ── */
        .produits-toolbar {
            display: flex; align-items: center;
            justify-content: space-between;
            flex-wrap: wrap; gap: 14px;
            margin-bottom: 24px;
        }

        .produits-search {
            display: flex; align-items: center; gap: 8px; flex: 1; max-width: 480px;
        }
        .produits-search input {
            flex: 1; padding: 9px 14px;
            border: 1px solid var(--gray-200);
            font-size: 0.86rem; outline: none;
            transition: border-color .2s;
            font-family: 'Poppins', sans-serif;
        }
        .produits-search input:focus { border-color: var(--green); }
        .produits-search button {
            width: 38px; height: 38px;
            background: var(--green-dark); color: #fff;
            border: none; cursor: pointer;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.85rem; transition: background .2s;
        }
        .produits-search button:hover { background: var(--gold); }

        .btn-export {
            display: inline-flex; align-items: center; gap: 8px;
            background: var(--green-dark); color: #fff;
            padding: 9px 18px; font-size: 0.84rem; font-weight: 600;
            text-decoration: none; transition: var(--tr);
            font-family: 'Poppins', sans-serif;
        }
        .btn-export:hover { background: var(--gold); color: #fff; transform: translateY(-1px); }

        .produits-count {
            font-size: 0.82rem; font-weight: 600;
            color: var(--gray-400); background: var(--gray-50);
            padding: 9px 14px; border: 1px solid var(--gray-100);
            display: flex; align-items: center; gap: 7px;
        }
        .produits-count i { color: var(--gold); }

        /* ── Table ── */
        .produits-table-wrap {
            width: 100%; overflow-x: auto;
            border: 1px solid var(--gray-200);
        }

        .produits-table {
            width: 100%; border-collapse: collapse;
            font-size: 0.84rem;
        }

        .produits-table thead {
            background: var(--green-dark);
        }
        .produits-table thead th {
            padding: 13px 16px;
            text-align: left;
            font-size: 0.72rem; font-weight: 700;
            color: rgba(255,255,255,.85);
            text-transform: uppercase; letter-spacing: .07em;
            white-space: nowrap;
            border-right: 1px solid rgba(255,255,255,.08);
        }
        .produits-table thead th:last-child { border-right: none; }

        .produits-table tbody tr {
            border-bottom: 1px solid var(--gray-100);
            transition: background .15s;
        }
        .produits-table tbody tr:hover { background: var(--green-pale); }

        .produits-table td {
            padding: 13px 16px;
            color: var(--text); vertical-align: middle;
            border-right: 1px solid var(--gray-100);
        }
        .produits-table td:last-child { border-right: none; }

        .td-id {
            font-size: 0.75rem; font-weight: 700;
            color: var(--gray-400); font-family: monospace;
        }
        .td-designation { font-weight: 700; color: var(--green-dark); }
        .td-dci { font-style: italic; color: var(--gray-600); }
        .td-dosage { font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--gray-400); margin-top: 3px; }
        .td-form { color: var(--gray-700); }
        .td-cond { font-size: 0.75rem; color: var(--gray-400); margin-top: 2px; }
        .td-cat {
            display: inline-block; padding: 3px 10px;
            background: var(--gray-50); border: 1px solid var(--gray-200);
            font-size: 0.72rem; font-weight: 700; color: var(--gray-600);
        }
        .td-lab { font-weight: 600; color: var(--text); }
        .td-pays { font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--gray-400); margin-top: 2px; }
        .td-num { font-family: monospace; font-size: 0.78rem; font-weight: 700; color: var(--green-dark); }
        .td-date { font-size: 0.75rem; color: var(--gray-400); margin-top: 2px; }

        /* Badges expiration */
        .badge-expired {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 4px 10px; font-size: 0.72rem; font-weight: 700;
            background: #fef2f2; color: #dc2626;
            border: 1px solid #fca5a5;
        }
        .badge-soon {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 4px 10px; font-size: 0.72rem; font-weight: 700;
            background: #fffbeb; color: #d97706;
            border: 1px solid #fcd34d;
        }
        .badge-valid {
            font-size: 0.75rem; color: var(--gray-300); font-style: italic;
        }

        /* Note de bas */
        .produits-note {
            display: flex; align-items: flex-start; gap: 12px;
            background: var(--gray-50); border-left: 4px solid var(--gray-200);
            padding: 16px 18px; margin-top: 22px;
        }
        .produits-note i { color: var(--gray-300); font-size: 1.1rem; margin-top: 2px; flex-shrink: 0; }
        .produits-note p { font-size: 0.85rem; color: var(--gray-600); line-height: 1.7; margin: 0; }

        /* Pagination */
        .produits-pagination {
            padding-top: 18px;
            border-top: 1px solid var(--gray-100);
            margin-top: 4px;
        }

        @media (max-width: 820px) {
            .produits-toolbar { flex-direction: column; align-items: stretch; }
            .produits-search { max-width: 100%; }
        }
    </style>
@endsection

@section('content')

    {{-- ── PAGE BANNER ── --}}
    <div class="page-banner">
        <div class="banner-breadcrumb">
            <a href="{{ route('home') }}">Accueil</a>
            <i class="fas fa-chevron-right"></i>
            <span class="current">Médicaments Enregistrés</span>
        </div>
        <h1>Médicaments Enregistrés</h1>
        <p class="lead">Liste officielle des médicaments homologués et régulés par l'ABREMA au Burundi</p>
    </div>

    {{-- ── MAIN LAYOUT ── --}}
    <div class="main-layout">
        <div class="container-fluid">
            <div class="layout-row">

                {{-- ══ SIDEBAR ══ --}}
                <aside class="sidebar-nav">

                    <div class="nav-block">
                        <nav>
                            <a class="nav-link {{ Route::is('medicament.listemedicament') ? 'active' : '' }}"
                               href="{{ route('medicament.listemedicament') }}">
                                <span>Médicaments Essentiels</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('medicament.notifications') ? 'active' : '' }}"
                               href="{{ route('medicament.notifications') }}">
                                <span>Notifications</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('medicament.produits') ? 'active' : '' }}"
                               href="{{ route('medicament.produits') }}">
                                <span>Médicaments Enregistrés</span>
                                <span class="nav-arrow"><i class="fas fa-chevron-right"></i></span>
                            </a>
                            <a class="nav-link {{ Route::is('medicament.textemedicament') ? 'active' : '' }}"
                               href="{{ route('medicament.textemedicament') }}">
                                <span>Textes Réglementaires</span>
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
                        <div class="sc-icon"><i class="fas fa-database"></i></div>
                        <h4>Service Enregistrement</h4>
                        <p>Pour toute question sur un médicament enregistré</p>
                        <span class="sc-phone">+257 22 22 97 39</span>
                        <span class="sc-label">Numéro vert gratuit : 203</span>
                    </div>

                </aside>

                {{-- ══ CONTENU ══ --}}
                <main class="main-content">

                    <h2>Médicaments Enregistrés</h2>
                    <p>Liste officielle régulée par l'ABREMA pour garantir la sécurité des produits pharmaceutiques au Burundi.</p>

                    {{-- Toolbar --}}
                    <div class="produits-toolbar">
                        <div class="produits-search">
                            <form method="GET" action="{{ route('medicament.produits') }}" style="display:flex;gap:0;flex:1;">
                                <input type="text" name="search"
                                       value="{{ request('search') }}"
                                       placeholder="Rechercher par désignation ou DCI…">
                                <button type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>

                        <div style="display:flex; align-items:center; gap:10px;">
                            <a href="{{ route('produits.export.excel') }}" class="btn-export">
                                <i class="fas fa-file-excel"></i> Exporter Excel
                            </a>
                            <div class="produits-count">
                                <i class="fas fa-database"></i>
                                {{ $produits->total() ?? $produits->count() }} enregistrements
                            </div>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div class="produits-table-wrap">
                        <table class="produits-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Désignation Commerciale</th>
                                    <th>DCI / Dosage</th>
                                    <th>Forme / Cond.</th>
                                    <th>Catégorie</th>
                                    <th>Laboratoire / Pays</th>
                                    <th>Titulaire AMM</th>
                                    <th>N° &amp; Date Enreg.</th>
                                    @auth
                                        <th>Expiration</th>
                                    @endauth
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produits as $produit)
                                    <tr>
                                        <td><span class="td-id">{{ $produit->id }}</span></td>
                                        <td>
                                            <div class="td-designation">{{ $produit->designation_commerciale }}</div>
                                        </td>
                                        <td>
                                            <div class="td-dci">{{ $produit->dci }}</div>
                                            <div class="td-dosage">{{ $produit->dosage }}</div>
                                        </td>
                                        <td>
                                            <div class="td-form">{{ $produit->forme }}</div>
                                            <div class="td-cond">{{ $produit->conditionnement }}</div>
                                        </td>
                                        <td>
                                            <span class="td-cat">{{ $produit->category }}</span>
                                        </td>
                                        <td>
                                            <div class="td-lab">{{ $produit->nom_laboratoire }}</div>
                                            <div class="td-pays">{{ $produit->pays_origine }}</div>
                                        </td>
                                        <td style="font-size:0.84rem;">{{ $produit->titulaire_amm }}</td>
                                        <td>
                                            <div class="td-num">{{ $produit->num_enregistrement }}</div>
                                            <div class="td-date">{{ $produit->date_amm }}</div>
                                        </td>
                                        @auth
                                            <td>
                                                @if($produit->is_expired)
                                                    <span class="badge-expired">
                                                        <i class="fas fa-times-circle"></i>
                                                        Expiré {{ $produit->date_expiration->format('d/m/Y') }}
                                                    </span>
                                                @elseif($produit->is_near_expiration)
                                                    <span class="badge-soon">
                                                        <i class="fas fa-clock"></i>
                                                        Bientôt ({{ $produit->date_expiration->format('d/m/Y') }})
                                                    </span>
                                                @else
                                                    <span class="badge-valid">En cours de validité</span>
                                                @endif
                                            </td>
                                        @endauth
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    @if($produits->hasPages())
                        <div class="produits-pagination">
                            {{ $produits->links() }}
                        </div>
                    @endif

                    {{-- Note --}}
                    <div class="produits-note">
                        <i class="fas fa-info-circle"></i>
                        <p>
                            Cette liste est mise à jour périodiquement. En cas de doute sur l'authenticité
                            d'un produit, veuillez contacter les services de l'ABREMA.
                        </p>
                    </div>

                </main>

            </div>
        </div>
    </div>

@endsection