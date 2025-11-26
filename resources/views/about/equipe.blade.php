@extends('layouts.base')
@section('title', 'ABREMA - Equipe')
@section('content')
@css('css/pages.css')   

    <div class="container">
        <h1>Notre Équipe</h1>
        <div class='mb-6'>
            <img src="{{ asset('images/abrema_team.jpg') }}" alt="ABREMA Team" style="max-width:100%; height:auto;">
        </div>
        <p>Chez ABREMA, notre équipe est composée de professionnels dévoués et compétents, engagés à assurer la
            réglementation efficace des médicaments et autres produits de santé au Burundi. Notre personnel
            multidisciplinaire travaille en étroite collaboration pour garantir la qualité, la sécurité et l'efficacité
            des produits que nous régulons.</p>
        <h2>Rencontrez Notre Équipe</h2>
        <ul>
            <li><strong>Dr. Jean Mukiza</strong> - Directeur Général</li>
            <li><strong>Dr. Aline Niyonzima</strong> - Responsable du Département d'Évaluation des Médicaments</li>
            <li><strong>M. Eric Habimana</strong> - Chef du Laboratoire de Contrôle Qualité</li>
            <li><strong>Mme. Sophie Uwase</strong> - Coordinatrice des Services en Ligne</li>
            <li><strong>M. Paul Ndayisaba</strong> - Responsable des Affaires Réglementaires</li>
        </ul>
        <p>Chaque membre de notre équipe apporte une expertise unique et une passion pour la santé publique,
            contribuant ainsi à la mission d'ABREMA de protéger et de promouvoir la santé des citoyens burundais.
        </p>
    </div>
@endsection

