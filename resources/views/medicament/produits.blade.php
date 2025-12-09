@extends('layouts.base')
@section('title', 'ABREMA - Produits Medicaments Enregistrees')

@section('styles')
    <style>
        /* ============================================ STYLES SPÉCIFIQUES PAGE PRODUITS ============================================ */

        /* Structure de base */
        .produits-container {
            max-width: var(--max-content-width);
            margin: 0 auto;
            padding: 20px;
        }

        /* Bannière */
        .produits-banner {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            color: white;
            padding: 60px 20px 40px;
            text-align: center;
            margin-bottom: 40px;
        }

        .produits-banner h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .produits-banner p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Titre principal */
        .produits-title {
            color: var(--primary-dark);
            font-size: 1.8rem;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary-light);
        }

        /* Image */
        .produits-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: var(--shadow-md);
        }

        /* Barre d'outils */
        .produits-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        /* Bouton d'export */
        .export-btn {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
            font-size: 0.95rem;
        }

        .export-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        /* Compteur */
        .produits-counter {
            color: var(--text-light);
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Table */
        .produits-table-wrapper {
            overflow-x: auto;
            margin-bottom: 30px;
            border-radius: 8px;
            box-shadow: var(--shadow-sm);
            background: var(--bg-white);
        }

        .produits-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1200px;
        }

        .produits-table thead {
            background: var(--primary-color);
            color: white;
            position: sticky;
            top: 0;
        }

        .produits-table th {
            padding: 16px 12px;
            text-align: left;
            font-weight: 600;
            font-size: 0.9rem;
            border-right: 1px solid rgba(255, 255, 255, 0.1);
        }

        .produits-table th:last-child {
            border-right: none;
        }

        .produits-table td {
            padding: 14px 12px;
            border-bottom: 1px solid var(--border-color);
            font-size: 0.9rem;
            color: var(--text-dark);
            vertical-align: top;
        }

        .produits-table tbody tr:hover {
            background: rgba(45, 122, 62, 0.05);
        }

        .produits-table tbody tr:nth-child(even) {
            background: var(--bg-light);
        }

        .produits-table tbody tr:nth-child(even):hover {
            background: rgba(45, 122, 62, 0.08);
        }

        /* ID column */
        .produits-table td:first-child {
            text-align: center;
            font-weight: 600;
            color: var(--primary-color);
            width: 60px;
        }

        /* Pagination */
        .produits-pagination {
            margin: 30px 0;
            display: flex;
            justify-content: center;
        }

        .produits-pagination ul {
            list-style: none;
            display: flex;
            gap: 8px;
            padding: 0;
            margin: 0;
        }

        .produits-pagination li {
            display: inline;
        }

        .produits-pagination a,
        .produits-pagination span {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            color: var(--text-dark);
            background: var(--bg-light);
            border: 1px solid var(--border-color);
            transition: var(--transition);
        }

        .produits-pagination a:hover {
            background: var(--primary-light);
            color: white;
            border-color: var(--primary-light);
        }

        .produits-pagination .active span {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        /* Texte descriptif */
        .produits-description {
            margin-top: 30px;
            padding: 20px;
            background: var(--bg-light);
            border-radius: 8px;
            color: var(--text-light);
            line-height: 1.6;
            border-left: 4px solid var(--primary-color);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .produits-container {
                padding: 15px;
            }

            .produits-banner {
                padding: 40px 15px 30px;
            }

            .produits-banner h1 {
                font-size: 2rem;
            }

            .produits-banner p {
                font-size: 1rem;
            }

            .produits-title {
                font-size: 1.5rem;
            }

            .produits-image {
                height: 200px;
            }

            .produits-toolbar {
                flex-direction: column;
                align-items: stretch;
            }

            .export-btn {
                justify-content: center;
            }

            .produits-counter {
                text-align: center;
            }

            .produits-table th,
            .produits-table td {
                padding: 12px 8px;

                font-size: 0.85rem;
            }
        }

        @media (max-width: 480px) {
            .produits-banner {
                padding: 30px 10px 20px;
            }

            .produits-banner h1 {
                font-size: 1.6rem;
            }

            .produits-title {
                font-size: 1.3rem;
            }

            .produits-table th,
            .produits-table td {
                padding: auto 6px;
                /* width: fit-content; */
                font-size: 0.8rem;
            }

            .export-btn {
                padding: 10px 20px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- BANNER -->
    <div class="produits-banner">
        <div>
            <h1>Médicaments enregistrés</h1>
            <p>Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</p>
        </div>
    </div>

    <div class="produits-container">
        <div>
            {{-- <h3 class="produits-title"><strong>Médicaments enregistrés</strong></h3> --}}

            {{-- <div>
                <img src="{{ asset('images/abrema_products.jpg') }}" alt="ABREMA Products" class="produits-image">
            </div> --}}

            <div class="produits-toolbar">
                <div>
                    <a href="{{ route('produits.export.excel') }}" class="export-btn">
                        Exporter en Excel
                    </a>
                </div>
                <div class="produits-counter">
                    Total: {{ $produits->total() ?? $produits->count() }} enregistrements
                </div>
            </div>

            <div class="produits-table-wrapper">
                <table class="produits-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>DESIGNATION COMMERCIALE</th>
                            <th>DCI</th>
                            <th>DOSAGE</th>
                            <th>FORME</th>
                            <th>CONDITIONNEMENT</th>
                            <th>CATEGORIE</th>
                            <th>NOM LABO FABRICANT</th>
                            <th>PAYS ORIGINE</th>
                            <th>TITULAIRE AMM</th>
                            <th>PAYS TITULAIRE AMM</th>
                            <th>No ENREGISTREMENT</th>
                            <th>DATE ENREGISTREMENT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                            <tr>
                                <td>{{ $produit->id }}</td>
                                <td>{{ $produit->designation_commerciale }}</td>
                                <td>{{ $produit->dci }}</td>
                                <td>{{ $produit->dosage }}</td>
                                <td>{{ $produit->forme }}</td>
                                <td>{{ $produit->conditionnement }}</td>
                                <td>{{ $produit->category }}</td>
                                <td>{{ $produit->nom_laboratoire }}</td>
                                <td>{{ $produit->pays_origine }}</td>
                                <td>{{ $produit->titulaire_amm }}</td>
                                <td>{{ $produit->pays_titulaire_amm }}</td>
                                <td>{{ $produit->num_enregistrement }}</td>
                                <td>{{ $produit->date_amm }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if (method_exists($produits, 'links'))
                <div class="produits-pagination">
                    {{ $produits->links() }}
                </div>
            @endif

            <p class="produits-description">
                La liste des produits médicaments enregistrés par l'ABREMA est disponible pour consultation.
            </p>
        </div>
    </div>
@endsection
