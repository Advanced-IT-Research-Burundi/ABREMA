@extends('layouts.base')
@section('title', 'ABREMA - Demande d’importation des medicaments et autres produits de sante')
@section('content')
    <div class="page-wrapper">

    <div class="page-section">
        <h1 class="page-title">
            Demande d’une autorisation d’importation des médicaments et autres produits de santé
        </h1>

        <img src="{{ asset('images/abrema_import_export.jpg') }}"
             alt="ABREMA Import Export"
             class="page-img">

        <p class="page-text">
            La procédure d’obtention d’une autorisation d’importation des médicaments et autres produits
            de santé se fait via un système automatisé du Guichet Unique Electronique « ASYCUDA ».
            Ce système permet de mettre en étroite collaboration l’ABREMA et les services douaniers
            de l’OBR ce qui rend facile et rapide le contrôle d’entrée des médicaments et autres produits
            de santé sur tout le territoire du pays. Après obtention d’une autorisation d’importation des
            médicaments et autres produits de santé, l’importateur déclenche la procédure de livraison des
            produits concernés. A l’arrivée des produits, une inspection physique des produits livrés est
            effectuée par une équipe des officiers inspecteurs de l’ABREMA pour s’assurer de leur conformité
            à l’autorisation d’importation et la réglementation en vigueur. Les produits trouvés conformes
            sont libérés des services douaniers pour la mise en consommation. Les produits non conformes
            sont mis en quarantaine en attente de leur destruction. LES DOCUMENTS EXIGÉS POUR CONSTITUER
            UN DOSSIER DE DEMANDE D’AUTORISATION D’IMPORTATION : « Voir note d’instruction du 22/06/2021 ».
            NB : L’ABREMA se réserve le droit de demander tout document jugé nécessaire pour optimiser
            l’analyse et le traitement d’une demande d’autorisation d’importation.
        </p>
    </div>

    <div class="page-section">
        <h2 class="page-section-title">
            NOTES AUX IMPORTATEURS
        </h2>

        <img src="" alt="file download" class="page-img">
    </div>

</div>

@endsection
