@extends('layouts.base')
@section('title', 'Service  en ligne de colis')
@section('content')
    <div class="page-wrapper">

    <h1 class="page-title">Service en ligne de colis</h1>

    <div class="page-section">
        <h3 class="page-section-title"><strong>Avant de compléter le formulaire de demande d'inspection des colis en ligne, veuillez :</strong></h3>
        <ol class="page-list">
            <li>Télécharger le formulaire ci-joint;</li>
            <li>Le remplir et le signer;</li>
            <li>Puis le téléverser sur notre plateforme.</li>
        </ol>
    </div>

    <div class="page-section page-form">
       <form action="" method="post" enctype="multipart/form-data">
            @csrf

            <label for="name">Nom et Prénom</label>
            <input class="form-control" type="text" id="name" name="name" required>

            <label for="phone">Téléphone</label>
            <input class="form-control" type="text" id="phone" name="phone" required>

            <label for="email">E-mail</label>
            <input class="form-control" type="email" id="email" name="email" required>

            <label for="file">Téléverser le formulaire signé (PDF)</label>
            <input class="form-control" type="file" id="file" name="file" accept=".pdf" required>

            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4"></textarea>

            <button type="submit">Soumettre la demande</button>
       </form>
    </div>

</div>

@endsection