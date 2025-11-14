@extends('layouts.user')

@section('title', 'ABREMA - Profil ABREMA')
@section('content')
    <div class="container">
        <div class='mb-6'>
            <img src="{{ asset('images/abrema_building.jpg') }}" alt="ABREMA Building" style="max-width:100%; height:auto;">
        </div>
        <h1>Profil de l'ABREMA</h1>
        <p>L’Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments
            « ABREMA » en sigle, est une administration personnalisée de l’Etat placée sous la
            tutelle du ministère ayant la santé publique dans ses attributions. L’ABREMA est régie
            par la loi N°1/11 du 08 Mai 2020 portant Réglementation de l’exercice de la Pharmacie etdu Médicament à usage
            humain,
            et a été créé en 2021 par le décret N° 100/039 du 26 Février 2021 portant création,
            organisation et fonctionnement de l’Autorité Burundaise de Régulation des Médicaments
            à usage humain et des Aliments « ABREMA ». L’ABREMA a pour objectif général de protéger
            la santé publique par la promotion de la qualité et la sécurité sanitaire des produits
            tels que les aliments préfabriqués et emballés, les médicaments à usage humain, les produits
            cosmétiques et diététiques contenant un principe actif, les médicaments à base de plantes,
            les médicaments traditionnels, les dispositifs médicaux ou les matériaux ou substances utilisés
            dans la fabrication des produits dont la consommation ou l’utilisation peut nuire à la santé humaine.
        </p>
        <div>
            <img src="{{ asset('images/abrema_profile.jpg') }}" alt="Profil ABREMA" style="max-width:100%; height:auto;">
            <h2>Vision</h2>
            <p>La vision de l’ABREMA est d’atteindre le niveau de maturité élevé de qualité de ses services,
                le maintenir et l’améliorer de façon continue.
            </p>
        </div>
        <div>
            <h2>Nos Missions</h2>
            <p>Promouvoir et protéger la santé publique en s’assurant que les produits de santé disponibles
                sont de bonne qualité, sûrs et efficaces.
            </p>
        </div>

        <div>
            <h2>Nos Valeurs</h2>
            <ul>
                <li>Professionnalisme</li>
                <li>Equite</li>
                <li>Transparence</li>
                <li>Integrite</li>
                <li>Rapidite du service</li>
                <li>Ecoute du client</li>
            </ul>
        </div>
        <div>
            <h2>Engagement</h2>
            <p>ABREMA s’engage à offrir des services de réglementation pharmaceutique de
                qualité dans la poursuite de la protection de la santé publique et
                en faisant appel àun personnel compétent et dévoué ainsi qu’aux technologies adaptées
            </p>
        </div>
    </div>
@endsection
