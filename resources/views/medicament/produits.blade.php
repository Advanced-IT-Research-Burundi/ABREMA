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
        }

        .export-btn {
            background: hsl(var(--primary-hsl));
            color: white;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .export-btn:hover {
            background: hsl(var(--primary-hsl), 0.9);
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            color: white;
        }

        .produits-table-container {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .produits-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 0.925rem;
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
        }

        .produits-table td {
            padding: 16px 20px;
            border-top: 1px solid #f1f5f9;
            color: #1e293b;
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
            animation: pulse-border 2s infinite;
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

        @keyframes pulse-border {
            0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(239, 68, 68, 0); }
            100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
        }

        /* Grid for mobile */
        @media (max-width: 1024px) {
            .produits-table-container { border: none; overflow: visible; }
            .produits-table thead { display: none; }
            .produits-table tbody {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                gap: 20px;
            }
            .produits-table tr {
                display: flex;
                flex-direction: column;
                background: white;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                padding: 15px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            }
            .produits-table td {
                padding: 8px 0;
                border: none;
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                text-align: right;
            }
            .produits-table td::before {
                content: attr(data-label);
                font-weight: 700;
                text-align: left;
                margin-right: 15px;
                font-size: 0.75rem;
                text-transform: uppercase;
                color: #64748b;
            }
            .produits-table td:first-child { width: 100%; text-align: left; display: block; background: #f8fafc; margin: -15px -15px 10px -15px; padding: 10px 15px; font-weight: 800; border-radius: 11px 11px 0 0; }
            .produits-table td:first-child::before { content: 'ID #'; }
        }

        @media (max-width: 640px) {
            .produits-banner h1 { font-size: 2rem; }
            .produits-toolbar { flex-direction: column; align-items: stretch; }
            .produits-card { padding: 15px; }
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
                <div class="flex items-center gap-4">
                    <a href="{{ route('produits.export.excel') }}" class="export-btn">
                        <i class="fas fa-file-excel"></i> Exporter en Excel
                    </a>
                </div>
                <div class="text-slate-500 font-semibold bg-slate-100 px-4 py-2 rounded-lg">
                    <i class="fas fa-database mr-2"></i> {{ $produits->total() ?? $produits->count() }} enregistrements
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
                            @auth
                                <th>EXPIRATION</th>
                            @endauth
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                            <tr>
                                <td data-label="ID">{{ $produit->id }}</td>
                                <td data-label="DESIGNATION">
                                    <div class="font-bold text-slate-800">{{ $produit->designation_commerciale }}</div>
                                </td>
                                <td data-label="DCI / DOSAGE">
                                    <div class="text-slate-600 italic">{{ $produit->dci }}</div>
                                    <div class="text-xs font-semibold text-slate-400 mt-1 uppercase">{{ $produit->dosage }}</div>
                                </td>
                                <td data-label="FORME / COND.">
                                    <div>{{ $produit->forme }}</div>
                                    <div class="text-xs text-slate-400 mt-1">{{ $produit->conditionnement }}</div>
                                </td>
                                <td data-label="CATEGORIE">
                                    <span class="px-3 py-1 bg-slate-100 rounded text-xs font-bold">{{ $produit->category }}</span>
                                </td>
                                <td data-label="LABORATOIRE">
                                    <div class="font-medium">{{ $produit->nom_laboratoire }}</div>
                                    <div class="text-xs text-slate-400 font-bold uppercase">{{ $produit->pays_origine }}</div>
                                </td>
                                <td data-label="TITULAIRE">
                                    <div class="text-sm">{{ $produit->titulaire_amm }}</div>
                                </td>
                                <td data-label="N° & DATE">
                                    <div class="font-mono text-xs font-bold">{{ $produit->num_enregistrement }}</div>
                                    <div class="text-xs text-slate-500 mt-1">{{ $produit->date_amm }}</div>
                                </td>
                                <td data-label="EXPIRATION / ALERTE">
                                    @if($produit->is_expired)
                                        <div class="alert-badge alert-expired">
                                            <i class="fas fa-exclamation-circle text-lg"></i>
                                            EXPIRÉ LE {{ $produit->date_expiration->format('d/m/Y') }}
                                        </div>
                                    @elseif($produit->is_near_expiration)
                                        <div class="alert-badge alert-near-expiration">
                                            <i class="fas fa-clock text-lg"></i>
                                            EXPIRE BIENTÔT ({{ $produit->date_expiration->format('d/m/Y') }})
                                        </div>
                                    @else
                                        <span class="text-xs font-medium text-slate-400">En cours de validité</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if ($produits->hasPages())
                <div class="mt-8 flex justify-center">
                    {{ $produits->links() }}
                </div>
            @endif

            <div class="mt-8 p-6 bg-slate-50 border-l-4 border-slate-300 rounded-r-xl">
                <div class="flex items-start gap-4">
                    <i class="fas fa-info-circle text-slate-400 text-xl mt-1"></i>
                    <p class="text-slate-600 text-sm leading-relaxed">
                        Cette liste est mise à jour périodiquement. En cas de doute sur l'authenticité d'un produit, 
                        veuillez contacter les services de l'ABREMA.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
