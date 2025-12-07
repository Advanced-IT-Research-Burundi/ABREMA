@extends('layouts.base')
@section('title', 'Point Entrees')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/about/pages.css') }}">
@endsection
@section('content')

    <!-- BANNER -->
    <div class="page-banner">
        <div class="container">
            <h1>À propos de l'ABREMA</h1>
            <p class="lead">Autorité Burundaise de Régulation des Médicaments à usage humain et des Aliments</p>
        </div>
    </div>
    <div class="page-wrapper">

        <div class="page-section">
            <h2 class="page-section-title">
                Points d'Entrées
            </h2>

            <ul class="page-list">
                <li>Aéroport international Melchior Ndadaye</li>
                <li>Port de Bujumbura</li>
                <li>Port de Bujumbura</li>
                <li>Frontière de Kobero</li>
                <li>Frontière de Kanyaru haut</li>
                <li>Frontière Gasenyi Nemba</li>
                <li>Frontière Gatumba</li>
            </ul>
        </div>

    </div>

@endsection
