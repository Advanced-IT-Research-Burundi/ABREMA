<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABREMA</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <a href="{{route('home')}}">Welcome To Abrema</a>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="{{ route('home') }}">ABREMA</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto">

                    <!-- Accueil -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                    </li>

                    <!-- À propos -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            À propos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('about.profilabrema')}}">Profile de l'ABREMA</a></li>
                            <li><a class="dropdown-item" href="{{route('about.organigramme')}}">Organigramme</a></li>
                            <li><a class="dropdown-item" href="{{route('about.equipe')}}">Équipe de direction</a></li>
                            <li><a class="dropdown-item" href="{{route('about.fonction')}}">Fonction réglementaire</a></li>
                            <li><a class="dropdown-item" href="{{route('about.qms')}}">QMS</a></li>
                        </ul>
                    </li>

                    <!-- Médicaments -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Médicaments
                        </a>
                        <ul class="dropdown-menu">

                            <!-- Sous-menu Enregistrement -->
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Enregistrement</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('medicament.produits')}}">Produits enregistrés</a></li>
                                    <li><a class="dropdown-item" href="{{route('medicament.notification')}}">Liste de notification</a></li>
                                    <li><a class="dropdown-item" href="{{route('medicament.textemedicament')}}">Textes réglementaires</a></li>
                                </ul>
                            </li>

                            <!-- Sous-menu Import / Export -->
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Import / Export</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('importexport.demande')}}">Demande d'importation</a></li>
                                    <li><a class="dropdown-item" href="{{route('importexort.pointentree')}}">Points d'entrée</a></li>
                                    <li><a class="dropdown-item" href="{{route('importexport.texteimport')}}">Textes réglementaires</a></li>
                                </ul>
                            </li>

                            <!-- Sous-menu Inspection -->
                            <li class="dropdown-submenu">
                                <a class="dropdown-item dropdown-toggle" href="#">Inspection</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('inspection.etablissement')}}">Établissements</a></li>
                                    <li><a class="dropdown-item" href="{{route('inspection.GMP')}}">Inspection GMP</a></li>
                                    <li><a class="dropdown-item" href="{{route('inspection.GDP')}}">Inspection GDP</a></li>
                                </ul>
                            </li>

                        </ul>
                    </li>

                    <!-- Labo -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Labo Contrôle Qualité
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('labocontrol.servicelabo')}}">Service Laboratoire</a></li>
                            <li><a class="dropdown-item" href="{{route('labocontrol.aboutlabo')}}">À propos du laboratoire</a></li>
                        </ul>
                    </li>

                    <!-- Services en ligne -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Services en ligne
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('service.colis')}}">Inspection des colis</a></li>
                        </ul>
                    </li>

                    <!-- Info -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            Information & Publication
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('avis')}}">Avis au public</a></li>
                            <li><a class="dropdown-item" href="{{route('publication')}}">Communiqués</a></li>
                        </ul>
                    </li>

                </ul>
            </div>

        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
