@extends('layouts.user')
@section('content')
    <div class="container mt-4">
        <h2>Avis au public</h2>
        <p>Bienvenue sur la page des publications de l'ABREMA. Ici, vous trouverez les dernières
            informations et avis concernant les médicaments et les services de l'ABREMA.</p>

        <!-- Exemple d'avis -->
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Avis Important sur le Médicament XYZ</h5>
                <p class="card-text">Le 15 juin 2024, l'ABREMA a émis un avis concernant le médicament
                    XYZ en raison de préoccupations liées à sa sécurité. Les professionnels de santé et
                    les patients sont invités à consulter l'avis complet pour plus de détails.
                </p>
                <a href="#" class="btn btn-primary">Lire l'avis complet</a>
            </div>
        </div>
        <!-- Ajouter d'autres avis ici -->
    </div>
@endsection
