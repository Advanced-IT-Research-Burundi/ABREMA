@extends('layouts.base')
@section('title', 'ABREMA - Profil ABREMA')
@section('content')
    <div class="page-wrapper">

    <div class="page-section">
        <!-- <img src="{{ asset('assets/images/slides/img1.png') }}" alt="ABREMA Building" class="page-img"> -->
        <h1 class="page-title">Profil de l'ABREMA</h1>

        <p class="page-text">
            L’Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments
            « ABREMA » en sigle, est une administration personnalisée de l’Etat placée sous la
            tutelle du ministère ayant la santé publique dans ses attributions...
        </p>
    </div>

    <div class="page-section">
        <img src="{{ asset('assets/images/slides/img2.png') }}" alt="Profil ABREMA" class="page-img">

        <h2 class="page-section-title">Vision</h2>
        <p class="page-text">
            La vision de l’ABREMA est d’atteindre le niveau de maturité élevé de qualité de ses services,
            le maintenir et l’améliorer de façon continue.
        </p>
    </div>

    <div class="page-section">
        <h2 class="page-section-title">Nos Missions</h2>
        <p class="page-text">
            Promouvoir et protéger la santé publique en s’assurant que les produits de santé disponibles
            sont de bonne qualité, sûrs et efficaces.
        </p>
    </div>

    <div class="page-section">
        <h2 class="page-section-title">Nos Valeurs</h2>
        <ul class="page-list">
            <li>Professionnalisme</li>
            <li>Équité</li>
            <li>Transparence</li>
            <li>Intégrité</li>
            <li>Rapidité du service</li>
            <li>Écoute du client</li>
        </ul>
    </div>

    <div class="page-section">
        <h2 class="page-section-title">Engagement</h2>
        <p class="page-text">
            ABREMA s’engage à offrir des services de réglementation pharmaceutique de
            qualité dans la poursuite de la protection de la santé publique...
        </p>
    </div>

</div>

@endsection
