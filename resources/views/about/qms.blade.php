@extends('layouts.base')
@section('title', 'ABREMA - Systeme de Management de la Qualité')
@section('content')

<div class="page-wrapper">

    <h1 class="page-title">
        Système de Management de la Qualité (QMS) de l'ABREMA
    </h1>

    <!-- <div class="page-section">
        <img src="{{ asset('assets/images/qms.jpg') }}"
             alt="ABREMA QMS"
             class="page-img">
    </div> -->

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

        <div class="pdf-container" style="width: 100%; height: 800px; margin-top: 20px;">
    <embed src="{{ asset('files/politique_qualite_qms.pdf') }}" 
           type="application/pdf" 
           width="100%" 
           height="100%">
</div>
    </div>

</div>



@endsection
