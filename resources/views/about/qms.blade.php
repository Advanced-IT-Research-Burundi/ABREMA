@extends('layouts.base')
@section('title', 'ABREMA - Systeme de Management de la Qualité')
@section('content')

<div class="page-wrapper">

    <h1 class="page-title">
        Système de Management de la Qualité (QMS) de l'ABREMA
    </h1>

    <div class="page-section">
        <img src="{{ asset('assets/images/qms.jpg') }}"
             alt="ABREMA QMS"
             class="page-img">
    </div>

    <p class="page-text">
        L’ABREMA a déjà entrepris un Système de Management de la Qualité (SMQ / QMS).
        Dans cette démarche qualité, la Direction se réfère aux normes
        <strong>ISO 9000</strong>, <strong>ISO 9001</strong>,
        <strong>ISO 9004</strong> et <strong>ISO 26000</strong>
        et s’engage à satisfaire aux exigences des clients et des autres parties prenantes.
    </p>

    <div class="page-divider"></div>

    <div class="page-section">
        <h2 class="page-section-title">POLITIQUE QUALITÉ</h2>

        <div style="display:flex; align-items:center; gap:15px; margin-top:10px;">
            <img src="{{ asset('images/file-icon.png') }}"
                 alt="Download Icon"
                 width="32">

            <a href="{{ asset('files/politique_qualite_qms.pdf') }}"
               class="btn btn-primary"
               download>
                📄 Télécharger le fichier QMS
            </a>
        </div>
    </div>

</div>



@endsection
