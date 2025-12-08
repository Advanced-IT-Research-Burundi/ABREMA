@extends('layouts.base')
@section('title', 'ABREMA - Produits Medicaments Enregistrees')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/about/pages.css') }}">
@endsection
@section('content')
    <style>
        .table th,
        .table td {
            padding: 0.5rem;
            vertical-align: middle;
            border: 1px solid #dee2e6;
        }
    </style>
    <!-- BANNER -->
    <div class="page-banner">
        <div class="container">
            <h1>Produits Enregistres</h1>
            <p class="lead">Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</p>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="page-section">
            <h3><strong>Produits Enregistres</strong></h3>
            <div class='mb-6'>
                <img src="{{ asset('images/abrema_products.jpg') }}" alt="ABREMA Products"
                    style="max-width:100%; height:auto;">
            </div>
            <div>
                <a href="{{ route('produits.export.excel') }}" class="btn fw-semibold text-white px-4 py-2">
                    <i class="bi bi-file-earmark-excel me-1"></i> Exporter en Excel
                </a>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>DESIGNATION COMMERCIALE</td>
                            <td>DCI</td>
                            <td>DOSAGE</td>
                            <td>FORME</td>
                            <td>CONDITIONNEMENT</td>
                            <td>CATEGORIE</td>
                            <td>NOM LABO FABRICANT</td>
                            <td>PAYS ORIGINE</td>
                            <td>TITULAIRE AMM</td>
                            <td>PAYS TITULAIRE AMM</td>
                            <td>No ENREGISTREMENT</td>
                            <td>DATE ENREGISTREMENT</td>
                            {{-- <td>STATUT AMM</td> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
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
                            {{-- <td>{{ $produit->statut_amm }}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <p>La liste des produits médicaments enregistrés par l'ABREMA est disponible pour consultation.</p>
    </div>

@endsection
