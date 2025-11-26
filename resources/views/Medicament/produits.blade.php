@extends('layouts.base')
@section('title', 'ABREMA - Produits Medicaments Enregistrees')
@section('content')
<div class="container">
    <h3><strong>PRoduits Enregistres</strong></h3>
    <div class='mb-6'>
        <img src="{{ asset('images/abrema_products.jpg') }}" alt="ABREMA Products" style="max-width:100%; height:auto;">
    </div>
    <p>La liste des produits médicaments enregistrés par l'ABREMA est disponible pour consultation.</p>
</div>
@endsection