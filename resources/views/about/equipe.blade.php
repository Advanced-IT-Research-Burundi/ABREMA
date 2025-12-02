@extends('layouts.base')
@section('title', 'ABREMA - Equipe')
@section('content')
@css('css/pages.css')
<div class="page-wrapper">
    <div class="page-section">
        <h1 class="page-title" style="text-align: center;">Notre Équipe</h1>
        <img src="{{ asset('assets/images/slides/Img2.png') }}" 
             alt="ABREMA Team" class="page-img">
        <p class="page-text">
            Chez ABREMA, notre équipe est composée de professionnels dévoués et compétents, engagés à assurer la
            réglementation efficace des médicaments et autres produits de santé au Burundi.
        </p>
    </div>

    <div class="page-section">
        <h2 class="page-section-title">Rencontrez Notre Équipe</h2>

        @if($equipe->isEmpty())
            <p class="page-text">Aucun membre enregistré pour le moment.</p>
        @else
            <div class="equipe-grid">
                @foreach($equipe as $membre)
                    <div class="equipe-card">
                        @if($membre->photo)
                            <img src="{{ asset('storage/' . $membre->photo) }}" 
                                 alt="Photo de {{ $membre->nom_prenom }}" class="equipe-photo">
                        @else
                            <div class="equipe-photo-placeholder">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                        <h3>{{ $membre->nom_prenom }}</h3>
                        <p class="equipe-email">{{ $membre->email }}</p>
                        <p class="equipe-description">{{ Str::limit($membre->description, 150) }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

@endsection
