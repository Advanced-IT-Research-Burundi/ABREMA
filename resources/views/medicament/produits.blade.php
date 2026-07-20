@extends('layouts.base')
@section('title', 'ABREMA - Produits Medicaments Enregistrees')

@section('styles')
    <style>
        :root {
            --primary-hsl: 133, 46%, 33%;
            --secondary-hsl: 210, 100%, 25%;
            --danger-hsl: 0, 84%, 60%;
            --warning-hsl: 38, 92%, 50%;
            --success-hsl: 142, 69%, 45%;
        }

        .produits-page {
            background-color: #f8fafc;
            min-height: 100vh;
        }

        .produits-banner {
            background: linear-gradient(
        135deg,
        var(--primary-color) 0%,
        var(--primary-dark) 100%
    );
            color: white;
            padding: 80px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .produits-banner::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 86c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zm66-3c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zm-46-43c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zm20-27c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zm-40 5c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zm63 31c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zM44 77c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zm52-23c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zM80 3c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zM9 26c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zM65 61c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zM28 49c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
            opacity: 0.4;
        }

        .produits-banner h1 {
            font-size: 2.5rem;
            font-weight: 600;
            letter-spacing: -0.025em;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .produits-container {
            max-width: 1400px;
            margin: -40px auto 40px;
            padding: 0 20px;
            position: relative;
            z-index: 10;
        }

        .produits-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .produits-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 20px;
            flex-wrap: wrap;
        }

        .toolbar-group {
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .search-form {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .search-input {
            padding: 10px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            outline: none;
            transition: border-color 0.2s;
            min-width: 250px;
        }

        .search-input:focus {
            border-color: hsl(var(--primary-hsl));
            box-shadow: 0 0 0 3px hsla(var(--primary-hsl), 0.1);
        }

        .page-size-select {
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background-color: white;
            cursor: pointer;
            outline: none;
        }

        .search-btn-ui {
            padding: 10px 18px;
            background: hsl(var(--primary-hsl));
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .search-btn-ui:hover {
            background: hsl(var(--primary-hsl), 0.9);
        }

        .export-btn {
            background: hsl(var(--primary-hsl));
            color: white !important;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            font-size: 0.9rem;
        }

        .export-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .records-count {
            padding: 10px 16px;
            font-weight: 600;
            border-radius: 8px;
            color: #64748b;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .produits-table-container {
            border-radius: 12px;
            overflow-x: auto;
            border: 1px solid #e2e8f0;
            background: white;
            position: relative;
        }

        .produits-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.925rem;
            min-width: 1100px;
        }

        .produits-table thead {
            background-color: #f1f5f9;
        }

        .produits-table th {
            padding: 16px 20px;
            text-align: left;
            text-transform: uppercase;
            font-size: 0.75rem;
            font-weight: 700;
            color: #475569;
            letter-spacing: 0.05em;
            border-bottom: 2px solid #e2e8f0;
            white-space: nowrap;
        }

        .produits-table td {
            padding: 16px 20px;
            border-bottom: 1px solid #f1f5f9;
            color: #1e293b;
            vertical-align: middle;
        }

        .produits-table tbody tr:hover {
            background-color: #f8fafc;
        }

        /* Status & Alerts */
        .alert-badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 14px;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 700;
            gap: 6px;
        }

        .alert-near-expiration {
            background-color: hsl(var(--warning-hsl), 0.1);
            color: hsl(var(--warning-hsl));
            border: 1px solid hsl(var(--warning-hsl), 0.5);
        }

        .alert-expired {
            background-color: hsl(var(--danger-hsl), 0.1);
            color: hsl(var(--danger-hsl));
            border: 1px solid hsl(var(--danger-hsl), 0.5);
        }

        @media (max-width: 1024px) {
            .produits-toolbar {
                flex-direction: column;
                align-items: stretch;
            }
        }

        @media (max-width: 640px) {
            .produits-banner h1 { font-size: 2rem; }
            .produits-card { padding: 15px; }
            .toolbar-group { flex-direction: column; align-items: stretch; }
            .search-form { flex-direction: column; align-items: stretch; }
        }
    </style>
@endsection

@section('content')
<div class="produits-page">
    <!-- BANNER -->
    <div class="produits-banner">
        <div class="container">
            <h1>Médicaments enregistrés</h1>
            <p>Liste officielle régulée par l'ABREMA pour garantir la sécurité des produits au Burundi</p>
        </div>
    </div>

    <div class="produits-container">
        <div class="produits-card">
            <div class="produits-toolbar">
                <div class="toolbar-group">
                    <form id="filterForm" method="GET" action="{{ route('medicament.produits') }}" class="search-form">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher par désignation ou DCI..." class="search-input">
                        
                        <select name="per_page" onchange="document.getElementById('filterForm').submit()" class="page-size-select">
                            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10 par page</option>
                            <option value="15" {{ (request('per_page', 15) == 15) ? 'selected' : '' }}>15 par page</option>
                            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25 par page</option>
                            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50 par page</option>
                            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100 par page</option>
                        </select>

                        <button type="submit" class="search-btn-ui">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <a href="{{ route('produits.export.excel') }}" class="export-btn">
                        <i class="fas fa-file-excel"></i> Excel
                    </a>
                </div>
                <div class="records-count">
                    <i class="fas fa-database"></i> {{ $produits->total() ?? $produits->count() }} enregistrements
                </div>
            </div>

            <div class="produits-table-container">
                <table class="produits-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>DESIGNATION COMMERCIALE</th>
                            <th>DCI / DOSAGE</th>
                            <th>FORME / CONDITIONNEMENT</th>
                            <th>CATEGORIE</th>
                            <th>LABORATOIRE / PAYS</th>
                            <th>TITULAIRE AMM</th>
                            <th>N° & DATE ENREG.</th>
                            <th>Date d'expiration</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                            <tr>
                                <td data-label="ID">{{ ($produits->currentPage() - 1) * $produits->perPage() + $loop->iteration }}</td>
                                <td data-label="DESIGNATION">
                                    <div class="font-bold text-slate-800">{{ $produit->designation_commerciale }}</div>
                                </td>
                                <td data-label="DCI / DOSAGE">
                                    <div class="italic text-slate-600">{{ $produit->dci }}</div>
                                    <div class="mt-1 text-xs font-semibold uppercase text-slate-400">{{ $produit->dosage }}</div>
                                </td>
                                <td data-label="FORME / COND.">
                                    <div>{{ $produit->forme }}</div>
                                    <div class="mt-1 text-xs text-slate-400">{{ $produit->conditionnement }}</div>
                                </td>
                                <td data-label="CATEGORIE">
                                    <span class="px-3 py-1 text-xs font-bold rounded bg-slate-100">{{ $produit->category }}</span>
                                </td>
                                <td data-label="LABORATOIRE">
                                    <div class="font-medium">{{ $produit->nom_laboratoire }}</div>
                                    <div class="text-xs font-bold uppercase text-slate-400">{{ $produit->pays_origine }}</div>
                                </td>
                                <td data-label="TITULAIRE">
                                    <div class="text-sm">{{ $produit->titulaire_amm }}</div>
                                </td>
                                <td data-label="N° & DATE">
                                    <div class="font-mono text-xs font-bold">{{ $produit->num_enregistrement }}</div>
                                    <div class="mt-1 text-xs text-slate-500">{{ $produit->date_amm }}</div>
                                </td>
                                <td data-label="EXPIRATION / ALERTE">
                                    @if($produit->is_expired)
                                        <div class="alert-badge alert-expired">
                                            <i class="text-lg fas fa-exclamation-circle"></i>
                                            EXPIRÉ LE {{ $produit->date_expiration->format('d/m/Y') }}
                                        </div>
                                    @elseif($produit->is_near_expiration)
                                        <div class="alert-badge alert-near-expiration">
                                            <i class="text-lg fas fa-clock"></i>
                                            EXPIRE BIENTÔT ({{ $produit->date_expiration->format('d/m/Y') }})
                                        </div>
                                    @else
                                        <span class="text-xs font-medium text-slate-400">En cours de validité {{ optional($produit->date_expiration)->format('d/m/Y') }}</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($produits->hasPages())
          <div class="border-t border-gray-200 ">
                {{ $produits->links() }}
            </div>
            @endif

            <div class="p-6 mt-8 border-l-4 bg-slate-50 border-slate-300 rounded-r-xl">
                <div class="flex items-start gap-4">
                    <i class="mt-1 text-xl fas fa-info-circle text-slate-400"></i>
                    <p class="text-sm leading-relaxed text-slate-600">
                        Cette liste est mise à jour périodiquement. En cas de doute sur l'authenticité d'un produit, 
                        veuillez contacter les services de l'ABREMA.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
