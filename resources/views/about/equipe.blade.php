@extends('layouts.base')
@section('title', 'ABREMA - Equipe')
@section('content')
@css('css/pages.css')   

    <div class="page-wrapper">

    <div class="page-section">
        <h1 class="page-title" style="text-align: center;">Notre Équipe</h1>

        <img src="{{ asset('assets/images/slides/Img2.png') }}" 
             alt="ABREMA Team" 
             class="page-img">

        <p class="page-text">
            Chez ABREMA, notre équipe est composée de professionnels dévoués et compétents, engagés à assurer la
            réglementation efficace des médicaments et autres produits de santé au Burundi. Notre personnel
            multidisciplinaire travaille en étroite collaboration pour garantir la qualité, la sécurité et l'efficacité
            des produits que nous régulons.
        </p>
    </div>

    <div class="page-section">
        <h2 class="page-section-title">Rencontrez Notre Équipe</h2>

        <ul class="page-list">
            <li><strong>Dr. Jean Mukiza</strong> — Directeur Général</li>
            <li><strong>Dr. Aline Niyonzima</strong> — Responsable du Département d'Évaluation des Médicaments</li>
            <li><strong>M. Eric Habimana</strong> — Chef du Laboratoire de Contrôle Qualité</li>
            <li><strong>Mme. Sophie Uwase</strong> — Coordinatrice des Services en Ligne</li>
            <li><strong>M. Paul Ndayisaba</strong> — Responsable des Affaires Réglementaires</li>
        </ul>

        <p class="page-text">
            Chaque membre de notre équipe apporte une expertise unique et une passion pour la santé publique,
            contribuant ainsi à la mission d'ABREMA de protéger et de promouvoir la santé des citoyens burundais.
        </p>
    </div>

</div>

@endsection

