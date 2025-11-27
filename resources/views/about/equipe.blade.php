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
            réglementation efficace des médicaments et autres produits de santé au Burundi.
        </p>
    </div>

    <div class="page-section">
        <h2 class="page-section-title">Rencontrez Notre Équipe</h2>

        @if($equipe->isEmpty())
            <p class="page-text">Aucun membre enregistré pour le moment.</p>
        @else
            <ul class="page-list">
                @foreach($equipe as $membre)
                    <li>
                        <strong>{{ $membre->nom_prenom }}</strong>

                        @if($membre->email)
                            — <span>{{ $membre->email }}</span>
                        @endif

                        @if($membre->description)
                            <br>
                            <span class="page-text">
                                {{ $membre->description }}
                            </span>
                        @endif

                        @if($membre->photo)
                            <div class="mt-2 mb-3">
                                <img src="{{ asset($membre->photo) }}" 
                                     alt="Photo de {{ $membre->nom_prenom }}" 
                                     style="max-width: 180px; border-radius: 10px;">
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

</div>

@endsection
