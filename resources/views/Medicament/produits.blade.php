@extends('layouts.base')
@section('title', 'ABREMA - Produits Medicaments Enregistrees')
@section('content')
<div class="page-wrapper">

    <div class="page-section">
        <h2 class="page-section-title">Produits Médicaments Enregistrés</h2>

        <div class="page-text">
            Ci-dessous se trouve la liste des produits médicaments enregistrés par l'ABREMA.
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Désignation Commerciale</th>
                        <th>DCI</th>
                        <th>Dosage</th>
                        <th>Forme</th>
                        <th>Conditionnement</th>
                        <th>Catégorie</th>
                        <th>Nom Laboratoire</th>
                        <th>Pays d'Origine</th>
                        <th>Titulaire AMM</th>
                        <th>Pays Titulaire AMM</th>
                        <th>Numéro Enregistrement</th>
                        <th>Date AMM</th>
                        <th>Statut AMM</th>
                        <th>User ID</th>
                        <th>Créé le</th>
                        <th>Mis à jour le</th>
                        <th>Supprimé le</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicaments as $medicament)
                        <tr>
                            <td>{{ $medicament->id }}</td>
                            <td>{{ $medicament->designation_commerciale }}</td>
                            <td>{{ $medicament->dci }}</td>
                            <td>{{ $medicament->dosage }}</td>
                            <td>{{ $medicament->forme }}</td>
                            <td>{{ $medicament->conditionnement }}</td>
                            <td>{{ $medicament->category }}</td>
                            <td>{{ $medicament->nom_laboratoire }}</td>
                            <td>{{ $medicament->pays_origine }}</td>
                            <td>{{ $medicament->titulaire_amm }}</td>
                            <td>{{ $medicament->pays_titulaire_amm }}</td>
                            <td>{{ $medicament->num_enregistrement }}</td>
                            <td>{{ $medicament->date_amm }}</td>
                            <td>{{ $medicament->statut_amm }}</td>
                            <td>{{ $medicament->user_id }}</td>
                            <td>{{ $medicament->created_at }}</td>
                            <td>{{ $medicament->updated_at }}</td>
                            <td>{{ $medicament->deleted_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>


@endsection