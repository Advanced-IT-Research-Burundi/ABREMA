@extends('layouts.base')
@section('title', 'Service  en ligne de colis')
@section('content')
    <div class="container">
        <h3><strong>Service en ligne de colis</strong></h3>
        <h3>Avant de compléter le formulaire de demande d'inspection des colis en ligne, veuillez :</h3>
    </div>
    <ol>
        <li>Télécharger le formulaire ci-joint;</li>
        <li>Le remplir et le signer;</li>
        <li>Puis le téléverser sur notre plateforme.</li>
    </ol>
    <div>
       <form action=""method="post">
        @csrf
        <div class="mb-3">
            <label for="formFile" class="form-label">Nom et Prenom</label>
            <input class="form-control" type="file" id="formFile" name="">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Telephone</label>
            <input class="form-control" type="file" id="formFile" name="">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">E-mail</label>
            <input class="form-control" type="file" id="formFile" name="">
        </div>
        <div>
            <label for="formFile" class="form-label">Une fois le formulaire de demande d'inspection des colis signé et rempli, veuillez le téléverser ici!(fichier .pdf)</label>
            <input class="form-control" type="file" id="formFile" name="">
        </div>
        <div>
            <label for="formFile" class="form-label">Message</label>
            <input class="form-control" type="file" id="formFile" name="">
        </div>

        <button type="submit" class="btn btn-primary">Soumettre la demande</button>
       </form>
    </div>
@endsection