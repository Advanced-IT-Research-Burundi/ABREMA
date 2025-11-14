@extends('layouts.user')
@section('title', 'ABREMA - Home')

@section('content')
    <h1>Welcome to ABREMA</h1>
    <p>Your one-stop shop for all your needs. Explore our wide range of products and services designed to cater to your
        requirements.</p>
    <img src="{{ asset('images/abrema_welcome.jpg') }}" alt="Welcome to ABREMA" style="max-width:100%; height:auto;">
    <h2>AbremaContent</h2>
    <div class="container">
        <div class='mb-6'>
            <img src="{{ asset('images/abrema_building.jpg') }}" alt="ABREMA Building" style="max-width:100%; height:auto;">
        </div>
        <p>L’Agence Burundaise de Régulation des Médicaments et autres produits de santé (ABREMA) est un établissement
            public à
            caractère administratif doté de la personnalité juridique et de l’autonomie financière créé par la loi n° 1/03
            du
            10/02/2021 portant création, organisation et fonctionnement de l’Agence Burundaise de Régulation des Médicaments
            et
            autres produits de santé.

        <p>
        <h3>Enregistrement/Homologation</h3>
        L’enregistrement des produits réglementés fait partie des 8 fonctions réglementaires assignées à toute Agence de
        réglementation pharmaceutique.
        C’est un processus d’évaluation scientifique et objective d’un dossier de demande d’Autorisation de Mise sur le
        Marché
        (AMM) basé sur trois critères dont la qualité, l’innocuité et l’efficacité du produit.
        L’enregistrement fait recours aux normes OMS, ICH, EAC et nationales afin de prendre une décision éclairée.
        Au Burundi, l’homologation est régie par l’ordonnance ministérielle N° 630/991 du 09/08/2023 portant révision de
        l’ordonnance ministérielle conjointe N° 630/540/750/11 du 02/08/2013 portant mode et conditions de l’homologation
        des
        médicaments à usage humain et autres intrants pharmaceutiques au Burundi.
        <h3>Service en ligne</h3>
        L’ABREMA est dans le dynamisme de digitalisation des services offerts à ses clients. Pour la demande d’Autorisation
        d’importation des médicaments et autres produits de santé, le système du Guichet Unique Electronique « ASYCUDA » est
        disponible. Pour plus d’information veuillez-vous adresser aux services de l’ABREMA. Un nouveau système électronique
        «
        ABREMA-RIMS » est en cours de finalisation pour digitaliser les fonctions réglementaires clés.
        Laboratoire de contrôle qualité
        L’ABREMA réalise les activités de contrôle qualité des produits de santé circulant au Burundi en collaboration avec
        d’autres laboratoires de CQ nationaux et étrangers PQ-OMS. L’ABREMA dispose des Kits Minilab lui permettant de faire
        des
        screening des médicaments importés ou produits localement avant leur commercialisation ou après commercialisation,
        afin
        de détecter rapidement les médicaments falsifiés et ou de qualités inferieure
        <h3>Politique qualité</h3>
        L’ABREMA a déjà entrepris un Système de Management de la Qualité (SMQ). Dans cette démarche qualité, la Direction se
        réfère aux normes ISO 9000, ISO 9001, ISO 9004 et ISO 26000 et s’engage à satisfaire les exigences des clients et
        des
        autres parties prenantes.
        Pourquoi travailler avec nous !
        ABREMA est une institution offrant de services rapides et de qualité dans la réglementation des produits de santé
        pour
        protéger la santé publique en garantissant la qualité, l’efficacité et l’innocuité des produits réglementés en se
        referrant aux normes de l’OMS, l’UA et de l’EAC.

        <h3>Nos Clients</h3>
        Industries pharmaceutiques, Pharmacies grossistes Privées, agences de promotion, Centrale d’Achat, ONG nationale et
        internationale, Partenaires au développement œuvrant dans le domaine de la santé, Districts et hôpitaux publiques et
        privés, Ministères, Populations, Ambassades, etc.</p>
        <p>For more information, feel free to <a href="">contact us</a>.</p>

    </div>

    <div class="container">
        <h2>ABREMA - Vision et Mission</h2>
        <div>
            <img src="{{ asset('images/abrema_vision_mission.jpg') }}" alt="ABREMA Vision et Mission"
                style="max-width:100%; height:auto;">
            <h3>Vision</h3>
            La vision de l'ABREMA est d'atteindre le niveau de maturité élevé de qualité de ses services, le maintenir et
            l’améliorer de façon continue.
            <h3>Mission</h3>
            Promouvoir et protéger la santé publique en s'assurant que les produits de santé disponibles sont de bonne
            qualité, sûrs et efficaces.
        </div>
    </div>

    <h3>Nos Partenaires</h3>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('images/trade_logo.jpg') }}" alt="Partner 1" style="max-width:100%; height:auto;">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/enabel_logo.jpg') }}" alt="Partner 2" style="max-width:100%; height:auto;">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/EAC_logo.jpg') }}" alt="Partner 3" style="max-width:100%; height:auto;">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/I+solution_logo.jpg') }}" alt="Partner 3" style="max-width:100%; height:auto;">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/usaid_logo.jpg') }}" alt="Partner 3" style="max-width:100%; height:auto;">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/unfpa_logo.jpg') }}" alt="Partner 3" style="max-width:100%; height:auto;">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/gavi_logo.jpg') }}" alt="Partner 3" style="max-width:100%; height:auto;">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/unicef_logo.jpg') }}" alt="Partner 3" style="max-width:100%; height:auto;">
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/sante_logo.jpg') }}" alt="Partner 3" style="max-width:100%; height:auto;">
            </div>
        </div>
    </div>
@endsection
