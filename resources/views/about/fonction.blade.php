@extends('layouts.base')
@section('title', 'ABREMA - Fonctcion Reglementaire')
@css('css/pages.css')

@section('content')
    <div class="page-wrapper">

    <div class="page-section">
        <h1 class="page-title">Fonctions Réglementaires de l'ABREMA</h1>

        <img src="{{ asset('images/abrema_functions.jpg') }}"
             alt="ABREMA Functions"
             class="page-img">

        <p class="page-text">
            L'ABREMA est chargée de plusieurs fonctions réglementaires essentielles pour garantir la qualité, la sécurité et
            l'efficacité des médicaments et autres produits de santé au Burundi. Ces fonctions comprennent :
        </p>
    </div>

    <div class="page-section">
        <ul class="page-list">
            <li>
                <strong>Enregistrement / Homologation :</strong> Évaluation scientifique des dossiers pour l'autorisation
                de mise sur le marché des produits.
            </li>

            <li>
                <strong>Inspection des établissements pharmaceutiques :</strong> Vérification de la conformité aux bonnes
                pratiques de fabrication, de distribution et de pharmacie.
            </li>

            <li>
                <strong>Pharmacovigilance :</strong> Surveillance des effets indésirables des médicaments après leur mise
                sur le marché.
            </li>

            <li>
                <strong>Régulation de la publicité et de la promotion des produits de santé :</strong> Contrôle des
                messages publicitaires pour assurer leur véracité et leur conformité.
            </li>

            <li>
                <strong>Contrôle de la qualité des produits de santé :</strong> Analyse et tests en laboratoire pour
                garantir la qualité des produits.
            </li>

            <li>
                <strong>Essais cliniques :</strong> Évaluation des protocoles d'essais cliniques pour assurer la sécurité
                des participants.
            </li>

            <li>
                <strong>Octroi des licences aux établissements pharmaceutiques :</strong> Autorisation des pharmacies,
                grossistes et fabricants.
            </li>

            <li>
                <strong>Contrôle des importations et exportations des produits de santé :</strong> Surveillance des flux
                transfrontaliers pour prévenir l'entrée de produits non conformes.
            </li>

            <li>
                <strong>Libération des lots pour les vaccins :</strong> Inspection et approbation des lots de vaccins avant
                leur distribution.
            </li>
        </ul>

        <p class="page-text">
            Grâce à ces fonctions, l'ABREMA s'engage à protéger la santé publique en assurant que seuls des produits sûrs,
            efficaces et de haute qualité sont disponibles sur le marché burundais.
        </p>
    </div>

</div>

@endsection